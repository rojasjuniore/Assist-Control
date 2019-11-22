<?php
include dirname( __FILE__ ).'/../../vd.php';
require_once('calculo_datos_estudio.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Study Results - Candegabe Algorithm</title>
<link href="algoritmo10/resultado/resultado_pdfv2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="contenedor">
  <div id="cabecera">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="encabezado">
			<tr>
				<td><img src="algoritmo10/resultado/images-pdf/algoritmo-logo.png" width="32" height="32" alt="Algoritmo Candegabe Logo" /></td>
				<td width="30%" align="right" valign="bottom"><?php
$diaPDF=date('d');$mesPDF=date('n');$anoPDF=date('Y'); 
echo ''.$meses[$mesPDF].' '.$diaPDF.', '.$anoPDF; 
?>
</td>
			</tr>
		</table><table  width="100%" border="0" cellpadding="0" cellspacing="0" id="data_imp">
  <tr>
    <td><table width="100%" cellpadding="7" id="data_pac">
        <tr>
          <td class="etiqueta" width="30%">Name and Last name:</td>
          <td class="nom-ape"><?php echo strtoupper($nombre);?> <?php echo strtoupper($last);?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%">Name Normally Used:</td>
          <td><?php echo strtoupper ($apodo);?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%">Date of Birth:</td>
          <td><?php echo strtoupper ($mes);?> / <?php echo strtoupper ($dia);?> / <?php echo strtoupper ($anio);?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%">Place of Birth:</td>
          <td><?php echo strtoupper ($lug_nac);?></td>
        </tr>
        </table></td>
    <td width="30%"><table width="100%" id="imp_table">
      <tr>
        <td><p class="imp_imp">Impregnancy</p>
          <p class="imp_sim">Symmetry</p>          <?php
Switch ($pregnancia)
	 {
	         case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria1.png" alt="Impregnancia Simetría 1" /> 
				<!-- Simetría 1 -->
			<div class="simetriaPorcentaje">
			  <p class="porcentajeMenor">15% Vegetable</p>
			  <p class="porcentajeMedio">35% Mineral</p>
			  <p class="porcentajeMayor">50% Animal</p>
			</div>
			<!-- Simetría 1 END -->' ;
		       break;
		     case 2 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria2.png" alt="Impregnancia Simetría 2" /> 
				<!-- Simetría 2 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% Mineral</p>
				  <p class="porcentajeMedio">35% Animal</p>
				  <p class="porcentajeMayor">50% Vegetable</p>
				</div>
				<!-- Simetría 2 END -->' ;
		       break;
			 case 3 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria3.png" alt="Impregnancia Simetría 3"  /> 
				<!-- Simetría 3 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">20% Animal</p>
				  <p class="porcentajeMedio">40% Vegetable</p>
				  <p class="porcentajeMedioL">40% Mineral</p>
				</div>
				<!-- Simetría 3 END -->' ;
		       break;
			 case 4 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria4.png" alt="Impregnancia Simetría 4" /> 
				<!-- Simetría 4 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% Vegetable</p>
				  <p class="porcentajeMedio">35% Animal</p>
				  <p class="porcentajeMayor">50% Mineral</p>
				</div>
				<!-- Simetría 4 END -->' ;
		       break;
			 case 5 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria5.png" alt="Impregnancia Simetría 5" /> 
				<!-- Simetría 5 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% Mineral</p>
				  <p class="porcentajeMedio">35% Vegetable</p>
				  <p class="porcentajeMayor">50% Mineral</p>
				</div>
				<!-- Simetría 5 END -->' ;
		       break;
			 case 6 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria6.png" alt="Impregnancia Simetría 6" /> 
				<!-- Simetría 6 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% Animal</p>
				  <p class="porcentajeMedio">35% Mineral</p>
				  <p class="porcentajeMayor">50% Vegetable</p>
				</div>
				<!-- Simetría 6 END -->
				' ;
		       break;
			 case 7 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria7.png" alt="Impregnancia Simetría 7" /> 
				<!-- Simetría 7 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">20% Mineral</p>
				  <p class="porcentajeMedio">40% Animal</p>
				  <p class="porcentajeMedioL">40% Vegetable</p>
				</div>
				<!-- Simetría 7 END -->' ;
		       break;
			 case 8 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria8.png" alt="Impregnancia Simetría 8" /> 
				<!-- Simetría 8 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMayor">15% Animal</p>
				  <p class="porcentajeMedio">35% Vegetable</p>
				  <p class="porcentajeMenor">50% Mineral</p>
				</div>
				<!-- Simetría 8 END -->' ;
		       break;
			 case 9 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria9.png" alt="Impregnancia Simetría 9" /> 
				<!-- Simetría 9 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMedioR">33% Vegetable</p>
				  <p class="porcentajeMedio">33% Mineral</p>
				  <p class="porcentajeMedioL">33% Animal</p>
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
          $pdf->page_text(500, 780, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0,0,0));

        }
        </script>
<!-- FIN Page Numbering-->
<table width="100%" border="0" cellpadding="4" cellspacing="0" id="resultados" align="center"> <thead>
            <tr>
                <th colspan="2" align="center">Kingdom</th>
                <th id="nombre">Remedy</th>
                <th colspan="2" align="center">MSR<br />                  <span>(<span id="result_box" xml:lang="en" lang="en">Mathematical Similarity Range</span>)</span></th>
                <th class="th_chico">Consonants</th>
                <th class="th_chico">Key Remedies</th>
            </tr></thead> <tbody>
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
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
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
default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
		  break;
  }
