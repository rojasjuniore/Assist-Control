<?php
$user =& JFactory::getUser();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Study Report - Candegabe Algorithm</title>
<!--<script src="js/jquery-1.4.2.min.js" type="text/javascript" ></script>-->
<link rel="stylesheet" type="text/css" href="http://www.universidadcandegabe.org/shadowbox-3.0.3/shadowbox.css">
<script src="http://www.universidadcandegabe.org/shadowbox-3.0.3/shadowbox.js" type="text/javascript"></script>
<script type="text/javascript">
Shadowbox.init({
    language: 'en',
    players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
});
</script>
</head>
<body>

<div id="modal">
    <div id="modal-content"></div>
    <div id="modal-buttons">
        <button id="bt-modal-ok">OK</button>
        <button id="bt-modal-cancelar">Cancel</button>
    </div>
</div>
<div id="loading">
    <div>
    	<p>Processing Data</p>
    </div>
</div>
<div id="trial">
	<h2>TITULO</h2>
    <p>You must get a package to use this add-on</p>
    <a href="/index.php?option=com_content&view=article&id=67" id="obtener-abono">Get a package</a>
</div>
<script type="text/javascript">
function showTrial( titulo ){
	jQuery('#trial h2').html( titulo );
	jQuery('#trial').data('overlay').load();
}

jQuery(document).ready( function(){
	/* Overlay Progress */
	var overlay = jQuery('#loading').overlay({
		top: 'center',
		mask: {
			color: '#000',
			opacity: 0.5,
		},
		closeOnClick: false,
		closeOnEsc: false,
		load: false,
		onLoad: function(){
			var t = jQuery.mask;
			if( !t.isLoaded() ){
				t.load();
				var ov = this.getOverlay();
				ov.css('z-index', '9999');
			}
		}
	});
	
	var modal = jQuery('#modal').overlay({
		top: 'center',
		mask: {
			color: '#000',
			opacity: 0.5,
		},
		closeOnClick: false,
		closeOnEsc: false,
		load: false
	});
	
	/* Submit form */
	jQuery('#formAlgoritmo').submit( function(){
		if( '<?php echo $user->get('usertype'); ?>' != 'Author' ){
			if( checkLocal() ){
				var msg = getModalMsg();
				jQuery('#modal > #modal-content').html( msg );
				modal.overlay().load();
				return false;
			} else {
				return false;
			}
		} else {
			showTrial( 'Update Results' );
			return false;
		}
	});
	
	var trial = jQuery('#trial').overlay({
		top: 'center',
		mask: {
			color: '#000',
			opacity: 0.5,
		},
		load: false
	});

	/* Modal */
	jQuery('#modal > #modal-buttons > #bt-modal-cancelar').live( 'click', function(){
		modal.overlay().close();
	} );
	jQuery('#modal > #modal-buttons > #bt-modal-ok').live( 'click', function(){
		modal.overlay().close();
		ajaxDiscount();
		document.formAlgoritmo.submit();
	} );
});
</script>
<script>
	/* Variables */
	var btnModo = 1; /* Avanzado */
	var btnReino = 1; /* Todos */
	var trsAvanzado = '';
	var trsClasico = '';
	var trsRemedioClave = '';
	
	function hideTr(){
		jQuery("[id^='trMineral_']").fadeOut();
		jQuery("[id^='trMineralVegetal_']").fadeOut();
		jQuery("[id^='trVegetal_']").fadeOut();
		jQuery("[id^='trVegetalAnimal_']").fadeOut();
		jQuery("[id^='trAnimal_']").fadeOut();
		jQuery("[id^='trMineralAnimal_']").fadeOut();
		jQuery("[id^='trImponderable_']").fadeOut();
	}
	
	function showTr( modo, reino, accion ){
		if( <?php echo ( $user->get('usertype') != 'Author' ? 1 : 0 ); ?> ){
			hideTr();
			if( ( typeof modo ) == 'undefined' || modo == '' || modo == null ) modo = btnModo;
			if( ( typeof reino ) == 'undefined' || reino == '' || reino == null  ) reino = btnReino;
			btnModo = modo;
			btnReino = reino;
			switch( btnModo ){
				case 1: var trs = trsAvanzado.split( ',' ); break;
				case 2: var trs = trsClasico.split( ',' ); break;
				case 3: var trs = trsRemedioClave.split( ',' ); break;
			}
			switch( btnReino ){
				case 1: var srch = ''; break;
				case 2: var srch = 'Animal'; break;
				case 3: var srch = 'Vegetal'; break;
				case 4: var srch = 'Mineral'; break;
			}
			for( i = 0; i < trs.length; i++ ){
				if( srch == '' || ( srch != '' && trs[i].search( srch ) != -1 ) ){
					jQuery('#' + trs[i] ).fadeIn();
				}
			}
			
			setButton();
		} else {
			if( ( typeof accion ) == 'undefined' ) accion = '';
			showTrial( accion );
		}
	}
	
	function setButton(){
		jQuery("[id^='btn']").removeClass('cur');
		switch( btnModo ){
			case 1: jQuery('#btnAvanzados').addClass('cur'); break;
			case 2: jQuery('#btnClasicos').addClass('cur'); break;
			case 3: jQuery('#btnRemediosClave').addClass('cur'); break;
		}
		switch( btnReino ){
			case 1: jQuery('#btnTodos').addClass('cur'); break;
			case 2: jQuery('#btnAnimal').addClass('cur'); break;
			case 3: jQuery('#btnVegetal').addClass('cur'); break;
			case 4: jQuery('#btnMineral').addClass('cur'); break;
		}
	}
	
	function ajaxDiscount( userId ){
		jQuery('#loading').overlay().load();
	}

	function checkLocal(){		
		var msg = "";
		
		if( document.getElementById('name').value == "" ){
			msg +=  "Por favor completar el Nombre \n";
		}
		if( document.getElementById('lastName').value == "" ){
			msg +=  "Por favor completar el Apellido \n";
		}
		if( document.getElementById('apodo').value == "" ){
			msg +=  "Por favor completar el Nombre por el cual se Reconoce \n";
		}
		if( document.getElementById('iniciales').value == "" ){
			msg +=  "Por favor completar las Iniciales \n";
		}
		if( document.getElementById('lug_nac').value  == "-" ){
			msg +=  "Por favor seleccionar el Lugar de Nacimiento \n";
		}
		if( msg != '' ){
			alert( msg );
			return false;
		}
		return true;
	}
	
	function getModalMsg(){
		var msg = "";
		
		msg = '<div class="favor">Please Check the Information:</div><br /><br />';
		msg += '<div class="etiqueta">Name:</div> <div class="dato">' + document.getElementById('name').value + '</div><br />';
		msg += '<div class="etiqueta">Last name:</div> <div class="dato">' + document.getElementById('lastName').value + '</div><br />';
		msg += '<div class="etiqueta">Nickname:</div> <div class="dato">' + document.getElementById('apodo').value + '</div><br />';
		msg += '<div class="etiqueta">Initials:</div> <div class="dato">' + document.getElementById('iniciales').value + '</div><br />';
		fecha = document.getElementById('month').value + "/"+ document.getElementById('day').value +"/"+ document.getElementById('year').value;
		msg += '<div class="etiqueta">Date of Birth:</div> <div class="dato">' + fecha +'</div><br />';
		msg += '<div class="etiqueta">Place of Birth:</div> <div class="dato">' + document.getElementById('lug_nac').value + '</div><br /><br />';
		msg += '<div class="correcto">If This Information is Correct, Please Confirm This Window</div>';
		msg = msg.replace( /\n/, "<br />" );
		return msg;
	}
	
