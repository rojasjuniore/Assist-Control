<?php
$id_estudio = intval( $_GET['id_estudio'] );
$rs = mysql_query( "SELECT * FROM estudios_realizados WHERE id_usuario = '".$user->get('id')."' AND id = '".$id_estudio."'" );
$estudio = mysql_fetch_object( $rs );

$usuario =  $_GET['userId'];	
$email = str_replace( '(arr)', '@', $_GET['emailUser'] );
/*
$file = 'temppdf/'.$usuario.'.pdf';
if( is_file( $file ) ){
	# Enviamos por Mail
	$mail = new PHPMailer(false); //New instance, with exceptions enabled		
	$body             	= "Candegabe Algorithm Study Result Attached";		
	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   	= true;                  // enable SMTP authentication
	$mail->Port       	= 25;                    // set the SMTP server port
	$mail->Host			= "mail.universidadcandegabe.org"; // SMTP server
	$mail->Username		= "info@algoritmocandegabe.com";     // SMTP server username
	$mail->Password		= "cande3875";            // SMTP server password
	$mail->From       	= "info@algoritmocandegabe.com";
	$mail->FromName   	= "Resultado Algoritmo";
	$mail->AddAddress( $email );
	$mail->AddCC ( 'universidadcandegabe@gmail.com', 'segunda persona' );
	$mail->AddAttachment( $file );  
	$mail->Subject  = "Resultado Algoritmo (".$usuario."-".date("Ymdhis").")";
	$mail->MsgHTML( $body );
	$mail->IsHTML( true ); // send as HTML
	$mail->Send();

	$file = file_get_contents( $file );
	echo $file;
	flush();
} else {
	// no session data, redirect using header('Location: ...')?
}
exit(0);
*/
# Levantamos resultado
ob_start();
ob_implicit_flush(0);
	include '/algoritmo10/resultado/resultado_pdfeng.php?id_estudio='.$id_estudio;
	$resultado = ob_get_contents();
ob_end_clean();
ob_flush();	
# Libreria DOMPDF
require_once $_SERVER['DOCUMENT_ROOT']."/algoritmo10/_lib/dompdf/0.5.2/dompdf_config.inc.php";
# Creamos PDF
$dompdf = new DOMPDF();	
$dompdf->load_html( $resultado );	
$dompdf->set_paper( 'a4', 'portrait' );	
$dompdf->render();
$archivo = $dompdf->output();	
/*
# Eliminamos archivo fisico
unlink( 'temppdf/'.$usuario.'.pdf' );
# Bajamos a archivo fisico
file_put_contents( 'temppdf/'.$usuario.'.pdf', $archivo ); 
# Levantamos pagina a mostrar
ob_start();
ob_implicit_flush(0);
	include '/algoritmo10/resultado/index3_eng.php';
	$resultado = ob_get_contents();
ob_end_clean();
ob_flush();
# Volcamos resultados
echo "resultado=".$resultado;
*/
?>