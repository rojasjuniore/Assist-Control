
<div class="row cnt-frm" style="padding-bottom: 150px;">
    <div class="col-md-8 offset-md-2">
        @if(request()->path() == '/')
          <div class="text-center">
             <h2>¿Deseas comprar en Amazón? <h4> Realiza la busqueda de tu producto aquí</h4> <h2> <br>
        </div>
        @endif
      
        <form class="text-center" method="get" style="padding-top: 20px;" action="{{route('amazon.results', 1)}}">
            <div class="row">
                <div class="col-md-7 offset-md-2">
                    <input class="brd-rd30 form-control " style="font-size:12px;"  type="text" name="busqueda" placeholder="Ingresa el nombre del producto">
                </div>
                <div class="col-md-2">
                    <div class="d-none d-sm-block">
                        <button class="btn " style="border-radius: 30px; height: 56px; font-size:16px;" type="submit">Buscar</button>
                    </div>
                    <div class="d-block d-sm-none">
                        <button class="btn " style="border-radius: 30px; height: 56px; font-size:16px;  padding: 0px 20px 0px; margin-left: -50px;" type="submit"><span class="fa fa-search"></span></button>
                    </div>
                     
                    
                </div>
            </div>
       </form>
    </div>
</div>