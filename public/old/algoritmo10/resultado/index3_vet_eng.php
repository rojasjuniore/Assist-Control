<?php
include_once 'vd.php';	
$user =& JFactory::getUser();
$id_estudio = intval( $_GET['id_estudio'] );
$rs = mysql_query( "SELECT * FROM estudios_realizados WHERE id_usuario = '".$user->get('id')."' AND id = '".$id_estudio."'" );
$estudio = mysql_fetch_object( $rs );
if( !$estudio->id ) echo "THE SELECTED STUDY WAS NOT FOUND";
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Candegabe Algorithm - Study Result</title>
	<!--<script src="js/jquery-1.4.2.min.js" type="text/javascript" ></script>-->
	<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER['HTTP_HOST']?>/shadowbox-3.0.3/shadowbox.css">
	<script src="http://<?=$_SERVER['HTTP_HOST']?>/shadowbox-3.0.3/shadowbox.js" type="text/javascript"></script>
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
	<h2>TITLE</h2>
    <p>You have to have credits to use this feature</p>
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
		
		var trial = jQuery('#trial').overlay({
			top: 'center',
			mask: {
				color: '#000',
				opacity: 0.5,
			},
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
				showTrial( 'Actualizar Resultado' );
				return false;
			}
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
		
		if( document.getElementById('especie').value == "" ){
			msg +=  "Por favor completar el camo ESPECIE\n";
		}
		if( document.getElementById('owner').value == "" ){
			msg +=  "Por favor completar el Nombre del Dueño\n";
		}
		if( document.getElementById('petName').value == "" ){
			msg +=  "Por favor completar el Nombre del Animal\n";
		}
		if( document.getElementById('iniciales').value == "" ){
			msg +=  "Por favor completar las Iniciales\n";
		}
		if( msg != '' ){
			alert( msg );
			return false;
		}
		return true;
	}
	
	function getModalMsg(){
		var msg = "";
		
		msg = '<div class="favor">Por Favor Verificar la Información Ingresada:</div><br /><br />';
		msg += '<div class="etiqueta">Especie:</div> <div class="dato">' + document.getElementById('especie').value + '</div><br />';
		msg += '<div class="etiqueta">Nombre del Dueño:</div> <div class="dato">' + document.getElementById('owner').value + '</div><br />';
		msg += '<div class="etiqueta">Nombre del Animal:</div> <div class="dato">' + document.getElementById('petName').value + '</div><br />';
		msg += '<div class="etiqueta">Iniciales:</div> <div class="dato">' + document.getElementById('iniciales').value + '</div><br />';
		fecha = document.getElementById('day').value + "/"+ document.getElementById('month').value +"/"+ document.getElementById('year').value;
		msg += '<div class="etiqueta">Fecha de Nacimiento:</div> <div class="dato">' + fecha + '</div><br /><br />';
		msg += '<div class="correcto">Si Esta Información es Correcta Confirme Esta Ventana</div>';
		msg = msg.replace( /\n/, "<br />" );
		return msg;
	}

</script>
<?php
# Reconsutrimos los datos a utilizar
$last = $estudio->a_duenio;
$nombre = $estudio->a_especie;
$apodo = $estudio->a_animal;
$einiciales = $estudio->a_iniciales;
$dia = $estudio->a_dia;
$mes = $estudio->a_mes;
$anio = $estudio->a_anio;
require_once('calculo_datos_estudio.php');
?>
<!-- ===== CONTENEDOR GENERAL ===== -->
<div id="contenedor">
	<!--   CONTENIDO   -->
	<div id="resultadoHeader">
		<h2><strong>Study Results</strong></h2>
		<div id="tres_btn">
        	<?php if( $user->get('usertype') == 'Author' ){ ?>
            <a class="btn-light_grey" id="btn-interpretacion" href="javascript:showTrial('Reading the Algorithm Results')">Reading the Algorithm Results</a>
            <?php } else { ?>
			<a rel="shadowbox;width=1100" class="btn-light_grey" id="btn-interpretacion" href="index2.php?option=com_content&view=article&id=65">Reading the Algorithm Results</a>
            <?php } ?>
			<!-- este bono hace link a un artículo joomla usando shadowbox --><a class="btn-light_grey" id="btn-otro_estudio" href="http://<?=$_SERVER['HTTP_HOST']?>/index.php?option=com_content&view=article&id=46&Itemid=53">Perform Another Study</a>
		</div>	<!--   fin tres_btn Div   -->
	</div> <!--   fin resultadoHeader Div   -->
	<!--   FORMULARIO   -->
	<div id="formActualizar">
		<form id="formAlgoritmo" action="http://<?=$_SERVER['HTTP_HOST']?>/index.php?option=com_content&view=article&id=69&Itemid=30" method="post" class="formulario" name="formAlgoritmo">
   <!-- NOMBRE --> 
<div id="campos_form">	
	<p>
	  <label for="name">Specie</label>
			<input  name="especie" type="text" id="especie" tabindex="1" size="30" value="<?php echo $nombre;?>" />
	</p>
	<!-- NOMBRE FIN--> 
	<!-- APELLIDO --> 
		<p>
		  <label for="lastName">Owner's Name</label>
			<input name="owner" type="text" id="owner" tabindex="2" size="30" value="<?php echo $last?>" />
		</p>
   <!-- APELLIDO FIN --> 
   <!-- APODO --> 
		<p>
	    <label for="apodo" id="apodoLabel">Pet's Name</label>
			<input name="petName" type="text" id="petName" tabindex="3" size="30" value="<?php echo $apodo?>" />
		</p>
   <!-- APODO FIN --> 
   <!-- INICIALES --> 
		<p>
		  <label for="iniciales">Initials</label>
		 	<input name="iniciales" type="text" id="iniciales" tabindex="4" size="30" value="<?php echo $einiciales?>" />
		</p>
   <!-- INICIALES END --> 
   <!-- FECHA NACIMIENTO --> 
		 <fieldset>
		<legend>Birth Date</legend>
		    		    <input name="month" type="text" id="month"  size="2" maxlength="2" value="<?php echo $mes?>" readonly />
            <input name="day" type="text" id="day"  size="2" maxlength="2" value="<?php echo $dia?>" readonly  />
		    <input name="year" type="text" id="year" size="4" maxlength="4" value="<?php echo $anio?>" readonly />
	    </fieldset>  
   <!-- FECHA NACIMIENTO END --> 
<span class="bajar"></span>
</div>    
<!-- End Div campos_form --> 	

<p id="llave">}</p>

   <!-- BOTON "ACTUALIZAR RESULTADO" --> 
		<p id="btn-enviar">
	    <!-- <label for="submit" class="textoInvisible">actualizar </label> -->
	<input type="submit" tabindex="5" name="Enviar" id="Enviar" value="Update Results" /> <img src="/static/img/icon-16-info.png" title="<?=$txt['tooltip_actualizar_resultado']?>" class="tooltip-icon" />
	  	</p>
   <!-- BOTON "ACTUALIZAR RESULTADO" END --> 

		</form>
	</div><!--   FORMULARIO END   -->
	<!--  ===== GRAFICO IMPREGNANCIA ===================================  -->
    <div id="impregnancia">
		<h2>Impregnancy   <img src="/static/img/icon-16-info.png" title="<?=$txt['tooltip_impregnancia']?>" class="tooltip-icon" /></h2>
		<h3>Symmetry</h3>
