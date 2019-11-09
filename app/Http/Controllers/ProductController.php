<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function listar()
    {
    	$productos = Product::all();

    	return view('producto.index')->with(compact('productos'));
    }

    public function eliminar($id)
    {
    	$producto = Product::findOrFail($id);
    	$producto->delete();
    	return back();
    }

    public function editar($id)
    {
    	$producto = Product::where('id', $id)->first();

    	return view('producto.edit')->with(compact('producto'));
    }

    public static function modificar(Request $request, $id)
    {
    	$producto = Product::findOrFail($id);

    	$producto->descripcion = $request->input('descripcion');
    	$producto->precio = $request->input('precio');
    	$producto->categoria = $request->input('categoria');

    	if($request->hasFile('foto')) {
	        $filenamewithextension = $request->file('foto')->getClientOriginalName();
	        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
	        $extension = $request->file('foto')->getClientOriginalExtension();
	        $filenametostore = 'my-file/' . $filename.'_'.time().'.'.$extension;
	        $saveFile = Storage::disk('s3')->put($filenametostore, fopen($request->file('foto'), 'r+'), 'public');
	        $producto->foto = $filenametostore;
	    }

	    $producto->save();

	    return redirect()->route('productos.listar');
    }

    public function buscar(Request $request)
    {
    	$descripcion = $request->input('descripcion-producto');
    	$descripcion = '%' . $descripcion . '%';

    	$producto = Product::where('descripcion', 'like', $descripcion)->first();

    	if($producto != null) {
    		return redirect()->route('productos.mostrar', $producto->id);
    	}else {
    		return back();
    	}
    }

    public function mostrar($id)
    {
    	$producto = Product::where('id', $id)->first();

    	return view('producto.show')->with(compact('producto'));
    }

}
