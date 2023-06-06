@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? "{{ __('Show') Pedido" }}
@endsection

@section('content')
<style>
    body {
        background-color: #0b9f55;
        margin: 0;
        padding: 0;
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 50px;
    }

    .card {
        width: 400px;
        border-radius: 4px;
        background-color: #034929;
        color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 20px;
        margin-top: 50px;
    }

    .card-header {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 10px;
    }

    strong {
        font-weight: bold;
    }

    .btn-primary {
        width: 100%;
        background-color: #0b9f55;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #0a8e4f;
    }
</style>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Datos del pedido') }}</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <strong>Referencia:</strong>
                {{ $pedido->id }}
            </div>
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $pedido->nombre }}
            </div>
            <div class="form-group">
                <strong>Numero de telefono:</strong>
                {{ $pedido->numero}}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $pedido->email}}
            </div>
            <div class="form-group">
                <strong>Dirección:</strong>
                {{ $pedido->direccion }}
            </div>
            <div class="form-group">
                <strong>Estado:</strong>
                {{ $pedido->estado }}
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> {{ __('Volver') }}</a>
        </div>
    </div>
</section>



@endsection