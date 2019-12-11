<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
       href="" data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="profile-pic"/>
    </a>
    <div class="dropdown-menu dropdown-menu-right scale-up">
        <ul class="dropdown-user">
            <li>
                <div class="dw-user-box">
                    <div class="text-center">
                        {{--Replace with User image here--}}
                        <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="profile-pic" style="width: 5em"/>
                    </div>
                    <div class="text-center">
                        <h4>{{ Auth::user()->nombre }}</h4>
                        <p class="text-muted">Rol: {{ Auth::user()->perfiles->rol->name }}</p>
                    </div>
                </div>
            </li>
            <li role="separator" class="divider"></li>
            <li><a href="/perfil"><i class="ti-user"></i> Perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
        </ul>
    </div>
</li>
