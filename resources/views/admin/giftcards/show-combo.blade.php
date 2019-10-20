@extends('admin.layout')

@section('title', 'Detalles de Combo')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('giftcards.index') }}">GiftCards</a></li>
	    <li class="breadcrumb-item active">Detalles del combo</li>
	</ol>
@endsection

@section('content')
	@if (session('message'))
	    <div class="alert alert-success alert-dismissible fade show" role="alert">
	        <strong>{{ session('message') }}</strong>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	        </button>
	    </div>
	@endif
    <div class="horizontal-form">
        <form action="#" class="form-horizontal">
            <h3>Datos de pago</h3>
            <div class="row">
{{--             	<div class="col-6">
            		<div class="form-group">
            		    <label class="control-label">Para: </label>
            		    <input type="text" class="form-control" value="{{ $giftcard->to }}" readonly>
            		</div>
            	</div> --}}
            	<div class="col-4">
            		<div class="form-group">
            		    <label class="control-label">Monto: </label>
            		    <input type="text" class="form-control" value="{{ $giftcard->amount }}" readonly>
            		</div>
            	</div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">Fecha de creación</label>
                        <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($giftcard->created_at)) }}" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">Estatus</label>
                        <input type="text" class="form-control" readonly 
                            value="@switch($giftcard->status) @case('active') Activa @break @case('deactivated') Desactivada @break @case('refund_process') Proceso de reembolso @break @case('refunded') Reembolsado @break @case('pending') No pagada @break @endswitch">
                    </div>
                </div>
            </div>
              <h3>Datos de envio</h3>
            <div class="row">
              
            	<div class="col-4">
                    <div class="form-group">
                        <label class="control-label">Nombre: </label>
                        <input type="text" class="form-control" value="{{ $direccion->nombre }}" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">Teléfono</label>
                        <input type="text" class="form-control" value="{{$direccion->telefono}}" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">Dirección</label>
                        <input type="text" class="form-control" value="{{$direccion->direccion }}" readonly>
                    </div>
                </div>
            </div>
        </form>

        @if (Auth::user()->role == 'user' && $giftcard->status != 'refund_process')
            @if ($giftcard->user->bankAccounts->count())
                <span data-target="#bankAccountsModal{{ $giftcard->id }}" data-toggle="modal">
                      <a href="#" class="btn btn-primary btn-sm">
                            Reembolsar GiftCard
                      </a>
                </span>
                @include('admin.giftcards.bank-accounts-modal', ['user' => $giftcard->user])
            @else
                <a href="{{ route('giftcards.refund', [$giftcard->id]) }}" class="btn btn-primary btn-sm">
                      Reembolsar GiftCard
                </a>
            @endif
        @endif
    </div>
@endsection