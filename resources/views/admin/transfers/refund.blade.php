@extends('admin.layout')

@section('title', 'Reembolsar transferencia')

@section('breadcrumb')
	<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="{{ route('transfers.index') }}">Transferencias</a></li>
	    <li class="breadcrumb-item active">Reembolsar la transferencia</li>
	</ol>
@endsection

@section('content')
    <div class="horizontal-form">
		<div class="row">
			<div class="col-6 row">
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
				<div class="col-6">
					<div class="form-group">
					    <label class="control-label">Entidad bancaria</label>
					    <input type="text" class="form-control" value="{{ $transfer->bank }}" readonly>
					</div>
				</div>
				<div class="col-6">
				    <div class="form-group">
				        <label class="control-label">Total reembolsable (Bs)</label>
				        <input type="text" class="form-control" name="total_reimbursable" value="{{ number_format($transfer->total_reimbursable, 2, ',', '.') }}" readonly>
				    </div>
				</div>
				<div class="col-6">
					<div class="form-group">
					    <label class="control-label">Número de cuenta</label>
					    <input type="text" class="form-control" value="{{ $transfer->bank_account }}" readonly>
					</div>
				</div>
				<div class="col-6">
				    <div class="form-group">
				        <label class="control-label">Correo electrónico</label>
				        <input type="text" class="form-control" name="total_reimbursable" value="{{ $transfer->user->email }}" readonly>
				    </div>
				</div>
			</div>
			<div class="col-6">
				<form action="{{ route('transfers.save-refund', [$transfer->id]) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="capture">Subir captura de pantalla</label>
						<input type="file" class="form-control-file{{ $errors->has('capture') ? ' is-invalid' : '' }}" name="capture" accept="image/" required>
						@if ($errors->has('capture'))
						    <span class="invalid-feedback">
						        <strong>{{ $errors->first('capture') }}</strong>
						    </span>
						@endif
					</div>

					<button type="submit" class="btn btn-primary">Reembolsar transferencia</button>
				</form>
			</div>
		</div>
	</div>
@endsection