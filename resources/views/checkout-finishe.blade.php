@extends('templates.material.main')

@section('jquery') {{-- Including this section to override it empty. Using jQuery from webpack build --}} @endsection

@push('before-scripts')
    <script src="{{ mix('/js/home-one.js') }}"></script>
@endpush

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection

@section('content')
<input id="transaccion" type="hidden" value="{{session('transaccion')}}">
<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
        <div class="col-md-8 align-self-center">
            <div class="container">
                <div class="row" style="margin-top:20px">
                  <div class="col-lg-8 col-lg-offset-2 ">
                    <h4 style="text-align:left"> Respuesta de la Transacción </h4>
                    <hr>
                  </div>
                  <div class="col-lg-8 col-lg-offset-2 ">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td>Referencia</td>
                            <td id="referencia"></td>
                            <input id="referenciae" type="hidden">
                            <input id="totale" type="hidden">
                          <input id="codigoe" value="{{Auth::user()->code_cliente}}" type="hidden">
                          </tr>
                          <tr>
                            <td class="bold">Fecha</td>
                            <td id="fecha" class=""></td>
                          </tr>
                          <tr>
                            <td>Respuesta</td>
                            <td id="respuesta"></td>
                          </tr>
                          <tr>
                            <td>Motivo</td>
                            <td id="motivo"></td>
                          </tr>
                          <tr>
                            <td class="bold">Banco</td>
                            <td class="" id="banco">
                          </tr>
                          <tr>
                            <td class="bold">Recibo</td>
                            <td id="recibo"></td>
                          </tr>
                          <tr>
                            <td class="bold">Total</td>
                            <td class="" id="total">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
                <img width="70%" src="{{asset('images/epayco.png')}}" alt="">
        </div>
    </div>
            
            
    </div>
</div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
        function getQueryParam(param) {
          location.search.substr(1)
            .split("&")
            .some(function(item) { // returns first occurence and stops
              return item.split("=")[0] == param && (param = item.split("=")[1])
            })
          return param
        }
        $(document).ready(function() {
          //llave publica del comercio
          //Referencia de payco que viene por url
          var ref_payco = getQueryParam('ref_payco');
          //Url Rest Metodo get, se pasa la llave y la ref_payco como paremetro
          var urlapp = "https://secure.epayco.co/validation/v1/reference/" + ref_payco;
          $.get(urlapp, function(response) {
            if (response.success) {
              if (response.data.x_cod_response == 1) {
                //Codigo personalizado
                $('#fecha').html(response.data.x_transaction_date);
                $('#respuesta').html(response.data.x_response);
                $('#referencia').text(response.data.x_id_invoice);
                $('#referenciae').val(response.data.x_transaction_id);
                $('#motivo').text(response.data.x_response_reason_text);
                $('#recibo').text(response.data.x_transaction_id);
                $('#banco').text(response.data.x_bank_name);
                $('#autorizacion').text(response.data.x_approval_code);
                $('#total').text(response.data.x_amount);
                $('#totale').val(response.data.x_amount);
                alert("Transaccion Aprobada");
                app2.createEpayco();
                console.log('transacción aceptada');
              }
              //Transaccion Rechazada
              if (response.data.x_cod_response == 2) {
                console.log('transacción rechazada');
              }
              //Transaccion Pendiente
              if (response.data.x_cod_response == 3) {
                console.log('transacción pendiente');
              }
              //Transaccion Fallida
              if (response.data.x_cod_response == 4) {
                console.log('transacción fallida');
              }
            
            } else {
              alert("Error consultando la información");
            }
          });
        });
      </script>
@endsection


@section('js')
<script>
    var app2 = new Vue({
    el: '#main-wrapper',
    data () {
            return{
                 create_epayco : {
                     referenia : null,
                     monto : null,
                     cliente: null,
                     transaccion: null,
                },
            }   
        },
        mounted() {
           console.log('init');
        },
      methods: {
        greet: function (event) {
          alert('Hello');
           },
            pruebaF: function(){
                alert(response.data.x_transaction_date);
            },
              createEpayco: function () {
                 var input = {
                    referencia: $('#referenciae').val(),
                    monto: $('#totale').val(),
                    cliente: $('#codigoe').val(),
                    transaccion: $('#transaccion').val(),
                 };
                 axios.post('/api/epayco', input).then((response) =>  {
                   console.log('datos enviados con exito');
                });
            },
        }
});
</script>
@endsection











