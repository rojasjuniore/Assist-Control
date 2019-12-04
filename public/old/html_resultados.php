<?php
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
?>
<tbody>
<?php
ob_start();
$limite_rsm = 3;
/*
?>
			<table id="resultado">
<?php
*/
//REMEDIOS 9
echo "<!-- Remedios 9 -->";
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
				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
				echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
				echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
				echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
				echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
				echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
				echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
				$imponderableTR++;
				break;
		  }
?>
   	    <td class="nombres">
<?php
		if( $user->get('usertype') == 'Author' ){
			echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
		} else {
			echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
		}
      ?>
		</td>
		<td class="valor"><?php echo '9'; // imprime el nombre ?></td>
		<td class="barrita"><?php echo '<img src="algoritmo10/resultado/rsm-9.gif" width="61" height="10" alt="9" />';?></td>
		<td class="colum_puros">
<?php
		if( $user->get('usertype') != 'Author' ){
			Switch ($registro['puros']){ //dice Switch ($registro['col_puros']) y en los demas dice Switch ($registro['puros']) Si lo pongo igual que los demas cambia y ponde SI en consonantes
				case 0 :
					echo '' ;
					break;
				case 1 :
					echo '&middot;' ;
					break;
			}
		} else {
			?><span class="solo_abono">Solo disponible con Abono</span><?php
		}
		?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
	  </tr>
      <?php
	}
}
?>
		  </td>
        </tr></p>
<?php
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
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
		  break;
  }
?>
   	  <td class="nombres">
	  <?php
if( $user->get('usertype') == 'Author' ){
	echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
      ?>
      </td>
      <td class="valor"><?php
	  echo '8'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-8.gif" width="61" height="10" alt="8" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ; //en la columna de Consonantes (puros) no muestra nada.
	       break;
		     case 1 :
               echo '&middot;' ;//en la columna de Consonantes (puros) debe mostrar pelotita (mirar arriba el img. entre '')
	       break;
	  }
} else {
	?><span class="solo_abono">Solo disponible con Abono</span><?php
}
?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
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
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
?>
   	  <td class="nombres">
	  <?php
if( $user->get('usertype') == 'Author' ){
	echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
      ?>
      </td>
      <td class="valor"><?php
	  echo '7'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-7.gif" width="61" height="10" alt="7" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Solo disponible con Abono</span><?php
}
?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
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
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
               echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
		  break;
  }
?>
   	  <td class="nombres">
	  <?php
if( $user->get('usertype') == 'Author' ){
	echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
      ?>
      </td>
      <td class="valor"><?php
	  echo '6'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-6.gif" width="61" height="10" alt="6" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Solo disponible con Abono</span><?php
}
?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
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
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
);               
echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
}
?>
   	  <td class="nombres">
	  <?php
if( $user->get('usertype') == 'Author' ){
	echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
      ?>
      </td>
      <td class="valor"><?php
	  echo '5'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-5.gif" width="61" height="10" alt="5" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Solo disponible con Abono</span><?php
}
?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
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
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
);               
echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
}
?>
   	  <td class="nombres">
	  <?php
if( $user->get('usertype') == 'Author' ){
	echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
      ?>
      </td>
      <td class="valor"><?php
	  echo '4'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-4.gif" width="61" height="10" alt="4" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Solo disponible con Abono</span><?php
}
?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
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
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
);               
echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
);			echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
?>
<td class="nombres">
<?php
if( $user->get('usertype') == 'Author' ){
	echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
?>
</td><td class="valor"><?php
echo '3'; // imprime el nombre
	  ?>
	  </td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-3.gif" width="61" height="10" alt="3" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Solo disponible con Abono</span><?php
}
?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
	  </tr>
      <?php
  }
}
?>
		  </td>
        </tr></p>
<?php
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
);				echo '<tr class="mineral" id="trMineral_'.$mineralTR.'"><td class="name_preg">'.$txt['mineral'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/mineral.png" width="33" height="17" alt="'.$txt['mineral'].'"/></td>' ;
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
);               
echo '<tr class="vegetal" id="trVegetal_'.$vegetalTR.'"><td class="name_preg"> '.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/vegetal.png" width="33" height="17" alt="'.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="animal" id="trAnimal_'.$animalTR.'"><td class="name_preg">'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/animal.png" width="33" height="17" alt="'.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="mineral_vegetal" id="trMineralVegetal_'.$mineralVegetalTR.'" ><td class="name_preg">'.$txt['mineral'].'/'.$txt['vegetal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-veg.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['vegetal'].'" /></td>' ;
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
);               
echo '<tr class="mineral_animal" id="trMineralAnimal_'.$mineralAnimalTR.'"><td class="name_preg">'.$txt['mineral'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/min-ani.png" width="33" height="17" alt="'.$txt['mineral'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal" id="trVegetalAnimal_'.$vegetalAnimalTR.'"><td class="name_preg">'.$txt['vegetal'].'/'.$txt['animal'].'</td><td class="pregnancia"><img src="algoritmo10/resultado/veg-ani.png" width="33" height="17" alt="'.$txt['vegetal'].' - '.$txt['animal'].'" /></td>' ;
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
);               
echo '<tr class="vegetal_animal"  id="trImponderable_'.$imponderableTR.'"><td class="name_preg">Impond</td><td class="pregnancia"><img src="algoritmo10/resultado/imponderable.png" width="33" height="17" alt="Imponderable" /></td>' ;
$imponderableTR++;
break;
  }
?>
   	  <td class="nombres">
<?php
if( $user->get('usertype') == 'Author' ){
	echo  '<a href="javascript:showTrial(\'Materia Médica Homeopática\')">'. $registro['nombre'] .'</a>';
} else {
echo  '<a rel="shadowbox" href="http://'.$_SERVER['HTTP_HOST'].'/algoritmo10/resultado/matmed.php?id='.$registro['idMatMed'].'" id="matmed-'.$registro['idMatMed'].'">'. $registro['nombre'] .'</a>';
}
      ?>
</td>
      <td class="valor">
<?php
	  echo '2'; // imprime el nombre
	  ?>
</td>
	  <td class="barrita"><?php
	  echo '<img src="algoritmo10/resultado/rsm-2.gif" width="61" height="10" alt="2" />';?>
	  </td>
      <td class="colum_puros"><?php
if( $user->get('usertype') != 'Author' ){
Switch ($registro['puros'])
	 {
	         case 0 :
               echo '' ;
	       break;
		     case 1 :
               echo '&middot;' ;
	       break;
	  }
} else {
	?><span class="solo_abono">Solo disponible con Abono</span><?php
}
?></td>
		<td class="colum_clave"><?=$registro['tipoRemedioClave']?'&middot;':''?></td>
		<td class="colum_secuencia"><?=(strstr( $registro['secuencia'], $aux_secuencia ) ? '&middot;' :'' )?></td>
</tr>
      <?php
	  
	  }
}?>
</tbody>
</table>
<?php
	$html_resultados = ob_get_contents();
ob_end_clean();
?>