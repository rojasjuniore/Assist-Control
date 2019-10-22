<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">

    var total_items = 0;

    function choice1(){
        total_items = document.getElementById("numpaq").value;
        switch(total_items) {

                            case "1":
                                $("#campo1").show();
                                $("#resetboton").show();
                                $("#campo2").hide();
                                $("#campo3").hide();
                                $("#campo4").hide();
                                $("#campo5").hide();
                                $("#campo6").hide();
                                $("#campo7").hide();
                                $("#campo8").hide();
                                $("#campo9").hide();
                                break;
                            case "2":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").hide();
                                $("#campo4").hide();
                                $("#campo5").hide();
                                $("#campo6").hide();
                                $("#campo7").hide();
                                $("#campo8").hide();
                                $("#campo9").hide();
                                break;
                            case "3":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").show();
                                $("#campo4").hide();
                                $("#campo5").hide();
                                $("#campo6").hide();
                                $("#campo7").hide();
                                $("#campo8").hide();
                                $("#campo9").hide();
                                break;
                            case "4":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").show();
                                $("#campo4").show();
                                $("#campo5").hide();
                                $("#campo6").hide();
                                $("#campo7").hide();
                                $("#campo8").hide();
                                $("#campo9").hide();
                                break;
                            case "5":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").show();
                                $("#campo4").show();
                                $("#campo5").show();
                                $("#campo6").hide();
                                $("#campo7").hide();
                                $("#campo8").hide();
                                $("#campo9").hide();
                                break;
                            case "6":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").show();
                                $("#campo4").show();
                                $("#campo5").show();
                                $("#campo6").show();
                                $("#campo7").hide();
                                $("#campo8").hide();
                                $("#campo9").hide();
                                break;
                            case "7":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").show();
                                $("#campo4").show();
                                $("#campo5").show();
                                $("#campo6").show();
                                $("#campo7").show();
                                $("#campo8").hide();
                                $("#campo9").hide();
                                break;
                            case "8":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").show();
                                $("#campo4").show();
                                $("#campo5").show();
                                $("#campo6").show();
                                $("#campo7").show();
                                $("#campo8").show();
                                $("#campo9").hide();
                                break;
                            case "9":
                                $("#campo1").show();
                                $("#campo2").show();
                                $("#campo3").show();
                                $("#campo4").show();
                                $("#campo5").show();
                                $("#campo6").show();
                                $("#campo7").show();
                                $("#campo8").show();
                                $("#campo9").show();
                                break;
                            default:
                            alert("Escoga un opcion");

                        }
        
              }


    
