{{-- Cambiar estatus --}}
<span class="m-1" data-target="#changeStatus{{ $giftcard->id }}" data-toggle="modal">
	<a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Cambiar estatus">
	    <i class="fa fa-refresh" aria-hidden="true"></i>
	</a>
</span>
@include('admin.giftcards.change-status-modal', ['giftcard' => $giftcard])

{{-- Eliminar --}}
<span class="m-1" data-target="#deleteModal{{ $giftcard->id }}" data-toggle="modal">
	<a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar">
	    <i class="fa fa-trash" aria-hidden="true"></i>
	</a>
</span>
@include('admin.giftcards.delete-modal', ['giftcard' => $giftcard])