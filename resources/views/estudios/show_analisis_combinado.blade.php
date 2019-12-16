<h2>Análisis Combinado</h2><hr>

<div class="row">
    <div class="col-sm-2">Filtrar:</div>
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

<div class="row">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm ml-3 mt-3" id="data-table-analisis-combinado">
        <thead class="thead-light">
            <tr>
                <th>&nbsp;</th>
                @foreach($AnalisisCombinados AS $AnalisisCombinado)
                    <th style="text-align: center !important;">{{$AnalisisCombinado['remedio']}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr style="border-bottom: 5px #CCC solid;">
                <th>Suma</th>
                @foreach($AnalisisCombinados AS $AnalisisCombinado)
                    <th style="text-align: center !important;">{{$AnalisisCombinado['suma']}}</th>
                @endforeach
            </tr>
            <tr id="divRSM">
                <td>RSM</td>
                @foreach($AnalisisCombinados AS $AnalisisCombinado)
                    <td style="text-align: center !important;">{{$AnalisisCombinado['rsm']}}</td>
                @endforeach
            </tr>
            <tr id="divImpregnancia">
                <td>Impregnancia</td>
                @foreach($AnalisisCombinados AS $AnalisisCombinado)
                    <td style="text-align: center !important;">{{$AnalisisCombinado['Impregnancia']}}</td>
                @endforeach
            </tr>
            <tr id="divSecuencia">
                <td>Secuencia</td>
                @foreach($AnalisisCombinados AS $AnalisisCombinado)
                    <td style="text-align: center !important;">{{$AnalisisCombinado['Secuencia']}}</td>
                @endforeach
            </tr>
            <tr id="divConsonantes">
                <td>Consonantes</td>
                @foreach($AnalisisCombinados AS $AnalisisCombinado)
                    <td style="text-align: center !important;">{{$AnalisisCombinado['Consonantes']}}</td>
                @endforeach
            </tr>
            <tr id="divClaves">
                <td>Claves</td>
                @foreach($AnalisisCombinados AS $AnalisisCombinado)
                    <td style="text-align: center !important;">{{$AnalisisCombinado['Claves']}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
    </div>
</div>