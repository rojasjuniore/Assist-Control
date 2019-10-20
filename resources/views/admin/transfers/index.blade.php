@extends('admin.layout')

@section('title', 'Transferencias')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Transferencias</li>
    </ol>
@endsection

@section('content')
    <div class="table-responsive m-t-40">
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Títular</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">GiftCard</th>
                    <th class="text-center">Banco</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">US$</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center th-options">Opciones</th>
                </tr>
            </thead>
            <tbody id="transfers">
                @foreach ($transfers as $transfer)
                    <tr>
                        <td>{{ $transfer->name_titular }}</td>
                        <td>{{ $transfer->user->name . ' ' . $transfer->user->surname }} </td>
                        <td>{{ $transfer->giftcard->code }}</td>
                        <td>{{ $transfer->bank }}</td>
                        <td>{{ date('d-m-Y', strtotime($transfer->date)) }}</td>
                        <td>{{ $transfer->giftcard->amount }}</td>
                        <td>
                            @switch($transfer->status)
                                @case('active')
                                    Activa
                                    @break
                                @case('deactivated')
                                    Desactivada
                                    @break
                                @case('refund_process')
                                    Proceso de reembolso
                                    @break
                                @case('refunded')
                                    Reembolsado
                                    @break
                                @case('pending')
                                    No pagada
                                    @break
                                @case('cancel')
                                    Cancelada
                                    @break
                            @endswitch                          
                        </td>
                        <td class="d-flex">
                            {{-- Ver --}}
                            <span class="m-1">
                                <a href="{{ route('transfers.show', [$transfer->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ver detalles">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </span>

                            {{-- Ver captura --}}
                            @if ($transfer->capture)
                                <span class="m-1" data-target="#showCapture{{ $transfer->id }}" data-toggle="modal">
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver captura">
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                    </a>
                                </span>
                                @include('admin.transfers.show-capture-modal', ['transfer' => $transfer])
                            @endif

                            @if (Auth::user()->role === 'admin')
                                @include('admin.transfers.options.admin')
                            @endif

                            {{-- Eliminar --}}
                            {{-- <span data-target="#deleteModal{{ $transfer->id }}" data-toggle="modal">
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Cancelar transferencia">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </a>
                            </span>
                            @include('admin.transfers.delete-modal', ['transfer' => $transfer]) --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection