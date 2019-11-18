<?
# Reconsutrimos los datos a utilizar. En caso de ser un estudio 'animal' hay que presetear los valore
// Los valores tienen que venir preseteados
/*
$last = (!isset($last)?$estudio->h_apellido:$last);
$nombre = (!isset($nombre)?$estudio->h_nombre:$nombre);
$apodo = (!isset($apodo)?$estudio->h_identifica:$apodo);
$einiciales = (!isset($einiciales)?$estudio->h_iniciales:$einiciales);
$dia = (!isset($dia)?$estudio->h_dia:$dia);
$mes = (!isset($mes)?$estudio->h_mes:$mes);
$anio = (!isset($anio)?$estudio->h_anio:$anio);
$pais = (!isset($pais)?$estudio->h_pais:$pais);
*/
# Preparamos las variables del estudio
$last = strtoupper($last);
$nombre = strtoupper($nombre);
$apodo = strtoupper($apodo);
$einiciales = strtoupper($einiciales);
$dia = intval( $dia );
$mes = intval( $mes );
$anio = intval( $anio );
$pais = strtoupper($pais);
##################################
$mineralTR = 1;
$animalTR = 1;
$vegetalTR = 1;
$mineralVegetalTR = 1;
$mineralAnimalTR = 1;
$vegetalAnimalTR = 1;
$imponderableTR = 1;
$clasico = "";
$policresto = "";
$avanzado = "";

$letras1 = 'A I P Y Z';
$letras2 = 'B J Q';
$letras3 = 'C K R';
$letras4 = 'L S';
$letras5 = 'D T';
$letras6 = 'E M U';
$letras7 = 'F N V W';
$letras8 = 'G &ntilde; X';
$letras9 = 'H O';
$vocales = 'A E I O U Y';
$vocanum = '1 6 1 9 6 1';
$consonantes = 'B C CH D F G H J K L LL M P Q R R S T V X Y Z';
$tabla1_1 = explode(' ',$letras1);
$tabla1_2 = explode(' ',$letras2);
$tabla1_3 = explode(' ',$letras3);
$tabla1_4 = explode(' ',$letras4);
$tabla1_5 = explode(' ',$letras5);
$tabla1_6 = explode(' ',$letras6);
$tabla1_7 = explode(' ',$letras7);
$tabla1_8 = explode(' ',$letras8);
$tabla1_9 = explode(' ',$letras9);
$tabla_vocales = explode(' ',$vocales);
$tabla_vocanum = explode(' ',$vocanum);
$tabla_consonantes = explode(' ',$consonantes);
$numeros='5 2 9 1 3 9 1 8 8';
$tabla2= explode(' ',$numeros);

