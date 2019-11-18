<?php
$txt['titulo'] = 'Análisis combinado';
$txt['label_filtros'] = 'Mostrar';
$txt['label_rsm'] = 'RSM';
$txt['label_impregnancia'] = 'Impregnancia';
$txt['label_secuencia'] = 'Secuencia';
$txt['label_consonante'] = 'Consonante';
$txt['label_clave'] = 'Clave';
$txt['label_filtrar'] = 'Filtrar';
$txt['list_rsm'] = 'RSM';
$txt['list_impregnancia'] = 'Impregnancia';
$txt['list_secuencia'] = 'Secuencia';
$txt['list_consonante'] = 'Consonantes';
$txt['list_clave'] = 'Claves';
$txt['suma'] = 'Suma';
$txt['tooltip_analisis_combinado'] = 'Analisis Combinado';
$txt['tooltip_analisis_desplegado'] = 'Analisis Desplegado';
switch( $_GET['lang'] ){
	case 'en':
		$txt['titulo'] = 'Combined Analysis';
		$txt['label_filtros'] = 'Show';
		$txt['label_rsm'] = 'MSR';
		$txt['label_impregnancia'] = 'Impregnancy';
		$txt['label_secuencia'] = 'Sequence';
		$txt['label_consonante'] = 'Consonant';
		$txt['label_clave'] = 'Key Remedy';
		$txt['label_filtrar'] = 'Filter';
		$txt['list_rsm'] = 'MSR';
		$txt['list_impregnancia'] = 'Impregnancy';
		$txt['list_secuencia'] = 'Sequence';
		$txt['list_consonante'] = 'Consonant';
		$txt['list_clave'] = 'Key Remedy';
		$txt['suma'] = 'Sum';
		$txt['tooltip_analisis_combinado'] = '';
		$txt['tooltip_analisis_desplegado'] = '';
		break;
}

# TABLERO DE RESULTADOS
// Rotacion de etiquetas: http://jsfiddle.net/9pUu4/
?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- <script src="js/table_rotate.js"></script> -->
<div class="resultadoHeader">
	<h2><a href="#tablero"><?=$txt['titulo']?></a>  <img src="/static/img/icon-16-info.png" title="<?=$txt['tooltip_analisis_combinado']?>" class="tooltip-icon" /></h2>
</div>
<div>
<!-- 
ancho de las columnas en 40px aproximadamente
dividir la tabla en hasta 20 columnas y armar otra tabla abajo
-->
	<form name="formfiltros" action="<?=$_SERVER['PHP_SELF']?>" method="get">
<?
foreach ($_GET as $key => $value) {
	if( !is_array($_GET[$key]) ) echo("<input type='hidden' name='".$key."' value='".$value."'/>");
}
function ischecked( $key ){
	if( !isset($_GET['filtro'])||in_array($key,$_GET['filtro']) ) $ret = true;
	else $ret = false;
	return $ret;
}
function add_filter( $filter, $txt ){
	echo '<input type="checkbox" name="filtro[]" value="'.$filter.'" id="filtro_'.$filter.'" '.(ischecked( $filter )?'checked':'').' style="display:none" /><label for="filtro_'.$filter.'" class="btnFiltroSec '.(ischecked( $filter )?'cur':'').'">'.ucfirst($txt['label_'.$filter]).'</label>';
}
?>
	<strong><?=$txt['label_filtros']?>:</strong>
	<?
	add_filter('rsm', $txt);
	add_filter('impregnancia', $txt);
	add_filter('secuencia', $txt);
	add_filter('consonante', $txt);
	add_filter('clave', $txt);
	?>
	<input type="submit" value="<?=$txt['label_filtrar']?>">
	</form>
