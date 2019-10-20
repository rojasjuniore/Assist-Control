@extends('admin.layout')

@section('title', 'Cuentas bancarias')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item active">Cuentas bancarias</li>
	</ol>
@endsection

@section('content')
    <div class="table-responsive m-t-40">
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Títular</th>
                    <th class="text-center">DNI</th>
                    <th class="text-center">Banco</th>
                    <th class="th-options">Opciones</th>
                </tr>
            </thead>
            <tbody id="accounts">
                @foreach ($bankAccounts as $account)
                	<tr>
                        <td>{{ $account->name_titular }}</td>
                        <td>{{ $account->dni }}</td>
	                	<td>{{ $account->bank }}</td>
	                	<td class="d-flex">
	                		{{-- Ver --}}
	                		<span class="m-1">
                                <a href="{{ route('bank-accounts.show', [$account->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ver cuenta">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </span>

                            {{-- Editar --}}
                            <span class="m-1">
                                <a href="{{ route('bank-accounts.edit', [$account->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            </span>

	                		{{-- Eliminar --}}
	                		<span class="m-1" data-target="#deleteModal{{ $account->id }}" data-toggle="modal">
	                			<a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar cuenta">
	                			    <i class="fa fa-ban" aria-hidden="true"></i>
	                			</a>
	                		</span>
	                		@include('admin.bank_accounts.delete-modal', ['account' => $account])
	                	</td>
                	</tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection