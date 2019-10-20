@extends('admin.layout')

@section('title', 'Detalles de GiftCard')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('giftcards.index') }}">GiftCards</a></li>
	    <li class="breadcrumb-item active">Detalles de GiftCard</li>
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
                @if (!empty($referred))
                    <div class="col-4">
                        <div class="form-group">
                            <label class="control-label">Nombre del que recibe: </label>
                            <input type="text" class="form-control" value="{{ $referred->fullname_referred }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="control-label">Celular: </label>
                            <input type="text" class="form-control" value="{{ $referred->cell_referred }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="control-label">Monto: </label>
                            <input type="text" class="form-control" value="{{ $referred->email_referred }}" readonly>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
            	<div class="col-12">
            		<div class="form-group">
            		    <label class="control-label">Mensaje</label>
            		    <textarea rows="4" class="form-control" readonly>{{ $giftcard->message }}</textarea>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-6">
            		<div class="form-group">
            		    <label class="control-label">Fecha de creación</label>
            		    <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($giftcard->created_at)) }}" readonly>
            		</div>
            	</div>
            	<div class="col-6">
            		<div class="form-group">
            		    <label class="control-label">Estatus</label>
            		    <input type="text" class="form-control" readonly 
            		    	value="@switch($giftcard->status) @case('active') Activa @break @case('deactivated') Desactivada @break @case('refund_process') Proceso de reembolso @break @case('refunded') Reembolsado @break @case('pending') No pagada @break @endswitch">
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