<script>
$( "label.btnFiltroSec" ).click(function() {
  $(this).toggleClass( "cur" );
});
</script>
<pre>
<?
$display_columns = 22; # Cantidad de columnas a mostrar
$cols_limit = 0; # Limite de columnas a mostrar por cada tabla
$display_positions = false; # Muestra o no la fila con posiciones de los medicamentos
$display_mode = 'screen'; # Determina como se muestra la tabla segun el medio donde se muestra
#var_dump($arrRemedios);
$cols = array();
foreach( $arrRemedios as $t_preg => $arr ){
	foreach( $arr as $x => $arr_datos ){
		foreach( $arr_datos as $y => $datos ){
			$suma = 0;
			//Clave
			$datos['tabla_clave'] = $datos['tipoRemedioClave'];
			$suma += ischecked('clave')?$datos['tabla_clave']:0;
			//Consonante
			$datos['tabla_consonante'] = $datos['puros'];
			$suma += ischecked('consonante')?$datos['tabla_consonante']:0;
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
			$suma += ischecked('impregnancia')?$datos['tabla_impregnancia']:0;
			//RSM
			$datos['rsm'] = $t_preg;
			$datos['tabla_rsm'] = ( $datos['rsm'] >= $limite_rsm ? 2 : 1 );
			$suma += ischecked('rsm')?$datos['tabla_rsm']:0;
			//Secuencia
			$datos['tabla_secuencia'] = ( strstr( $datos['secuencia'], $aux_secuencia ) ? 1 : 0 );
			$suma += ischecked('secuencia')?$datos['tabla_secuencia']:0;
			//SUMA
			$datos['suma'] = $suma;
			$datos['align'] = 'center';
			$cols[$datos['idMatMed']] = $datos;
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
<?
// https://css-tricks.com/rotated-table-column-headers/
/* Vertical 
<style type="text/css">
.table-header-rotated {
  border-collapse: collapse;
}
 .table-header-rotated td {
  width: 30px;
}
.table-header-rotated th {
  padding: 5px 10px;
}
.table-header-rotated td {
  /*text-align: center;* /
  padding: 10px 5px;
}
 .table-header-rotated th.rotate {
  height: 200px;
  white-space: nowrap;
}
 .table-header-rotated th.rotate > div {
  -webkit-transform: rotate(270deg);
          transform: rotate(270deg);
  /*-webkit-transform: translate(25px, 51px) rotate(270deg);*/
          /*transform: translate(25px, 51px) rotate(270deg);* /
  width: 30px;
}
 .table-header-rotated th.rotate > div > span {
  padding: 5px 10px;
}
.table-header-rotated th.row-header {
  padding: 0 10px;
}
</style>
*/
?>

<?
/* Horizontal */
?>
<style type="text/css">
.table-header-rotated {
  border-collapse: collapse;
}
 .table-header-rotated td {
  width: 30px;
}
.table-header-rotated th {
  padding: 5px 10px;
}
.table-header-rotated td {
  /*text-align: center;*/
  padding: 10px 5px;
}
.table-header-rotated th.row-header {
  padding: 0 10px;
}
</style>

<div id="tablero" style="overflow:auto">
<?php
for( $x = 0; $x < $tablas ; $x++){
	$cols_limit += $display_columns;
?>
<table class="table-header-rotated tablero" border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		$medicamento = $cols[$col_x]['nombre'];
		if( $col_x == $col_pos ) {
			?><td></td><?
		}
	?>
			<th class="titulos rotate" style="vertical-align:bottom;cursor:pointer" onClick="document.getElementById('matmed-<?=$cols[$col_x]['idMatMed']?>').click()" title="<?=$medicamento?>"><div><span><?=$medicamento?></span></div></th>
		<?
	}
?>
		</tr>
	</thead>
	<tbody>
	<?
if( $display_positions ) {
	?>
		<!-- Posiciones -->	
		<tr>
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		if( $col_x == $col_pos ) {
			?><td style="white-space:nowrap"></td><?
		}
	?>
			<td align="center" title="<?=$cols[$col_x]['nombre']?> - Posición"><em><?=$col_x+1?></em></td>
		<?
	}
?>
		</tr>
<?
}
?>
		<tr><!-- SUMA -->
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		if( $col_x == $col_pos ) {
			?>
<td style="white-space:nowrap;border-width:thick"><em><strong><?=$txt['suma']?></strong></em></td><?
		}
	?>
			<td align="<?=$cols[$col_x]['align']?>" title="<?=$cols[$col_x]['nombre']?> - SUMA" style="border-width:thick"><em><strong><?=$cols[$col_x]['suma']?></strong></em></td>
		<?
	}
?>
		</tr>
<?
if( ischecked('rsm') ){
?>
		<tr id="tablero_rsm"><!-- RSM -->
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		$rsm = $cols[$col_x]['tabla_rsm'];
		if( $col_x == $col_pos ) {
			?>
<td style="white-space:nowrap">1) <?=$txt['list_rsm']?></td><?
		}
	?>
			<td align="<?=$cols[$col_x]['align']?>" title="<?=$cols[$col_x]['nombre']?> - <?=$txt['label_rsm']?>"><?=$rsm?></td>
		<?
	}
