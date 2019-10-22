@if ($giftcard->status !== 'refund_process' && $giftcard->status === 'active')
	@if ($giftcard->user->bankAccounts->count())
		<span data-target="#bankAccountsModal{{ $giftcard->id }}" data-toggle="modal">
			<a href="#" class="btn btn-primary btn-sm">
				Reembolsar GiftCard
			</a>
		</span>
		@include('admin.giftcards.bank-accounts-modal', ['user' => $giftcard->user])
	@elseif($giftcard->code[0] == 'C')
		<a href="{{ route('giftcards.direccion-agregar', [$giftcard->id]) }}" class="btn btn-primary btn-sm">
			Datos de envio
		</a>
	@else
		<a href="{{ route('giftcards.refund', [$giftcard->id]) }}" class="btn btn-primary btn-sm">
			Reembolsar GiftCard
		</a>
	@endif
@else
	@switch($giftcard->status)
        @case('deactivated')
            Desactivada
            @break
        @case('refund_process')
            Proceso de reembolso
            @break
        @case('refunded')
            Reembolsado
            @break
        @case('send')
        Enviado
        @break
        @case('pending')
            No pagada
            @break
	@endswitch
@endif