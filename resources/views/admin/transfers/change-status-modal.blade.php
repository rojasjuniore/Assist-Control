<!-- Modal -->
<div class="modal fade" id="changeStatus{{$transfer->id}}" tabindex="-1" role="dialog" aria-labelledby="changeStatus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambio de estatus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transfers.change-status', [$transfer->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label for="status">Selecciona un nuevo estatus para la transferencia de Adrian Vera por <b>{{ number_format($transfer->total_reimbursable, 2, ',', '.') }}</b>
                        <select class="form-control form-control-sm col-11" name="status" required>
                            <option disabled selected>Estatus</option>
                            @foreach (array_diff(['active', 'deactivated', 'refund_process', 'refunded', 'cancel'], array($transfer->status)) as $status)
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
                                        @case('refunded')
                                            Reembolsado
                                            @break
                                        @case('cancel')
                                            Cancelado
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