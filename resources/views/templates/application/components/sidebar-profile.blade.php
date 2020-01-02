<div class="user-profile" style="background: url({{asset('images/bguser.jpg')}}) no-repeat;">
    <!-- User profile image -->
    <div class="profile-img text-center">
        @if (Auth::user()->avatar)
            <img src="{{Auth::user()->avatar}}" alt="user"/>
        @else
            <img src="/vendor/wrappixel/material-pro/4.2.1/assets/images/users/1.jpg" alt="user" class="img-fluid"/>
        @endif
    </div>
    <!-- User profile text-->
    <div class="profile-text">

        <a href="#" class="dropdown-toggle u-dropdown popopUserProfile" onclick="return false">
            {{ Auth::user()->nombre }}
        </a>

        <div class="dropdown-menu animated flipInY" id="popopUserProfile">

           {{--  <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
            <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
             <div class="dropdown-divider"></div>
             --}}

           
            <a href="/perfil" class="dropdown-item"><i class="fa fa-user"></i> Perfil</a>
            <a href="/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar sesión</a>

        </div>
    </div>
</div>