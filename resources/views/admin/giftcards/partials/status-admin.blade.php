@switch($giftcard->status)
	@case('active')
		Activada
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
    @case('send')
        Enviado
        @break
    @case('pending')
        No pagada
        @break
@endswitch