@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? "{{ __('Show') Pedido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection