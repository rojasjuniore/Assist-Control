<!-- Modal -->
<div class="modal fade" id="changeStatus{{$giftcard->id}}" tabindex="-1" role="dialog" aria-labelledby="changeStatus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambio de estatus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('giftcards.change-status', [$giftcard->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label for="status">Selecciona un nuevo estatus para la GiftCard de Adrian Vera por {{ $giftcard->amount }}</label>
                        <select class="form-control form-control-sm col-11" name="status" required>
                            <option disabled selected>Estatus</option>
                            @foreach (array_diff(['active', 'deactivated', 'refund_process', 'refunded','send'], array($giftcard->status)) as $status)
                                <option value={{ $status }}>
                                    @switch($status)
                                        @case('active')
                                            Activa
                                            @break
                                        @case('deactivated')
                                            Desactivada
                                            @break
                                        @case('refund_process')
                                            Proceso de reembolso
                                            @break
                                        @case('send')
                                            Enviado
                                            @break
                                        @case('refunded')
                                            Reembolsado
                                            @break
                                    @endswitch      
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>