<li id="BarIdioma" class="nav-item dropdown" @if(!Auth::user())style="list-style: none"@endif>
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark BarIdioma" href="#" onclick="return false">

        @if(!Auth::user())
            {{ _i('Idioma') }}: &nbsp;
        @endif
        @switch(LaravelGettext::getLocale())
            @case('es_ES')
            <i class="flag-icon flag-icon-es"></i>
            @break
            @case('en_US')
            <i class="flag-icon flag-icon-us"></i>
            @break
        @endswitch
    </a>
    <div class="dropdown-menu dropdown-menu-right scale-up">

        @foreach(Config::get('laravel-gettext.supported-locales') as $locale)

            <a class="dropdown-item" href="/lang/{{$locale}}">
                @switch($locale)
                    @case('es_ES')
                    <i class="flag-icon flag-icon-es"></i> Español
                    @break
                    @case('en_US')
                    <i class="flag-icon flag-icon-us"></i> English
                    @break
                @endswitch
            </a>

        @endforeach

    </div>
</li>
