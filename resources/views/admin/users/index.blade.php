@extends('admin.layout')

@section('title', 'Usuarios')

@section('breadcrumb')
	<ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
	    <li class="breadcrumb-item active">Usuarios</li>
	</ol>
@endsection

@section('content')
    <div class="table-responsive m-t-40">
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">País</th>
                    <th class="text-center">Téléfono</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Rol</th>
                    <th class="th-options">Opciones</th>
                </tr>
            </thead>
            <tbody id="users">
                @foreach ($users as $user)
                	<tr>
	                	<td>{{ $user->name }} {{ $user->surname }}</td>
	                	<td>{{ $user->country }}/{{ $user->city }}</td>
	                	<td>{{ $user->phone }}</td>
	                	<td>{{ $user->email }}</td>
	                	<th>{{ ($user->role == 'admin') ? 'Admin' : 'Usuario'  }}</th>
	                	<td class="d-flex"> 
	                		{{-- Ver --}}
	                		<span class="m-1">
	                			<a href="{{ route('users.show', [$user->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ver giftcard">
	                				<i class="fa fa-eye" aria-hidden="true"></i>
	                			</a>
	                		</span>

							{{-- Cambiar contraseña --}}
	                		<span class="m-1">
	                			<a href="{{ route('users.change-password', [$user->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ver giftcard">
	                				<i class="fa fa-key" aria-hidden="true"></i>
	                			</a>
	                		</span>

	                		{{-- Eliminar --}}
	                		<span class="m-1" data-target="#deleteModal{{ $user->id }}" data-toggle="modal">
	                			<a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar">
	                			    <i class="fa fa-trash" aria-hidden="true"></i>
	                			</a>
	                		</span>
	                		@include('admin.users.delete-modal', ['user' => $user])
	                	</td>
                	</tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection