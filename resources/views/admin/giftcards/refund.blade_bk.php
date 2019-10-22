@extends('admin.layout')

@section('title', 'Reembolso de GiftCard')

@section('breadcrumb')
    <b>Tasa: {{ number_format($rate, 2, ',', '.') }}</b>
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item active">Reembolso de GiftCard</li>
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
        <form action="{{ route('transfers.store', [$giftcard->id]) }}" class="form-horizontal row" method="post">
        	{{ csrf_field() }}
            <div class="col-md-7 col-xs-12">
                <div class="form-group">
                    <label for="control-label" class="control-label">Nombre de titular</label>
                    <input type="text" name="name_titular" class="form-control{{ $errors->has('name_titular') ? ' is-invalid' : '' }}" value="{{ ( ! empty($bankAccount->name_titular) ? $bankAccount->name_titular : Auth::user()->name . ' ' . Auth::user()->surname) }}" placeholder="Nombre de titular" required>
                    @if ($errors->has('name_titular'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name_titular') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="control-label"class="control-label">Cédula de intentidad</label>
                    <input type="text" name="dni" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" value="{{ ( ! empty($bankAccount->dni) ? $bankAccount->dni : '') }}" placeholder="Cédula de identidad" required>
                    @if ($errors->has('dni'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('dni') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Entidad bancaria</label>
                    <input type="text" name="bank" class="form-control{{ $errors->has('bank') ? ' is-invalid' : '' }}" value="{{ ( ! empty($bankAccount->bank) ? $bankAccount->bank : '') }}" placeholder="Entidad bancaria" required>
                    @if ($errors->has('bank'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('bank') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Cuenta bancaria</label>
                    <input type="text" name="bank_account" class="form-control{{ $errors->has('bank_account') ? ' is-invalid' : '' }}" value="{{ ( ! empty($bankAccount->bank_account) ? $bankAccount->bank_account : '') }}" placeholder="Cuenta bancaria" required>
                    @if ($errors->has('bank_account'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('bank_account') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Correo eléctronico</label>
                    <input type="email" class="form-control" name="email" value="{{ $giftcard->user->email }}" required>
                </div>
            </div>
            <div class="col-md-5 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Monto GiftCard</label>
                    <input type="text" class="form-control" name="amount" value="{{ 'US$ ' . $giftcard->amount}}" readonly required>
                </div>
                <div class="form-group">
                    <label class="control-label">Tipo de cambio (Bs)</label>
                    <input type="text" class="form-control" name="rate" value="{{ number_format($rate, 2, ',', '.')}}" readonly required>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label">Cargos de operación (US$)</label>
                        <input type="text" class="form-control" name="fees" value="{{ $giftcard->amount * 0.05 }}" readonly required>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label">Fecha de depósito</label>
                        <input type="text" class="form-control" name="date" value="{{ date('d-m-Y', strtotime($now)) }}" readonly required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Total reembolsable (Bs)</label>
                    <input type="text" class="form-control" name="total_reimbursable" value="{{ number_format(($giftcard->amount - ($giftcard->amount * 0.05)) * $rate, 2, ',', '.') }}" readonly required>
                </div>
                <div class="form-group">
                    <label class="control-label">Código GiftCard</label>
                    <input type="text" class="form-control" name="giftcard_code" value="{{ $giftcard->code }}" placeholder="Código GiftCard" readonly required>
                </div>
            </div>

            @if (( empty($bankAccount->id)))
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
    							<input type="checkbox" name="remember"> Recordar cuenta
    						</label>
                        </div>
                    </div>
                </div>                
            @endif 
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Reembolsar</button>
                </div>
            </div>
        </form>
    </div>            
@endsection