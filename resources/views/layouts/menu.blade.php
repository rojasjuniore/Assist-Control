<li class="{{ Request::is('tipos*') ? 'active' : '' }}">
    <a href="{{ route('tipos.index') }}"><i class="fa fa-edit"></i><span>Tipos</span></a>
</li>

<li class="{{ Request::is('asistencias*') ? 'active' : '' }}">
    <a href="{{ route('asistencias.index') }}"><i class="fa fa-edit"></i><span>Asistencias</span></a>
</li>