<?php
include dirname( __FILE__ ).'/../../vd.php';
$estudio = array();
Switch ($pregnancia){
	case 1 :
		$aux_pregnancia['animal'] = 1;
		echo '<img src="algoritmo10/resultado/simetria1.jpg" alt="Impregnancy Symmetry 1" /> 
			<!-- Simetría 1 -->
			<div class="simetriaPorcentaje">
			  <p id="porcentajeMenor">15% Vegetable</p>
			  <p id="porcentajeMedio">35% Mineral</p>
			  <p id="porcentajeMayor">50% Animal</p>
			</div>
			<!-- Simetría 1 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 1" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 1" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=73">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=81">Symmetry Interrogation</a></p>';
		}
		break;
	case 2 :
		$aux_pregnancia['vegetal'] = 1;
		echo '<img src="algoritmo10/resultado/simetria2.jpg" alt="Impregnancy Symmetry 2" /> 
			<!-- Simetría 2 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Mineral</p>
			<p id="porcentajeMedio">35% Animal</p>
			<p id="porcentajeMayor">50% Vegetable</p>
			</div>
			<!-- Simetría 2 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 2" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 2" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=74" >See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=82">Symmetry Interrogation</a></p>' ;
		}
		break;
	case 3 :
		$aux_pregnancia['vegetal'] = 1;
		$aux_pregnancia['mineral'] = 1;
		echo '<img src="algoritmo10/resultado/simetria3.jpg" alt="Impregnancy Symmetry 3"  /> 
			<!-- Simetría 3 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">20% Animal</p>
			<p id="porcentajeMedio">40% Vegetable</p>
			<p id="porcentajeMedioL">40% Mineral</p>
			</div>
			<!-- Simetría 3 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 3" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>
				';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 3" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=75">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=83">Symmetry Interrogation</a></p>
				' ;
		}
		break;
	case 4 :
		$aux_pregnancia['mineral'] = 1;
		echo '<img src="algoritmo10/resultado/simetria4.jpg" alt="Impregnancy Symmetry 4" /> 
			<!-- Simetría 4 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Vegetable</p>
			<p id="porcentajeMedio">35% Animal</p>
			<p id="porcentajeMayor">50% Mineral</p>
			</div>
			<!-- Simetría 4 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 4" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>
				';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 4" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=76">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=84">Symmetry Interrogation</a></p>
				' ;
		}
		break;
	case 5 :
		$aux_pregnancia['animal'] = 1;
		echo '<img src="algoritmo10/resultado/simetria5.jpg" alt="Impregnancy Symmetry 5" /> 
			<!-- Simetría 5 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Mineral</p>
			<p id="porcentajeMedio">35% Vegetable</p>
			<p id="porcentajeMayor">50% Animal</p>
			</div>
			<!-- Simetría 5 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 5" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>
				';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 5" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=77">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=85">Symmetry Interrogation</a></p>
				' ;
		}
		break;
	case 6 :
		$aux_pregnancia['vegetal'] = 1;
		echo '<img src="algoritmo10/resultado/simetria6.jpg" alt="Impregnancy Symmetry 6" /> 
			<!-- Simetría 6 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Animal</p>
			<p id="porcentajeMedio">35% Mineral</p>
			<p id="porcentajeMayor">50% Vegetable</p>
			</div>
			<!-- Simetría 6 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 6" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>
				';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 6" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=61" >See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=86">Symmetry Interrogation</a></p>
				' ;
		}
		break;
	case 7 :
		$aux_pregnancia['animal'] = 1;
		$aux_pregnancia['vegetal'] = 1;
		echo '<img src="algoritmo10/resultado/simetria7.jpg" alt="Impregnancy Symmetry 7" /> 
			<!-- Simetría 7 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">20% Mineral</p>
			<p id="porcentajeMedio">40% Animal</p>
			<p id="porcentajeMedioL">40% Vegetable</p>
			</div>
			<!-- Simetría 7 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 7" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>
				';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 7" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=78">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=87">Symmetry Interrogation</a></p>
				' ;
		}
		break;
	case 8 :
		$aux_pregnancia['mineral'] = 1;
		echo '<img src="algoritmo10/resultado/simetria8.jpg" alt="Impregnancy Symmetry 8" /> 
			<!-- Simetría 8 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Animal</p>
			<p id="porcentajeMedio">35% Vegetable</p>
			<p id="porcentajeMayor">50% Mineral</p>
			</div>
			<!-- Simetría 8 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 8" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>
				';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 8" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=79">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=88">Symmetry Interrogation</a></p>
				' ;
		}
		break;
	case 9 :
		$aux_pregnancia['animal'] = 1;
		$aux_pregnancia['vegetal'] = 1;
		$aux_pregnancia['mineral'] = 1;
		echo '<img src="algoritmo10/resultado/simetria9.jpg" alt="Impregnancy Symmetry 9" /> 
			<!-- Simetría 9 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMedioR">33% Vegetable</p>
			<p id="porcentajeMedio">33% Mineral</p>
			<p id="porcentajeMedioL">33% Animal</p>
			</div>
			<!-- Simetría 9 END -->
			';
		if( $user->get('usertype') == 'Author' ){
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 9" href="javascript:showTrial(\'See the Dynamic\')">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Symmetry Interrogation\')">Symmetry Interrogation</a></p>
				';
		} else {
			echo '<p><a class="btn-light_grey-finito" title="Symmetry Order 9" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=80">See the Dynamic</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=89">Symmetry Interrogation</a></p>
				' ;
		}
		break;
}
?>
    </div><!--   fin GRAFICO PREGNANCIA   -->
