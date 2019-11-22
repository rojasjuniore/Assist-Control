<?php
include_once 'vd.php';	

$txt['label_tipo'] = 'Tipo';
$txt['label_buscar'] = 'Buscar';
$txt['value_todos'] = '-Todos';
$txt['value_humano'] = 'Humano';
$txt['value_animal'] = 'Animal';
$txt['boton_buscar'] = 'Buscar';
$txt['titulo_tipo'] = 'Tipo';
$txt['titulo_fecha'] = 'Fecha';
$txt['titulo_nombre'] = 'Nombre/Dueño';
$txt['titulo_apodo'] = 'Apodo/Nombre animal';
$txt['link_ver'] = 'Ver';
$txt['sin_resultados'] = 'No se encuentran estudios guardados';
$txt['formato_fecha'] = '%d/%m/%Y %H:%i:%s';
switch( $_GET['lang'] ){
	case 'en':
		$txt['label_tipo'] = 'Type';
		$txt['label_buscar'] = 'Search';
		$txt['value_todos'] = '-All';
		$txt['value_humano'] = 'Human';
		$txt['value_animal'] = 'Animal';
		$txt['boton_buscar'] = 'Search';
		$txt['titulo_tipo'] = 'Type';
		$txt['titulo_fecha'] = 'Date';
		$txt['titulo_nombre'] = 'Name/Owner';
		$txt['titulo_apodo'] = 'Nickname/Pet Name';
		$txt['link_ver'] = 'See';
		$txt['sin_resultados'] = 'No saved studies were found';
		$txt['formato_fecha'] = '%m/%d/%Y %r';
		break;
}

$user =& JFactory::getUser();
$id_usuario = $user->get('id');

$s_tipo = $_POST['s_tipo'];
$s_texto = $_POST['s_texto'];

$result = mysql_query( "
	SELECT e.*, DATE_FORMAT( e.fecha, '".$txt['formato_fecha']."' ) fecha 
	FROM estudios_realizados e 
	WHERE id_usuario = '".$id_usuario."' ".
		( $s_tipo != '' ? " AND tipo = '".$s_tipo."' " : '' ).
		( $s_texto != '' ? " AND (
								h_nombre LIKE '".$s_texto."%' 
								OR h_apellido LIKE '".$s_texto."%' 
								OR h_identifica LIKE '".$s_texto."%' 
								OR a_especie  LIKE '".$s_texto."%' 
								OR a_duenio  LIKE '".$s_texto."%' 
								OR a_animal  LIKE '".$s_texto."%' 
							)" : '' ).
	"ORDER BY e.fecha DESC
" );
?>
<style>
.tabla_estudios{
	border: thin solid darkblue;
	clear:both;
	width:100%;
}
.tabla_estudios td{
	border-bottom: thin solid darkblue;
	padding:.2em;
}
</style>
<div id="contenedor">
<div id="campos_form">
<form name="form1" method="post" action="<?=$_SERVER['PHP_SELF']?>?<?=$_SERVER['QUERY_STRING']?>">
<p><label for="s_tipo"><?=$txt['label_tipo']?></label>
<select name="s_tipo" id="s_tipo">
	<option <?=$s_tipo==''?'selected':''?> value=""><?=$txt['value_todos']?></option>
	<option <?=$s_tipo=='humano'?'selected':''?> value="humano"><?=$txt['value_humano']?></option>
	<option <?=$s_tipo=='animal'?'selected':''?> value="animal"><?=$txt['value_animal']?></option>
</select>
</p>
<p>
<label for="s_texto"><?=$txt['label_buscar']?>:</label>
<input type="text" name="s_texto" id="s_texto" value="<?=$s_texto?>" />
</p>
<p><label for="Enviar"></label><input type="submit" value="<?=$txt['boton_buscar']?>" id="Enviar" /></p>
</form>
</div>
<table class="tabla_estudios">
	<thead>
		<tr>
			<th><?=$txt['titulo_tipo']?></th>
			<th><?=$txt['titulo_fecha']?></th>
			<th><?=$txt['titulo_nombre']?></th>
			<th><?=$txt['titulo_apodo']?></th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php
if( !mysql_num_rows($result) ){
?>
		<tr>
			<td colspan="6"><?=$txt['sin_resultados']?></td>
		</tr>
<?php
} else {
	while( $reg = mysql_fetch_object( $result ) ){
		$id = 5;
		$Itemid = 30;
		if( $reg->tipo == 'animal'){
			$id = 69;
			$Itemid = 30;
		}
?>
		<tr>
			<td><?=$txt[ 'value_'.strtolower( $reg->tipo )]?></td>
			<td><?=$reg->fecha?></td>
			<td><?=ucfirst( $reg->tipo == 'humano' ? $reg->h_nombre.' '.$reg->h_apellido : $reg->a_duenio )?></td>
			<td><?=ucfirst( $reg->tipo == 'humano' ? $reg->h_identifica : $reg->a_animal )?></td>
			<td><a href="index.php?option=com_content&view=article&id=<?=$id?>&Itemid=<?=$Itemid?>&id_estudio=<?=$reg->id?>&lang=<?=$_GET['lang']?>"><?=$txt['link_ver']?></a></td>
		</tr>
<?php
	}
}
?>
	</tbody>
	<tfoot></tfoot>
</table>
</div>