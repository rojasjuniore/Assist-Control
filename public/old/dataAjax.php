<?php
include dirname( __FILE__ ).'/vd.php';
$m = $_REQUEST['m'];
$u = intval( $_REQUEST['u'] );
switch( $m ){
	case 'm':
		$resultados = mysql_query( "
			UPDATE jos_vodes_credits 
				SET credit = credit - 1 
			WHERE 1=1 
				AND userid = '".$u."'
		" );
		echo 1;
	break;
	case 'c':
		$resultados = mysql_query( "
			SELECT credit 
			FROM jos_vodes_credits 
			WHERE 1=1 
				AND userid = '".$u."'
		" );
		if( $resultados ){
			$r = mysql_fetch_object( $resultados );
			echo $r->credit;
			mysql_free_result( $resultados );
		}		
	break;
}
?>