<div class="sombra_saparador"></div>
<?php
include_once("html_resultados.php");
include_once("tablero_resultados.php");
?>
	<div class="resultadoHeader">
	<h2><a href="#tabla_resultado_completa">Extended Analysis</a>  <img src="/static/img/icon-16-info.png" title="<?=$txt['tooltip_analisis_desplegado']?>" class="tooltip-icon" /></h2>
	</div>
<div id="filtros_sec">
	<input type="button" class="btnFiltroSec" name="btnTodos" id="btnTodos" value="Show All" onClick="showTr( '', 1, 'Show All' );" />
	<input type="button" class="btnFiltroSec" name="btnAnimal" id="btnAnimal" value="Animals Only" onClick="showTr( '', 2, 'Animals Only' );" />
	<input type="button" class="btnFiltroSec" name="btnVegetal" id="btnVegetal" value="Vegetables Only" onClick="showTr( '', 3, 'Vegetables Only' );" />
	<input type="button" class="btnFiltroSec" name="btnMineral" id="btnMineral" value="Minerals Only" onClick="showTr( '', 4, 'Minerals Only' );" />
</div> <!-- div filtros_sec END "-->

<? /*
<div id="resultadosBtn">
	<input type="button" class="rounded" name="btnRemediosClave" id="btnRemediosClave" value="Remedios Clave" onClick="showTr( 3, '', 'Remedios Clave' );" title="<?php echo $titleRemedioClave; ?>" />
	<input type="button" class="rounded" name="btnClasicos" id="btnClasicos" value="Listado Clásicos" onClick="showTr( 2, '', 'Listado Clásicos' );" title="<?php echo $titleClasico; ?>" />
	<input type="button" class="rounded" name="btnAvanzados" id="btnAvanzados" value="Listado Avanzado" onClick="showTr( 1, '', 'Listado Avanzado' );" title="<?php echo $titleAvanzado; ?>" />
</div> <!-- div resultadosBtn END-->
*/ ?>
 <!--   ===================================   -->
 <!--   RESULTADOS DEL ALGORITMO   -->
	<div id="tabla_resultado_completa">
		<div id="tit_list">
			<table id="tit_list">
			<thead>
				<tr>
					<th colspan="2" class="col_reino">Kingdom</th>
					<th class="thMedicamento">Remedy</th>
					<th colspan="2" class="rsm">MSR </br><span>(Mathematical Similarity Range)</span></th>
					<th class="consonantes">Consonants</th>
					<th class="clave">Key Remedies</th>
					<th class="secuencia">Secuency</th>
				</tr>
			</thead>
<? /*			</table>
		</div> <!-- DIV tit_list END -->
		<div id="listado"> */ ?>
<?php echo $html_resultados ?>
<!--   fin RESULTADOS DEL ALGORITMO   -->
<!--</p>-->

</div>
<!--   fin CONTENIDO   -->
<div id="filtros">
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
			<?php if( $user->get('usertype') == 'Author' ){ ?>
			<a class="btn-light_grey" id="btn-interpretacion2" href="javascript:showTrial('Reading the Algorithm Results')">Reading the Algorithm Results</a>
			<?php } else { ?>
			<a rel="shadowbox;width=1100" class="btn-light_grey" id="btn-interpretacion2" href="index2.php?option=com_content&view=article&id=65">Reading the Algorithm Results</a>
			<?php } ?>
			<a class="btn-light_grey" href="index.php?option=com_content&view=article&id=46&Itemid=53">Perform Another Study</a>
		</div><!--div trio_botones END-->
	</div>
</div>
</body>
</html>
<?php
}
?>