?>
		</tr>
<?
}
?>
<?
if( ischecked('impregnancia') ){
?>
		<tr id="tablero_impregnancia"><!-- Impregnancia -->
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		$impregnancia = $cols[$col_x]['tabla_impregnancia'];
		if( $col_x == $col_pos ) {
			?>
<td style="white-space:nowrap">2) <?=$txt['list_impregnancia']?></td><?
		}
	?>
			<td align="<?=$cols[$col_x]['align']?>" title="<?=$cols[$col_x]['nombre']?> - <?=$txt['label_impregnancia']?>"><?=$impregnancia?></td>
		<?
	}
?>
		</tr>
<?
}
?>
<?
if( ischecked('secuencia') ){
?>
		<tr id="tablero_secuencia"><!-- Secuencia -->
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		$secuencia = $cols[$col_x]['tabla_secuencia'];
		if( $col_x == $col_pos ) {
			?>
<td style="white-space:nowrap">3) <?=$txt['list_secuencia']?></td><?
		}
	?>
			<td align="<?=$cols[$col_x]['align']?>" title="<?=$cols[$col_x]['nombre']?> - <?=$txt['label_secuencia']?>"><?=$secuencia?></td>
		<?
	}
?>
		</tr>
<?
}
?>
<?
if( ischecked('consonante') ){
?>
		<tr id="tablero_consonantes"><!-- Remedios Consonantes -->
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		$consonante = $cols[$col_x]['tabla_consonante'];
		if( $col_x == $col_pos ) {
			?>
<td style="white-space:nowrap">4) <?=$txt['list_consonante']?></td><?
		}
	?>
			<td align="<?=$cols[$col_x]['align']?>" title="<?=$cols[$col_x]['nombre']?> - <?=$txt['label_consonantes']?>"><?=$consonante?></td>
		<?
	}
?>
		</tr>
<?
}
?>
<?
if( !isset($_GET['filtro'])||in_array('clave',$_GET['filtro']) )
{
?>
		<tr id="tablero_clave"><!-- Remedios Clave -->
<?
	$col_x = $col_pos;
	for( $col_x; $col_x < $cols_limit && $col_x < sizeof($cols) ; $col_x++ ){
		$clave = $cols[$col_x]['tabla_clave'];
		if( $col_x == $col_pos ) {
			?>
<td style="white-space:nowrap">5) <?=$txt['list_clave']?></td><?
		}
	?>
			<td align="<?=$cols[$col_x]['align']?>" title="<?=$cols[$col_x]['nombre']?> - <?=$txt['label_clave']?>"><?=$clave?></td>
		<?
	}
?>
		</tr>
<?
}
?>
	</tbody>
</table>
<br>
<?php
	$col_pos = $col_x;
}
?>
</div>
</div>
<div class="sombra_saparador"></div>