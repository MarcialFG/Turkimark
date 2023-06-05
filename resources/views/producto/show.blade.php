@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "{{ __('Show') Producto" }}
@endsection

@section('content')
<style>
    .content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


.card-body {
    display: flex;
    flex-direction: column;
}

.producto-datos {
    position: relative;
}

.centered-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.image-container {
    width: 400px;
    height: 400px;
    margin-bottom: 20px;
    overflow: hidden;
}

.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-details {
    flex-grow: 1;
    text-align: center;
}

.product-name {
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 10px;
    display: block;
}

.product-price {
    font-size: 18px;
    margin-bottom: 10px;
    display: block;
}

.product-details-text {
    font-size: 16px;
}

.volver-box {
    text-align: center;
    margin-top: 20px;
}

.btn-primary {
    background-color: #207807;
    border: none;
    border-radius: 20px;
    padding: 12px 24px;
    font-size: 18px;
    color: #fff;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0069d9;
}


    </style>

    <section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body producto-datos">
                    <div class="image-container">
                        <img src="{{asset('imagenes/' .$producto->imagen)}}" class="card-img-top">
                    </div>
                    <div class="product-details">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <span class="product-name">{{ $producto->nombre }}</span>
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            <span class="product-price">{{ $producto->precio }}€ IVA incl.</span>
                        </div>
                        <div class="form-group">
                            <strong>Detalles:</strong>
                            <span class="product-details-text">{{ $producto->detalles }}</span>
                        </div>
                    </div>
                    <div class="volver-box">
                        <a class="btn btn-primary" href="{{ route('Inicio') }}"> {{ __('Volver') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