$fecha = $dia . $mes . $anio;
$pregnancia = 0;
$trinomio1 = 0;
$flag9 = false;
$flag8 = false;
$flag7 = false;
$flag6 = false;
$flag5 = false;
$flag4 = false;
$flag3 = false;
$flag2 = false;
$filtroRsm9 = "";
$filtroRsm8 = "";
$filtroRsm7 = "";
$filtroRsm6 = "";
$filtroRsm5 = "";
$filtroRsm4 = "";
$filtroRsm3 = "";
$filtroRsm2 = "";
$arrRemedios = '';
$tope = strlen($fecha);
$tope++;
for( $i = 0 ; $i < $tope ; $i++ ){
	if (substr($fecha,$i,1) > 0) {
		$pregnancia = $pregnancia + intval(substr($fecha,$i,1));
		$puntero = substr($fecha,$i,1);
		$puntero = $puntero -1;
		$trinomio1 = $trinomio1 + $tabla2[$puntero];
	}
}
if ($trinomio1 > 9) {
	$trinomio11 = substr($trinomio1,0,1);
    $trinomio12 = substr($trinomio1,1,1);
    $trinomio13 = substr($trinomio1,2,1);
	$trinomio1 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($trinomio1 > 9) {
	$trinomio11 = substr($trinomio1,0,1);
    $trinomio12 = substr($trinomio1,1,1);
    $trinomio13 = substr($trinomio1,2,1);
	$trinomio1 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($pregnancia > 9) {
	$trinomio11 = substr($pregnancia,0,1);
    $trinomio12 = substr($pregnancia,1,1);
    $trinomio13 = substr($pregnancia,2,1);
	$pregnancia = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($pregnancia > 9) {
	$trinomio11 = substr($pregnancia,0,1);
    $trinomio12 = substr($pregnancia,1,1);
    $trinomio13 = substr($pregnancia,2,1);
	$pregnancia = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
$trinomio2=0;
$tope = strlen($apodo);
$tope++;
$aux_secuencia = '';
for( $i = 0 ; $i < $tope ; $i++ ){
	 $vocal = substr( $apodo, $i, 1 );
	 Switch( $vocal )
	 {
		case 'A' :
			$trinomio2 = $trinomio2 + 1;
			$aux_secuencia .= 1;
			break;
		case 'E' :
			$trinomio2 = $trinomio2 + 6;
			$aux_secuencia .= 6;
			break;
		case 'I' :
			$trinomio2 = $trinomio2 + 1;
			$aux_secuencia .= 1;
			break;
		case 'O' :
			$trinomio2 = $trinomio2 + 9;
			$aux_secuencia .= 9;
			break;
		case 'U' :
			$trinomio2 = $trinomio2 + 6;
			$aux_secuencia .= 6;
			break;
		case 'Y' :
			$trinomio2 = $trinomio2 + 1;
			$aux_secuencia .= 1;
			break;
	 }
}
if ($trinomio2 > 9) {
	$trinomio11 = substr($trinomio2,0,1);
    $trinomio12 = substr($trinomio2,1,1);
    $trinomio13 = substr($trinomio2,2,1);
	$trinomio2 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($trinomio2 > 9) {
	$trinomio11 = substr($trinomio2,0,1);
	$trinomio12 = substr($trinomio2,1,1);
	$trinomio13 = substr($trinomio2,2,1);
	$trinomio2 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
$apodolast = $nombre . $last;
$tope = strlen($apodolast);
$tope++;
$sumatodo = 0;
for( $i = 0 ; $i < $tope ; $i++ ) {
	$letra = substr($apodolast,$i,1);
	if (in_array($letra, $tabla1_1)) {
		$sumatodo = $sumatodo + 1;
	}
	if (in_array($letra, $tabla1_2)) {
		$sumatodo = $sumatodo + 2;
	}
	if (in_array($letra, $tabla1_3)) {
		$sumatodo = $sumatodo + 3;
	}
	if (in_array($letra, $tabla1_4)) {
		$sumatodo = $sumatodo + 4;
	}
	if (in_array($letra, $tabla1_5)) {
		$sumatodo = $sumatodo + 5;
	}
	if (in_array($letra, $tabla1_6)) {
		$sumatodo = $sumatodo + 6;
	}
	if (in_array($letra, $tabla1_7)) {
		$sumatodo = $sumatodo + 7;
	}
	if (in_array($letra, $tabla1_8)) {
		$sumatodo = $sumatodo + 8;
	}
	if (in_array($letra, $tabla1_9)) {
		$sumatodo = $sumatodo + 9;
	}
}
$tengoch = 0;
$tengoll = 0;
$tope = strlen($nombre);
$tope++;
for ($i=0;$i<$tope;$i++) {
	if (substr($nombre,$i,2) == 'CH') {
	   $tengoch++;
  	}
	if (substr($nombre,$i,2) == 'LL') {
	   $tengoll++;
	}
}
$tope = strlen($last);
for ($i=0;$i<$tope;$i++) {
	if (substr($last,$i,2) == 'CH') {
	   $tengoch =$tengoch + 8;
  	}
	if (substr($last,$i,2) == 'LL') {
	   $tengoll =$tengoll + 3;
	}
}
$sumatodo = $sumatodo - $tengoch - $tengoll;
if ($sumatodo > 9) {
	$trinomio11 = substr($sumatodo,0,1);
    $trinomio12 = substr($sumatodo,1,1);
    $trinomio13 = substr($sumatodo,2,1);
	$sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
if ($sumatodo > 9) {
	$trinomio11 = substr($sumatodo,0,1);
    $trinomio12 = substr($sumatodo,1,1);
    $trinomio13 = substr($sumatodo,2,1);
	$sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
Switch ($sumatodo){
	case 1 :
		$col_1 = 4;
		$col_2 = 5;
		$col_3 = 8;
		break;
	case 2 :
		$col_1 = 1;
		$col_2 = 7;
		$col_3 = 9;
		break;
	case 3 :
		$col_1 = 5;
		$col_2 = 6;
		$col_3 = 9;
		break;
	case 4 :
		$col_1 = 1;
		$col_2 = 2;
		$col_3 = 8;
		break;
	case 5 :
		$col_1 = 1;
		$col_2 = 3;
		$col_3 = 4;
		break;
	case 6 :
		$col_1 = 3;
		$col_2 = 7;
		$col_3 = 9;
		break;
	case 7 :
		$col_1 = 2;
		$col_2 = 6;
		$col_3 = 8;
		break;
	case 8 :
		$col_1 = 4;
		$col_2 = 5;
		$col_3 = 7;
		break;
	case 9 :
		$col_1 = 2;
		$col_2 = 3;
		$col_3 = 6;
		break;
}
$doscifras = true;
$tope = strlen($einiciales);
$tope++;
$iniciales=0;
$viniciales=$einiciales;
for ($i=0;$i<$tope;$i++) {
	$letra = substr($viniciales,$i,1);
	if (in_array($letra, $tabla1_1)) {
		$iniciales = $iniciales + 1;
	}
	if (in_array($letra, $tabla1_2)) {
		$iniciales = $iniciales + 2;
	}
	if (in_array($letra, $tabla1_3)) {
		$iniciales = $iniciales + 3;
	}
	if (in_array($letra, $tabla1_4)) {
		$iniciales = $iniciales + 4;
	}
	if (in_array($letra, $tabla1_5)) {
		$iniciales = $iniciales + 5;
	}
	if (in_array($letra, $tabla1_6)) {
		$iniciales = $iniciales + 6;
	}
	if (in_array($letra, $tabla1_7)) {
		$iniciales = $iniciales + 7;
	}
	if (in_array($letra, $tabla1_8)) {
		$iniciales = $iniciales + 8;
	}
	if (in_array($letra, $tabla1_9)) {
		$iniciales = $iniciales + 9;
	}
}
if ($iniciales > 9) {
	$trinomio11 = substr($iniciales,0,1);
    $trinomio12 = substr($iniciales,1,1);
    $trinomio13 = substr($iniciales,2,1);
	$iniciales = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
}
Switch ($iniciales){
	case 1 :
		$col_i1 = 4;
		$col_i2 = 5;
		$col_i3 = 8;
		break;
	case 2 :
		$col_i1 = 1;
		$col_i2 = 7;
		$col_i3 = 9;
		break;
	case 3 :
		$col_i1 = 5;
		$col_i2 = 6;
		$col_i3 = 9;
		break;
	case 4 :
		$col_i1 = 1;
		$col_i2 = 2;
		$col_i3 = 8;
		break;
	case 5 :
		$col_i1 = 1;
		$col_i2 = 3;
		$col_i3 = 4;
		break;
	case 6 :
		$col_i1 = 3;
		$col_i2 = 7;
		$col_i3 = 9;
		break;
	case 7 :
		$col_i1 = 2;
		$col_i2 = 6;
		$col_i3 = 8;
		break;
	case 8 :
		$col_i1 = 4;
		$col_i2 = 5;
		$col_i3 = 7;
		break;
	case 9 :
		$col_i1 = 2;
		$col_i2 = 3;
		$col_i3 = 6;
		break;
}
$day = $dia - 1;
$month1 = substr($mes,0,1);
$month2 = substr($mes,1,1);
$year = $anio;
$year1 = substr($year,1,1);
$year2 = substr($year,2,1);
$year3 = substr($year,3,1);
$year4 = substr($year,4,1);
$cyear = $year1 + $year2 + $year3 + $year4;
$clave = $trinomio1 . $trinomio2 . '%';


/**** 
HTML RESULTADOS
****/
/*

$txt['animal'] = 'Animal';
$txt['vegetal'] = 'Vegetal';
$txt['mineral'] = 'Mineral';
switch( $_GET['lang'] ){
	case 'en':
		$txt['animal'] = 'Animal';
		$txt['vegetal'] = 'Vegatable';
		$txt['mineral'] = 'Mineral';
		break;
}

$limite_rsm = 3;
$html_resultados = '';

$html_resultados .= '<tbody>';
//REMEDIOS 9
$html_resultados .=  "<!-- Remedios 9 -->";
$tabla = mysql_query(
	"SELECT idMatMed, id, tipoClasico, tipoRemedioClave, tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia
	FROM cremedios_dos 
	WHERE 1=1 
		AND id LIKE '".$clave."%'
" );
while ($registro = mysql_fetch_array($tabla)) {
	$limite_rsm = 5;
	$haycolc = false;
	$haycold = false;
	$haycole = false;
	Switch ($registro['col_c']){
		case $col_1 :
			$haycolc = true;
			break;
		case $col_2 :
			$haycolc = true;
			break;
		case $col_3 :
			$haycolc = true;
			break;
	}
	Switch ($registro['col_d']){
		case $col_1 :
			$haycold = true;
			break;
		case $col_2 :
			$haycold = true;
			break;
		case $col_3 :
			$haycold = true;
			break;
	}
	Switch ($registro['col_c']){
		case $col_i1 :
			$haycole = true;
			break;
		case $col_i2 :
			$haycole = true;
			break;
		case $col_i3 :
			$haycole = true;
			break;
	}
	if ($haycolc AND $haycold AND $haycole) {
		Switch ($registro['pregnancia']) {
			case '1' :
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$html_resultados .= '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
				$mineralTR++;
				break;
			case '2':
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$html_resultados .= '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
				$vegetalTR++;
				break;
			case '3':
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$html_resultados .= '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
				$animalTR++;
			break;
			
			case '4':
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$html_resultados .= '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
				$mineralVegetalTR++;
			break;
			case '5' :
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$html_resultados .= '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
				$mineralAnimalTR++;
			break;
			case '6' :
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$html_resultados .= '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
				$vegetalAnimalTR++;
				break;
			case '7' :
				$arrRemedios[9][$registro['pregnancia']][] = array( 
					'nombre' => $registro['nombre'], 
					'tipoClasico' => $registro['tipoClasico'], 
					'tipoRemedioClave' => $registro['tipoRemedioClave'], 
					'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
					'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
				);
				$html_resultados .= '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
				$imponderableTR++;
				break;
		  }
		  $html_resultados .= '<td class="nombres">';
		if( $user->get('usertype') == 'Author' ){
			$html_resultados .= '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
		} else {
			$html_resultados .= '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
		}
		$html_resultados .= '
		</td>
		<td class="valor">9 <!--imprime el nombre--></td>
		<td class="barrita"><img src="algoritmo10/resultado/rsm-9.gif" width="61" height="10" alt="9" /></td>
		<td class="colum_puros">';
		
		if( $user->get('usertype') != 'Author' ){
			Switch ($registro['puros']){ //dice Switch ($registro['col_puros']) y en los demas dice Switch ($registro['puros']) Si lo pongo igual que los demas cambia y ponde SI en consonantes
				case 0 :
					$html_resultados .= '' ;
					break;
				case 1 :
					$html_resultados .=  '&middot;' ;
					break;
			}
		} else {
			$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
		}
		$html_resultados .= '
		</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
	  </tr>';
	}
}
$html_resultados .= '
		  </td>
        </tr></p>';
//REMEDIOS 8
$tabla = mysql_query(
	"SELECT idMatMed, id, tipoClasico, tipoRemedioClave, tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia
	FROM cremedios_dos 
	WHERE id LIKE '".$clave."%'"
);
while ($registro = mysql_fetch_array($tabla)) {
	$limite_rsm = ( $limite_rsm == 3 ? 4 :  $limite_rsm );
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycolc AND $haycold && !$haycole) {
Switch ($registro['pregnancia'])
  {
          case '1' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);				
$html_resultados .=  '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
$mineralTR++;
break;
          case '2' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
$vegetalTR++;
 break;
 
case '3' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
$animalTR++;
		  break;
	  case '4' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);			
$html_resultados .=  '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
$mineralAnimalTR++;
		  break;
          case '6' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
$vegetalAnimalTR++;
		  break;
          case '7' :
$arrRemedios[8][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
		  break;
  }
  $html_resultados .= '<td class="nombres">';
  
if( $user->get('usertype') == 'Author' ){
	$html_resultados .=  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
$html_resultados .=   '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
$html_resultados .= '
      </td>
      <td class="valor">8<!--imprime el nombre--></td>
	  <td class="barrita"><img src="algoritmo10/resultado/rsm-8.gif" width="61" height="10" alt="8" /></td>
      <td class="colum_puros">';
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               $html_resultados .=  '' ; //en la columna de Consonantes (puros) no muestra nada.
	       break;
		     case 1 :
               $html_resultados .=  '&middot;' ;//en la columna de Consonantes (puros) debe mostrar pelotita (mirar arriba el img. entre '')
	       break;
	  }
} else {
	$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
}
$html_resultados .= '
	</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
	  </tr>';
	  
  }
}
$html_resultados .= '
		  </td>
        </tr></p>';
		
//REMEDIOS 7
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycolc AND $haycole && !$haycold) {
Switch ($registro['pregnancia']){
  case '1' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);				
$html_resultados .=  '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
$mineralTR++;
 break;
case '2' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
$vegetalTR++;
		  break;
          case '3' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
$animalTR++;
		  break;
	  case '4' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);			
$html_resultados .=  '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
$mineralAnimalTR++;
break;
case '6' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
$vegetalAnimalTR++;
		  break;
          case '7' :
$arrRemedios[7][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
$html_resultados .= '<td class="nombres">';

if( $user->get('usertype') == 'Author' ){
	$html_resultados .=   '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
$html_resultados .=   '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
$html_resultados .= '
      </td>
      <td class="valor">7<!--imprime el nombre--></td>
	  <td class="barrita"><img src="algoritmo10/resultado/rsm-7.gif" width="61" height="10" alt="7" />
	  </td>
      <td class="colum_puros">';
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               $html_resultados .=  '' ;
	       break;
		     case 1 :
               $html_resultados .=  '&middot;' ;
	       break;
	  }
} else {
	$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
}
$html_resultados .= '</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
	  </tr>';
  }
}
$html_resultados .= '
		  </td>
        </tr></p>';
//REMEDIOS 6
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycolc && !$haycold && !$haycole) {
Switch ($registro['pregnancia']){
 case '1' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);				
$html_resultados .=  '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
$mineralTR++;
break;
case '2' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
$vegetalTR++;
		  break;
          case '3' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
$animalTR++;
	  break;
	  case '4' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);
               $html_resultados .=  '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               
$html_resultados .=  '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
$mineralAnimalTR++;
break;
   case '6' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
$vegetalAnimalTR++;
		  break;
          case '7' :
$arrRemedios[6][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
		  break;
  }
  $html_resultados .='
   	  <td class="nombres">';
if( $user->get('usertype') == 'Author' ){
	$html_resultados .=   '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
$html_resultados .=   '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
      $html_resultados .= '
      </td>
      <td class="valor">6<!--imprime el nombre--></td>
	  <td class="barrita"><img src="algoritmo10/resultado/rsm-6.gif" width="61" height="10" alt="6" /></td>
      <td class="colum_puros">';
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               $html_resultados .=  '' ;
	       break;
		     case 1 :
               $html_resultados .=  '&middot;' ;
	       break;
	  }
} else {
	$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
}
$html_resultados .= '</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
	  </tr>';
  }
}
$html_resultados .= '		  </td>
        </tr></p>';
		
//REMEDIOS 5
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycold AND $haycole && !$haycolc) {
Switch ($registro['pregnancia'])
{
	case '1' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);				$html_resultados .=  '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
$mineralTR++;
		  break;
          case '2' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
$vegetalTR++;
break;
case '3' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
$animalTR++;
		  break;
	  case '4' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);			$html_resultados .=  '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
$mineralVegetalTR++;
break;
case '5' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
$mineralAnimalTR++;
break;
case '6' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
$vegetalAnimalTR++;
break;
          case '7' :
$arrRemedios[5][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
}
$html_resultados .= '
   	  <td class="nombres">';
	  
if( $user->get('usertype') == 'Author' ){
	$html_resultados .=   '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
$html_resultados .=   '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
$html_resultados .= '
      </td>
      <td class="valor">5</td>
	  <td class="barrita"><img src="algoritmo10/resultado/rsm-5.gif" width="61" height="10" alt="5" /></td>
      <td class="colum_puros">';
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               $html_resultados .=  '' ;
	       break;
		     case 1 :
               $html_resultados .=  '&middot;' ;
	       break;
	  }
} else {
	$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
}
$html_resultados .= '</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
	  </tr>';
  }
}
$html_resultados .= '
		  </td>
        </tr></p>';
//REMEDIOS 4
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycold && !$haycole && !$haycolc) {
Switch ($registro['pregnancia']){
case '1' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);				$html_resultados .=  '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
$mineralTR++;
		  break;
          case '2' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
$vegetalTR++;
break;
          case '3' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
$animalTR++;
break;
case '4' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);			$html_resultados .=  '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
$mineralVegetalTR++;
		  break;
          case '5' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
$mineralAnimalTR++;
		  break;
          case '6' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR
);               $html_resultados .=  '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
$vegetalAnimalTR++;
break;
case '7' :
$arrRemedios[4][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
}
$html_resultados .= '
   	  <td class="nombres">';
if( $user->get('usertype') == 'Author' ){
	$html_resultados .=   '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
$html_resultados .=   '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
$html_resultados .= '
      </td>
      <td class="valor">4
	  </td>
	  <td class="barrita"><img src="algoritmo10/resultado/rsm-4.gif" width="61" height="10" alt="4" />
	  </td>
      <td class="colum_puros">';
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               $html_resultados .=  '' ;
	       break;
		     case 1 :
               $html_resultados .=  '&middot;' ;
	       break;
	  }
} else {
	$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
}
$html_resultados .= '</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
	  </tr>';
  }
}
$html_resultados .= '
		  </td>
        </tr></p>';
//REMEDIOS 3
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if ($haycole && !$haycold && !$haycolc) {
Switch ($registro['pregnancia']){
case '1' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);				$html_resultados .=  '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
$mineralTR++;
break;
          case '2' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
$vegetalTR++;
break;
case '3' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
$animalTR++;
break;
case '4' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);			$html_resultados .=  '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
$mineralVegetalTR++;
break;
case '5' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
$mineralAnimalTR++;
break;
case '6' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
$vegetalAnimalTR++;
break;
case '7' :
$arrRemedios[3][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
  $html_resultados .= '
<td class="nombres">';

if( $user->get('usertype') == 'Author' ){
	$html_resultados .=   '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
$html_resultados .=   '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
$html_resultados .= '
</td><td class="valor">3
	  </td>
	  <td class="barrita"><img src="algoritmo10/resultado/rsm-3.gif" width="61" height="10" alt="3" />
	  </td>
      <td class="colum_puros">';
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               $html_resultados .=  '' ;
	       break;
		     case 1 :
               $html_resultados .=  '&middot;' ;
	       break;
	  }
} else {
	$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
}
$html_resultados .= '</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
	  </tr>';
  }
}
$html_resultados .= '
		  </td>
        </tr></p>';
//REMEDIOS 2
$tabla = mysql_query("SELECT idMatMed, id, tipoClasico, tipoRemedioClave,	tipoAvanzado, puros, col_c, col_d, pregnancia, nombre, secuencia FROM cremedios_dos WHERE id LIKE '$clave%'");
while ($registro = mysql_fetch_array($tabla)) {
$haycolc = false;
$haycold = false;
$haycole = false;
Switch ($registro['col_c'])
	 {
	         case $col_1 :
               $haycolc = true;
		       break;
		     case $col_2 :
               $haycolc = true;
		       break;
			 case $col_3 :
               $haycolc = true;
		       break;
	  }
Switch ($registro['col_d'])
	 {
	         case $col_1 :
               $haycold = true;
		       break;
		     case $col_2 :
               $haycold = true;
		       break;
			 case $col_3 :
               $haycold = true;
		       break;
	  }
Switch ($registro['col_c'])
  {
          case $col_i1 :
               $haycole = true;
         break;
       case $col_i2 :
               $haycole = true;
         break;
    case $col_i3 :
               $haycole = true;
         break;
   }
if (!$haycold && !$haycole && !$haycolc) {
Switch ($registro['pregnancia']){
case '1' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineral_".$mineralTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);				$html_resultados .=  '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
$mineralTR++;
break;
case '2' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetal_".$vegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
$vegetalTR++;
break;
case '3' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trAnimal_".$animalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
$animalTR++;
break;
case '4' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralVegetal_".$mineralVegetalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
$mineralVegetalTR++;
break;
case '5' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trMineralAnimal_".$mineralAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
$mineralAnimalTR++;
break;
          case '6' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trVegetalAnimal_".$vegetalAnimalTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
$vegetalAnimalTR++;
break;
case '7' :
$arrRemedios[2][$registro['pregnancia']][] = array( 
	'nombre' => $registro['nombre'], 
	'tipoClasico' => $registro['tipoClasico'], 
	'tipoRemedioClave' => $registro['tipoRemedioClave'], 
	'tipoAvanzado' => $registro['tipoAvanzado'], 
'puros' => $registro['puros'], 
	'id' => "trImponderable_".$imponderableTR,
					'secuencia' => $registro['secuencia'],
					'idMatMed' => $registro['idMatMed']
);               $html_resultados .=  '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
  $html_resultados .= '
   	  <td class="nombres">';
if( $user->get('usertype') == 'Author' ){
	$html_resultados .=   '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
$html_resultados .=   '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
$html_resultados .= '
</td>
      <td class="valor">2
</td>
	  <td class="barrita"><img src="algoritmo10/resultado/rsm-2.gif" width="61" height="10" alt="2" />
	  </td>
      <td class="colum_puros">';
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               $html_resultados .=  '' ;
	       break;
		     case 1 :
               $html_resultados .=  '&middot;' ;
	       break;
	  }
} else {
	$html_resultados .= '<span class="solo_abono">Solo disponible con Abono</span>';
}
$html_resultados .= '</td>
		<td class="colum_clave">'.($registro['tipoRemedioClave']?'&middot;':'').'</td>
		<td class="colum_secuencia">'.(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' ).'</td>
</tr>';
	  
	  }
}
$html_resultados .= '
</tbody>
</table>
';
*/
?>