<nav class="navbar top-navbar navbar-expand-md navbar-light">

    <div class="navbar-header">

        <a class="navbar-brand" href="{{ route('home') }}">

            <b><img src="{{ asset('158624558/images/logo.png') }}" alt="homepage" class="dark-logo" /></b>

          

        </a>

    </div>

    <div class="navbar-collapse">

        <ul class="navbar-nav mr-auto mt-md-0">

            <li class="nav-item m-l-10">

                <a class="nav-link sidebartoggler text-muted" href="javascript:void(0)">

                    <i class="fa fa-bars"></i>

                </a>

            </li>

            <li class="nav-item m-l-10 pt-3">

                <b>Bienvenid@, {{ Auth::user()->name . ' ' . Auth::user()->surname}}</b>

            </li>

        </ul>

        <ul class="navbar-nav my-lg-0">

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <i class="fa fa-user" aria-hidden="true"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-right animated zoomIn">

                    <ul class="dropdown-user">

                        {{-- <li><a href="#"><i class="fa fa-user"></i> Profile</a></li> --}}

                        {{-- <li><a href="#"><i class="ti-wallet"></i> Balance</a></li> --}}

                        {{-- <li><a href="#"><i class="ti-email"></i> Inbox</a></li> --}}

                        {{-- <li><a href="#"><i class="ti-settings"></i> Setting</a></li> --}}

                        <li>

                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                <i class="fa fa-power-off"></i> Logout

                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                {{ csrf_field() }}

                            </form>

                        </li>

                    </ul>

                </div>

            </li>

        </ul>

    </div>

</nav>