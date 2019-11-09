@extends('layouts.app')

@section('content')
	@foreach ($productos as $producto)
		<div class="card m-2" style="width: 18rem;">
			<img class="card-img-top" src="https://prueba-laravel.s3.us-east-2.amazonaws.com/{{ $producto->foto}}" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{ $producto->descripcion }}</h5>
			    <h6 class="card-subtitle mb-2 text-muted">S/. {{ $producto->precio }}</h6>
			    <p class="card-text">{{ $producto->categoria }}</p>
			    <a href="{{ route('productos.editar', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>
			    <a href="{{ route('productos.eliminar', $producto->id) }}" class="btn btn-sm btn-danger">Eliminar</a>
			</div>
		</div>
	@endforeach
@endsection