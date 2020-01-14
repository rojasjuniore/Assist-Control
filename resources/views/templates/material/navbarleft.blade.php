<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
    @include('templates.application.components.sidebar-profile')
    <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            @if(auth()->check())
                <ul id="sidebarnav">
                    <li>
                        <a href="{{route('home-one')}}" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="hide-menu">{{ _i('Inicio') }}</span>
                        </a>
                    </li>
                    @if(\App\Menu::menus()!='')
                        @foreach (\App\Menu::menus() as $key => $item)
                            @if ($item['padre'] == 0)
                                @include('templates.material.menu-item', ['item' => $item])
                            @endif
                        @endforeach
                    @endif
                </ul>
            @endif
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
    {{--  <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
     <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> --}}
    <!-- item-->  <a href="/logout" class="link" data-toggle="tooltip" title="Cerrar sesión"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->