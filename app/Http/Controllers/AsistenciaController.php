<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsistenciaRequest;
use App\Http\Requests\UpdateAsistenciaRequest;
use App\Models\Asistencia;
use App\Repositories\AsistenciaRepository;
use App\Http\Controllers\AppBaseController;
use Doctrine\DBAL\Events;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;

class AsistenciaController extends AppBaseController
{
    /** @var  AsistenciaRepository */
    private $asistenciaRepository;

    public function __construct(AsistenciaRepository $asistenciaRepo)
    {
        $this->asistenciaRepository = $asistenciaRepo;
    }

    /**
     * Display a listing of the Asistencia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asistenciaRepository->pushCriteria(new RequestCriteria($request));
        $asistencias = $this->asistenciaRepository->all();

        return view('asistencias.index')
            ->with('asistencias', $asistencias);
    }


    /**
     * Display the specified Asistencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asistencia = $this->asistenciaRepository->findWithoutFail($id);

        if (empty($asistencia)) {
            Flash::error('Asistencia not found');

            return redirect(route('asistencias.index'));
        }

        return view('asistencias.show')->with('asistencia', $asistencia);
    }

//    /**
//     * Show the form for editing the specified Asistencia.
//     *
//     * @param  int $id
//     *
//     * @return Response
//     */
//    public function edit($id)
//    {
//        $asistencia = $this->asistenciaRepository->findWithoutFail($id);
//
//        if (empty($asistencia)) {
//            Flash::error('Asistencia not found');
//
//            return redirect(route('asistencias.index'));
//        }
//
//        return view('asistencias.edit')->with('asistencia', $asistencia);
//    }

    /**
     * Update the specified Asistencia in storage.
     *
     * @param  int              $id
     * @param UpdateAsistenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsistenciaRequest $request)
    {
        $asistencia = $this->asistenciaRepository->findWithoutFail($id);

        if (empty($asistencia)) {
            Flash::error('Asistencia not found');

            return redirect(route('asistencias.index'));
        }

        $asistencia = $this->asistenciaRepository->update($request->all(), $id);

        Flash::success('Asistencia updated successfully.');

        return redirect(route('asistencias.index'));
    }

    public function mensual()
    {

        $now = Carbon::now();
        $mesActual = $now->format('n');
        $anoActual = $now->format('Y');
        $meses = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];

        return view('asistencias.mensual', compact('mesActual', 'anoActual', 'meses'));
    }

    public function semanal()
    {
        $now = Carbon::now();

        $hoy = $now->format('d-m-Y');

        return view('asistencias.semanal', compact('hoy'));
    }

    public function searchMensual(Request $request)
    {

        $mes = $request->input('mes');
        $ano = $request->input('ano');

        $mesDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        $asistentes = Asistencia::groupBy('user_id')->get();

        $tabla = array();
        foreach ($asistentes AS $index => $asistente){
            $tabla[$index]['asistente'] = $asistente->usuarios->nombre;
            $tabla[$index]['dias'] = array();

            for ($nroDia = 1; $nroDia <= $mesDias; $nroDia++){
                $horaAsistencia = Asistencia::where('user_id', $asistente->user_id)
                    ->where('fecha', $ano.'-'.$mes.'-'.$nroDia)
                    ->first();

                if($horaAsistencia){
                    $tabla[$index]['dias'][$nroDia] = $horaAsistencia->created_at->format('H:m');
                }else{
                    $tabla[$index]['dias'][$nroDia] = '';
                }
            }
        }

        $data = '<table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="bg-grisclaro">Asistentes/Días</th>';
                        for ($i = 1; $i <= $mesDias; $i++) {
                            $data .= '<th class="bg-grisclaro text-center">'.str_pad($i, 2, '0', STR_PAD_LEFT).'</th>';
                        }
                    $data .= '</tr>
                    </thead>
                    <tbody>';
                    foreach($tabla AS $item) {
                        $data .= '<tr>
                            <th class="bg-grisclaro">' . $item['asistente'] . '</th>';
                        foreach ($item['dias'] AS $hora) {
                            $data .= '<td class="align-middle"><h6>' . $hora . '</h6></td>';
                        }
                        $data .= '</tr>';
                    }
                    $data .= '</tbody>
                </table>';

        return $data;
    }

    public function searchSemanal(Request $request)
    {

        $firstDate = $request->input('firstDate');
        $lastDate = $request->input('lastDate');

        $asistentes = Asistencia::groupBy('user_id')->get();

        $tabla = array();
        foreach ($asistentes AS $index => $asistente){
            $tabla[$index]['asistente'] = $asistente->usuarios->nombre;
            $tabla[$index]['fechas'] = array();

            $asistencias = Asistencia::where('user_id', $asistente->user_id)
                ->where([
                    ['fecha','>=', $firstDate],
                    ['fecha','<=', $lastDate],
                ])
                ->get();

            foreach ($asistencias AS $i=>$asistencia){
//                $tabla[$index]['fechas'][$i]['diaSemana'] = $asistencia->created_at->format('N');
                $tabla[$index]['fechas'][$asistencia->created_at->format('N')]['fecha'] = $asistencia->created_at->format('Y-m-d');
                $tabla[$index]['fechas'][$asistencia->created_at->format('N')]['hora'] = $asistencia->created_at->format('H:m');
            }

        }

        $data = '<table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="bg-grisclaro">'._i('Asistentes/Días').'</th>
                        <td class="bg-grisclaro">'._i('Lunes').'</td>
                        <td class="bg-grisclaro">'._i('Martes').'</td>
                        <td class="bg-grisclaro">'._i('Miércoles').'</td>
                        <td class="bg-grisclaro">'._i('Jueves').'</td>
                        <td class="bg-grisclaro">'._i('Viernes').'</td>
                        <td class="bg-grisclaro">'._i('Sábado').'</td>                        
                        <td class="bg-grisclaro">'._i('Domingo').'</td>
                    </tr>
                    </thead>
                    <tbody>';
                    foreach($tabla AS $item) {
                        $data .= '<tr><th class="bg-grisclaro">' . $item['asistente'] . '</th>';

                        ksort($item['fechas']);

                        for ($x = 1; $x <= 7; $x++) {
                            $lleno = 0;
                            foreach ($item['fechas'] AS $j=>$datos) {

                                if($j==$x){
                                    $lleno = 1;
                                    $data .= '<td class="align-middle"><h6>' . $datos['hora'] . '</h6></td>';
                                }
                            }
                            if(!$lleno){
                                $data .= '<td class="align-middle"></td>';
                            }
                        }
                        $data .= '</tr>';
                    }
                    $data .= '</tbody>
                </table>';

        return $data;
    }
}
