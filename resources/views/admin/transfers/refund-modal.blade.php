<!-- Modal -->
<div class="modal fade" id="refundModal{{$transfer->id}}" tabindex="-1" role="dialog" aria-labelledby="refundModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación de reembolso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <strong>Aguarda!</strong> ¿Estás seguro de reembolsar la transferencia del usuario {{ $transfer->titular_name }}?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm" @click.prevent="refundTransfer({{$transfer->id}})">Aceptar</button>
            </div>
        </div>
    </div>
</div>