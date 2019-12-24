<?php

namespace App\Http\Controllers;

use App\Creditos;
use App\CRemediosDos;
use App\EstudioNota;
use App\Http\Requests\CreateEstudiosRequest;
use App\Http\Requests\UpdateEstudiosRequest;
use App\Models\Remedios;
use App\Repositories\EstudiosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class EstudiosController extends AppBaseController
{


    /** @var  EstudiosRepository */
    private $estudiosRepository;

    public function __construct(EstudiosRepository $estudiosRepo)
    {
        $this->estudiosRepository = $estudiosRepo;
    }

    /**
     * Display a listing of the Estudios.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->estudiosRepository->pushCriteria(new RequestCriteria($request));
        $estudios = $this->estudiosRepository
            ->orderBy('id', 'DESC')
            ->limit(200)
            ->get();

        return view('estudios.index')
            ->with('estudios', $estudios);
    }

    /**
     * Show the form for creating a new Estudios.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->creditos->sum('cantidad') > 0) {
            $paises = \App\Pais::all();
            return view('estudios.create', compact('paises'));
        } else {
            return redirect(route('estudios.index'));
        }
    }

    /**
     * Store a newly created Estudios in storage.
     *
     * @param CreateEstudiosRequest $request
     *
     * @return Response
     */
    public function store(CreateEstudiosRequest $request)
    {
        if (Auth::user()->creditos->sum('cantidad') > 0) {
            $input = $request->all();
            if ($input['tipo'] == 97) {
                $input['tipo'] = 'humano';
                $input['h_dia'] = date("d", strtotime($input['fecha_humano']));
                $input['h_mes'] = date("m", strtotime($input['fecha_humano']));
                $input['h_anio'] = date("Y", strtotime($input['fecha_humano']));
            } else {
                $input['tipo'] = 'animal';
                $input['a_dia'] = date("d", strtotime($input['fecha_animal']));
                $input['a_mes'] = date("m", strtotime($input['fecha_animal']));
                $input['a_anio'] = date("Y", strtotime($input['fecha_animal']));
            }

            $input['id_usuario'] = Auth::user()->id_cliente;
            $estudios = $this->estudiosRepository->create($input);

            Creditos::create([
                'cliente_id' => Auth::user()->id_cliente,
                'cantidad' => -1,
                'tipo' => 'Debito',
                'fecha' => date("Y-m-d"),
                'operacion' => $estudios->id
            ]);

            Flash::success('Estudios Guardado Satisfactoriamente.');

            return redirect(route('estudios.show', [$estudios->id]));
        } else {
            Flash::danger('No posee suficientes créditos para Crear un nuevo Estudio Médico.');

            return redirect(route('estudios.index'));
        }
    }

    /**
     * Display the specified Estudios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
//        die(__METHOD__);
        $estudios = $this->estudiosRepository->findWithoutFail($id);

        if (empty($estudios)) {
            Flash::error('Estudios not found');

            return redirect(route('estudios.index'));
        }

        if ($estudios->tipo == 'humano') {
            $data = array(
                'nombre' => $estudios->h_nombre,//'marcelo eugenio',
                'apellido' => $estudios->h_apellido,//'candegabe',
                'apodo' => $estudios->h_identifica,//'marcelo',
                'iniciales' => $estudios->h_iniciales,//'AL',
                'dia' => $estudios->h_dia,//'26',
                'mes' => $estudios->h_mes,//'09',
                'anio' => $estudios->h_anio,//'1950',
                'pais' => $estudios->pais->name,//'Argentina'
            );
        } else {
            $data = array(
                'nombre' => strtoupper($estudios->a_especie), //'marcelo eugenio',
                'apellido' => strtoupper($estudios->a_duenio), //'candegabe',
                'apodo' => strtoupper($estudios->a_animal), //'marcelo',
                'iniciales' => strtoupper($estudios->a_iniciales), //'AL',
                'dia' => $estudios->a_dia, //'26',
                'mes' => $estudios->a_mes, //'09',
                'anio' => $estudios->a_anio, //'1950',
                'pais' => '' //'Argentina'
            );
        }

        $result['general'] = $this->getClave($data);
        $result['reino'] = $this->getReino($result['general']['pregnancia']);

        $impPacienteAnimal = $result['reino']["animal"];
        $impPacienteVegetal = $result['reino']["vegetal"];
        $impPacienteMineral = $result['reino']["mineral"];

        $predominante = $this->getImpregnaciaPredominante($impPacienteAnimal, $impPacienteVegetal, $impPacienteMineral);


        if ($result['general']['clave']) {
            $remedios = Remedios::where('id_cremedios', 'like', $result['general']['clave'] . "%")->get();
        }


//        $AnalisisCombinados = $this->calcularAnalisisCombinado(
//                                                                $remedios,
//                                                                $data,
//                                                                $predominante
//                                                            );

//        $AnalisisCombinados = collect($AnalisisCombinados)->sortByDesc('suma')->toArray();

        //$analisis = $this->calcularAnalisis($remedios, $data, $predominante);
        //$analisis = collect($analisis)->sortBy('remedio')->toArray();

        //return view('estudios.show', compact('estudios', 'result', 'remedios', 'AnalisisCombinados', 'analisis'));

        return view('estudios.show', compact('estudios', 'result', 'remedios', 'data', 'predominante'));

    }

    /**
     * Show the form for editing the specified Estudios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estudios = $this->estudiosRepository->findWithoutFail($id);

        if (empty($estudios)) {
            Flash::error('Estudios not found');

            return redirect(route('estudios.index'));
        }

        $paises = \App\Pais::all();
        return view('estudios.edit', compact('estudios', 'paises'));
    }

    /**
     * Update the specified Estudios in storage.
     *
     * @param  int $id
     * @param UpdateEstudiosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstudiosRequest $request)
    {
        $estudios = $this->estudiosRepository->findWithoutFail($id);

        if (empty($estudios)) {
            Flash::error('Estudios not found');

            return redirect(route('estudios.index'));
        }

        $estudios = $this->estudiosRepository->update($request->all(), $id);

        Flash::success('Estudios updated successfully.');

        return redirect(route('estudios.index'));
    }

    /**
     * Remove the specified Estudios from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estudios = $this->estudiosRepository->findWithoutFail($id);

        if (empty($estudios)) {
            Flash::error('Estudios not found');

            return redirect(route('estudios.index'));
        }

        $this->estudiosRepository->delete($id);

        Flash::success('Estudios deleted successfully.');

        return redirect(route('estudios.index'));
    }

    public function getClave($data)
    {
        $last = strtoupper($data['apellido']);
        $nombre = strtoupper($data['nombre']);
        $apodo = strtoupper($data['apodo']);
        $einiciales = strtoupper($data['iniciales']);
        $dia = intval($data['dia']);
        $mes = intval($data['mes']);
        $anio = intval($data['anio']);
        $pais = strtoupper($data['pais']);

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
        $tabla1_1 = explode(' ', $letras1);
        $tabla1_2 = explode(' ', $letras2);
        $tabla1_3 = explode(' ', $letras3);
        $tabla1_4 = explode(' ', $letras4);
        $tabla1_5 = explode(' ', $letras5);
        $tabla1_6 = explode(' ', $letras6);
        $tabla1_7 = explode(' ', $letras7);
        $tabla1_8 = explode(' ', $letras8);
        $tabla1_9 = explode(' ', $letras9);
        $tabla_vocales = explode(' ', $vocales);
        $tabla_vocanum = explode(' ', $vocanum);
        $tabla_consonantes = explode(' ', $consonantes);
        $numeros = '5 2 9 1 3 9 1 8 8';
        $tabla2 = explode(' ', $numeros);

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
        for ($i = 0; $i < $tope; $i++) {
            if (substr($fecha, $i, 1) > 0) {
                $pregnancia = $pregnancia + intval(substr($fecha, $i, 1));
                $puntero = substr($fecha, $i, 1);
                $puntero = $puntero - 1;
                $trinomio1 = $trinomio1 + $tabla2[$puntero];
            }
        }
        if ($trinomio1 > 9) {
            $trinomio11 = substr($trinomio1, 0, 1);
            $trinomio12 = substr($trinomio1, 1, 1);
            $trinomio13 = substr($trinomio1, 2, 1);
            $trinomio1 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        if ($trinomio1 > 9) {
            $trinomio11 = substr($trinomio1, 0, 1);
            $trinomio12 = substr($trinomio1, 1, 1);
            $trinomio13 = substr($trinomio1, 2, 1);
            $trinomio1 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        if ($pregnancia > 9) {
            $trinomio11 = substr($pregnancia, 0, 1);
            $trinomio12 = substr($pregnancia, 1, 1);
            $trinomio13 = substr($pregnancia, 2, 1);
            $pregnancia = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        if ($pregnancia > 9) {
            $trinomio11 = substr($pregnancia, 0, 1);
            $trinomio12 = substr($pregnancia, 1, 1);
            $trinomio13 = substr($pregnancia, 2, 1);
            $pregnancia = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        $trinomio2 = 0;
        $tope = strlen($apodo);
        $tope++;
        $aux_secuencia = '';
        for ($i = 0; $i < $tope; $i++) {
            $vocal = substr($apodo, $i, 1);
            Switch ($vocal) {
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
            $trinomio11 = substr($trinomio2, 0, 1);
            $trinomio12 = substr($trinomio2, 1, 1);
            $trinomio13 = substr($trinomio2, 2, 1);
            $trinomio2 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        if ($trinomio2 > 9) {
            $trinomio11 = substr($trinomio2, 0, 1);
            $trinomio12 = substr($trinomio2, 1, 1);
            $trinomio13 = substr($trinomio2, 2, 1);
            $trinomio2 = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }


        $apodolast = $nombre . $last;
        $tope = strlen($apodolast);
        $tope++;
        $sumatodo = 0;
        for ($i = 0; $i < $tope; $i++) {
            $letra = substr($apodolast, $i, 1);
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
        for ($i = 0; $i < $tope; $i++) {
            if (substr($nombre, $i, 2) == 'CH') {
                $tengoch++;
            }
            if (substr($nombre, $i, 2) == 'LL') {
                $tengoll++;
            }
        }
        $tope = strlen($last);
        for ($i = 0; $i < $tope; $i++) {
            if (substr($last, $i, 2) == 'CH') {
                $tengoch = $tengoch + 8;
            }
            if (substr($last, $i, 2) == 'LL') {
                $tengoll = $tengoll + 3;
            }
        }
        $sumatodo = $sumatodo - $tengoch - $tengoll;
        if ($sumatodo > 9) {
            $trinomio11 = substr($sumatodo, 0, 1);
            $trinomio12 = substr($sumatodo, 1, 1);
            $trinomio13 = substr($sumatodo, 2, 1);
            $sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        if ($sumatodo > 9) {
            $trinomio11 = substr($sumatodo, 0, 1);
            $trinomio12 = substr($sumatodo, 1, 1);
            $trinomio13 = substr($sumatodo, 2, 1);
            $sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        Switch ($sumatodo) {
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
        $iniciales = 0;
        $viniciales = $einiciales;
        for ($i = 0; $i < $tope; $i++) {
            $letra = substr($viniciales, $i, 1);
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
            $trinomio11 = substr($iniciales, 0, 1);
            $trinomio12 = substr($iniciales, 1, 1);
            $trinomio13 = substr($iniciales, 2, 1);
            $iniciales = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        Switch ($iniciales) {
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
        $month1 = substr($mes, 0, 1);
        $month2 = substr($mes, 1, 1);
        $year = $anio;
        $year1 = (substr($year, 1, 1)) ? substr($year, 1, 1) : 0;
        $year2 = (substr($year, 2, 1)) ? substr($year, 2, 1) : 0;
        $year3 = (substr($year, 3, 1)) ? substr($year, 3, 1) : 0;
        $year4 = (substr($year, 4, 1)) ? substr($year, 4, 1) : 0;
//                echo $year1." + ".$year2." + ".$year3." + ".$year4."<hr>";
        $cyear = $year1 + $year2 + $year3 + $year4;
//                $clave = $trinomio1 . $trinomio2 . '%';
        $clave = $trinomio1 . $trinomio2;
//        echo "Pregnancia = ".$pregnancia."<br>";
//        die("Clave: ".$clave."<hr>");

        $result = array(
            'clave' => $clave,
            'pregnancia' => $pregnancia
        );

        return $result;
    }

    public function getReino($pregnancia)
    {
        $result = array();
        Switch ($pregnancia) {
            case 1 :

                $result = array(
                    'vegetal' => 15,
                    'mineral' => 35,
                    'animal' => 50
                );

                /*$aux_pregnancia['animal'] = 1;
                echo '<img src="algoritmo10/resultado/simetria1.jpg" alt="Impregnancia Simetría 1" /> 
			<!-- Simetría 1 -->
			<div class="simetriaPorcentaje">
			  <p id="porcentajeMenor">15% Vegetal</p>
			  <p id="porcentajeMedio">35% Mineral</p>
			  <p id="porcentajeMayor">50% Animal</p>
			</div>
			<!-- Simetría 1 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 1" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 1" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=73">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=81">Interrogatorio Dirigido</a></p>';
                }*/
                break;
            case 2 :

                $result = array(
                    'vegetal' => 50,
                    'mineral' => 15,
                    'animal' => 35
                );

                /*$aux_pregnancia['vegetal'] = 1;
                echo '<img src="algoritmo10/resultado/simetria2.jpg" alt="Impregnancia Simetría 2" /> 
			<!-- Simetría 2 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Mineral</p>
			<p id="porcentajeMedio">35% Animal</p>
			<p id="porcentajeMayor">50% Vegetal</p>
			</div>
			<!-- Simetría 2 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 2" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 2" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=74" >Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=82">Interrogatorio Dirigido</a></p>' ;
                }*/
                break;
            case 3 :

                $result = array(
                    'vegetal' => 40,
                    'mineral' => 40,
                    'animal' => 20
                );

                /* $aux_pregnancia['vegetal'] = 1;
                $aux_pregnancia['mineral'] = 1;
                echo '<img src="algoritmo10/resultado/simetria3.jpg" alt="Impregnancia Simetría 3"  /> 
			<!-- Simetría 3 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">20% Animal</p>
			<p id="porcentajeMedio">40% Vegetal</p>
			<p id="porcentajeMedioL">40% Mineral</p>
			</div>
			<!-- Simetría 3 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 3" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
				';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 3" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=75">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=83">Interrogatorio Dirigido</a></p>
				' ;
                }*/
                break;
            case 4 :


                $result = array(
                    'vegetal' => 15,
                    'mineral' => 50,
                    'animal' => 35
                );

                /*
                $aux_pregnancia['mineral'] = 1;
                echo '<img src="algoritmo10/resultado/simetria4.jpg" alt="Impregnancia Simetría 4" /> 
			<!-- Simetría 4 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Vegetal</p>
			<p id="porcentajeMedio">35% Animal</p>
			<p id="porcentajeMayor">50% Mineral</p>
			</div>
			<!-- Simetría 4 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 4" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
				';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 4" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=76">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=84">Interrogatorio Dirigido</a></p>
				' ;
                }*/
                break;
            case 5 :


                $result = array(
                    'vegetal' => 35,
                    'mineral' => 15,
                    'animal' => 50
                );

                /*
                $aux_pregnancia['animal'] = 1;
                echo '<img src="algoritmo10/resultado/simetria5.jpg" alt="Impregnancia Simetría 5" /> 
			<!-- Simetría 5 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Mineral</p>
			<p id="porcentajeMedio">35% Vegetal</p>
			<p id="porcentajeMayor">50% Animal</p>
			</div>
			<!-- Simetría 5 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 5" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
				';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 5" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=77">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=85">Interrogatorio Dirigido</a></p>
				' ;
                } */
                break;
            case 6 :


                $result = array(
                    'vegetal' => 50,
                    'mineral' => 35,
                    'animal' => 15
                );

                /*
                $aux_pregnancia['vegetal'] = 1;
                echo '<img src="algoritmo10/resultado/simetria6.jpg" alt="Impregnancia Simetría 6" /> 
			<!-- Simetría 6 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Animal</p>
			<p id="porcentajeMedio">35% Mineral</p>
			<p id="porcentajeMayor">50% Vegetal</p>
			</div>
			<!-- Simetría 6 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 6" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
				';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 6" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=61" >Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=86">Interrogatorio Dirigido</a></p>
				' ;
                }*/
                break;
            case 7 :


                $result = array(
                    'vegetal' => 40,
                    'mineral' => 20,
                    'animal' => 40
                );

                /*
                $aux_pregnancia['animal'] = 1;
                $aux_pregnancia['vegetal'] = 1;
                echo '<img src="algoritmo10/resultado/simetria7.jpg" alt="Impregnancia Simetría 7" /> 
			<!-- Simetría 7 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">20% Mineral</p>
			<p id="porcentajeMedio">40% Animal</p>
			<p id="porcentajeMedioL">40% Vegetal</p>
			</div>
			<!-- Simetría 7 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 7" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
				';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 7" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=78">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=87">Interrogatorio Dirigido</a></p>
				' ;
                }*/
                break;
            case 8 :


                $result = array(
                    'vegetal' => 35,
                    'mineral' => 50,
                    'animal' => 15
                );

                /*
                $aux_pregnancia['mineral'] = 1;
                echo '<img src="algoritmo10/resultado/simetria8.jpg" alt="Impregnancia Simetría 8" /> 
			<!-- Simetría 8 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMenor">15% Animal</p>
			<p id="porcentajeMedio">35% Vegetal</p>
			<p id="porcentajeMayor">50% Mineral</p>
			</div>
			<!-- Simetría 8 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 8" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
				';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 8" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=79">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=88">Interrogatorio Dirigido</a></p>
				' ;
                }*/
                break;
            case 9 :


                $result = array(
                    'vegetal' => 33,
                    'mineral' => 33,
                    'animal' => 33
                );
                /*
                $aux_pregnancia['animal'] = 1;
                $aux_pregnancia['vegetal'] = 1;
                $aux_pregnancia['mineral'] = 1;
                echo '<img src="algoritmo10/resultado/simetria9.jpg" alt="Impregnancia Simetría 9" /> 
			<!-- Simetría 9 -->
			<div class="simetriaPorcentaje">
			<p id="porcentajeMedioR">33% Vegetal</p>
			<p id="porcentajeMedio">33% Mineral</p>
			<p id="porcentajeMedioL">33% Animal</p>
			</div>
			<!-- Simetría 9 END -->
			';
                if( $user->get('usertype') == 'Author' ){
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 9" href="javascript:showTrial(\'Vea la Dinámica\')">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" href="javascript:showTrial(\'Interrogatorio Dirigido\')">Interrogatorio Dirigido</a></p>
				';
                } else {
                    echo '<p><a class="btn-light_grey-finito" title="Orden de Simetría 9" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=80">Vea la Dinámica</a></p>
				<p><a class="btn-light_grey-finito" rel="shadowbox;width=1200" href="index2.php?option=com_content&amp;view=article&amp;id=89">Interrogatorio Dirigido</a></p>
				' ;
                }*/
                break;
        }
        return $result;
    }

    public static function getImgReino($pregnancia)
    {

        $reino = array();
        Switch ($pregnancia) {
            case 1 :
                $reino = array(
                    'reino' => 'Mineral',
                    'img' => asset('images/reino/mineral.png'),
                );
                break;
            case 2 :
                $reino = array(
                    'reino' => 'Vegetal',
                    'img' => asset('images/reino/vegetal.png'),
                );
                break;
            case 3 :
                $reino = array(
                    'reino' => 'Animal',
                    'img' => asset('images/reino/animal.png'),
                );
                break;
            case 4 :
                $reino = array(
                    'reino' => 'Mineral/Vegetal',
                    'img' => asset('images/reino/min-veg.png'),
                );
                break;
            case 5 :
                $reino = array(
                    'reino' => 'Mineral/Animal',
                    'img' => asset('images/reino/min-ani.png'),
                );
                break;
            case 6 :
                $reino = array(
                    'reino' => 'Vegetal/Animal',
                    'img' => asset('images/reino/veg-ani.png'),
                );
                break;
            case 7 :
                $reino = array(
                    'reino' => 'Imponderable',
                    'img' => asset('images/reino/imponderable.png'),
                );
                break;
        }
        return $reino;
    }

    public static function getRsm($id, $iniciales, $dia, $mes, $anio, $nombre, $last)
    {
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
        $tabla1_1 = explode(' ', $letras1);
        $tabla1_2 = explode(' ', $letras2);
        $tabla1_3 = explode(' ', $letras3);
        $tabla1_4 = explode(' ', $letras4);
        $tabla1_5 = explode(' ', $letras5);
        $tabla1_6 = explode(' ', $letras6);
        $tabla1_7 = explode(' ', $letras7);
        $tabla1_8 = explode(' ', $letras8);
        $tabla1_9 = explode(' ', $letras9);
        $fecha = $dia . $mes . $anio;
        $einiciales = strtoupper($iniciales);
        $apodolast = $nombre . $last;
        $tope = strlen($fecha);
        $tope++;
        $sumatodo = 0;

        $col_1 = 0;
        $col_2 = 0;
        $col_3 = 0;

        for ($i = 0; $i < $tope; $i++) {
            $letra = substr($apodolast, $i, 1);
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

        $tope = strlen($einiciales);
        $tope++;
        $iniciales = 0;
        $viniciales = $einiciales;
        for ($i = 0; $i < $tope; $i++) {
            $letra = substr($viniciales, $i, 1);
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
            $trinomio11 = substr($iniciales, 0, 1);
            $trinomio12 = substr($iniciales, 1, 1);
            $trinomio13 = substr($iniciales, 2, 1);
            $iniciales = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        $col_i1 = 0;
        $col_i2 = 0;
        $col_i3 = 0;
        Switch ($iniciales) {
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
        $tengoch = 0;
        $tengoll = 0;
        $tope = strlen($nombre);
        $tope++;
        for ($i = 0; $i < $tope; $i++) {
            if (substr($nombre, $i, 2) == 'CH') {
                $tengoch++;
            }
            if (substr($nombre, $i, 2) == 'LL') {
                $tengoll++;
            }
        }
        $tope = strlen($last);
        for ($i = 0; $i < $tope; $i++) {
            if (substr($last, $i, 2) == 'CH') {
                $tengoch = $tengoch + 8;
            }
            if (substr($last, $i, 2) == 'LL') {
                $tengoll = $tengoll + 3;
            }
        }
        $sumatodo = $sumatodo - $tengoch - $tengoll;
        if ($sumatodo > 9) {
            $trinomio11 = substr($sumatodo, 0, 1);
            $trinomio12 = substr($sumatodo, 1, 1);
            $trinomio13 = substr($sumatodo, 2, 1);
            $sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        if ($sumatodo > 9) {
            $trinomio11 = substr($sumatodo, 0, 1);
            $trinomio12 = substr($sumatodo, 1, 1);
            $trinomio13 = substr($sumatodo, 2, 1);
            $sumatodo = intval($trinomio11) + intval($trinomio12) + intval($trinomio13);
        }
        Switch ($sumatodo) {
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

        $registro = Remedios::find($id); //::where('id_cremedios', $id)->find();
//        return $registro->col_c;
        $haycolc = false;
        $haycold = false;
        $haycole = false;
        Switch ($registro->col_c) {
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
        Switch ($registro->col_d) {
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
        Switch ($registro->col_c) {
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
            return 9;
        }
        if ($haycolc AND $haycold && !$haycole) {
            return 8;
        }
        if ($haycolc AND $haycole && !$haycold) {
            return 7;
        }
        if ($haycolc && !$haycold && !$haycole) {
            return 6;
        }
        if ($haycold AND $haycole && !$haycolc) {
            return 5;
        }
        if ($haycold && !$haycole && !$haycolc) {
            return 4;
        }
        if ($haycole && !$haycold && !$haycolc) {
            return 3;
        }
        if (!$haycold && !$haycole && !$haycolc) {
            return 2;
        }

    }

    public static function getSecuencia($id, $apodo)
    {
        $tope = strlen($apodo);
        $tope++;
        $aux_secuencia = '';
        for ($i = 0; $i < $tope; $i++) {
            $vocal = substr($apodo, $i, 1);
            $vocal = strtoupper($vocal);
            Switch ($vocal) {
                case 'A' :

//                    $trinomio2 = $trinomio2 + 1;
                    $aux_secuencia .= 1;
                    break;
                case 'E' :
//                    $trinomio2 = $trinomio2 + 6;
                    $aux_secuencia .= 6;
                    break;
                case 'I' :
//                    $trinomio2 = $trinomio2 + 1;
                    $aux_secuencia .= 1;
                    break;
                case 'O' :
//                    $trinomio2 = $trinomio2 + 9;
                    $aux_secuencia .= 9;
                    break;
                case 'U' :
//                    $trinomio2 = $trinomio2 + 6;
                    $aux_secuencia .= 6;
                    break;
                case 'Y' :
//                    $trinomio2 = $trinomio2 + 1;
                    $aux_secuencia .= 1;
                    break;
            }
        }
        $remedio = Remedios::where('id', $id)
            ->where('secuencia', 'like', "%" . $aux_secuencia . "%")
            ->first();

        if ($remedio) {
            return true;
        }
        return false;
    }

    public function calcularAnalisisCombinadoXremedio($remedio, $data, $predominante, $rsm9, $filtro1, $filtro2, $filtro3, $filtro4, $filtro5)
    {

        $analisisCombinadoXremedio = array();

        #Calculo de RSM
        $rsm = $this->getRsm(
            $remedio->id,
            $data['iniciales'],
            $data['dia'],
            $data['mes'],
            $data['anio'],
            $data['nombre'],
            $data['apellido']
        );

        $res_rsm = 0;
        if ($rsm9) {
            switch ($rsm) {
                case ($rsm >= 1 && $rsm <= 5):
                    $res_rsm = 1;
                    break;
                case ($rsm >= 6 && $rsm <= 9):
                    $res_rsm = 2;
                    break;
            }
        } else {
            switch ($rsm) {
                case ($rsm >= 1 && $rsm <= 4):
                    $res_rsm = 1;
                    break;
                case ($rsm >= 5 && $rsm <= 8):
                    $res_rsm = 2;
                    break;
            }
        }

        #Calculo de Impregnacia
        $remedioReino = $this->getImgReino($remedio->pregnancia);
        $reinoRemedio = explode('/', $remedioReino['reino']);

        $res_Impregnancia = 0;
        if (count($reinoRemedio) > 1) {
            foreach ($reinoRemedio as $item) {
                if ($predominante == $item) {
                    $res_Impregnancia = 1;
                }
            }
        } else {
            if ($predominante == $reinoRemedio[0]) {
                $res_Impregnancia = 1;
            } else {
                $res_Impregnancia = 0;
            }
        }

        #Calculo de Secuencia
        $secuenciaRemedio = $this->getSecuencia($remedio->id, $data['apodo']);
        if (!$secuenciaRemedio) {
            $secuenciaRemedio = 0;
        }

        $analisisCombinadoXremedio['remedio'] = $remedio->nombre;
        $analisisCombinadoXremedio['rsm'] = $res_rsm;
        $analisisCombinadoXremedio['Impregnancia'] = $res_Impregnancia;
        $analisisCombinadoXremedio['Secuencia'] = $secuenciaRemedio;
        $analisisCombinadoXremedio['Consonantes'] = $remedio->puros;
        $analisisCombinadoXremedio['Claves'] = $remedio->tipoRemedioClave;
        $analisisCombinadoXremedio['suma'] = 0;

        if ($filtro1) {
            $analisisCombinadoXremedio['suma'] += $res_rsm;
        }
        if ($filtro2) {
            $analisisCombinadoXremedio['suma'] += $res_Impregnancia;
        }
        if ($filtro3) {
            $analisisCombinadoXremedio['suma'] += $secuenciaRemedio;
        }
        if ($filtro4) {
            $analisisCombinadoXremedio['suma'] += $remedio->puros;
        }
        if ($filtro5) {
            $analisisCombinadoXremedio['suma'] += $remedio->tipoRemedioClave;
        }

        return $analisisCombinadoXremedio;
    }

//    public function calcularAnalisisCombinado($remedios, $data, $predominante)
//    {
//
//        $rsm9 = $this->existenRsm9($remedios, $data);
//
//        $analisisCombinado = array();
//
//        foreach ($remedios as $index => $remedio) {
//
//            $analisisCombinado[$index]       = $this->calcularAnalisisCombinadoXremedio($remedio, $data, $predominante, $rsm9);
//
//        }
//
//        return $analisisCombinado;
//    }

    public function calcularAnalisis(Request $request)
    {

        $input = $request->all();

        $estudio_id = $input['estudio_id'];
        $remedios = json_decode($input['remedios']);
        $data = (array)json_decode($input['data']);
        $predominante = json_decode($input['predominante']);
        $rsm9 = $this->existenRsm9($remedios, $data);
        $analisis = array();

        $filtro1 = $input['filtro1'];
        $filtro2 = $input['filtro2'];
        $filtro3 = $input['filtro3'];
        $filtro4 = $input['filtro4'];
        $filtro5 = $input['filtro5'];

        foreach ($remedios as $index => $remedio) {

            $analisisCombinado = $this->calcularAnalisisCombinadoXremedio($remedio, $data, $predominante, $rsm9, $filtro1, $filtro2, $filtro3, $filtro4, $filtro5);
            $remedioReino = $this->getImgReino($remedio->pregnancia);

            $analisis[$index]['remedio_id'] = $remedio->id;
            $analisis[$index]['remedio'] = $remedio->nombre;
            $analisis[$index]['suma_analisis_combinado'] = $analisisCombinado['suma'];
            $analisis[$index]['reino'] = $remedioReino['reino'];
            $analisis[$index]['clave'] = $remedio->tipoRemedioClave;
        }

        switch ($input['orden']) {
            case "1":
                $analisis = collect($analisis)->sortBy('remedio')->toArray();
                break;
            case "2":
                $analisis = collect($analisis)->sortByDesc('suma_analisis_combinado')->toArray();
                break;
            case "3":
                $analisis = collect($analisis)->sortBy('reino')->toArray();
                break;
        }

        $htmltabla = '';
        foreach ($analisis AS $item) {
            $clave = '';
            if ($item['clave']) {
                $clave = '<i class="fas fa-star text-success"></i>';
            }

            $nota = EstudioNota::select('nota')
                                ->where('estudio_id','=',$estudio_id)
                                ->where('remedio_id','=',$item['remedio_id'])
                                ->first();
            $notavalue = '';
            if($nota) {
                $notavalue = $nota->nota;
            }

            $htmltabla .= '<tr>';
            $htmltabla .= '<td>' . $item['remedio'] . '</td >';
            $htmltabla .= '<td>' . $item['suma_analisis_combinado'] . '</td >';
            $htmltabla .= '<td>' . $item['reino'] . '</td >';
            $htmltabla .= '<td align="center">' . $clave . '</td >';
            $htmltabla .= '<td><div class="input-group" >';
            $htmltabla .= '<input id="nota'.$item['remedio_id'].'" type = "text" class="form-control" placeholder = "Escriba una nota" value="'.$notavalue.'" ><div class="input-group-append" >';
            $htmltabla .= '<button class="btn btn-success btnGuardarNota" data-remedioid="'.$item['remedio_id'].'" type = "button" ><i class="fas fa-save" ></i ></button >';
            $htmltabla .= '&nbsp;<div id="msg'.$item['remedio_id'].'"></div></div ></div ></td >';
            $htmltabla .= '</tr>';
        }

        return $htmltabla;
    }

    public function guardarNota(Request $request)
    {
        $estudioNota = EstudioNota::create($request->all());
        return $estudioNota;
    }

    public function existenRsm9($remedios, $data)
    {
        $rsm9 = 0;
        foreach ($remedios as $index => $remedio) {
            $rsm = $this->getRsm(
                $remedio->id,
                $data['iniciales'],
                $data['dia'],
                $data['mes'],
                $data['anio'],
                $data['nombre'],
                $data['apellido']
            );

            if ($rsm == 9) {
                $rsm9 = 1;
            }
        }

        return $rsm9;
    }

    public function getImpregnaciaPredominante($impPacienteAnimal, $impPacienteVegetal, $impPacienteMineral)
    {
        if ($impPacienteAnimal > $impPacienteVegetal) {
            if ($impPacienteAnimal > $impPacienteMineral) {
                $impregnaciaPredominante = 'Animal';
            } else {
                $impregnaciaPredominante = 'Mineral';
            }
        } else {
            if ($impPacienteVegetal > $impPacienteMineral) {
                $impregnaciaPredominante = 'Vegetal';
            } else {
                $impregnaciaPredominante = 'Mineral';
            }
        }

        return $impregnaciaPredominante;
    }

    public function getSecuenciaPaciente($apodo)
    {
        $tope = strlen($apodo);
        $tope++;
        $secuenciaPaciente = '';
        for ($i = 0; $i < $tope; $i++) {
            $vocal = substr($apodo, $i, 1);
            $vocal = strtoupper($vocal);
            Switch ($vocal) {
                case 'A' :
                    $secuenciaPaciente .= 1;
                    break;
                case 'E' :
                    $secuenciaPaciente .= 6;
                    break;
                case 'I' :
                    $secuenciaPaciente .= 1;
                    break;
                case 'O' :
                    $secuenciaPaciente .= 9;
                    break;
                case 'U' :
                    $secuenciaPaciente .= 6;
                    break;
                case 'Y' :
                    $secuenciaPaciente .= 1;
                    break;
            }
        }

        return $secuenciaPaciente;
    }
}
