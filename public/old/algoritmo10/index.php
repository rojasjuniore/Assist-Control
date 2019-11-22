<?php
	session_start();

	ob_start();
	ob_implicit_flush(0);
		include 'public_html/site_algoritmo/algoritmo10/resultado_pdf.php';
		$resultado = ob_get_contents();
	ob_end_clean();
	ob_flush();

	$_SESSION['public_html/site_algoritmo/algoritmo10/resultado_pdf'] = $resultado;

	ob_start();
	ob_implicit_flush(0);
		include 'public_html/site_algoritmo/algoritmo10/index3.php';
		$resultado = ob_get_contents();
	ob_end_clean();
	ob_flush();

	//echo str_replace( '</body>', '<a href="public_html/site_algoritmo/algoritmo10/exportar_pdf.php">Guardar como PDF (libreria: DomPDF)</a></body>', $resultado );
	echo $resultado;
?>