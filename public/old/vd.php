<?php
	$conexion = mysql_connect(
		'db519878634.db.1and1.com', # host
		'dbo519878634', #User
		'%CH4P3lc0&' #pass
	); // se conecta con el servidor
	mysql_select_db( 'db519878634', $conexion ); // selecciona la base de datos
	
if( !function_exists( 'sortBySUM' ) ) {
	function sortBySUM($a, $b) {
		/*
		$x = $a['suma'];
		$y = $b['suma'];
		if( $x == $y ) return 0;
		else return ($x>$y) ? 1 : -1 ;
		*/
		return $a['suma'] - $b['suma'];
	}
}

$txt['tooltip_actualizar_resultado'] = 'Esta opci&oacute;n permite al home&oacute;pata realizar m&aacute;s de un estudio por paciente si es que hay dudas respecto de alg&uacute;n dato ingresado.';
$txt['tooltip_impregnancia'] = 'El estudio destaca primeramente la Impregnancia que significa: una aproximaci&oacute;n porcentual respecto de la tendencia del paciente hacia la estructura de los reinos: mineral, vegetal y animal.';

switch ( $_GET['lang'] ) {
	case 'en':
		$txt['tooltip_actualizar_resultado'] = 'This option alow the homeopath to do more than one study for a patient if you have doubts about some of the entered data.';
		$txt['tooltip_impregnancia'] = 'The study will first emphasize the Impregnancy: an approximation (percentage) to the patient&acute;s tendency towards the structure of the mineral, vegetal and animal kingdoms';
		break;
}

?>
