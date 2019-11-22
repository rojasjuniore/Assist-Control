<?php
require_once('../../vd.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/matmed_screen.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div class="remedioWrapper">
<?
$idRemedio = intval( $_GET['id'] );
$tabla = mysql_query("SELECT * FROM matmed WHERE idMatMed = $idRemedio"); 
while ($registro = mysql_fetch_assoc($tabla)) { 
?>
	<div class="remedioHeader"><img src="http://<?=$_SERVER['HTTP_HOST']?>/algoritmo10/fotos_remedios/<?php echo $registro['nombreImagen']; ?>" alt="<?php echo $registro['nombreRemedio'] ; ?>"/> <span class="nombreRemedio"><?php echo $registro['nombreRemedio'] ; ?></span></div>
	<div class="repertorio">
		<?
		$desc = $registro['descRemedio'];
		if(
			substr( $desc, 0, 2 ) == '<?'
			|| substr( $desc, 0, 5 ) == '<?php'
		){
			if( substr( $desc, 0, 5 ) == '<?php' ) $desc = substr( $desc, 5, strlen($desc) );
			elseif( substr( $desc, 0, 2 ) == '<?' ) $desc = substr( $desc, 2, strlen($desc) );
			if( substr( $desc, -2 ) == '?>' ) $desc = substr( $desc, 0, -2 );
			#var_dump($desc);
			eval( $desc );
		} else {
			echo str_replace("\n", "<br>", $registro['descRemedio'] ); 
		}
		?>
	</div>
	<div class="pie">Aviso Legal: La informaci&oacute;n de cada uno de los medicamentos es suministrada por los usuarios para ser publicada por la Universidad Candegabe de Homeopat&iacute;a de manera gratuita, raz&oacute;n por la cual la Universidad Candegabe de Homeopat&iacute;a no se responsabiliza por origen de la misma.</div>
<?php
}
mysql_close($conexion) ;
?>
</div>
</body>
</html>