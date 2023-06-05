@extends('layouts.app')

@section('template_title')
    Pedido Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pedido Producto') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Pedido Id</th>
										<th>Producto Id</th>
										<th>Precio</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidoProductos as $pedidoProducto)
                                        <tr>
                                       
                                            
											<td>{{ $pedidoProducto->pedido_id }}</td>
											<td>{{ $pedidoProducto->producto_id }}</td>
											<td>{{ $pedidoProducto->precio }}</td>
											<td>{{ $pedidoProducto->cantidad }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pedidoProductos->links() !!}
            </div>
        </div>
    </div>
@endsection