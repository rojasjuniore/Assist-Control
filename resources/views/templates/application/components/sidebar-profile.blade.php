<div class="user-profile" style="background: url({{asset('vendor/wrappixel/material-pro/4.2.1/assets/images/userbg.png')}}) no-repeat;">
    <!-- User profile image -->
    <div class="profile-img">
        @if (Auth::user()->avatar)
            <img src="{{Auth::user()->avatar}}" alt="user"/>
        @else
            <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user"/>
        @endif
    </div>
    <!-- User profile text-->
    <div class="profile-text">

        <a href="#"
           class="dropdown-toggle u-dropdown"
           data-toggle="dropdown"
           role="button"
           aria-haspopup="true"
           aria-expanded="false"
        >
            {{ Auth::user()->nombre }}
        </a>

        <div class="dropdown-menu animated flipInY">

           {{--  <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
             <div class="dropdown-divider"></div>
             --}}

           
            <a href="/perfil" class="dropdown-item"><i class="fa fa-user"></i>Perfil</a>
            <a href="/logout" class="dropdown-item"><i class="fa fa-power-off"></i>Cerrar sesión</a>

        </div>
    </div>
</div>
