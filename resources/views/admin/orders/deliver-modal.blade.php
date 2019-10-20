<!-- Modal -->
<div class="modal fade" id="deliverModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="deliverModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación cambio de estatus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-{{ ($order->status === 'delivered') ? 'danger' : 'info' }}" role="alert">
                    <strong>Aguarda!</strong> ¿Estás seguro de marcar el pedido {{ $order->code }} como {{ ($order->status === 'delivered') ? 'CANCELADO' : 'ENTREGADO' }}?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm" @click.prevent="deliverOrder({{$order->id}})">
                    {{ ($order->status === 'delivered') ? 'Cancelar' : 'Entregar' }}
                </button>
            </div>
        </div>
    </div>
</div>