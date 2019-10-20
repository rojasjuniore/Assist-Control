@extends('admin.layout')

@section('title', 'Detalles de la transferencia')

@section('breadcrumb')
	<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('transfers.index') }}">Transferencias</a></li>
	    <li class="breadcrumb-item active">Detalles de la transferencia</li>
	</ol>
@endsection

@section('content')
    <div class="horizontal-form">
        <form action="#" class="form-horizontal">
            <div class="row">
            	<div class="col-6">
            		<div class="form-group">
            		    <label class="control-label">Nombre del titular</label>
            		    <input type="text" class="form-control" value="{{ $transfer->name_titular }}" readonly>
            		</div>
            	</div>
            	<div class="col-6">
            		<div class="form-group">
            		    <label class="control-label">Cédula de identidad</label>
            		    <input type="text" class="form-control" value="{{ $transfer->dni }}" readonly>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-4">
            		<div class="form-group">
            		    <label class="control-label">Entidad bancaria</label>
            		    <input type="text" class="form-control" value="{{ $transfer->bank }}" readonly>
            		</div>
            	</div>
            	<div class="col-4">
            		<div class="form-group">
            		    <label class="control-label">Cuenta bancaria</label>
            		    <input type="text" class="form-control" value="{{ $transfer->bank_account }}" readonly>
            		</div>
            	</div>
            	<div class="col-4">
            		<div class="form-group">
            		    <label class="control-label">Monto GiftCard</label>
            		    <input type="text" class="form-control" value="{{ 'US$ ' . $transfer->giftcard->amount }}" readonly>
            		</div>
            	</div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label class="control-label">Tipo de cambio (Bs)</label>
                        <input type="text" class="form-control" name="rate" value="{{ number_format($transfer->rate, 2, ',', '.') }}" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="control-label">Cargos de operación (US$)</label>
                        <input type="text" class="form-control" name="fees" value="{{ $transfer->fees }}" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">Total reembolsable (Bs)</label>
                        <input type="text" class="form-control" name="total_reimbursable" value="{{ number_format($transfer->total_reimbursable, 2, ',', '.') }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-6">
            		<div class="form-group">
            		    <label class="control-label">Correo eléctronico</label>
            		    <input type="email" class="form-control" value="{{ $transfer->giftcard->user->email }}" readonly>
            		</div>
            	</div>
            	<div class="col-3">
            		<div class="form-group">
            		    <label class="control-label">Código GiftCard</label>
            		    <input type="text" class="form-control" value="{{ $transfer->giftcard->code }}" readonly>
            		</div>
            	</div>
            	<div class="col-3">
            		<div class="form-group">
            		    <label class="control-label">Fecha de depósito</label>
            		    <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($transfer->giftcard->created_at)) }}" readonly>
            		</div>
            	</div>
            </div>
            @if ($transfer->capture)
                <div class="row">
                    <img class="img-responsive mx-auto d-block transfer-capture" src="{{ env('APP_URL') . 'storage/' . $transfer->capture }}">
                </div>
            @endif
        </form>
    </div>            
@endsection