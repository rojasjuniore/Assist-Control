<h2>Análisis desplegado</h2>
<hr>
<table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
    <tr>
        <th>ID</th>
        <th>Reino</th>
        <th>Medicamento</th>
        <th>RSM</th>
        <th>Consonantes</th>
        <th>Clave</th>
        <th>Secuencia</th>
        <th>Recetado</th>
    </tr>
    </thead> <?php  ?>
    <tbody>
    @foreach($remedios as $remedio)
        <tr>
            <td>
                {{$remedio->id}}
            </td>
            <td>
                
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

                
            </td>
            <td>
                {{$remedio->nombre}}
            </td>
            <td>
                <?php echo \App\Http\Controllers\EstudiosController::getRsm(
                        $remedio->id,
                        $estudios->h_iniciales,
                        $estudios->h_dia,
                        $estudios->h_mes,
                        $estudios->h_anio,
                        $estudios->h_nombre,
                        $estudios->h_apellido
                    ); ?>
            </td>

            <td>
                
                    <?php
                    if ($remedio->puros == 1) {
                    ?><i class="fas fa-star"></i><?php
                    }
                    ?>
                
            </td>
            <td>
                
                    <?php
                    if ($remedio->tipoRemedioClave == 1) {
                    ?><i class="fas fa-star"></i><?php
                    }
                    ?>
                
            </td>
            <td>
                
                    <?php
                    $secuencia = \App\Http\Controllers\EstudiosController::getSecuencia($remedio->id, $estudios->h_identifica);
                    if ($secuencia) {
                    ?><i class="fas fa-star"></i><?php
                    }
                    ?>
                
            </td>
            <td>
                
                    <input type="checkbox" value="{{$remedio->id}}" name="check_{{$remedio->id}}" id="check_{{$remedio->id}}" class="js-switch"/>
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