function choice2(){
        ndestinon = document.getElementById("ndestino").value;
        switch(ndestinon) {

                            case "1":

                            primerlibra = 7.5;
                            libradicional = 2;
                            seguropais = 1.5;


                                break;

                            case "2":

                            primerlibra = 30;
                            libradicional = 8;
                            seguropais = 2.5;

                            break;

                            default:
                        }
        // alert(seguropais);
        // alert(libradicional);
        //  alert(primerlibra);
                            that.value.primerlibra;
                            that.value.libradicional;
                            that.value.seguropais;
                
              }



    function CalculateItemsValue() {
        var ptotal = 0;
        var precio_total = 0;
        //asignacion de variable
        var pprimerlibra = primerlibra;
        var precio_prlibra =pprimerlibra;

        var llibradicional = libradicional;
        var oficiallbadicional =libradicional;

        for (i=1; i<=total_items; i++) {
             
            itemID = document.getElementById("qnt_"+i);  
                ptotal = ptotal + parseInt(itemID.value);          
            }

            if (isNaN(ptotal)){
                                 document.getElementById("ItemsTotal").innerHTML = "Procesando peso... ";
                                } else {
                                    if (ptotal <2){ confirm("Ingresar minimo 2 libras");

                                            ptotal = 2;
                                }
                                    if (ptotal >110) {confirm("Por favor ingresar menos de 110 libras")}
                                 document.getElementById("ItemsTotal").innerHTML = "<b>Peso total: " + ptotal.toFixed(2) + " Libras</b>";
                                }

            peso_total = ptotal-1;
            precio_total = peso_total * oficiallbadicional;
            precio_totalb = peso_total * oficiallbadicional;
            bloquepeso = precio_totalb + precio_prlibra;
            precio_total = precio_total + precio_prlibra;
            

            if (isNaN(precio_total)) {

                                document.getElementById("PrecioTotal").innerHTML = "<div class='col-md-6 grisfila'>Procesando de envío</div><div class='col-md-6 grisfila'></div>";
                                document.getElementById('PrecioTotal').className = 'row';
                            } else{
                                document.getElementById("PrecioTotal").innerHTML = "<div class='col-md-6 grisfila'>Envío:</div><div class='col-md-6 grisfila'>Usd  " + precio_total.toFixed(2) + "</div>";
                                document.getElementById('PrecioTotal').className = 'row'; 
                            }
            that.value.bloquepeso;

            }

    function CalculateItemsValue1(){
        var total = 0;
        for (i=1; i<=total_items; i++){
             
            itemID = document.getElementById("pevalor_"+i);  
                total = total + parseInt(itemID.value);          
            }
            
            if (total > '200'){
            totalp = total * 0.19;
            totalp1 = totalp + total;
            arancel = total * 0.10;
            var sseguropais = seguropais;
            seguropaq = sseguropais;
            alert(seguropaq);
            var pbloquepeso = bloquepeso;
            bloquedeclarado = seguropaq + arancel + totalp + pbloquepeso;
           

                if (total >2000){confirm("Por favor ingresar menos de 2000 en declarado en conjunto ");}

                confirm("Se le agrega un impuesto de 19% + 10% de Arancel");

                document.getElementById("Impuesto").innerHTML = "<div class='col-md-6 grisclarofila'>Impuesto:</div><div class='col-md-6 grisclarofila'>Usd " + totalp.toFixed(2) + "</div>";
                document.getElementById('Impuesto').className = 'row'; 

                document.getElementById("Arancel").innerHTML  = "<div class='col-md-6 grisfila'>Arancel:</div><div class='col-md-6 grisfila'>Usd " + arancel.toFixed(2) + "div";
                document.getElementById('Arancel').className = 'row';

                document.getElementById("Seguro").innerHTML = "<div class='col-md-6 grisclarofila'>Seguro:</div><div class='col-md-6 grisclarofila'> Usd " + seguropaq.toFixed(2) + "</dv>";
                document.getElementById('Seguro').className = 'row';

                document.getElementById("DeclaradoTotal").innerHTML = "<b>Declarado: Usd " + total.toFixed(2) + "</b>";

                document.getElementById("GranPrecioTotal").innerHTML = "<div class='col-md-6 verdefila'> </div><div class='col-md-6 verdefila'><b>Costo de envío: Usd" + bloquedeclarado.toFixed(2) + "</div>";
                document.getElementById('GranPrecioTotal').className = 'row';
                        

             }
            else{
                arancel = total * 0.10;
                var sseguropais = seguropais;
                seguropaq1 = sseguropais;
                var pbloquepeso = bloquepeso;
                bloquedeclarado = seguropaq1 + arancel + pbloquepeso;
                if (isNaN(total)){
                                    document.getElementById("DeclaradoTotal").innerHTML = "Procesando declarado ";
                                    }else{
                                    document.getElementById("DeclaradoTotal").innerHTML = "<b>Declarado: Usd " + total.toFixed(2) + "</b>";
                                    
                                    }
                if (isNaN(arancel)){
                                    document.getElementById("Arancel").innerHTML = "<div class='col-md-6 grisfila'>Procesando arancel</div><div class='col-md-6 grisfila'> </div>";
                                    document.getElementById('Arancel').className = 'row';
                                    }else{
                                        document.getElementById("Arancel").innerHTML  = "<div class='col-md-6 grisfila'>Arancel:</div><div class='col-md-6 grisfila'>Usd " + arancel.toFixed(2) + "</div>";
                                        document.getElementById('Arancel').className = 'row';                                   
                                    }

                if (isNaN(seguropaq1)){
                                    document.getElementById("Seguro").innerHTML = "<div class='col-md-6 grisclarofila'>Procesando seguro</div><div class='col-md-6 grisclarofila'> </div>";
                                    document.getElementById('Seguro').className = 'row';
                                    }else{
                                        document.getElementById("Seguro").innerHTML = "<div class='col-md-6 grisclarofila'>Seguro:</div><div class='col-md-6 grisclarofila'>Usd " + seguropaq1.toFixed(2) + "</div>";
                                        document.getElementById('Seguro').className = 'row';                                        
                                    }

                if (isNaN(bloquedeclarado)){
                                    document.getElementById("GranPrecioTotal").innerHTML = "<div class='col-md-6 verdefila1'>Procesando Gran total</div><div class='col-md-6 verdefila1'></div>";
                                    document.getElementById('GranPrecioTotal').className = 'row'; 
                                    }else{
                                        document.getElementById("GranPrecioTotal").innerHTML = "<div class='col-md-6 verdefila'> </div><div class='col-md-6 verdefila'><b>Costo de envío: Usd " + bloquedeclarado.toFixed(2) + "</b></div>";
                                        document.getElementById('GranPrecioTotal').className = 'row'; 
                                        
                                    }
                

                }
            }


    

    </script>
