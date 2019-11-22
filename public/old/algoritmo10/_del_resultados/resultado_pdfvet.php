<?php
include dirname( __FILE__ ).'/../../vd.php';
$letras1='A I P Y Z';
$letras2='B J Q';
$letras3='C K R';
$letras4='L S';
$letras5='D T';
$letras6='E M U';
$letras7='F N V W';
$letras8='G Ñ X';
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

$owner = strtoupper($_POST['owner']); /*aca decia 'last'*/
$especie = strtoupper($_POST['especie']); /*aca decia 'name'*/
$petName = strtoupper($_POST['petName']); /*aca decia 'last'*/
$einiciales = strtoupper($_POST['iniciales']);

$dia=$_POST['day'];
$mes=$_POST['month'];
$anio=$_POST['year'];
/*$lug_nac=$_POST['lug_nac'];*/

$fecha=$dia . $mes . $anio;
$pregnancia=0;
$trinomio1 = 0;
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
$tope = strlen($petName);
$tope++;

for ($i=0;$i<$tope;$i++) {

	 $vocal = substr($petName,$i,1);

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

$apodolast = $especie . $owner;
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
$tope = strlen($especie);
$tope++;

for ($i=0;$i<$tope;$i++) {

	if (substr($especie,$i,2) == 'CH') {
	   $tengoch++;
  	}
	if (substr($especie,$i,2) == 'LL') {
	   $tengoll++;
	}
}

$tope = strlen($owner);
for ($i=0;$i<$tope;$i++) {

	if (substr($owner,$i,2) == 'CH') {
	   $tengoch =$tengoch + 8;
  	}
	if (substr($owner,$i,2) == 'LL') {
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

$day=$day - 1;

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultado del Estudio - Algoritmo Candegabe</title>
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
$mesesPDF=array('','Enero','Febrero', 
'Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 
'Noviembre','Diciembre'); 
echo ''.$diaPDF.' de '    .$mesesPDF[$mes].' de '.$anoPDF; 

?>
</td>
			</tr>
		</table>
		
		<table  width="100%" border="0" cellpadding="0" cellspacing="0" id="data_imp">
  <tr>
    <td><table width="100%" cellpadding="7" id="data_pac">
        <tr>
          <td class="etiqueta" width="30%">Especie:</td>
          <td><?php echo strtoupper($especie);?></td>
        </tr>
        <tr>
          <td class="etiqueta">Nombre del Due&ntilde;o</td>
          <td><?php echo strtoupper($owner);?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%">Nombre del Animal:</td>
          <td><?php echo strtoupper ($petName);?></td>
        </tr>
        <tr>
          <td class="etiqueta" width="30%">Fecha de Nacimiento:</td>
          <td><?php echo strtoupper ($dia);?> / <?php echo strtoupper ($mes);?> / <?php echo strtoupper ($anio);?></td>
        </tr>
</table></td>
    <td width="30%"><table width="100%" id="imp_table">
      <tr>
        <td><p class="imp_imp">Impregnancia</p>
          <p class="imp_sim">Simetr&iacute;a</p>          <?php
Switch ($pregnancia)
	 {
	         case 1 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria1.png" alt="Impregnancia Simetría 1" /> 
				<!-- Simetría 1 -->
			<div class="simetriaPorcentaje">
			  <p class="porcentajeMenor">15% Vegetal</p>
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
				  <p class="porcentajeMayor">50% Vegetal</p>
				</div>
				<!-- Simetría 2 END -->' ;
		       break;
			 case 3 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria3.png" alt="Impregnancia Simetría 3"  /> 
				<!-- Simetría 3 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">20% Animal</p>
				  <p class="porcentajeMedio">40% Vegetal</p>
				  <p class="porcentajeMedioL">40% Mineral</p>
				</div>
				<!-- Simetría 3 END -->' ;
		       break;
			 case 4 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria4.png" alt="Impregnancia Simetría 4" /> 
				<!-- Simetría 4 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMenor">15% Vegetal</p>
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
				  <p class="porcentajeMedio">35% Vegetal</p>
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
				  <p class="porcentajeMayor">50% Vegetal</p>
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
				  <p class="porcentajeMedioL">40% Vegetal</p>
				</div>
				<!-- Simetría 7 END -->' ;
		       break;
			 case 8 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria8.png" alt="Impregnancia Simetría 8" /> 
				<!-- Simetría 8 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMayor">15% Animal</p>
				  <p class="porcentajeMedio">35% Vegetal</p>
				  <p class="porcentajeMenor">50% Mineral</p>
				</div>
				<!-- Simetría 8 END -->' ;
		       break;
			 case 9 :
               echo '<img src="algoritmo10/resultado/images-pdf/simetria9.png" alt="Impregnancia Simetría 9" /> 
				<!-- Simetría 9 -->
				<div class="simetriaPorcentaje">
				  <p class="porcentajeMedioR">33% Vegetal</p>
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
                <th colspan="2" align="center">Reino</th>
                <th id="nombre">Medicamento</th>
                <th colspan="2" align="center">RSM<br />                  <span>(Rango de Semejanza Matem&aacute;tico)</span></th>
                <th class="th_chico">Consonantes</th>
                <th class="th_chico">Clave</th>
            </tr></thead> <tbody>
<?php
//REMEDIOS 9
$tabla = mysql_query( "SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE 1=1 AND id LIKE '$clave%'" );
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");while ($registro = mysql_fetch_array($tabla)) {
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal" ><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal" <td width="10%" align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal" class="pildora" /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
$tabla = mysql_query("SELECT idMatMed, id, tipoRemedioClave, tipoPolicresto,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre FROM cremedios_dos WHERE id LIKE '$clave%'");
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
               echo '<tr class="vegetal"><td align="center">Vegetal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal.gif" width="40" height="20" alt="Vegetal"  class="pildora"  /></td>' ;
		  break;
          case '3' :
               echo '<tr class="animal"><td  align="center">Animal</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/animal.gif" width="40"  height="20" alt="Animal" class="pildora" /></td>' ;
		  break;
	  case '4' :
               echo '<tr class="mineral_vegetal"><td align="center">Min/Veg</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_vegetal.gif"  width="40" height="20" alt="Mineral - Vegetal" class="pildora"  /></td>' ;
		  break;
          case '5' :
               echo '<tr class="mineral_animal"><td  align="center">Min/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/mineral_animal.gif" width="40" height="20" alt="Mineral - Animal" class="pildora"  /></td>' ;
		  break;
          case '6' :
               echo '<tr class="vegetal_animal"><td  align="center">Veg/Ani</td><td align="center" class="pregnancia"><img src="'.$_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/images-pdf/vegetal_animal.gif" width="40" height="20" alt="Vegetal - Animal"  class="pildora"  /></td>' ;
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
        <td align="left">Vegetal</td>
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
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral_vegetal.gif" alt="Mineral-Vegetal"  class="pildora"  /></td>
        <td align="left">Mineral/Vegetal</td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/mineral_animal.gif" alt="Mineral-Animal"  class="pildora"  /></td>
        <td align="left">Mineral/Animal</td>
        <td width="8%" align="center"><img src="algoritmo10/resultado/images-pdf/vegetal_animal.gif" alt="Vegetal-Animal"  class="pildora"  /></td>
        <td align="left">Vegetal/Animal</td>
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
$mesesPDF=array('','Enero','Febrero', 
'Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre', 
'Noviembre','Diciembre'); 
echo 'A los '.$diaPDF.' días del mes de '    .$mesesPDF[$mes].' del año '.$anoPDF;',' 

?><br />
    AlgoritmoCandegabe.com deja constancia de la realización<br />
    del Estudio Algorítmico solicitado para el paciente de especie <?php echo strtolower($especie);?> 
    <br />
    Nombre: <span class="nombre-cert"><?php echo strtoupper($petName);?></span><br />
        Dueño: <span class="nombre-cert"><?php echo strtoupper($owner);?></span><br />

    Conforme a las disposiciones y reglamento vigentes las 
    <br />
    autoridades extienden el correspondiente certificado.
     </div>
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
        Dpto. de Inform&aacute;tica</td>
        <td><span>Dr. Marcelo Candegabe</span><br />
        Director</td>
        <td><span>Fernando Gasc&oacute;</span><br />
        Administrador</td>
      </tr>
    </table>
  </div>
</div><!-- FIN  Div Certificado-->
</body>
</html>
