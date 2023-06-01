<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        color: #010101;
        border: none;
        cursor: pointer;
    }

    .btn.btn-primary {
        background-color: #f8f8f8;
        align-self: center;
    }

    .mt20 {
        margin-top: 20px;
    }

    .container {
        max-width: 500px;
        margin: 40px auto;
        padding: 20px;
        background-color: #0b9f55;
        border-radius: 4px;
    }

    .form-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #000000;
    }
</style>

<div class="container">
    <div class="form-title">Formulario de Pedido</div>
    {{ Form::hidden('usuario_id', Auth::user()->id) }}
    {{ Form::hidden('estado', 'En preparación') }}
    <div class="form-group">
        {{ Form::label('nombre') }}
        {{ Form::text('nombre', $pedido->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('numero') }}
        {{ Form::text('numero', $pedido->numero, ['class' => 'form-control' . ($errors->has('numero') ? ' is-invalid' : ''), 'placeholder' => 'Número']) }}
        {!! $errors->first('numero', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('email de facturación') }}
        {{ Form::text('email', $pedido->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email de facturación']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('direccion') }}
        {{ Form::text('direccion', $pedido->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group text-center mt20">
        <button type="submit" class="btn btn-primary">{{ __('Hacer pedido') }}</button>
    </div>
</div>