<section class="pages_banner" id="parallax">   
       <img src="front/images/bannar-shap-1.png" alt="" class="layer layer_1" data-depth="0.10">
       <img src="front/images/bannar-shap-2.png" alt="" class="layer layer_2" data-depth="0.35">
        <div class="container">
            <img src="front/images/casillero-express-tarifa-banner.jpg" alt="Casillero Express - Tarifas" class="bannar_img wow fadeInRight">
            <h2 class="wow fadeInUp">Tarifas</h2>
            <p class="wow fadeInUp" data-wow-delay="0.3s">Habitualmente te expones a sacrificar calidad a cambio de una mejor tarifa. Por esto nos gustaría aclarar que en Casillero Express es distinto, pues ofrecemos las tarifas más competitivas del mercado mejorando el servicio de otros casilleros virtuales más costosos. Te invitamos a consultar nuestras tarifas y a comprobar que no estamos mintiendo. </p> 
           <img src="front/images/p-banner-shap.png" alt="" class="layer_3">
        </div> 
    </section>
<section class="get_touch_area">
    <div class="container calculadora-m">
        <div class="row">
            <div class="col-lg col-sm-12">
            <form id="signup">
               <div style="padding-top: 20px; padding-bottom: 20px;"></div>
                <h3>Calculadora para envios a Colombia</h3>            
                <i>Por favor ingresa los valores</i> 
                <p><i>Estos valores son aproximados y basados en el costo del env&iacute;o, si desea una tarifa m&acute;s precisa puede contactarnos.<br><br>
                Por favor ingresa valores mínimo de 2 lb y m&iacute;ximo de 110 lb. Recuerda no sobrepasar  US$ 2.000 de valor declarado. </i></p><br>
                <h3>N&uacute;mero de paquetes</h3>
                <div class="inputs">
                    <select name="ndestino" onchange="choice2()" id="ndestino" class="form-control">
                            <option>--Seleccionar origen--</option>
                            <option value="1">USA</option>
                            <option value="2">Europa</option>
                        </select>
                    <br>   
                    <select name="numpaq" onchange="choice1()" id="numpaq" class="form-control">
                        <option>--Seleccionar # de paquetes--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>  
                    <div class="inputs">        
                        

                        <div style="padding-top: 20px; padding-bottom: 20px;"></div>
                        <div class="header"><h3>Listado de paquetes...</h3></div>
                        <div id="campo1" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Primer paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_1" id="qnt_1" placeholder=" Peso del paquete #1" onblur="CalculateItemsValue()" min="2" max="110" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" class="form-control" name="pevalor_1" id="pevalor_1" placeholder="Valor declarado # 1" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo2" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Segundo paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_2" id="qnt_2" placeholder=" Peso del paquete #2" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" class="form-control" name="pevalor_2" id="pevalor_2" placeholder="Valor declarado #2" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo3" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Tecer paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_3" id="qnt_3" placeholder=" Peso del paquete #3" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" class="form-control" name="pevalor_3" id="pevalor_3" placeholder="Valor declarado #3" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo4" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Cuarto paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_4" id="qnt_4" placeholder=" Peso del paquete #4" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" class="form-control" name="pevalor_4" id="pevalor_4" placeholder="Valor declarado #4" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo5" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Quinto paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_5" id="qnt_5" placeholder=" Peso del paquete #5" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" class="form-control" name="pevalor_5" id="pevalor_5" placeholder="Valor declarado #5" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo6" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Sexto paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_6" id="qnt_6" placeholder=" Peso del paquete #6" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" class="form-control" name="pevalor_6" id="pevalor_6" placeholder="Valor declarado #6" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo7" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Septimo paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_7" id="qnt_7" placeholder=" Peso del paquete #7" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                            <input type="text" class="form-control" name="pevalor_7" id="pevalor_7" placeholder="Valor declarado #7" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo8" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Octavo paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_8" id="qnt_8" placeholder=" Peso del paquete #8" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" name="pevalor_8" id="pevalor_8" placeholder="Valor declarado #8" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                        <div id="campo9" class="row" style="display: none;">
                            <div class="col-sm-12"><center><p><b>Noveno paquete</b></p></center></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>Lbs</span>
                                        <input type="number" class="form-control" name="qnt_9" id="qnt_9" placeholder=" Peso del paquete #9" onblur="CalculateItemsValue()" maxlength="3">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="left-inner-addon">
                                    <span>$</span>
                                        <input type="text" class="form-control" name="pevalor_9" id="pevalor_9" placeholder="Valor declarado #9" onblur="CalculateItemsValue1()" maxlength="4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div id="ItemsTotal"></div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="DeclaradoTotal"></div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div id="Impuesto"></div>
                    <div id="Arancel"></div>
                    <div id="Seguro"></div>
                    <div id="PrecioTotal"></div> 
                    <div id="GranPrecioTotal"></div>
                </div>
                <div style="padding-top: 20px; padding-bottom: 20px;">
                    <a href="#" class="btn btn-info" style="width: 100%; background-color: #26cbd3"><span class="glyphicon glyphicon-credit-card"></span> Calcular</a>
                </div>
                <div style="padding-top: 20px; padding-bottom: 20px; display: none" id="resetboton">
                    <input type="reset" value="Reset" class="btn btn-info" style="width: 100%; background-color: #26cbd3">
                </div>
            </form>
            </div>
            <div class=".d-block .d-sm-none">
                <p>&nbsp;</p>
            </div>

            <div class="col-lg col-sm-12">
                <p>Te ofrecemos una tarifa simple, sin sobrecostos y dinámica, pues se ajusta a tus necesidades tanto personales como comerciales</p><br>
                <table cellspacing="2" cellpadding="2" border="1" width="100%">
                    <tr>
                        <td></td>
                        <td>USA -> COL</td>
                        <td>EUR -> COL</td>
                    </tr>
                    <tr>
                        <td>Primer libra</td>
                        <td>$ 7.5</td>
                        <td>$ 30</td>
                    </tr>
                    <tr>
                        <td>Libra adicional</td>
                        <td>$ 2</td>
                        <td>$ 8</td>
                    </tr>
                    <tr>
                        <td>Seguro</td>
                        <td>$ 1.5</td>
                        <td>$ 2.5</td>
                    </tr>
                    <tr>
                        <td>Arancel</td>
                        <td>10%</td>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <td>Impuesto</td>
                        <td>Variable</td>
                        <td>Variable</td>
                    </tr>
                    <tr>
                        <td>Mínimo de lb</td>
                        <td>2 lb</td>
                        <td>2 lb</td>
                    </tr>
                </table>
                <br>
                <i><b>NOTA:</b> El valor del seguro cubre hasta US$ 50 por pérdida total.</i><br><br>
                <p>Para conocer el valor de tu env&iacute;o basado en las tarifas que aplican a otros destinos, utiliza la siguiente calculadora de costos:</p>
            </div>
        </div>

    </div>

</section>

<div class="container">
    <div class="row">
        <div class="col-lg">

            <h3>Aclaración sobre cantidad de libras:</h3>
            <p>Recuerda que no consolidamos mercancía, pensando en el despacho inmediato de tus paquetes para que recibas los productos a la mayor brevedad posible. Esto no implica que tengas que pagar la 1ª lb por cada paquete que envíes en un mismo día. Si envías hoy dos paquetes de 4 libras cada uno, por ejemplo, pagarás 1 lb a US$ 7.5 y 7 libras adicionales a US$ 2 por cada una, sin importar que sean dos paquetes separados. Si el segundo paquete lo envías el día de mañana sí realizarás el pago correspondiente a los US$ 7.5 de la primera libra.</p><br>
 
            <h3>Aclaración sobre impuestos y aranceles:</h3>
            <p>Seg&uacute;n la reglamentación en el país de destino, los productos, debidamente categorizados, cuentan con una posición arancelaria obligatoria en cuestiones de importaci&oacute;n. Puede variar, positiva o negativamente, dependiendo de las características del producto, pero habitualmente equivale al 10% del valor de la mercancía. Además, por favor ten en cuenta que, dependiendo de la tributación en el país de destino, los productos importados deberán cancelar los impuestos debidamente establecidos y reglamentados en la normativa de cada país. Recuerda que al pre-alertar / programar envíos asumes toda la responsabilidad respecto al valor declarado de los productos. </p>
                
        </div>
    </div>
</div>

