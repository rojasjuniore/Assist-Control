{{-- Reembolsar --}}
{{-- @if ($transfer->giftcard->status === 'refund_process')
	<span data-target="#refundModal{{ $transfer->id }}" data-toggle="modal">
		<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Reembolsar transferencia">
		    <i class="fa fa-check" aria-hidden="true"></i>
		</a>
	</span>
	@include('admin.transfers.refund-modal')
@endif --}}

{{-- Reembolsar --}}
@if ($transfer->status !== 'refunded')
	<span class="m-1">
		<a href="{{ route('transfers.refund', [$transfer->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Reembolsar transferencia">
		    <i class="fa fa-check" aria-hidden="true"></i>
		</a>
	</span>
@endif

{{-- Cambiar estatus --}}
<span class="m-1" data-target="#changeStatus{{ $transfer->id }}" data-toggle="modal">
    <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Cambiar estatus">
        <i class="fa fa-refresh" aria-hidden="true"></i>
    </a>
</span>
@include('admin.transfers.change-status-modal', ['transfer' => $transfer])