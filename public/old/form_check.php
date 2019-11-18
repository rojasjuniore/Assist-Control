<head>

</head>

<body>
<?php
$user =& JFactory::getUser();
$userid = $user->get('id');
?>
<script type="text/javascript">
function getDataServer(url, vars){
     var xml = null;
     try{
         xml = new ActiveXObject("Microsoft.XMLHTTP");
     }catch(expeption){
         xml = new XMLHttpRequest();
     }
     xml.open("GET",url + vars, false);
     xml.send(null);


     if(xml.status == 404) {return false};

     if( xml.responseText == 1) {
   //alert(xml.responseText);
   return true;
  }else{
    //alert(xml.responseText);
   return false;
  }

}
</script>
<script language="JavaScript">


   function algo_inicio_onsubmit(userId){

flag = true;
mensajeFaltantes = "";

if(document.forms[0].name.value == "-") {
 mensajeFaltantes +=  "Por favor completar el Nombre \n";
 flag =false; }


if(document.forms[0].last.value == "-") {
 mensajeFaltantes +=  "Por favor completar el Apellido \n";
 flag =false; }

if(document.forms[0].apodo.value == "-") {
 mensajeFaltantes +=  "Por favor completar el Nombre por el cual se Reconoce \n";
 flag =false; }


if(document.forms[0].iniciales.value == "-") {
 mensajeFaltantes +=  "Por favor completar las Iniciales \n";
 flag =false; }

if(document.forms[0].day.value == "-") {
 mensajeFaltantes +=  "Por favor completar el Día \n";
 flag =false; }

if(document.forms[0].month.value == "-") {
 mensajeFaltantes +=  "Por favor completar el Mes \n";
 flag =false; }

if(document.forms[0].year.value == "-") {
 mensajeFaltantes +=  "Por favor completar el Ano \n";
 flag =false; }

if(document.forms[0].lug_nac.value == "-") {
 mensajeFaltantes +=  "Por favor seleccionar el Lugar de Nacimiento \n";
 flag =false; }


if (flag == false){
 alert(mensajeFaltantes) ;
 return flag;}



/*
 msg = "Por Favor Verificar la Información Ingresada: \n\n Nombre: " + document.forms[0].name.value + "\n Apellido: " + document.forms[0].last.value + "\n Nombre por el Cual se Reconoce: " + document.forms[0].apodo.value + "\n Iniciales: " + document.forms[0].iniciales.value + "\n Fecha de Nacimiento: " + document.forms[0].day.value + "/"+ document.forms[0].month.value +"/"+ document.forms[0].year.value +"\n Lugar de Nacimiento: " + document.forms[0].lug_nac.value + "\n\n Si Esta Información es Correcta Confirme Esta Ventana"
 */

 if(flag == true){
 msg = "Por Favor Verificar la Información Ingresada: \n\n Nombre: " + document.forms[0].name.value + "\n Apellido: " + document.forms[0].last.value + "\n Nombre por el Cual se Reconoce: " + document.forms[0].apodo.value + "\n Iniciales: " + document.forms[0].iniciales.value + "\n Fecha de Nacimiento: " + document.forms[0].day.value + "/"+ document.forms[0].month.value +"/"+ document.forms[0].year.value +"\n Lugar de Nacimiento: " + document.forms[0].lug_nac.value + "\n\n Si Esta Información es Correcta Confirme Esta Ventana"

var respuesta = confirm(msg) ;

if (respuesta)
    return getDataServer("dataAjax.php?z="+userId);
else
	return false;

   }


   // alert("funciona");


       //we get the values in the form out of the 0 index in the forms[] array since it's the only form in the document
/*
       msg = "Por Favor Verificar la Información Ingresada: \n\n Nombre: " + document.forms[0].name.value + "\n Apellido: " + document.forms[0].last.value + "\n Nombre por el Cual se Reconoce: " + document.forms[0].apodo.value + "\n Iniciales: " + document.forms[0].iniciales.value + "\n Fecha de Nacimiento: " + document.forms[0].day.value + "/"+ document.forms[0].month.value +"/"+ document.forms[0].year.value +"\n Lugar de Nacimiento: " + document.forms[0].lug_nac.value + "\n\n Si Esta Información es Correcta Confirme Esta Ventana"

       return confirm(msg);
    */


}
</script>
</body>
</html>