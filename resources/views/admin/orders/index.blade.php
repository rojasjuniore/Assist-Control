@extends('admin.layout')

@section('title', 'Mis ordenes')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item active">Mis ordenes</li>
	</ol>
@endsection

@section('content')
    <div class="table-responsive m-t-40">
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Pedido</th>
                    @if (Auth::user()->role == 'admin')
                        <th class="text-center">Usuario</th>
                    @endif
                    <th class="text-center">Código de GiftCard</th>
                    <th class="text-center">Total de pedido</th>
                    <th class="text-center">ID transacción</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center">Fecha</th>
                    <th class="th-options">Opciones</th>
                </tr>
            </thead>
            <tbody id="orders">
                @foreach ($orders as $order)
                	<tr>
                        <td>{{ $order->code }}</td>
                        @if (Auth::user()->role == 'admin')
                            <td>{{ $order->user->name . ' ' . $order->user->surname }}</td>
                        @endif
                        <td>
                        @if ($order->giftcard) 
                        {{$order->giftcard->code }}
                        @endif 
                        </td>
	                	<td>{{ $order->total_order }}</td>
                        <td>{{ $order->transaction_id }}</td>
	                	<td>
                            @if ($order->status === 'completed')
                                Completado
                            @else
                                Entregado
                            @endif
                        </td>
                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
	                	<td class="d-flex">
	                		{{-- Ver --}}
	                		<span class="m-1">
                                <a href="{{ route('orders.show', [$order->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ver pedido">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </span>

	                		@if (Auth::user()->role === 'admin')
                                {{-- Cambiar estatus --}}
                                <span class="m-1" data-target="#deliverModal{{ $order->id }}" data-toggle="modal">
                                    <a href="#" class="btn btn-{{ ($order->status == 'delivered') ? 'danger' : 'primary' }} btn-sm" data-toggle="tooltip" data-placement="top" title="Marcar como {{ ($order->status == 'delivered') ? 'cancelado' : 'entregado' }}">
                                        <i class="fa fa-{{ ($order->status == 'delivered') ? 'times' : 'check' }}" aria-hidden="true"></i>
                                    </a>
                                </span>
                                @include('admin.orders.deliver-modal', ['order' => $order])
                            @endif
    
                            @if (Auth::user()->role == 'admin')
                                {{-- Eliminar orden --}}
                                <span class="m-1" data-target="#deleteModal{{ $order->id }}" data-toggle="modal">
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar pedido">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </span>
                                @include('admin.orders.delete-modal', ['order' => $order])
                            @endif
	                	</td>
                	</tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection