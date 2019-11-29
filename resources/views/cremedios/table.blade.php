<table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Idmatmed</th>
        <th>Id Cremedios</th>
        <th>Col C</th>
        <th>Col D</th>
        <th>Col E</th>
        <th>Pregnancia</th>
        <th>Nombre</th>
        <th>Tipoclasico</th>
        <th>Tipopolicresto</th>
        <th>Tipoavanzado</th>
        <th>Tiporemedioclave</th>
        <th>Puros</th>
        <th>Secuencia</th>
            <th style="width: auto">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cremedios as $cremedios)
        <tr>
            <td>{!! $cremedios->idMatMed !!}</td>
            <td>{!! $cremedios->id_cremedios !!}</td>
            <td>{!! $cremedios->col_c !!}</td>
            <td>{!! $cremedios->col_d !!}</td>
            <td>{!! $cremedios->col_e !!}</td>
            <td>{!! $cremedios->pregnancia !!}</td>
            <td>{!! $cremedios->nombre !!}</td>
            <td>{!! $cremedios->tipoClasico !!}</td>
            <td>{!! $cremedios->tipoPolicresto !!}</td>
            <td>{!! $cremedios->tipoAvanzado !!}</td>
            <td>{!! $cremedios->tipoRemedioClave !!}</td>
            <td>{!! $cremedios->puros !!}</td>
            <td>{!! $cremedios->secuencia !!}</td>
            <td>
                <center>
                {!! Form::open(['route' => ['cremedios.destroy', $cremedios->id], 'method' => 'delete']) !!}
                <a href="">
                    <a href="{!! route('cremedios.show', [$cremedios->id]) !!}" >
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{!! route('cremedios.edit', [$cremedios->id]) !!}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('¿Realmente desea eliminar el elemento seleccionado?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                </a>
                {!! Form::close() !!}
                </center>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
