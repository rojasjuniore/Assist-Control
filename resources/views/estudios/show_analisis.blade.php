<h2>Análisis</h2>
<hr>

<div class="row">
    <div class="col-sm-2">Ordenar:</div>
    <div class="col-sm-3">
        <button class="btn btn-success btn-sm btn-round btn-block" id="btnRMS1" type="button">Alfabeticamente</button>
    </div>
    <div class="col-sm-4">
        <button class="btn btn-outline-success btn-sm btn-round btn-block" id="btnImpregnancia1" type="button">Por Análisis Combinado</button>
    </div>
    <div class="col-sm-3">
        <button class="btn btn-outline-success btn-sm btn-round btn-block" id="btnSecuencia1" type="button">Por Reino</button>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm-2">Filtrar por:</div>
    <div class="col-sm-2">
        <button class="btn btn-success btn-sm btn-round btn-block" id="btnRMS1" type="button">RMS</button>
    </div>
    <div class="col-sm-2">
        <button class="btn btn-success btn-sm btn-round btn-block" id="btnImpregnancia1" type="button">Impregnancia</button>
    </div>
    <div class="col-sm-2">
        <button class="btn btn-success btn-sm btn-round btn-block" id="btnSecuencia1" type="button">Secuencia</button>
    </div>
    <div class="col-sm-2">
        <button class="btn btn-success btn-sm btn-round btn-block" id="btnConsonante1" type="button">Consonante</button>
    </div>
    <div class="col-sm-2">
        <button class="btn btn-success btn-sm btn-round btn-block" id="btnClave1" type="button">Clave</button>
    </div>
</div>

<div class="row mt-4">

    <div class="col-sm-12">
        <table id="data-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Medicamento</th>
                <th>#Análisis Combinado</th>
                <th>Reino</th>
                <th>Remedios Clave</th>
                <th>Notas</th>
            </tr>
            </thead>
            <tbody>
            @foreach($analisis AS $item)
                <tr>
                    <td>{{$item['remedio']}}</td>
                    <td>{{$item['suma_analisis_combinado']}}</td>
                    <td>{{$item['reino']}}</td>
                    <td align="center">
                        @if ($item['clave'])
                            <i class="fas fa-star"></i>
                        @endif
                    </td>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escriba una nota">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button">
                                    <i class="fas fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>