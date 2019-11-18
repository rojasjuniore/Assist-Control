<?php
include dirname( __FILE__ ).'/../../vd.php';

$user =& JFactory::getUser();
$usuario = $user->get('username');
$usertype = $user->get('usertype');
$id_usuario = $user->get('id');

# Traducciones
$txt['error_sin_estudio'] = "NO SE ENCUENTRA EL ESTUDIO SOLICITADO";
$txt['title'] = 'Resultado del Estudio';
$meses = array('','Enero','Febrero', 'Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 'Noviembre','Diciembre');
$txt['fecha_pdf'] = 'A los %s días del mes de %s del año %s ' ;
$txt['constancia'] = 'AlgoritmoCandegabe.com deja constancia de la realización<br /> del Estudio Algorítmico solicitado para el paciente';
$txt['conforme_disposiciones'] = 'Conforme a las disposiciones y reglamento <br />vigentes las autoridades extienden <br />el correspondiente certificado.';
$txt['firma_dpto_informatica'] = 'Dpto. de Inform&aacute;tica';
$txt['firma_director'] = 'Director';
$txt['firma_adminstrador'] = 'Administrador';
$txt['pie_pagina'] = 'Pagina {PAGE_NUM} de {PAGE_COUNT}';
$txt['label_nombre'] = 'Nombre y Apellido';
$txt['label_apodo'] = 'Nombre por el<br />cual se identifica';
$txt['label_fecha_nacimiento'] = 'Fecha de Nacimiento';
$txt['label_lugar_nacimiento'] = 'Lugar de Nacimiento';
$txt['label_impregnancia'] = 'Impregnancia';
$txt['label_simetria'] = 'Simetr&iacute;a';
$txt['label_animal'] = 'Animal';
$txt['label_vegetal'] = 'Vegetal';
$txt['label_mineral'] = 'Mineral';
$txt['label_imponderable'] = 'Imponderable';
$txt['analisis_combinado'] = 'Análisis combinado';
$txt['list_rsm'] = 'RSM';
$txt['list_impregnancia'] = 'Impregnancia';
$txt['list_secuencia'] = 'Secuencia';
$txt['list_consonante'] = 'Consonantes';
$txt['list_clave'] = 'Claves';
$txt['suma'] = 'Suma';
$txt['analisis_desplegado'] = 'Análisis desplegado';
$txt['reino'] = 'Reino';
$txt['medicamento'] = 'Medicamento';
$txt['rsm'] = 'RSM';
$txt['rsm_aclaracion'] = '(Rango de Semejanza Matem&aacute;tico)';
$txt['consonantes'] = 'Consonantes';
$txt['clave'] = 'Clave';
$txt['secuencia'] = 'Secuencia';
$txt['formato_fecha'] = '%s/%s/%s';
switch( $lang ){
	case 'en':
		$txt['error_sin_estudio'] = "THE STUDY WAS NOT FOUND";
		$txt['title'] = 'Study Results';
		$meses = array('','January','February', 'March','April','May','June','July','August','September','October','November','December');
		$txt['fecha_pdf'] = 'On the %s day of %s of the year %s ' ;
		$txt['constancia'] = 'AlgoritmoCandegabe.com certifies the realization of the Algorithmic<br /> Study requested for the patient';
		$txt['conforme_disposiciones'] = 'In accordance with the regulation currently in force, we issue this <br />certificate.';
		$txt['firma_dpto_informatica'] = 'Tech Department';
		$txt['firma_director'] = 'Director';
		$txt['firma_adminstrador'] = 'Administrator';
		$txt['pie_pagina'] = '{PAGE_NUM} of {PAGE_COUNT}';
		$txt['label_nombre'] = 'Name and Last name';
		$txt['label_apodo'] = 'Name Normally Used';
		$txt['label_fecha_nacimiento'] = 'Birth Date';
		$txt['label_lugar_nacimiento'] = 'Birth Place';
		$txt['label_impregnancia'] = 'Impregnancy';
		$txt['label_simetria'] = 'Symmetry';
		$txt['label_animal'] = 'Animal';
		$txt['label_vegetal'] = 'Vegetable';
		$txt['label_mineral'] = 'Mineral';
		$txt['label_imponderable'] = 'Imponderable';
		$txt['analisis_combinado'] = 'Combined Analysis';
		$txt['list_rsm'] = 'MSR';
		$txt['list_impregnancia'] = 'Impregnancy';
		$txt['list_secuencia'] = 'Secuency';
		$txt['list_consonante'] = 'Consonant';
		$txt['list_clave'] = 'Key Remedy';
		$txt['suma'] = 'Sum';
		$txt['analisis_desplegado'] = 'Extended Analysis';
		$txt['reino'] = 'Reino';
		$txt['medicamento'] = 'Remedy';
		$txt['rsm'] = 'MSR';
		$txt['rsm_aclaracion'] = '(Mathematical Similarity Range)';
		$txt['consonantes'] = 'Consonants';
		$txt['clave'] = 'Key Remedies';
		$txt['secuencia'] = 'Secuency';
		$txt['formato_fecha'] = '%2$s/%1$s/%3$s';
		break;
}

$rs = mysql_query( "SELECT * FROM estudios_realizados WHERE id_usuario = '".$user->get('id')."' AND id = '".$id_estudio."'" );
$estudio = mysql_fetch_object( $rs );
if( !$estudio->id ) die($txt['error_sin_estudio']);

if( $tipo == 'humano' ){
	$last = $estudio->h_apellido;
	$nombre = $estudio->h_nombre;
	$apodo = $estudio->h_identifica;
	$einiciales = $estudio->h_iniciales;
	$dia = $estudio->h_dia;
	$mes = $estudio->h_mes;
	$anio = $estudio->h_anio;
	$pais = $estudio->h_pais;
	$lug_nac = $pais;
} elseif( $tipo == 'animal' ) {
	$last = $estudio->a_duenio;
	$nombre = $estudio->a_especie;
	$apodo = $estudio->a_animal;
	$einiciales = $estudio->a_iniciales;
	$dia = $estudio->a_dia;
	$mes = $estudio->a_mes;
	$anio = $estudio->a_anio;
}
require_once('calculo_datos_estudio.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$txt['title']?> - Algoritmo Candegabe</title>
<link rel="stylesheet" type="text/css" href="/templates/rt_gantry_j15/css/gantry.css" />
<link href="algoritmo10/resultado/resultado_pdfv2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?
/*
var_dump( "ID_ESTUDIO: ".$id_estudio);
var_dump( "LANG: ".$lang );
var_dump( "TIPO: ".$tipo );
*/
?>
<div id="Certificado">
  <div id="logo-cert"><img src="algoritmo10/resultado/images-pdf/logo_certificado.jpg" alt="Logo Algoritmo Candegabe"  /></div>
  <div id="texto-cert" style="font-family:Georgia, 'Times New Roman', Times, serif; font-style:italic"><?php
$diaPDF=date('d');$mesPDF=date('n');$anoPDF=date('Y'); 
$mesesPDF=array('','Enero','Febrero', 
'Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 
'Noviembre','Diciembre'); 
echo sprintf( $txt['fecha_pdf'], $diaPDF, $meses[$mesPDF], $anoPDF );
?><br />
    <?=$txt['constancia']?> 
    <br />
    <span class="nombre-cert"><?php echo strtoupper($nombre);?> <?php echo strtoupper($last);?></span><br />
    <?=$txt['conforme_disposiciones']?> </div>
  <div id="codigo-sello"><img src="algoritmo10/resultado/images-pdf/codigo-sello.jpg" alt="Código y sello Algoritmo Candegabe"   /></div>
  <div id="firmas">
    <table width="100%">
      <tr>
        <td width="33%" align="center"><img src="algoritmo10/resultado/images-pdf/firma_yantorno.jpg" class="firma_yantorno" alt="Firma Yantorno"  /></td>
        <td width="34%" align="center"><img src="algoritmo10/resultado/images-pdf/firma_candegabe.jpg" class="firma_candegabe" alt="Firma Candegabe"  /></td>
        <td width="33%" align="center"><img src="algoritmo10/resultado/images-pdf/firma_miguel_candegabe.jpg" class="firma_gasco" alt="Firma Miguel Candegabe"  /></td>
      </tr>
      <tr>
        <td><span>Enrique Yantorno</span><br />
        <?=$txt['firma_dpto_informatica']?></td>
        <td><span>Dr. Marcelo Candegabe</span><br />
        <?=$txt['firma_director']?></td>
        <td><span>Lic. Miguel Candegabe</span><br />
        <?=$txt['firma_adminstrador']?></td>
      </tr>
    </table>
  </div>
</div><!-- FIN  Div Certificado-->
<div style="page-break-after:always"></div>
<div id="contenedor">
  <div id="cabecera">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="encabezado">
			<tr>
				<td><img src="algoritmo10/resultado/images-pdf/algoritmo-logo.png" width="32" height="32" alt="Algoritmo Candegabe Logo" /></td>
				<td width="30%" align="right" valign="bottom"><?php
$diapdf=date('d');$mespdf=date('n');$ano=date('Y'); 
echo ''.$meses[$mespdf].' '.$diapdf.', '.$ano; 
?>
				</td>
			</tr>
		</table><table  width="100%" border="0" cellpadding="0" cellspacing="0" id="data_imp">
  <tr>
    <td><table width="100%" cellpadding="7" id="data_pac">
        <tr>
          <td class="etiqueta" width="30%"><?=$txt['label_nombre']?>:</td>
          <td class="nom-ape"><?php echo strtoupper($nombre);?> <?php echo strtoupper($last);?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%"><?=$txt['label_apodo']?>:</td>
          <td><?php echo strtoupper($apodo);?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%"><?=$txt['label_fecha_nacimiento']?>:</td>
          <td><?php echo sprintf( $txt['formato_fecha'], strtoupper ($dia), strtoupper ($mes), strtoupper ($anio) );?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%"><?=$txt['label_lugar_nacimiento']?>:</td>
          <td><?php echo strtoupper ($lug_nac);?></td>
        </tr>
        </table></td>
    <td width="30%"><table width="100%" id="imp_table">
      <tr>
        <td><p class="imp_imp"><?=$txt['label_impregnancia']?></p>
          <p class="imp_sim"><?=$txt['label_simetria']?></p>          <?php
Switch ($pregnancia)
	 {
	         case 1 :
			 $aux_pregnancia['animal'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria1.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 1" /> 
				<!-- Simetría 1 -->
			<div class="simetriaPorcentaje">
			  <p class="porcentajeMenor">15% '.$txt['label_vegetal'].'</p>
			  <p class="porcentajeMedio">35% '.$txt['label_mineral'].'</p>
			  <p class="porcentajeMayor">50% '.$txt['label_animal'].'</p>
			</div>
			<!-- Simetría 1 END -->' ;
		       break;
		     case 2 :
		$aux_pregnancia['vegetal'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria2.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 2" /> 
				<!-- Simetría 2 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% '.$txt['label_mineral'].'</p>
				  <p class="porcentajeMedio">35% '.$txt['label_animal'].'</p>
				  <p class="porcentajeMayor">50% '.$txt['label_vegetal'].'</p>
				</div>
				<!-- Simetría 2 END -->' ;
		       break;
			 case 3 :
		$aux_pregnancia['vegetal'] = 1;
		$aux_pregnancia['mineral'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria3.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 3"  /> 
				<!-- Simetría 3 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">20% '.$txt['label_animal'].'</p>
				  <p class="porcentajeMedio">40% '.$txt['label_vegetal'].'</p>
				  <p class="porcentajeMedioL">40% '.$txt['label_mineral'].'</p>
				</div>
				<!-- Simetría 3 END -->' ;
		       break;
			 case 4 :
		$aux_pregnancia['mineral'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria4.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 4" /> 
				<!-- Simetría 4 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% '.$txt['label_vegetal'].'</p>
				  <p class="porcentajeMedio">35% '.$txt['label_animal'].'</p>
				  <p class="porcentajeMayor">50% '.$txt['label_mineral'].'</p>
				</div>
				<!-- Simetría 4 END -->' ;
		       break;
			 case 5 :
		$aux_pregnancia['animal'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria5.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 5" /> 
				<!-- Simetría 5 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% '.$txt['label_mineral'].'</p>
				  <p class="porcentajeMedio">35% '.$txt['label_vegetal'].'</p>
				  <p class="porcentajeMayor">50% '.$txt['label_animal'].'</p>
				</div>
				<!-- Simetría 5 END -->' ;
		       break;
			 case 6 :
		$aux_pregnancia['vegetal'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria6.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 6" /> 
				<!-- Simetría 6 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% '.$txt['label_animal'].'</p>
				  <p class="porcentajeMedio">35% '.$txt['label_mineral'].'</p>
				  <p class="porcentajeMayor">50% '.$txt['label_vegetal'].'</p>
				</div>
				<!-- Simetría 6 END -->
				' ;
		       break;
			 case 7 :
		$aux_pregnancia['animal'] = 1;
		$aux_pregnancia['vegetal'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria7.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 7" /> 
				<!-- Simetría 7 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">20% '.$txt['label_mineral'].'</p>
				  <p class="porcentajeMedio">40% '.$txt['label_animal'].'</p>
				  <p class="porcentajeMedioL">40% '.$txt['label_vegetal'].'</p>
				</div>
				<!-- Simetría 7 END -->' ;
		       break;
			 case 8 :
		$aux_pregnancia['mineral'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria8.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 8" /> 
				<!-- Simetría 8 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% '.$txt['label_animal'].'</p>
				  <p class="porcentajeMedio">35% '.$txt['label_vegetal'].'</p>
				  <p class="porcentajeMayor">50% '.$txt['label_mineral'].'</p>
				</div>
				<!-- Simetría 8 END -->' ;
		       break;
			 case 9 :
		$aux_pregnancia['animal'] = 1;
		$aux_pregnancia['vegetal'] = 1;
		$aux_pregnancia['mineral'] = 1;
               echo '<img src="algoritmo10/resultado/images-pdf/simetria9.png" alt="'.$txt['label_impregnancia'].' '.$txt['label_simetria'].' 9" /> 
				<!-- Simetría 9 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMedioR">33% '.$txt['label_vegetal'].'</p>
				  <p class="porcentajeMedio">33% '.$txt['label_mineral'].'</p>
				  <p class="porcentajeMedioL">33% '.$txt['label_animal'].'</p>
				</div>
				<!-- Simetría 9 END -->
				' ;
		       break;
	  }
?></td>
      </tr>
    </table></td>
  </tr>
</table>
<img src="algoritmo10/resultado/images-pdf/sombra_head.png"  alt="" name="sombra_head" id="sombra_head" /></div>
	<div id="listado">
<!-- page number -->
<script type="text/php">

        if ( isset($pdf) ) {

          $font = Font_Metrics::get_font("helvetica");
          $pdf->page_text(500, 780, "<?=$txt['pie_pagina']?>", $font, 9, array(0,0,0));

        }
        </script>
<!-- FIN Page Numbering-->
<?php
//REMEDIOS 9
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave, tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE 1=1 AND id LIKE '".$clave."%' " );
while ($registro = mysql_fetch_array($tabla)) {
	$limite_rsm = 5;
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
'puros' => $registro['puros'], 
					'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralTR++;
				break;
			case '2':
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$vegetalTR++;
				break;
			case '3':
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$animalTR++;
			break;
			
			case '4':
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralVegetalTR++;
			break;
			case '5' :
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralAnimalTR++;
			break;
			case '6' :
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$vegetalAnimalTR++;
				break;
			case '7' :
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$imponderableTR++;
				break;
		  }
	}
}

//REMEDIOS 8
$tabla = mysql_query( "SELECT idMatMed, id, tipoClasico, tipoRemedioClave, tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '".$clave."%'" );
while ($registro = mysql_fetch_array($tabla)) {
	$limite_rsm = ( $limite_rsm == 3 ? 4 :  $limite_rsm );
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
		Switch ($registro['pregnancia']) {
          case '1' :
			$arrRemedios[8][$registro['pregnancia']][] = array( 
				'nombre' => $registro['nombre'], 
				'tipoClasico' => $registro['tipoClasico'], 
				'tipoRemedioClave' => $registro['tipoRemedioClave'], 
				'tipoAvanzado' => $registro['tipoAvanzado'], 
				'puros' => $registro['puros'], 
				'id' => "trMineral_".$mineralTR,
				'secuencia' => $registro['secuencia'],
				'idMatMed' => $registro['idMatMed']
			);
			$mineralTR++;
			break;
			case '2' :
				$arrRemedios[8][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalTR++;
				break;
			case '3' :
				$arrRemedios[8][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$animalTR++;
				break;
			case '4' :
				$arrRemedios[8][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralVegetalTR++;
				break;
			case '5' :
				$arrRemedios[8][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$mineralAnimalTR++;
				break;
			case '6' :
				$arrRemedios[8][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalAnimalTR++;
				break;
			case '7' :
				$arrRemedios[8][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$imponderableTR++;
				break;
		}
	}
}
//REMEDIOS 7
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']) {
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
	Switch ($registro['col_c']) {
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
					'puros' => $registro['puros'], 
					'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralTR++;
				break;
			case '2' :
				$arrRemedios[7][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalTR++;
				break;
			case '3' :
				$arrRemedios[7][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$animalTR++;
				break;
			case '4' :
				$arrRemedios[7][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralVegetalTR++;
				break;
			case '5' :
				$arrRemedios[7][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$mineralAnimalTR++;
				break;
			case '6' :
				$arrRemedios[7][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalAnimalTR++;
				break;
			case '7' :
				$arrRemedios[7][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$imponderableTR++;
				break;
		}
	}
}
//REMEDIOS 6
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
					'puros' => $registro['puros'], 
					'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralTR++;
				break;
			case '2' :
				$arrRemedios[6][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalTR++;
				break;
			case '3' :
				$arrRemedios[6][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$animalTR++;
				break;
			case '4' :
				$arrRemedios[6][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralVegetalTR++;
				break;
			case '5' :
				$arrRemedios[6][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$mineralAnimalTR++;
				break;
			case '6' :
				$arrRemedios[6][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalAnimalTR++;
				break;
			case '7' :
				$arrRemedios[6][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$imponderableTR++;
				break;
		}
	}
}
//REMEDIOS 5
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
		Switch ($registro['pregnancia']){
			case '1' :
				$arrRemedios[5][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralTR++;
				break;
			case '2' :
				$arrRemedios[5][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalTR++;
				break;
			case '3' :
				$arrRemedios[5][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$animalTR++;
				break;
			case '4' :
				$arrRemedios[5][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralVegetalTR++;
				break;
			case '5' :
				$arrRemedios[5][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$mineralAnimalTR++;
				break;
			case '6' :
				$arrRemedios[5][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalAnimalTR++;
				break;
			case '7' :
				$arrRemedios[5][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$imponderableTR++;
				break;
		}
	}
}
//REMEDIOS 4
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
					'puros' => $registro['puros'], 
					'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralTR++;
				break;
			case '2' :
				$arrRemedios[4][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$vegetalTR++;
				break;
			case '3' :
				$arrRemedios[4][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$animalTR++;
				break;
			case '4' :
				$arrRemedios[4][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$mineralVegetalTR++;
				break;
			case '5' :
				$arrRemedios[4][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$mineralAnimalTR++;
				break;
			case '6' :
				$arrRemedios[4][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trVegetalAnimal_".$vegetalAnimalTR
				);               
				$vegetalAnimalTR++;
				break;
			case '7' :
				$arrRemedios[4][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
					'puros' => $registro['puros'], 
					'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);               
				$imponderableTR++;
					break;
		}
	}
}
//REMEDIOS 3
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
		'puros' => $registro['puros'], 
		'id' => "trMineral_".$mineralTR,
		'secuencia' => $registro['secuencia'],
		'idMatMed' => $registro['idMatMed']
		);
		$mineralTR++;
		break;
		case '2' :
		$arrRemedios[3][$registro['pregnancia']][] = array( 
		'nombre' => $registro['nombre'], 
		'tipoClasico' => $registro['tipoClasico'], 
		'tipoRemedioClave' => $registro['tipoRemedioClave'], 
		'tipoAvanzado' => $registro['tipoAvanzado'], 
		'puros' => $registro['puros'], 
		'id' => "trVegetal_".$vegetalTR,
		'secuencia' => $registro['secuencia'],
		'idMatMed' => $registro['idMatMed']
		);               
		$vegetalTR++;
		break;
		case '3' :
		$arrRemedios[3][$registro['pregnancia']][] = array( 
		'nombre' => $registro['nombre'], 
		'tipoClasico' => $registro['tipoClasico'], 
		'tipoRemedioClave' => $registro['tipoRemedioClave'], 
		'tipoAvanzado' => $registro['tipoAvanzado'], 
		'puros' => $registro['puros'], 
		'id' => "trAnimal_".$animalTR,
		'secuencia' => $registro['secuencia'],
		'idMatMed' => $registro['idMatMed']
		);               
		$animalTR++;
		break;
		case '4' :
		$arrRemedios[3][$registro['pregnancia']][] = array( 
		'nombre' => $registro['nombre'], 
		'tipoClasico' => $registro['tipoClasico'], 
		'tipoRemedioClave' => $registro['tipoRemedioClave'], 
		'tipoAvanzado' => $registro['tipoAvanzado'], 
		'puros' => $registro['puros'], 
		'id' => "trMineralVegetal_".$mineralVegetalTR,
		'secuencia' => $registro['secuencia'],
		'idMatMed' => $registro['idMatMed']
		);
		$mineralVegetalTR++;
		break;
		case '5' :
		$arrRemedios[3][$registro['pregnancia']][] = array( 
		'nombre' => $registro['nombre'], 
		'tipoClasico' => $registro['tipoClasico'], 
		'tipoRemedioClave' => $registro['tipoRemedioClave'], 
		'tipoAvanzado' => $registro['tipoAvanzado'], 
		'puros' => $registro['puros'], 
		'id' => "trMineralAnimal_".$mineralAnimalTR,
		'secuencia' => $registro['secuencia'],
		'idMatMed' => $registro['idMatMed']
		);               
		$mineralAnimalTR++;
		break;
		case '6' :
		$arrRemedios[3][$registro['pregnancia']][] = array( 
		'nombre' => $registro['nombre'], 
		'tipoClasico' => $registro['tipoClasico'], 
		'tipoRemedioClave' => $registro['tipoRemedioClave'], 
		'tipoAvanzado' => $registro['tipoAvanzado'], 
		'puros' => $registro['puros'], 
		'id' => "trVegetalAnimal_".$vegetalAnimalTR,
		'secuencia' => $registro['secuencia'],
		'idMatMed' => $registro['idMatMed']
		);               
		$vegetalAnimalTR++;
		break;
		case '7' :
		$arrRemedios[3][$registro['pregnancia']][] = array( 
		'nombre' => $registro['nombre'], 
		'tipoClasico' => $registro['tipoClasico'], 
		'tipoRemedioClave' => $registro['tipoRemedioClave'], 
		'tipoAvanzado' => $registro['tipoAvanzado'], 
		'puros' => $registro['puros'], 
		'id' => "trImponderable_".$imponderableTR,
		'secuencia' => $registro['secuencia'],
		'idMatMed' => $registro['idMatMed']
		);               
		$imponderableTR++;
		break;
		}
	}
}
//REMEDIOS 2
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
			'puros' => $registro['puros'], 
			'id' => "trMineral_".$mineralTR,
			'secuencia' => $registro['secuencia'],
			'idMatMed' => $registro['idMatMed']
			);
			$mineralTR++;
			break;
			case '2' :
			$arrRemedios[2][$registro['pregnancia']][] = array( 
			'nombre' => $registro['nombre'], 
			'tipoClasico' => $registro['tipoClasico'], 
			'tipoRemedioClave' => $registro['tipoRemedioClave'], 
			'tipoAvanzado' => $registro['tipoAvanzado'], 
			'puros' => $registro['puros'], 
			'id' => "trVegetal_".$vegetalTR,
			'secuencia' => $registro['secuencia'],
			'idMatMed' => $registro['idMatMed']
			);               
			$vegetalTR++;
			break;
			case '3' :
			$arrRemedios[2][$registro['pregnancia']][] = array( 
			'nombre' => $registro['nombre'], 
			'tipoClasico' => $registro['tipoClasico'], 
			'tipoRemedioClave' => $registro['tipoRemedioClave'], 
			'tipoAvanzado' => $registro['tipoAvanzado'], 
			'puros' => $registro['puros'], 
			'id' => "trAnimal_".$animalTR,
			'secuencia' => $registro['secuencia'],
			'idMatMed' => $registro['idMatMed']
			);               
			$animalTR++;
			break;
			case '4' :
			$arrRemedios[2][$registro['pregnancia']][] = array( 
			'nombre' => $registro['nombre'], 
			'tipoClasico' => $registro['tipoClasico'], 
			'tipoRemedioClave' => $registro['tipoRemedioClave'], 
			'tipoAvanzado' => $registro['tipoAvanzado'], 
			'puros' => $registro['puros'], 
			'id' => "trMineralVegetal_".$mineralVegetalTR,
			'secuencia' => $registro['secuencia'],
			'idMatMed' => $registro['idMatMed']
			);               
			$mineralVegetalTR++;
			break;
			case '5' :
			$arrRemedios[2][$registro['pregnancia']][] = array( 
			'nombre' => $registro['nombre'], 
			'tipoClasico' => $registro['tipoClasico'], 
			'tipoRemedioClave' => $registro['tipoRemedioClave'], 
			'tipoAvanzado' => $registro['tipoAvanzado'], 
			'puros' => $registro['puros'], 
			'id' => "trMineralAnimal_".$mineralAnimalTR,
			'secuencia' => $registro['secuencia'],
			'idMatMed' => $registro['idMatMed']
			);               
			$mineralAnimalTR++;
			break;
			case '6' :
			$arrRemedios[2][$registro['pregnancia']][] = array( 
			'nombre' => $registro['nombre'], 
			'tipoClasico' => $registro['tipoClasico'], 
			'tipoRemedioClave' => $registro['tipoRemedioClave'], 
			'tipoAvanzado' => $registro['tipoAvanzado'], 
			'puros' => $registro['puros'], 
			'id' => "trVegetalAnimal_".$vegetalAnimalTR,
			'secuencia' => $registro['secuencia'],
			'idMatMed' => $registro['idMatMed']
			);               
			$vegetalAnimalTR++;
			break;
			case '7' :
			$arrRemedios[2][$registro['pregnancia']][] = array( 
			'nombre' => $registro['nombre'], 
			'tipoClasico' => $registro['tipoClasico'], 
			'tipoRemedioClave' => $registro['tipoRemedioClave'], 
			'tipoAvanzado' => $registro['tipoAvanzado'], 
			'puros' => $registro['puros'], 
			'id' => "trImponderable_".$imponderableTR,
			'secuencia' => $registro['secuencia'],
			'idMatMed' => $registro['idMatMed']
			);               
			$imponderableTR++;
			break;
		}
	}
}
/*
*/




# TABLERO DE RESULTADOS
// Rotacion de etiquetas: http://jsfiddle.net/9pUu4/
?>
<script src="js/table_rotate.js"></script>
<div class="resultadoHeader">
	<h2><?=$txt['analisis_combinado']?></h2>
</div>
<!-- 
ancho de las columnas en 40px aproximadamente
dividir la tabla en hasta 20 columnas y armar otra tabla abajo
-->
<?
function is_checked( $key ){
	return true;
}
	?>
<pre>
<?
$display_columns = 4; # Cantidad de columnas a mostrar
$cols_limit = 0; # Limite de columnas a mostrar por cada tabla
$display_positions = false; # Muestra o no la fila con posiciones de los medicamentos
$display_mode = 'pdf'; # Determina como se muestra la tabla segun el medio donde se muestra

#var_dump($arrRemedios);

$cols = array();
foreach( $arrRemedios as $t_preg => $arr ){
	foreach( $arr as $x => $arr_datos ){
		foreach( $arr_datos as $y => $datos ){
			$suma = 0;
			//Clave
			$datos['tabla_clave'] = $datos['tipoRemedioClave'];
			$suma += is_checked('clave')?$datos['tabla_clave']:0;
			//Consonante
			$datos['tabla_consonante'] = $datos['puros'];
			$suma += is_checked('consonante')?$datos['tabla_consonante']:0;
			//Impregnancia
			$preg = $datos['id'];
			$preg = explode('_', $preg );
			$preg = strtolower( $preg[0] );
			switch( $preg ){
				case 'trmineral':
					$mineral = 1; $vegetal = 0; $animal = 0; break;
				case 'trvegetal':
					$mineral = 0; $vegetal = 1; $animal = 0; break;
				case 'tranimal':
					$mineral = 0; $vegetal = 0; $animal = 1; break;
				case 'trmineralvegetal':
					$mineral = 1; $vegetal = 1; $animal = 0; break;
				case 'trmineralanimal':
					$mineral = 1; $vegetal = 0; $animal = 1; break;
				case 'trvegetalanimal':
					$mineral = 0; $vegetal = 1; $animal = 1; break;
				case 'trimponderable':
					$mineral = 1; $vegetal = 0; $animal = 0; break;
			};
			$datos['tabla_impregnancia'] = 0;
			if( is_array( $aux_pregnancia ) )
				foreach( $aux_pregnancia as $var => $value ){
					if( $$var ) $datos['tabla_impregnancia'] = $value;
				}
			$suma += is_checked('impregnancia')?$datos['tabla_impregnancia']:0;
			//RSM
			$datos['rsm'] = $t_preg;
			$datos['tabla_rsm'] = ( $datos['rsm'] >= $limite_rsm ? 2 : 1 );
			$suma += is_checked('rsm')?$datos['tabla_rsm']:0;
			//Secuencia
			$datos['tabla_secuencia'] = ( strstr( $datos['secuencia'], $aux_secuencia ) ? 1 : 0 );
			$suma += is_checked('secuencia')?$datos['tabla_secuencia']:0;
			//SUMA
			$datos['suma'] = $suma;
			$datos['align'] = 'center';
			$cols[] = $datos;
		}
	}
}
usort($cols, 'sortBySUM');
$cols = array_reverse($cols);
#var_dump($cols);
$tablas = ceil( sizeof($cols) / $display_columns );
$col_pos = 0;
$col_limit = sizeof( $cols );
# Correcion de valores
if( $display_mode == 'screen' ) $tablas = 1;
if( $display_mode == 'screen' ) $display_columns = $col_limit;
?></pre>
<?php
if( is_array( $cols ) ) {
?>
<table class="mytable tablero" border="0" cellpadding="0" cellspacing="0" id="resultado_combinado">
	<thead>
		<tr>
			<th><?=$txt['medicamento']?></th>
			<th><?=$txt['suma']?></th>
			<th><?=$txt['list_rsm']?></th>
			<th><?=$txt['list_impregnancia']?></th>
			<th><?=$txt['list_secuencia']?></th>
			<th><?=$txt['list_consonante']?></th>
			<th><?=$txt['list_clave']?></th>
		</tr>
	</thead>
	<tbody>
<?
}
for( $x = 0; $x < sizeof($cols) ; $x++){
	?>
	<tr>
		<td class="medicamento"><?=$cols[$x]['nombre']?></td>
		<td><?=$cols[$x]['suma']?></td>
		<td><?=$cols[$x]['tabla_rsm']?></td>
		<td><?=$cols[$x]['tabla_impregnancia']?></td>
		<td><?=$cols[$x]['tabla_secuencia']?></td>
		<td><?=$cols[$x]['tabla_consonante']?></td>
		<td><?=$cols[$x]['tabla_clave']?></td>
	</tr>
	<?
}
if( is_array( $cols ) ){
	?>
	</tbody>
</table>
	<?
}
?>
<div class="sombra_saparador" ></div>




































	<h2><?=$txt['analisis_desplegado']?></h2>
<table width="100%" border="0" cellpadding="4" cellspacing="0" id="resultados" align="center"> <thead>
            <tr>
                <th colspan="2" align="center"><?=$txt['reino']?></th>
                <th id="nombre"><?=$txt['medicamento']?></th>
                <th colspan="2" align="center"><?=$txt['rsm']?><br /><span><?=$txt['rsm_aclaracion']?></span></th>
                <th class="th_chico"><?=$txt['consonantes']?></th>
                <th class="th_chico"><?=$txt['clave']?></th>
				<th class="th_chico"><?=$txt['secuencia']?></th>
            </tr></thead>
<?php
//REMEDIOS 9
$tabla = mysql_query( "SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE 1=1 AND id LIKE '$clave%'" );
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

Switch ($registro['pregnancia'])

  {
		default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_vegetal'].'" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '9'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm9.gif" class="rsm_bar" alt="9" />';?>
	  </td>
      <td class="colum_puros" align="center">
<?php
Switch ($registro['puros']) //dice Switch ($registro['col_puros']) y en los demas dice Switch ($registro['puros']) Si lo pongo igual que los demas cambia y ponde SI en consonantes
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;

	       break;
	  }
?></td>
      <td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=( strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
<?php
//REMEDIOS 8
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']) {
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
	Switch ($registro['col_d']){
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
	Switch ($registro['col_c']){
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
		Switch ($registro['pregnancia']){
			default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
			case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_mineral'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_mineral'].'" class="pildora" /></td>' ;
		  	break;
			case '2' :
				echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'"  class="pildora"  /></td>' ;
			break;
			case '3' :
				echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
			break;
			case '4' :
				echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
			break;
			case '5' :
				echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
			break;
			case '6' :
			echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
			break;
			case '7' :
				echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
			break;
  }
?>
		<td class="nombres"><?php echo $registro['nombre'] . ' ';// imprime el nombre ?></td>
		<td align="center" class="valor"><?php echo '8'; // imprime el nombre ?></td>
		<td align="center" class="barrita"><?php echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm8.gif" class="rsm_bar" alt="8" />';?></td>
		<td class="colum_puros" align="center"><?=$registro['puros']?'<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />':'' ?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' :'' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
        <!-- Remedios 7 -->
        
<?php
//REMEDIOS 7
//$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
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
Switch ($registro['pregnancia'])

  {
	  default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_mineral'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_mineral'].'" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal" ><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal" <td width="10%" align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '7'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm7.gif" class="rsm_bar" alt="7" />';?>
	  </td>
      <td class="colum_puros" align="center"><?php
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;

	       break;
	  }
?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=( strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
        
        <!-- Remedios 7 -->
<?php
//REMEDIOS 6
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
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

Switch ($registro['pregnancia'])

  {
	  default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_mineral'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_mineral'].'" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'" class="pildora" /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '6'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm6.gif" class="rsm_bar" alt="6" />';?>
	  </td>
      <td class="colum_puros" align="center"><?php
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;

	       break;
	  }
?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=( strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
<?php
//REMEDIOS 5
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto, tipoAvanzado, puros, col_c, col_d, pregnancia, secuencia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
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
	  default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_mineral'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_mineral'].'" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '5'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm5.gif" class="rsm_bar" alt="5" />';?>
	  </td>
      <td class="colum_puros" align="center"><?php
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;

	       break;
	  }
?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
<?php
//REMEDIOS 4
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
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

Switch ($registro['pregnancia'])

  {
	  default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_mineral'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_mineral'].'" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '4'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm4.gif" class="rsm_bar" alt="4" />';?>
	  </td>
      <td class="colum_puros" align="center"><?php
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;

	       break;
	  }
?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=( strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
<?php
//REMEDIOS 3
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
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

Switch ($registro['pregnancia'])

  {
	  default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_mineral'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_mineral'].'" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '3'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm3.gif" class="rsm_bar" alt="3" />';?>
	  </td>
      <td class="colum_puros" align="center"><?php
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;

	       break;
	  }
?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=( strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
<?php
//REMEDIOS 2
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
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

Switch ($registro['pregnancia'])

  {
	  default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">'.$txt['label_mineral'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="'.$txt['label_mineral'].'" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">'.$txt['label_vegetal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].'"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">'.$txt['label_animal'].'</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="'.$txt['label_animal'].'" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_vegetal'].'" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="'.$txt['label_mineral'].' - '.$txt['label_animal'].'" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="'.$txt['label_vegetal'].' - '.$txt['label_animal'].'"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="'.$txt['label_imponderable'].'"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '2'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm2.gif" class="rsm_bar" alt="2" />';?>
	  </td>
      <td class="colum_puros" align="center"><?php
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;

	       break;
	  }
?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
<td class="colum_puros" align="center"><?=( strstr( $registro['secuencia'], $aux_secuencia ) ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		</tbody>
</table>
<!-- FIN listado Tabla -->
<?php echo $html_resultados ?>
<!--   fin RESULTADOS DEL ALGORITMO   -->        
        <img src="algoritmo10/resultado/images-pdf/sombra_head.png"  alt="" name="sombra_head" id="sombra_head" />
        <!-- Referencias Tabla -->
      <table width="75%" align="center" class="referencias_tabla">
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral.gif" alt="<?=$txt['label_mineral']?>"  class="pildora"  /></td>
        <td align="left"><?=$txt['label_mineral']?></td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/vegetal.gif" alt="<?=$txt['label_vegetal']?>"  class="pildora"  /></td>
        <td align="left"><?=$txt['label_vegetal']?></td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/animal.gif" alt="<?=$txt['label_animal']?>"  class="pildora"  /></td>
        <td align="left"><?=$txt['label_animal']?></td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/imponderable.gif" alt="<?=$txt['label_imponderable']?>"  class="pildora"  /></td>
        <td align="left"><?=$txt['label_imponderable']?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="90%" align="center">
      <tr>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral_vegetal.gif" alt="<?=$txt['label_mineral']?>-<?=$txt['label_vegetal']?>"  class="pildora"  /></td>
        <td align="left"><?=$txt['label_mineral']?>/<?=$txt['label_vegetal']?></td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral_animal.gif" alt="<?=$txt['label_mineral']?>-<?=$txt['label_animal']?>"  class="pildora"  /></td>
        <td align="left"><?=$txt['label_mineral']?>/<?=$txt['label_animal']?></td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/vegetal_animal.gif" alt="<?=$txt['label_vegetal']?>-<?=$txt['label_animal']?>"  class="pildora"  /></td>
        <td align="left"><?=$txt['label_vegetal']?>/<?=$txt['label_animal']?></td>
      </tr>
    </table></td>
  </tr>
</table>
      <!-- FIN Referencias Tabla -->

  </div>
	
</div> <!-- FIN  Div Contenedor-->

</body>
</html>
