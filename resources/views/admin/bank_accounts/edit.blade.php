@extends('admin.layout')

@section('title', 'Cuenta bancaria')

@section('breadcrumb')
	<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('bank-accounts.index') }}">Cuentas bancarias</a></li>
	    <li class="breadcrumb-item active">Cuenta bancaria</li>
	</ol>
@endsection

@section('content')
    <div class="horizontal-form">
        <form action="{{ route('bank-accounts.update', [$bankAccount->id]) }}" class="form-horizontal" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
          	<div class="form-group">
          	    <label class="control-label">Nombre del titular</label>
          	    <input type="text" class="form-control" name="name_titular" value="{{ $bankAccount->name_titular }}">
          	</div>
          	<div class="form-group">
          	    <label class="control-label">Cédula de identidad</label>
          	    <input type="text" class="form-control" name="dni" value="{{ $bankAccount->dni }}">
          	</div>
          	<div class="form-group">
          	    <label class="control-label">Entidad bancaria</label>
          	    <input type="text" class="form-control" name="bank" value="{{ $bankAccount->bank }}">
          	</div>
          	<div class="form-group">
          	    <label class="control-label">Cuenta bancaria</label>
          	    <input type="text" class="form-control" name="bank_account" value="{{ $bankAccount->bank_account }}">
          	</div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>            
@endsection