@extends('layouts.app')

@section('content')
	<div class="col-md-8">
        <div class="card">
            <div class="card-header">Editar información del producto</div>
            <div class="card-body">
                <form method="post" action="{{ route('productos.modificar', $producto->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>
                        <div class="input-group col-md-6">
                    		<div class="input-group-prepend">
                    			<span class="input-group-text" id="basic-addon1">S/.</span>
                    		</div>
                            <input type="text" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoría</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $producto->categoria }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
                        <div class="input-group col-md-6">
                        	<img class="m-3" src="https://prueba-laravel.s3.us-east-2.amazonaws.com/{{ $producto->foto }}" alt="" style="border-radius: 2px;">
                           <div class="custom-file">
                           		<input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="bw-foto">
                           		<label class="custom-file-label" for="bw-foto">Escoge un archivo</label>
                           	</div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection