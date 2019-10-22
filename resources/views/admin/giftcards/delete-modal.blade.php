<!-- Modal -->
<div class="modal fade" id="deleteModal{{$giftcard->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación de borrado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    <strong>Aguarda!</strong> ¿Estás seguro de borrar la GiftCard del vendedor Lorem ipsum por  {{ $giftcard->amount }} US$?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger btn-sm" @click.prevent="deleteGiftcard({{$giftcard->id}})">Eliminar</button>
            </div>
        </div>
    </div>
</div>