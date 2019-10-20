<!-- Modal -->
<div class="modal fade" id="showCapture{{$transfer->id}}" tabindex="-1" role="dialog" aria-labelledby="showCapture" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Captura de pantalla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="{{ env('APP_URL') . 'public_html/captures/' . $transfer->capture }}">
            </div>
        </div>
    </div>
</div>