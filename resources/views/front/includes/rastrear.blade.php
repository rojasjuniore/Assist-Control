
    <div class="modal fade" id="favoritesModal"  tabindex="-1" role="dialog"  aria-labelledby="favoritesModalLabel" >
        <div class="modal-dialog" role="document" style="z-index: 999; top: 100px">
            <div class="modal-content">
                <div class="modal-header">
                    <b>Rastreo de paquetes</b>
                    <button type="button" class="close"  data-dismiss="modal"  aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                                 
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="orden" id="orden" placeholder="# Tracking">
                </div>
                <div class="modal-footer">
                <button type="button"  class="btn btn-default"  data-dismiss="modal">Cerrar</button>
                <span class="pull-right">
                  <button type="button" onclick="buscarOrden()" class="btn btn-primary">
                    Buscar
                  </button>
                </span>
              </div>
              <div id="tablaOrden"></div>
            </div>
        </div>
    </div>

    <script>  

        function buscarOrden(){
            var orden = jQuery('#orden').val();
            //alert("Orden: "+orden);
            jQuery.post("https://efectylogistic.com/tracking/rastreo_ordenes_casillero.php",{ orden:orden },
            function(data){
               jQuery('#tablaOrden').html(data);
            });
       }    

        </script>