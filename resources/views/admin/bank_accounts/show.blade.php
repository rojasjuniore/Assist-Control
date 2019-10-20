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
        <form action="#" class="form-horizontal">
      	<div class="form-group">
      	    <label class="control-label">Nombre del titular</label>
      	    <input type="text" class="form-control" value="{{ $bankAccount->name_titular }}" readonly>
      	</div>
      	<div class="form-group">
      	    <label class="control-label">Cédula de identidad</label>
      	    <input type="text" class="form-control" value="{{ $bankAccount->dni }}" readonly>
      	</div>
      	<div class="form-group">
      	    <label class="control-label">Entidad bancaria</label>
      	    <input type="text" class="form-control" value="{{ $bankAccount->bank }}" readonly>
      	</div>
      	<div class="form-group">
      	    <label class="control-label">Cuenta bancaria</label>
      	    <input type="text" class="form-control" value="{{ $bankAccount->bank_account }}" readonly>
      	</div>
        </form>
    </div>            
@endsection