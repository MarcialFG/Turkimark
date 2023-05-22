@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "{{ __('Show') Producto" }}
@endsection

@section('content')
<style>
    .volver-box {
        background-color: green;
        padding: 10px;
        text-align: left;
        margin: 20px;
    }

    .volver-box a {
        color: white;
    }

    .producto-datos {
        text-align: center;
    }

    .producto-imagen {
        max-width: 400px;
        margin: 0 auto;
    }
</style>


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="volver-box">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body producto-datos">
                        <div class="form-group">
                            <img src="{{'/storage/imagenes/'.$producto->imagen }}" class="card-img-top" style="width: 400px; height: 400px;">
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $producto->precio }}€
                        </div>
                        <div class="form-group">
                            <strong>Detalles:</strong>
                            {{ $producto->detalles }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

