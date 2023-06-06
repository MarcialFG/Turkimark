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

    .box {
        background-color: #f8f8f8;
        padding: 20px;
        border-radius: 4px;
    }

    .padding-1 {
        padding: 20px;
    }

    .box-body {
        margin-bottom: 20px;
    }

    .box-footer {
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="form-title">Producto</div>
        <div class="box-body">
        
            <div class="form-group">
                {{ Form::label('nombre') }}
                {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('imagen') }}
                {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
                {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('precio') }}
                {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('detalles') }}
                {{ Form::text('detalles', $producto->detalles, ['class' => 'form-control' . ($errors->has('detalles') ? ' is-invalid' : ''), 'placeholder' => 'Detalles']) }}
                {!! $errors->first('detalles', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="box-footer mt20 text-center">
            <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
        </div>
    </div>
</div>

