<?php
include_once 'vd.php';	
$user =& JFactory::getUser();
$id_usuario = $user->get('id');

$tipo = $tipo;
if( $tipo == 'humano' ){
	$h_nombre = $_POST['name'];
	$h_apellido = $_POST['lastName'];
	$h_identifica = $_POST['apodo'];
	$h_iniciales = $_POST['iniciales'];
	$h_dia = intval( $_POST['day'] );
	$h_mes = intval( $_POST['month'] );
	$h_anio = intval( $_POST['year'] );
	$h_pais = $_POST['lug_nac'];
} elseif( $tipo == 'animal' ){
	$a_especie = $_POST['especie'];
	$a_duenio = $_POST['owner'];
	$a_animal = $_POST['petName'];  
	$a_iniciales = $_POST['iniciales']; 
	$a_dia = intval( $_POST['day'] );
	$a_mes = intval( $_POST['month'] );
	$a_anio = intval( $_POST['year'] );
}
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

if( $tipo == 'humano' || $tipo == 'animal' ) {
	mysql_query( "
		INSERT INTO estudios_realizados 
		SET 
			id_usuario = '".$id_usuario."', 
			tipo = '".$tipo."', 
			h_nombre = '".$h_nombre."', 
			h_apellido = '".$h_apellido."', 
			h_identifica = '".$h_identifica."', 
			h_iniciales = '".$h_iniciales."', 
			h_dia = '".$h_dia."', 
			h_mes = '".$h_mes."', 
			h_anio = '".$h_anio."', 
			h_pais = '".$h_pais."',
			a_especie = '".$a_especie."', 
			a_duenio = '".$a_duenio."', 
			a_animal = '".$a_animal."', 
			a_iniciales = '".$a_iniciales."', 
			a_dia = '".$a_dia."', 
			a_mes = '".$a_mes."', 
			a_anio = '".$a_anio."', 
			ip = '".$ip."', 
			user_agent = '".$user_agent."', 
			fecha = NOW() 
	" );
}

$id_estudio = mysql_insert_id();
$id = 5;
$Itemid = 30;
if( $tipo == 'animal'){
	$id = 69;
	$Itemid = 30;
}
header("Location:http://".$_SERVER['HTTP_HOST']."/index.php?option=com_content&view=article&id=".$id."&Itemid=".$Itemid."&id_estudio=".$id_estudio.'&lang='.$lang);
?>