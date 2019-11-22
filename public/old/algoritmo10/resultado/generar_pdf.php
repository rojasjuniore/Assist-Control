<?php
if( $resultado && $usuario ){
	ini_set( 'memory_limit', '128M' );
	# Libreria DOMPDF
	if( end( explode( '/', $_SERVER['PHP_SELF'] ) ) != end( explode( '/', __FILE__ ) ) ){
		require_once $_SERVER['DOCUMENT_ROOT']."/algoritmo10/_lib/dompdf/0.5.1/dompdf_config.inc.php";
	} else {
		$usuario = ( $GLOBALS['usuario'] ? $GLOBALS['usuario'] : $_REQUEST['usuario'] );
		$resultado = ( $GLOBALS['resultado'] ? $GLOBALS['resultado'] : $_REQUEST['resultado'] );
		require_once dirname( __FILE__ )."/../_lib/dompdf/0.5.1/dompdf_config.inc.php";
	}
	# Creamos PDF
	$dompdf = new DOMPDF();	
	$dompdf->load_html( $resultado );	
	$dompdf->set_paper( 'a4', 'portrait' );	
	$dompdf->render();
	
	$descarga = true;
	$lang = $_GET['lang'] != '' ? $_GET['lang'] : 'es';
	$file_pdf = 'algoritmo-candegabe-'.$lang.'-'.$nombre.'-'.$last;
	if( $descarga ){
		# Configuramos opciones de streaming del PDF
		$options = array( "Attachment" => "1" ); //0 = display; 1 = download;
		# Enviamos el PDF
		$dompdf->stream($file_pdf.".pdf",$options);
	} else {
		$archivo = $dompdf->output();	
	
		$file = $_SERVER['DOCUMENT_ROOT'].'/algoritmo10/resultado/temppdf/'.$usuario.'.pdf';
		# Eliminamos archivo fisico
		if( is_file( $file ) ) unlink( $file );
		# Bajamos a archivo fisico
		file_put_contents( $file, $archivo );
		echo file_get_contents( $file );
	}
}
?>