</script>
<?php
$mineralTR = 1;
$animalTR = 1;
$vegetalTR = 1;
$mineralVegetalTR =1;
$mineralAnimalTR =1;
$vegetalAnimalTR =1;
$imponderableTR = 1;
$clasico ="";
$policresto ="";
$avanzado ="";
?>
<?php
$letras1='A I P Y Z';
$letras2='B J Q';
$letras3='C K R';
$letras4='L S';
$letras5='D T';
$letras6='E M U';
$letras7='F N V W';
$letras8='G � X';
$letras9='H O';
$vocales ='A E I O U Y';
$vocanum ='1 6 1 9 6 1';
$consonantes = 'B C CH D F G H J K L LL M P Q R R S T V X Y Z';
$tabla1_1 = explode(' ',$letras1);
$tabla1_2 = explode(' ',$letras2);
$tabla1_3 = explode(' ',$letras3);
$tabla1_4 = explode(' ',$letras4);
$tabla1_5 = explode(' ',$letras5);
$tabla1_6 = explode(' ',$letras6);
$tabla1_7 = explode(' ',$letras7);
$tabla1_8 = explode(' ',$letras8);
$tabla1_9 = explode(' ',$letras9);
$tabla_vocales = explode(' ',$vocales);
$tabla_vocanum = explode(' ',$vocanum);
$tabla_consonantes = explode(' ',$consonantes);
$numeros='5 2 9 1 3 9 1 8 8';
$tabla2= explode(' ',$numeros);
$last = strtoupper($_POST['lastName']);
$nombre = strtoupper($_POST['name']);
$apodo = strtoupper($_POST['apodo']);
$einiciales = strtoupper($_POST['iniciales']);
$dia=$_POST['day'];
$mes=$_POST['month'];
$anio=$_POST['year'];
$fecha=$dia . $mes . $anio;
$pregnancia=0;
$trinomio1 = 0;
$flag9=false;
$flag8=false;
$flag7=false;
$flag6=false;
$flag5=false;
$flag4=false;
$flag3=false;
$flag2=false;
$filtroRsm9="";
$filtroRsm8="";
$filtroRsm7="";
$filtroRsm6="";
$filtroRsm5="";
$filtroRsm4="";
$filtroRsm3="";
$filtroRsm2="";
$arrRemedios = '';
$tope=strlen($fecha);
$tope++;
for ($i=0;$i<$tope;$i++) {
    if (substr($fecha,$i,1) > 0) {
       $pregnancia = $pregnancia + intval(substr($fecha,$i,1));
       $puntero = substr($fecha,$i,1);
	   $puntero = $puntero -1;
       $trinomio1 = $trinomio1 + $tabla2[$puntero];
    }
}
if ($trinomio1 > 9) {
	$trinomio11 = substr($trinomio1,0,1);
    $trinomio12 = substr($trinomio1,1,1);
    $trinomio13 = substr($trinomio1,2,1);
	$trinomio1 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($trinomio1 > 9) {
	$trinomio11 = substr($trinomio1,0,1);
    $trinomio12 = substr($trinomio1,1,1);
    $trinomio13 = substr($trinomio1,2,1);
	$trinomio1 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($pregnancia > 9) {
	$trinomio11 = substr($pregnancia,0,1);
    $trinomio12 = substr($pregnancia,1,1);
    $trinomio13 = substr($pregnancia,2,1);
	$pregnancia = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($pregnancia > 9) {
	$trinomio11 = substr($pregnancia,0,1);
    $trinomio12 = substr($pregnancia,1,1);
    $trinomio13 = substr($pregnancia,2,1);
	$pregnancia = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
$trinomio2=0;
$tope = strlen($apodo);
$tope++;
for ($i=0;$i<$tope;$i++) {
	 $vocal = substr($apodo,$i,1);
	 Switch ($vocal)
	 {
	         case 'A' :
             $trinomio2 = $trinomio2 + 1;
             break;
			 case 'E' :
             $trinomio2 = $trinomio2 + 6;
             break;
			 case 'I' :
             $trinomio2 = $trinomio2 + 1;
             break;
			 case 'O' :
             $trinomio2 = $trinomio2 + 9;
             break;
			 case 'U' :
			 $trinomio2 = $trinomio2 + 6;
             break;
			 case 'Y' :
             $trinomio2 = $trinomio2 + 1;
             break;
	 }
}
if ($trinomio2 > 9) {
	$trinomio11 = substr($trinomio2,0,1);
    $trinomio12 = substr($trinomio2,1,1);
    $trinomio13 = substr($trinomio2,2,1);
	$trinomio2 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($trinomio2 > 9) {
 $trinomio11 = substr($trinomio2,0,1);
    $trinomio12 = substr($trinomio2,1,1);
    $trinomio13 = substr($trinomio2,2,1);
 $trinomio2 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
$apodolast = $nombre . $last;
$tope = strlen($apodolast);
$tope++;
$sumatodo=0;
for ($i=0;$i<$tope;$i++) {
	$letra = substr($apodolast,$i,1);
    if (in_array($letra, $tabla1_1)) {
    $sumatodo = $sumatodo + 1;
    }
    if (in_array($letra, $tabla1_2)) {
    $sumatodo = $sumatodo + 2;
    }
	if (in_array($letra, $tabla1_3)) {
    $sumatodo = $sumatodo + 3;
	}
	if (in_array($letra, $tabla1_4)) {
    $sumatodo = $sumatodo + 4;
	}
	if (in_array($letra, $tabla1_5)) {
    $sumatodo = $sumatodo + 5;
	}
	if (in_array($letra, $tabla1_6)) {
    $sumatodo = $sumatodo + 6;
	}
	if (in_array($letra, $tabla1_7)) {
    $sumatodo = $sumatodo + 7;
	}
    if (in_array($letra, $tabla1_8)) {
    $sumatodo = $sumatodo + 8;
    }
	if (in_array($letra, $tabla1_9)) {
    $sumatodo = $sumatodo + 9;
	}
}
$tengoch = 0;
$tengoll = 0;
$tope = strlen($nombre);
$tope++;
for ($i=0;$i<$tope;$i++) {
	if (substr($nombre,$i,2) == 'CH') {
	   $tengoch++;
  	}
	if (substr($nombre,$i,2) == 'LL') {
	   $tengoll++;
	}
}
$tope = strlen($last);
for ($i=0;$i<$tope;$i++) {
	if (substr($last,$i,2) == 'CH') {
	   $tengoch =$tengoch + 8;
  	}
	if (substr($last,$i,2) == 'LL') {
	   $tengoll =$tengoll + 3;
	}
}
$sumatodo = $sumatodo - $tengoch - $tengoll;
if ($sumatodo > 9) {
	$trinomio11 = substr($sumatodo,0,1);
    $trinomio12 = substr($sumatodo,1,1);
    $trinomio13 = substr($sumatodo,2,1);
	$sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($sumatodo > 9) {
	$trinomio11 = substr($sumatodo,0,1);
    $trinomio12 = substr($sumatodo,1,1);
    $trinomio13 = substr($sumatodo,2,1);
	$sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
 Switch ($sumatodo)
	 {
	         case 1 :
             $col_1 = 4;
		     $col_2 = 5;
	  	     $col_3 = 8;
             break;
             case 2 :
             $col_1 = 1;
		     $col_2 = 7;
	  	     $col_3 = 9;
             break;
             case 3 :
             $col_1 = 5;
		     $col_2 = 6;
	  	     $col_3 = 9;
             break;
			 case 4 :
             $col_1 = 1;
		     $col_2 = 2;
	  	     $col_3 = 8;
			 break;
			 case 5 :
             $col_1 = 1;
		     $col_2 = 3;
	  	     $col_3 = 4;
             break;
             case 6 :
             $col_1 = 3;
		     $col_2 = 7;
	  	     $col_3 = 9;
             break;
             case 7 :
             $col_1 = 2;
		     $col_2 = 6;
	  	     $col_3 = 8;
             break;
             case 8 :
             $col_1 = 4;
		     $col_2 = 5;
	  	     $col_3 = 7;
             break;
             case 9 :
             $col_1 = 2;
		     $col_2 = 3;
	  	     $col_3 = 6;
             break;
	 }
$doscifras = true;
$tope = strlen($einiciales);
$tope++;
$iniciales=0;
$viniciales=$einiciales;
for ($i=0;$i<$tope;$i++) {
	$letra = substr($viniciales,$i,1);
    if (in_array($letra, $tabla1_1)) {
    $iniciales = $iniciales + 1;
    }
    if (in_array($letra, $tabla1_2)) {
    $iniciales = $iniciales + 2;
    }
	if (in_array($letra, $tabla1_3)) {
    $iniciales = $iniciales + 3;
	}
	if (in_array($letra, $tabla1_4)) {
    $iniciales = $iniciales + 4;
	}
	if (in_array($letra, $tabla1_5)) {
    $iniciales = $iniciales + 5;
	}
	if (in_array($letra, $tabla1_6)) {
    $iniciales = $iniciales + 6;
	}
	if (in_array($letra, $tabla1_7)) {
    $iniciales = $iniciales + 7;
	}
    if (in_array($letra, $tabla1_8)) {
    $iniciales = $iniciales + 8;
    }
	if (in_array($letra, $tabla1_9)) {
    $iniciales = $iniciales + 9;
	}
}
if ($iniciales > 9) {
	$trinomio11 = substr($iniciales,0,1);
    $trinomio12 = substr($iniciales,1,1);
    $trinomio13 = substr($iniciales,2,1);
	$iniciales = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
Switch ($iniciales)
	 {
	         case 1 :
             $col_i1 = 4;
		     $col_i2 = 5;
	  	     $col_i3 = 8;
             break;
             case 2 :
             $col_i1 = 1;
		     $col_i2 = 7;
	  	     $col_i3 = 9;
             break;
             case 3 :
             $col_i1 = 5;
		     $col_i2 = 6;
	  	     $col_i3 = 9;
             break;
			 case 4 :
             $col_i1 = 1;
		     $col_i2 = 2;
	  	     $col_i3 = 8;
			 break;
			 case 5 :
             $col_i1 = 1;
		     $col_i2 = 3;
	  	     $col_i3 = 4;
             break;
             case 6 :
             $col_i1 = 3;
		     $col_i2 = 7;
	  	     $col_i3 = 9;
             break;
             case 7 :
             $col_i1 = 2;
		     $col_i2 = 6;
	  	     $col_i3 = 8;
             break;
             case 8 :
             $col_i1 = 4;
		     $col_i2 = 5;
	  	     $col_i3 = 7;
             break;
             case 9 :
             $col_i1 = 2;
		     $col_i2 = 3;
	  	     $col_i3 = 6;
             break;
	 }
$day=$dia - 1;
$month1=substr($mes,0,1);
$month2=substr($mes,1,1);
$year=$anio;
$year1=substr($year,1,1);
$year2=substr($year,2,1);
$year3=substr($year,3,1);
$year4=substr($year,4,1);
$cyear = $year1 + $year2 + $year3 + $year4;
$clave = $trinomio1 . $trinomio2 . '%';
?>
<!-- ===== CONTENEDOR GENERAL ===== -->
<div id="contenedor">
	<!--   CONTENIDO   -->
	<div id="resultadoHeader">
		<h2>Algorithm Report</h2>
		<div id="tres_btn">
        	<?php if( $user->get('usertype') == 'Author' ){ ?>
            <a class="btn-light_grey" id="btn-interpretacion" href="javascript:showTrial('Reading the Algorithm Results')">Reading the Algorithm Results</a>
            <?php } else { ?>
			<a rel="shadowbox;width=1100" class="btn-light_grey" id="btn-interpretacion" href="index2.php?option=com_content&view=article&id=65">Reading the Algorithm Results</a>
            <?php } ?>
			<!-- este bono hace link a un artículo joomla usando shadowbox --><a class="btn-light_grey" id="btn-otro_estudio" href="http://www.algoritmocandegabe.com/index.php?option=com_content&view=article&id=46&Itemid=53">Perform Another Study</a>
		</div>	<!--   fin tres_btn Div   -->
	</div> <!--   fin resultadoHeader Div   -->
	<!--   FORMULARIO   -->
	<div id="formActualizar">
		<form id="formAlgoritmo" action="http://www.algoritmocandegabe.com/index.php?option=com_content&view=article&id=5&Itemid=30" method="post" class="formulario" name="formAlgoritmo">
   <!-- NOMBRE --> 
<div id="campos_form">	
	<p>
		{tip Name::Name/s: (e.g. Susan Marie)}
			<label for="name">Name</label>
			<input  name="name" type="text" id="name" tabindex="1" size="30" value="<?php echo strtoupper($_POST['name']);?>" />
		{/tip} 
	</p>
	<!-- NOMBRE FIN--> 
	<!-- APELLIDO --> 
		<p> 
			{tip Last name:: Maiden name: (e.g. Smith)}
			  <label for="lastName">Last name</label>
			<input name="lastName" type="text" id="lastName" tabindex="2" size="30" value="<?php echo strtoupper($_POST['lastName']);?>" />
			{/tip}  
		</p>
   <!-- APELLIDO FIN --> 
   <!-- APODO --> 
		<p>{tip Nickname::Sometimes the person identifies with his <strong>Nickname</strong>, not   with his first name, in this case if the nickname has been fundamental   or essential por his personality, it shall be enteres in the field <strong>Nickname</strong> substituting the first name. <strong>E.G. Susan Marie Smith was called &quot;Missy&quot; since she was a child</strong>.}
          <label for="apodo" id="apodoLabel">Name Normally Used</label>
			<input name="apodo" type="text" id="apodo" tabindex="3" size="30" value="<?php echo strtoupper($_POST['apodo']);?>" />
		{/tip}  
		</p>
   <!-- APODO FIN --> 
   <!-- INICIALES --> 
		<p>
		{tip Initials::Initials: the first letter of each one of the names and last names: (e.g. SMS)}
			<label for="iniciales">Initials</label>
		 	<input name="iniciales" type="text" id="iniciales" tabindex="4" size="30" value="<?php echo strtoupper($_POST['iniciales']);?>" />
		{/tip}  
		</p>
   <!-- INICIALES END --> 
   <!-- FECHA NACIMIENTO --> 
		 <fieldset>
		<legend>Date of Birth</legend>
		    <input name="day" type="text" id="day"  size="2" maxlength="2" value="<?php echo strtoupper($_POST['day']);?>" readonly  />
		    <input name="month" type="text" id="month"  size="2" maxlength="2" value="<?php echo strtoupper($_POST['month']);?>" readonly />
		    <input name="year" type="text" id="year" size="4" maxlength="4" value="<?php echo strtoupper($_POST['year']);?>" readonly />
	    </fieldset>  
   <!-- FECHA NACIMIENTO END --> 
   <!-- LUGAR DE NACIMIENTO --> 
		<label for="lug_nac">Place of Birth</label>
		<input name="lug_nac" type="text" id="lug_nac" value="<?php echo strtoupper($_POST['lug_nac']);?>" readonly /> 
   <!-- LUGAR DE NACIMIENTO END --> 
</div>    <!-- End Div campos_form --> 	

<p id="llave">}</p>

   <!-- BOTON "ACTUALIZAR RESULTADO" --> 
		<p id="btn-enviar">
	    <!-- <label for="submit" class="textoInvisible">actualizar </label> -->
	<input type="submit" tabindex="5" name="Enviar" id="Enviar" value="Update Results" />
	  	</p>
   <!-- BOTON "ACTUALIZAR RESULTADO" END --> 

		</form>
	</div>    <!--   FORMULARIO END   -->
<!--  ===== GRAFICO IMPREGNANCIA ===================================  -->
    <div id="impregnancia">
		<h2>Impregnancy </h2>
		<h3>Symmetry</h3>
      <?php
include dirname( __FILE__ ).'/../../vd.php';
Switch ($pregnancia)
	 {
	         case 1 :
               echo '<img src="algoritmo10/resultado/simetria1.jpg" alt="Impregnancia Simetría 1" /> 
				<!-- Simetría 1 -->
			<div class="simetriaPorcentaje">
			  <p id="porcentajeMenor">15% Vegetable</p>
			  <p id="porcentajeMedio">35% Mineral</p>
			  <p id="porcentajeMayor">50% Animal</p>
			</div>
			<!-- Simetría 1 END -->
			';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 1" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 1" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=73">See the Dynamic</a></p>
			<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=81">Symmetry Interrogation</a></p>
			' ;
			}
		       break;
		     case 2 :
               echo '<img src="algoritmo10/resultado/simetria2.jpg" alt="Impregnancia Simetría 2" /> 
				<!-- Simetría 2 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMenor">15% Mineral</p>
				  <p id="porcentajeMedio">35% Animal</p>
				  <p id="porcentajeMayor">50% Vegetable</p>
				</div>
				<!-- Simetría 2 END -->
			';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 2" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 2" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=74" >See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=82">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
			 case 3 :
               echo '<img src="algoritmo10/resultado/simetria3.jpg" alt="Impregnancia Simetría 3"  /> 
				<!-- Simetría 3 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMenor">20% Animal</p>
				  <p id="porcentajeMedio">40% Vegetable</p>
				  <p id="porcentajeMedioL">40% Mineral</p>
				</div>
				<!-- Simetría 3 END -->
			';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 3" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 3" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=75">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=83">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
			 case 4 :
               echo '<img src="algoritmo10/resultado/simetria4.jpg" alt="Impregnancia Simetría 4" /> 
				<!-- Simetría 4 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMenor">15% Vegetable</p>
				  <p id="porcentajeMedio">35% Animal</p>
				  <p id="porcentajeMayor">50% Mineral</p>
				</div>
				<!-- Simetría 4 END -->
			';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 4" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 4" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=76">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=84">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
			 case 5 :
               echo '<img src="algoritmo10/resultado/simetria5.jpg" alt="Impregnancia Simetría 5" /> 
				<!-- Simetría 5 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMenor">15% Mineral</p>
				  <p id="porcentajeMedio">35% Vegetable</p>
				  <p id="porcentajeMayor">50% Animal</p>
				</div>
				<!-- Simetría 5 END -->
				';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 5" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 5" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=77">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=85">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
			 case 6 :
               echo '<img src="algoritmo10/resultado/simetria6.jpg" alt="Impregnancia Simetría 6" /> 
				<!-- Simetría 6 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMenor">15% Animal</p>
				  <p id="porcentajeMedio">35% Mineral</p>
				  <p id="porcentajeMayor">50% Vegetable</p>
				</div>
				<!-- Simetría 6 END -->
				';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 6" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 6" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=61" >See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=86">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
			 case 7 :
               echo '<img src="algoritmo10/resultado/simetria7.jpg" alt="Impregnancia Simetría 7" /> 
				<!-- Simetría 7 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMenor">20% Mineral</p>
				  <p id="porcentajeMedio">40% Animal</p>
				  <p id="porcentajeMedioL">40% Vegetable</p>
				</div>
				<!-- Simetría 7 END -->
				';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 7" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 7" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=78">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=87">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
			 case 8 :
               echo '<img src="algoritmo10/resultado/simetria8.jpg" alt="Impregnancia Simetría 8" /> 
				<!-- Simetría 8 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMenor">15% Animal</p>
				  <p id="porcentajeMedio">35% Vegetable</p>
				  <p id="porcentajeMayor">50% Mineral</p>
				</div>
				<!-- Simetría 8 END -->
				';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 8" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 8" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=79">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=88">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
			 case 9 :
               echo '<img src="algoritmo10/resultado/simetria9.jpg" alt="Impregnancia Simetría 9" /> 
				<!-- Simetría 9 -->
				<div class="simetriaPorcentaje">
				  <p id="porcentajeMedioR">33% Vegetable</p>
				  <p id="porcentajeMedio">33% Mineral</p>
				  <p id="porcentajeMedioL">33% Animal</p>
				</div>
				<!-- Simetría 9 END -->
				';
			if( $user->get('usertype') == 'Author' ){
				echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 9" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
			<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
			';
			} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry order 9" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=80">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=89">Symmetry Interrogation</a></p>
				' ;
			}
		       break;
	  }
?>
    </div><!--   fin GRAFICO PREGNANCIA   -->
 <div class="sombra_saparador"></div>   <!--   ===================================   -->
 
    <!--   RESULTADOS DEL ALGORITMO   -->
    <div id="tabla_resultado_completa"><div id="tit_list">
      <table id="tit_list">
        <tr>
          <th class="col_reino">Kingdom</th>
          <th class="thMedicamento">Remedy</th>
          <th colspan="2" class="rsm">MSR </br><span>(<span id="result_box" lang="en" xml:lang="en">Mathematical Similarity Range</span>)</span></th>
          <th class="consonantes">Consonants</th>
        </tr></p>
      </table>
    </div> <!-- DIV tit_list END -->
    <div id="listado">
    <table id="resultado">
<?php
//REMEDIOS 9
echo "<!-- Remedios 9 -->";
$tabla = mysql_query( "SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE 1=1 AND id LIKE '$clave%'" );
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycolc AND $haycold AND $haycole) {
Switch ($registro['pregnancia']) {
	case '1' :
$arrRemedios[9][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
				$mineralTR++;
		  break;
	case '2':
$arrRemedios[9][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
				$vegetalTR++;
		  break;
	case '3':
$arrRemedios[9][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
			$animalTR++;
	break;
	
	case '4':
$arrRemedios[9][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetable" /></td>' ;
			$mineralVegetalTR++;
	break;
	case '5' :
$arrRemedios[9][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
			$mineralAnimalTR++;
	break;
	case '6' :
$arrRemedios[9][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
			$vegetalAnimalTR++;
		  break;
          case '7' :
$arrRemedios[9][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
		  break;
  }
?>
   	    <td class="nombres">
<?php
echo  '<a>'. $registro['nombre'] .'</a>';
      ?>
</td>
<td class="valor"><?php
	  echo '9'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-9.gif" width="61" height="10" alt="9" />';?>
	  </td>
      <td class="colum_puros">
<?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros']) //dice Switch ($registro['col_puros']) y en los demas dice Switch ($registro['puros']) Si lo pongo igual que los demas cambia y ponde SI en consonantes
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
//REMEDIOS 8
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycolc AND $haycold && !$haycole) {
Switch ($registro['pregnancia'])
  {
          case '1' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
$mineralTR++;
break;
          case '2' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
$vegetalTR++;
 break;
 
case '3' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
$animalTR++;
		  break;
	  case '4' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetable" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
$mineralAnimalTR++;
		  break;
          case '6' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
$vegetalAnimalTR++;
		  break;
          case '7' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
		  break;
  }
?>
   	  <td class="nombres">
	  <?php
echo  '<a>'. $registro['nombre'] .'</a>';
      ?>
      </td>
      <td class="valor"><?php
	  echo '8'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-8.gif" width="61" height="10" alt="8" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ; //en la columna de Consonantes (puros) no muestra nada.
	       break;
		     case 1 :
               echo '&middot;' ;//en la columna de Consonantes (puros) debe mostrar pelotita (mirar arriba el img. entre '')
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
//REMEDIOS 7
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycolc AND $haycole && !$haycold) {
Switch ($registro['pregnancia']){
  case '1' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
$mineralTR++;
 break;
case '2' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
$vegetalTR++;
		  break;
          case '3' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
$animalTR++;
		  break;
	  case '4' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetable" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
$mineralAnimalTR++;
break;
case '6' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
$vegetalAnimalTR++;
		  break;
          case '7' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
?>
   	  <td class="nombres">
	  <?php
echo  '<a>'. $registro['nombre'] .'</a>';
      ?>
      </td>
      <td class="valor"><?php
	  echo '7'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-7.gif" width="61" height="10" alt="7" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
//REMEDIOS 6
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycolc && !$haycold && !$haycole) {
Switch ($registro['pregnancia']){
 case '1' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
$mineralTR++;
break;
case '2' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
$vegetalTR++;
		  break;
          case '3' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
$animalTR++;
	  break;
	  case '4' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);
               echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetab" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
$mineralAnimalTR++;
break;
   case '6' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
$vegetalAnimalTR++;
		  break;
          case '7' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
		  break;
  }
?>
   	  <td class="nombres">
	  <?php
echo  '<a>'. $registro['nombre'] .'</a>';
      ?>
      </td>
      <td class="valor"><?php
	  echo '6'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-6.gif" width="61" height="10" alt="6" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
//REMEDIOS 5
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycold AND $haycole && !$haycolc) {
Switch ($registro['pregnancia'])
{
	case '1' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
$mineralTR++;
		  break;
          case '2' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
$vegetalTR++;
break;
case '3' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
$animalTR++;
		  break;
	  case '4' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetable" /></td>' ;
$mineralVegetalTR++;
break;
case '5' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
$mineralAnimalTR++;
break;
case '6' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
$vegetalAnimalTR++;
break;
          case '7' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
}
?>
   	  <td class="nombres">
	  <?php
echo  '<a>'. $registro['nombre'] .'</a>';
      ?>
      </td>
      <td class="valor"><?php
	  echo '5'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-5.gif" width="61" height="10" alt="5" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
//REMEDIOS 4
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycold && !$haycole && !$haycolc) {
Switch ($registro['pregnancia']){
case '1' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
$mineralTR++;
		  break;
          case '2' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
$vegetalTR++;
break;
          case '3' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
$animalTR++;
break;
case '4' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetable" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
$mineralAnimalTR++;
		  break;
          case '6' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
$vegetalAnimalTR++;
break;
case '7' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
}
?>
   	  <td class="nombres">
	  <?php
echo  '<a>'. $registro['nombre'] .'</a>';
      ?>
      </td>
      <td class="valor"><?php
	  echo '4'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-4.gif" width="61" height="10" alt="4" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
//REMEDIOS 3
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycole && !$haycold && !$haycolc) {
Switch ($registro['pregnancia']){
case '1' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
$mineralTR++;
break;
          case '2' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
$vegetalTR++;
break;
case '3' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
$animalTR++;
break;
case '4' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetable" /></td>' ;
$mineralVegetalTR++;
break;
case '5' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
$mineralAnimalTR++;
break;
case '6' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
$vegetalAnimalTR++;
break;
case '7' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
?>
<td class="nombres">
<?php
echo  '<a>'. $registro['nombre'] .'</a>';
?>
</td><td class="valor"><?php
echo '3'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-3.gif" width="61" height="10" alt="3" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
//REMEDIOS 2
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if (!$haycold && !$haycole && !$haycolc) {
Switch ($registro['pregnancia']){
case '1' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineral_".$mineralTR
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">Mineral</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral"/></td>' ;
$mineralTR++;
break;
case '2' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetal_".$vegetalTR
);               echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> Vegetable</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetable" /></td>' ;
$vegetalTR++;
break;
case '3' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trAnimal_".$animalTR
);               echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">Animal</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" /></td>' ;
$animalTR++;
break;
case '4' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR
);               echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">Min/Veg</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral - Vegetable" /></td>' ;
$mineralVegetalTR++;
break;
case '5' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR
);               echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">Min/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral - Animal" /></td>' ;
$mineralAnimalTR++;
break;
          case '6' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">Veg/Ani</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetable - Animal" /></td>' ;
$vegetalAnimalTR++;
break;
case '7' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
	'id' => "trImponderable_".$imponderableTR
);               echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
?>
   	  <td class="nombres">
<?php
echo  '<a>'. $registro['nombre'] .'</a>';
      ?>
</td>
      <td class="valor">
<?php
	  echo '2'; // imprime el nombre
	  ?>
</td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-2.gif" width="61" height="10" alt="2" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Only available with credits</span><?php
}
?></td>
</tr>
      <?php
	  
	  }
}?>
</table>
<!--   fin RESULTADOS DEL ALGORITMO   -->
<!--</p>-->

</div>
<!--   fin CONTENIDO   --><div id="filtros">
<p>

<? 
# Armamods trs
$tipoClasico = '';
$tipoRemedioClave = '';
$tipoAvanzado = '';
foreach( $arrRemedios as $id_remedio => $arrPregmancia ){
	foreach( $arrPregmancia as $id_pregmancia => $arr ){
		foreach( $arr as $item ){
			if( $item['tipoClasico'] ) $tipoClasico[] = $item['id'];
			if( $item['tipoRemedioClave'] ) $tipoRemedioClave[] = $item['id'];
			if( $item['tipoAvanzado'] ) $tipoAvanzado[] = $item['id'];
		}
	}
}
# Armamos titles
$titleClasico = "T=".count( $tipoClasico );
$tipoClasico = implode( ',', $tipoClasico );
if( preg_match_all( '/trVegetal_[0-9]+|trMineralVegetal_[0-9]+|trVegetalAnimal_[0-9]+/', $tipoClasico, $r ) ){
	$titleClasico .= "V=".count( $r[0] );
}
if( preg_match_all( '/trMineral_[0-9]+|trMineralVegetal_[0-9]+|trMineralAnimal_[0-9]+/', $tipoClasico, $r ) ){
	$titleClasico .= "M=".count( $r[0] );
}
if( preg_match_all( '/trAnimal_[0-9]+|trMineralAnimal_[0-9]+|trVegetalAnimal_[0-9]+/', $tipoClasico, $r ) ){
	$titleClasico .= "A=".count( $r[0] );
}
$titleRemedioClave = "T=".count( $tipoRemedioClave );
$tipoRemedioClave  = implode( ',', $tipoRemedioClave );
if( preg_match_all( '/trVegetal_[0-9]+|trMineralVegetal_[0-9]+|trVegetalAnimal_[0-9]+/', $tipoRemedioClave, $r ) ){
	$titleRemedioClave .= "V=".count( $r[0] );
}
if( preg_match_all( '/trMineral_[0-9]+|trMineralVegetal_[0-9]+|trMineralAnimal_[0-9]+/', $tipoRemedioClave, $r ) ){
	$titleRemedioClave .= "M=".count( $r[0] );
}
if( preg_match_all( '/trAnimal_[0-9]+|trMineralAnimal_[0-9]+|trVegetalAnimal_[0-9]+/', $tipoRemedioClave, $r ) ){
	$titleRemedioClave .= "A=".count( $r[0] );
}
$titleAvanzado = "T=".count( $tipoAvanzado );
$tipoAvanzado = implode( ',', $tipoAvanzado );
if( preg_match_all( '/trVegetal_[0-9]+|trMineralVegetal_[0-9]+|trVegetalAnimal_[0-9]+/', $tipoAvanzado, $r ) ){
	$titleAvanzado .= "V=".count( $r[0] );
}
if( preg_match_all( '/trMineral_[0-9]+|trMineralVegetal_[0-9]+|trMineralAnimal_[0-9]+/', $tipoAvanzado, $r ) ){
	$titleAvanzado .= "M=".count( $r[0] );
}
if( preg_match_all( '/trAnimal_[0-9]+|trMineralAnimal_[0-9]+|trVegetalAnimal_[0-9]+/', $tipoAvanzado, $r ) ){
	$titleAvanzado .= "A=".count( $r[0] );
}

?>
<script>
	trsAvanzado = '<?php echo $tipoAvanzado; ?>';
	trsClasico = '<?php echo $tipoClasico; ?>';
	trsRemedioClave = '<?php echo $tipoRemedioClave; ?>';
	jQuery(document).ready(function(e) {
        setButton();
    });
</script>
<div id="filtros_sec">    
	<input type="button" class="btnFiltroSec" name="btnTodos" id="btnTodos" value="Show All" onClick="showTr( '', 1, 'Show All' );" />
    <input type="button" class="btnFiltroSec" name="btnAnimal" id="btnAnimal" value="Animals Only" onClick="showTr( '', 2, 'Animals Only' );" />
    <input type="button" class="btnFiltroSec" name="btnVegetal" id="btnVegetal" value="Vegetables Only" onClick="showTr( '', 3, 'Vegetables Only' );" />
    <input type="button" class="btnFiltroSec" name="btnMineral" id="btnMineral" value="Minerals Only" onClick="showTr( '', 4, 'Minerals Only' );" />
</div> <!-- div filtros_sec END "-->

<div id="resultadosBtn">
	<input type="button" class="rounded" name="btnRemediosClave" id="btnRemediosClave" value="Key Remedies" onClick="showTr( 3, '', 'Key Remedies' );" title="<?php echo $titleRemedioClave; ?>" />
	<input type="button" class="rounded" name="btnClasicos" id="btnClasicos" value="Classic Remedies" onClick="showTr( 2, '', 'Classic Remedies' );" title="<?php echo $titleClasico; ?>" />
	<input type="button" class="rounded" name="btnAvanzados" id="btnAvanzados" value="Advanced List" onClick="showTr( 1, '', 'Advanced List' );" title="<?php echo $titleAvanzado; ?>" />

	    </div> <!-- div resultadosBtn END-->
</div>
<div class="sombra_saparador"></div>
<div id="referencias_tabla">
  <table id="referencias1">
    <tr>
      <td><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="Mineral" />Mineral</td>
      <td><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="Vegetal" />Vegetable</td>
      <td><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="Animal" />Animal</td>
      <td><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" />Imponderable</td>
    </tr>
  </table>
  <table id="referencias2">
    <tr>
      <td><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="Mineral/Vegetal" />Mineral/Vegetable</td>
      <td><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="Mineral/Animal" />Mineral/Animal</td>
      <td><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="Vegetal/Animal" />Vegetable/Animal</td>
    </tr>
  </table>
</div><!-- referencias_tabla DIV END-->
<div id="trio_botones-footer">
	<a class="btn-light_grey" href="#">Reading the Algorithm Report</a><a class="btn-light_grey" href="http://www.algoritmocandegabe.com/index.php?option=com_content&view=article&id=46&Itemid=53">Perform Another Study</a>
</div><!--div trio_botones END-->

</div>

</div>
</body>
</html>