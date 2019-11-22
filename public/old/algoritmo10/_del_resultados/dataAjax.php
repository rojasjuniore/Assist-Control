<?php

header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");

header("Last-Modified: " . gmdate("D, d M Y H:i:S") . " GMT");

header("Cache-Control: no-store, no-cache, must-revalidate");

header("Cache-Control: post-check=0, pre-check=0", false);

header("Pragma: no-cache");



include dirname( __FILE__ ).'/../../vd.php';

$usuarioNombre = (int) $_GET["z"];

mysql_query( "UPDATE jos_vode_credits SET credit=credit-1 WHERE userid= $usuarioNombre" );

echo "1";

?>