?>   	  <td class="nombres">
<?php
	  echo $registro['nombre'] . ' '; // imprime el nombre
      ?>
      </td>
      <td align="center" class="valor"><?php
	  echo '8'; // imprime el nombre
	  ?>
	  </td> <td align="center" class="barrita"><?php
	  echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/rsm8.gif" class="rsm_bar" alt="8" />';?>
	  </td>
      <td class="colum_puros" align="center"><?php
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ; //en la columna de Consonantes (puros) no muestra nada.
	       break;
		     case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' ;
//en la columna de Consonantes (puros) debe mostrar pelotita (mirar arriba el img. entre '')
	       break;
	  }
?></td>
<td class="colum_puros" align="center"><?=( $registro['tipoRemedioClave'] ? '<img src="algoritmo10/resultado/images-pdf/punto_azul.gif" class="punto_azul" alt="" />' : '' )?></td>
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
<?php
//REMEDIOS 7
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");while ($registro = mysql_fetch_array($tabla)) {
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
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal" ><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal" <td width="10%" align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
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
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
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
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable" class="pildora" /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
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
</tr>
      <?php
  }

}
?>
		  </td>
        </tr>
<?php
//REMEDIOS 5
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
   if ($haycold AND $haycole && !$haycolc) {

Switch ($registro['pregnancia'])

  {
	  default: echo '<tr><td>&nbsp;</td>&nbsp;</td>'; break;
          case '1' :
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif" width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
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
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
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
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
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
               echo '<tr class="mineral"><td align="center">Mineral</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral.gif"  width="40" height="20" alt="Mineral" class="pildora" /></td>' ;
		  break;
          case '2' :
               echo '<tr class="vegetal"><td align="center">Vegetable</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetable"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetable" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetable - Animal"  class="pildora"  /></td>' ;
		  break;
          case '7' :
               echo '<tr class="imponderable"><td align="center">Impond</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/imponderable.gif" width="40" height="20" alt="Imponderable"  class="pildora"  /></td>' ;
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
</tr>
      <?php
  }

}
?>
		</tbody></table><!-- FIN listado Tabla -->
        
        <img src="algoritmo10/resultado/images-pdf/sombra_head.png"  alt="" name="sombra_head" id="sombra_head" />
        <!-- Referencias Tabla -->
      <table width="75%" align="center" class="referencias_tabla">
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0">
      <tr>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral.gif" alt="mineral"  class="pildora"  /></td>
        <td align="left">Mineral</td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/vegetal.gif" alt="vegetal"  class="pildora"  /></td>
        <td align="left">Vegetable</td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/animal.gif" alt="animal"  class="pildora"  /></td>
        <td align="left">Animal</td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/imponderable.gif" alt="Imponderable"  class="pildora"  /></td>
        <td align="left">Imponderable</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="90%" align="center">
      <tr>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral_vegetal.gif" alt="Mineral-Vegetable"  class="pildora"  /></td>
        <td align="left">Mineral/Vegetable</td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral_animal.gif" alt="Mineral-Animal"  class="pildora"  /></td>
        <td align="left">Mineral/Animal</td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/vegetal_animal.gif" alt="Vegetable-Animal"  class="pildora"  /></td>
        <td align="left">Vegetable/Animal</td>
      </tr>
    </table></td>
  </tr>
</table>
      <!-- FIN Referencias Tabla -->

  </div>
	
</div> <!-- FIN  Div Contenedor-->
<DIV style="page-break-after:always"></DIV>

<div id="Certificado">
  <div id="logo-cert"><img src="algoritmo10/resultado/images-pdf/logo_certificado.jpg" alt="Logo Algoritmo Candegabe"  /></div>
  <div id="texto-cert" style="font-family:Georgia, 'Times New Roman', Times, serif; font-style:italic"><?php
$diaPDF=date('d');$mesPDF=date('n');$anoPDF=date('Y'); 
$mesesPDF=array('','January','February', 
'March','April','May','June','July','August','September','October', 
'November','December'); 
echo 'On the '.$diaPDF.' day of '    .$mesesPDF[$mes].' from the year '.$anoPDF;',' 

?>
    <br />
AlgoritmoCandegabe.com certifies the realization of the Algorithmic Study requested for the patient <br />
<span class="nombre-cert"><?php echo strtoupper($nombre);?> <?php echo strtoupper($last);?></span><br />
In accordance with the regulation currently in force, we issue this certificate. </div>
  <div id="codigo-sello"><img src="algoritmo10/resultado/images-pdf/codigo-sello.jpg" alt="Código y sello Algoritmo Candegabe"   /></div>
  <div id="firmas">
    <table width="100%">
      <tr>
        <td width="33%" align="center"><img src="algoritmo10/resultado/images-pdf/firma_yantorno.jpg" class="firma_yantorno" alt="Firma Yantorno"  /></td>
        <td width="34%" align="center"><img src="algoritmo10/resultado/images-pdf/firma_candegabe.jpg" class="firma_candegabe" alt="Firma Candegabe"  /></td>
        <td width="33%" align="center"><img src="algoritmo10/resultado/images-pdf/firma_gasco.jpg" class="firma_gasco" alt="Firma Gasco"  /></td>
      </tr>
      <tr>
        <td><span>Enrique Yantorno</span><br />
        Tecnology Department</td>
        <td><span>Dr. Marcelo Candegabe</span><br />
        Director</td>
        <td><span>Fernando Gasc&oacute;</span><br />
        Administrator</td>
      </tr>
    </table>
  </div>
</div><!-- FIN  Div Certificado-->
</body>
</html>
