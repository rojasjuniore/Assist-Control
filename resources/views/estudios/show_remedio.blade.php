<h2>Análisis desplegado</h2><hr>
<table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
    <thead >
    <tr>
        <th><center>ID</center></th>
        <th><center>Reino</center></th>
        <th><center>Medicamento</center></th>
        <th><center>RSM</center></th>
        <th><center>Consonantes</center></th>
        <th><center>Clave</center></th>
        <th><center>Secuencia</center></th>
        <th><center>Recetado</center></th>
    </tr>
    </thead> <?php  ?>
    <tbody>
    @foreach($remedios as $remedio)
        <tr >
            <td><center>{{$remedio->id}}</center></td>
            <td>
                <center>
                    <?php
                    $dataReino = \App\Http\Controllers\EstudiosController::getImgReino($remedio->pregnancia);
//                    var_dump($dataReino);
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            {{$dataReino['reino']}}
                        </div>
                        <div class="col-sm-6">
                            <img src="{{$dataReino['img']}}">
                        </div>
                    </div>

                </center>
            </td>
            <td><center>{{$remedio->nombre}}</center></td>
            <td><center><?php echo \App\Http\Controllers\EstudiosController::getRsm(
                        $remedio->id,
                        $estudios->h_iniciales,
                        $estudios->h_dia,
                        $estudios->h_mes,
                        $estudios->h_anio,
                        $estudios->h_nombre,
                        $estudios->h_apellido
                    ); ?></center></td>
            <td><center>-</center></td>
            <td>
                <center>
                    <?php
                    if ($remedio->tipoRemedioClave == 1) {
                        ?><i class="fas fa-star"></i><?php
                    }
                    ?>
                </center>
            </td>
            <td><center>-</center></td>
            <td>
                <center>
                    <input type="checkbox" value="{{$remedio->id}}" name="check_{{$remedio->id}}" id="check_{{$remedio->id}}" class="js-switch" />
                </center>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
