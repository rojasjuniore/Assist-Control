<table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Id Usuario</th>
        <th>Tipo</th>
        <th>H Nombre</th>
        <th>H Apellido</th>
        <th>H Identifica</th>
        <th>H Iniciales</th>
        <th>H Dia</th>
        <th>H Mes</th>
        <th>H Anio</th>
        <th>H Pais</th>
        <th>A Especie</th>
        <th>A Duenio</th>
        <th>A Animal</th>
        <th>A Iniciales</th>
        <th>A Dia</th>
        <th>A Mes</th>
        <th>A Anio</th>
        <th>Ip</th>
        <th>User Agent</th>
        <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($estudios as $estudios)
        <tr>
            <td>{!! $estudios->id_usuario !!}</td>
            <td>{!! $estudios->tipo !!}</td>
            <td>{!! $estudios->h_nombre !!}</td>
            <td>{!! $estudios->h_apellido !!}</td>
            <td>{!! $estudios->h_identifica !!}</td>
            <td>{!! $estudios->h_iniciales !!}</td>
            <td>{!! $estudios->h_dia !!}</td>
            <td>{!! $estudios->h_mes !!}</td>
            <td>{!! $estudios->h_anio !!}</td>
            <td>{!! $estudios->h_pais !!}</td>
            <td>{!! $estudios->a_especie !!}</td>
            <td>{!! $estudios->a_duenio !!}</td>
            <td>{!! $estudios->a_animal !!}</td>
            <td>{!! $estudios->a_iniciales !!}</td>
            <td>{!! $estudios->a_dia !!}</td>
            <td>{!! $estudios->a_mes !!}</td>
            <td>{!! $estudios->a_anio !!}</td>
            <td>{!! $estudios->ip !!}</td>
            <td>{!! $estudios->user_agent !!}</td>
            <td>{!! $estudios->fecha !!}</td>
            <td>
                <center>
                {!! Form::open(['route' => ['estudios.destroy', $estudios->id], 'method' => 'delete']) !!}
                <a href="">
                    <a href="{!! route('estudios.show', [$estudios->id]) !!}" >
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{!! route('estudios.edit', [$estudios->id]) !!}">
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
