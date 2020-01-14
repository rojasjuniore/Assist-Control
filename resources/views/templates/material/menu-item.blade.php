<?php
#Listado de Etiquetas del Menu para que sean incluidas en la traduccion debido a que son valores de BD
_i('Sistema');
_i('Configuración');

?>
@if ($item['submenu'] == [])
    @can($item['ruta'])
        <li>
            <a href="{{ ($item['ruta']!='#')? route($item['ruta']) : '#' }}" aria-expanded="false">
                <i class="{{$item['icono']}}"></i>
                <span class="hide-menu">{{_i($item['menu'])}}</span>
            </a>
        </li>
    @endcan
@else
    @can($item['ruta'])
        <li>
            <a class="has-arrow" href="#" aria-expanded="false">
                <i class="{{$item['icono']}}"></i>
                <span class="hide-menu">{{ _i($item['menu']) }}</span>
            </a>
            <ul aria-expanded="false" class="collapse">
                @foreach ($item['submenu'] as $submenu)
                    @if ($submenu['submenu'] == [])
                        @can($submenu['ruta'])
                            <li>
                                <a href="{{ ($submenu['ruta']!='#')? route($submenu['ruta']) : '#' }}">
                                    <i class="{{$submenu['icono']}}"></i>
                                    {{ _i($submenu['menu']) }}
                                </a>
                            </li>
                        @endcan
                    @else
                        @include('templates.material.menu-item', [ 'item' => $submenu ])
                    @endif
                @endforeach
            </ul>
        </li>
    @endcan
@endif