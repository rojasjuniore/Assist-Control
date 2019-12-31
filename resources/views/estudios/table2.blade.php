<table style="width: 100%; font-size: 14px;" id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
    <tr>
        <th>Tipo</th>
        <th>Nombre/Especie</th>
        <th>Apellido/Dueño</th>
        <th>Identifica/Animal</th>
        <th>Iniciales</th>
        <th>Dia</th>
        <th>Mes</th>
        <th>Año</th>
        <th>Pais</th>
        <th style="width: auto">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($estudioss as $estudios)
        <tr>
            @if($estudios->tipo=='humano')
                <td>{!! $estudios->tipo !!}</td>
                <td>{!! $estudios->h_nombre !!}</td>
                <td>{!! $estudios->h_apellido !!}</td>
                <td>{!! $estudios->h_identifica !!}</td>
                <td>{!! $estudios->h_iniciales !!}</td>
                <td>{!! $estudios->h_dia !!}</td>
                <td>{!! $estudios->h_mes !!}</td>
                <td>{!! $estudios->h_anio !!}</td>
                <td>{!! $estudios->pais->name !!}</td>
            @else
                <td>{!! $estudios->tipo !!}</td>
                <td>{!! $estudios->a_especie !!}</td>
                <td>{!! $estudios->a_duenio !!}</td>
                <td>{!! $estudios->a_animal !!}</td>
                <td>{!! $estudios->a_iniciales !!}</td>
                <td>{!! $estudios->a_dia !!}</td>
                <td>{!! $estudios->a_mes !!}</td>
                <td>{!! $estudios->a_anio !!}</td>
                <td>&nbsp;</td>
            @endif
            <td style="width: 10em !important;">
                @can('estudios.show')
                    <a href="{{route('estudios.show', $estudios->id)}}" class="btn btn-outline-success btn-round btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                @endcan
                @can('estudios.edit')
                    <a href="{{route('estudios.edit', $estudios->id)}}" class="btn btn-outline-success btn-round btn-sm">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                @endcan
                @can('estudios.destroy')
                    {!! Form::open(['route' => ['estudios.destroy', $estudios->id], 'method' => 'delete','class' => 'd-inline']) !!}
                    <button class="btn btn-outline-success btn-round btn-sm" onclick="return confirm('¿Realmente desea eliminar el elemento seleccionado?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    {!! Form::close() !!}
                @endcan

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
