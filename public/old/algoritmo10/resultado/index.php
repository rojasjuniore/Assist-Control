<?php
	session_start();

	ob_start();
	ob_implicit_flush(0);
		include '../site_algoritmo/algoritmo10/resultado/resultado_pdf.php';
		$resultado = ob_get_contents();
	ob_end_clean();
	ob_flush();

	$_SESSION['../site_algoritmo/algoritmo10/resultado/resultado_pdf'] = $resultado;

	ob_start();
	ob_implicit_flush(0);
		include '../site_algoritmo/algoritmo10/resultado/index3.php';
		$resultado = ob_get_contents();
	ob_end_clean();
	ob_flush();

	//echo str_replace( '</body>', '<a href="../www/algoritmo09/resultado/exportar_pdf.php">Guardar como PDF (libreria: DomPDF)</a></body>', $resultado );
	echo $resultado;
?>