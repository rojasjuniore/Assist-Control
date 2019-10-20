@extends('admin.layout')

@section('title', 'GiftCards')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">
	    	<a href="{{ route('home') }}">Inicio</a>
	    </li>
	    <li class="breadcrumb-item active" aria-current="page">GiftCards</li>
	</ol>
@endsection

@section('content')
    <div class="table-responsive m-t-40">
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Vendedor</th>
                    <th class="text-center">Monto (USD)</th>
                    <th class="text-center">Código</th>
                    <th class="text-center">Método de pago</th>
                    <th class="text-center">Fecha</th>
                    <th class="th-status">Estatus</th>
                    <th class="th-options">Opciones</th>
                </tr>
            </thead>
            <tbody id="giftcards">
                @foreach ($giftcards as $giftcard)
                	<tr>
	                	<td>{{ $giftcard->user->name . ' ' . $giftcard->user->surname }} </td>
	                	<td>{{ $giftcard->amount }}</td>
	                	<td>{{ $giftcard->code }}</td>
	                	<td>
	                		@if ($giftcard->payment_method == 'paypal')
	                			PayPal
	                		@else
								TDC
	                		@endif
	                	</td>
	                	<td>{{ date('d-m-Y', strtotime($giftcard->created_at)) }}</td>
	                	<td class="td-status">
	                		@if (Auth::user()->role === 'user')
	                			@include('admin.giftcards.partials.status-user')
	                		@else
		                		@include('admin.giftcards.partials.status-admin')
		                	@endif
	                	</td>
	                	<td class="d-flex">
							{{-- Ver --}}
							<span class="m-1">
								@if($giftcard->code[0]=='C')
								<a href="{{ route('giftcards.combo.show', [$giftcard->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles de la GiftCard">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								@else
								<a href="{{ route('giftcards.show', [$giftcard->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles de la GiftCard">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								@endif
							</span>
							
							{{-- @if (Auth::user()->role === 'user')
								@include('admin.giftcards.options.user')
							@endif --}}

	                		@if (Auth::user()->role === 'admin')
								@include('admin.giftcards.options.admin')
	                		@endif
	                	</td>
                	</tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection