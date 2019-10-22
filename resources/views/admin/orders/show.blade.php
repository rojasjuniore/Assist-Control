@extends('admin.layout')

@section('title', 'Detalles de la orden')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">
	    	<a href="{{ route('home') }}">Inicio</a>
	    </li>
	    <li class="breadcrumb-item">
	    	<a href="{{ route('orders.index') }}">
	    		{{ (Auth::user()->role === 'admin') ? 'Ordenes' : 'Mis ordenes' }}
	    	</a>
	    </li>
	    <li class="breadcrumb-item active">Detalles de la orden</li>
	</ol>
@endsection

@section('content')
	<div class="title-order">
			<div class="float-right">
				@if ($giftcard->status === 'refund_process')
					<a href="{{ route('transfers.show', [$order->giftcard->transfer->id]) }}" class="btn btn-primary">Ver transferencia</a>
				@endif
				@if ($giftcard->status === 'refund_process' && Auth::user()->role === 'admin')
					<a href="{{ route('transfers.refund', [$order->giftcard->transfer->id]) }}" class="btn btn-success">Reembolsar GiftCard</a>
				@endif
			</div>
			<p>Pedido N°: {{ $order->code }} - {{ ($order->status === 'completed' ? 'Completado' : 'Entregado') }}</p>
		</div>
		<div class="order-information card-order py-2 px-2 my-5">
			<p>Acerca del pedido</p>
			@if ($order->giftcard->transfer)
				<div class="row">
					<div class="col-3">
						<div class="form-group">
						    <label class="control-label">Titular</label>
						    <input type="text" class="form-control" value="{{ $order->giftcard->transfer->name_titular }}" readonly>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
						    <label class="control-label">Cédula</label>
						    <input type="text" class="form-control" value="{{ $order->giftcard->transfer->dni }}" readonly>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
						    <label class="control-label">Banco</label>
						    <input type="text" class="form-control" value="{{ $order->giftcard->transfer->bank }}" readonly>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
						    <label class="control-label">Número de cuenta</label>
						    <input type="text" class="form-control" value="{{ $order->giftcard->transfer->bank_account }}" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-2">
						<div class="form-group">
						    <label class="control-label">Monto GiftCard</label>
						    <input type="text" class="form-control" value="{{ $order->giftcard->amount . ' US$' }}" readonly>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
						    <label class="control-label">Tasa</label>
						    <input type="text" class="form-control" value="{{ number_format($order->giftcard->transfer->rate, 2, ',', '.') . ' Bs' }}" readonly>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
						    <label class="control-label">Número de cuenta</label>
						    <input type="text" class="form-control" value="{{ $order->giftcard->transfer->bank_account }}" readonly>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group">
						    <label class="control-label">Comisión</label>
						    <input type="text" class="form-control" value="{{ $order->giftcard->transfer->fees }}" readonly>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
						    <label class="control-label">Total reembolsable</label>
						    <input type="text" class="form-control" value="{{ number_format($order->giftcard->transfer->total_reimbursable, 2, ',', '.') . ' Bs' }}" readonly>
						</div>
					</div>
				</div>
			@endif
		</div>
		<div class="row">
			<div class="col-12 col-sm-6 px-2">
				{{-- <div class="order-address card-order py-2 px-2">
					<p class="title">Dirección de envio</p>
					<p>{{ $giftcard->to }}</p>
				</div> --}}
			</div>
			<div class="col-12 col-sm-6 px-2">
				<div class="order-payment card-order py-2 px-2">
					<p class="title">Método de pago</p>
					<p>
						@if ($giftcard->payment_method === 'paypal')
							PayPal
						@elseif($giftcard->payment_method === 'tdc')
							Tarjeta de crédito
						@endif
					</p>
				</div>
			</div>
		</div>
		<p class="subtitle my-3">Artículos pedidos</p>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Nombre del producto</th>
					<th scope="col">No. Ref</th>
					<th scope="col">Precio</th>
					<th scope="col">Cantidad</th>
					<th scope="col">Sub-total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>GiftCard</td>
					<td>{{ $giftcard->code }}</td>
					<td>{{ $giftcard->amount }}</td>
					<td>1</td>
					<td>{{ $giftcard->amount }}</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right">Subtotal</td>
					<td>{{ $giftcard->amount }}</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right">PayPal Fees</td>
					<td>{{ $giftcard->amount * 0.05 }}</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right">Total</td>
					<td>{{ $giftcard->amount * 1.05 }}</td>
				</tr>
			</tbody>
		</table>
@endsection