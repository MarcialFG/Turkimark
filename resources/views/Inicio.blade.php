@extends('layouts.app')

@section('template_title')
    Bienvenido
@endsection

@section('content')
<style>
    .zoom {
        transition: transform 0.5s;
    }

    .zoom:hover {
        transform: scale(1.2);
    }
    .btn-primary {
        background-color: rgb(132, 216, 132);
        border: 2px solid black;
        margin: 10px;
        padding: 10px;
    }
</style>
<div class="container-fluid d-flex justify-content-center align-items-center" style="background-color: #00cc66; height: 100vh;">
    <div class="row" style="background-color: #00cc66">
        <div class="col text-center">
            <h1 style="color: rgb(0, 0, 0); font-size: 4rem; font-family: 'Times New Roman', serif;">Bienvenido</h1>
            <h2 style="color: rgb(1, 1, 1); font-family: Arial, sans-serif;">Estos son nuestros productos más destacados:</h2>
            <div class="row" style="margin-bottom: 50px;">
                @foreach($productos as $producto)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm" style="height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 50px;">
                            <a href="{{ route('productos.show', $producto->id) }}">
                                <img class="zoom" src="{{ asset('imagenes/' .$producto->imagen)}}" class="card-img-top" style="width: 400px; height: 400px;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Times New Roman', serif; font-weight: bold; font-size: 1.5rem;">{{ $producto->nombre }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">{{ $producto->precio }}€ IVA incl.</span>
                                    @php
                                        $carrito = \App\Carrito::where('usuario_id', auth()->user()->id)->first();
                                    @endphp
                                    @role('user')
                                    @if ($carrito)
                                        <form method="POST" action="{{ route('carrito-productos.store') }}">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                            <input type="hidden" name="carrito_id" value="{{ $carrito->id }}">
                                            <input type="hidden" name="precio" value="{{ $producto->precio }}">
                                            <input type="hidden" name="cantidad" value="1">
                                            <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                                        </form>
                                    @endif
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Obtener la imagen por su id
            var zoomImage = document.getElementById('zoomImage');

            // Agregar un controlador de eventos al hacer clic en la imagen
            zoomImage.addEventListener('click', function(e) {
                e.preventDefault(); // Evitar que el enlace se abra de inmediato

                // Redirigir a la otra página después de un retraso
                setTimeout(function() {
                    window.location.href = zoomImage.parentElement.getAttribute('href');
                }, 1000); // Retraso de 1 segundo antes de la redirección
            });
        });
    </script>
@endsection








