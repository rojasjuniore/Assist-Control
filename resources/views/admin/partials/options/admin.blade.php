<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Escritorio">
    <a class="nav-link {{ Request::is('home') ? 'nav-link-active' : '' }}" href="{{ route('home') }}">
        <i class="fa fa-tachometer icon-menu" aria-hidden="true"></i>
        <span class="nav-link-text">Escritorio</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
    <a class="nav-link {{ Request::is('users') ? 'nav-link-active' : '' }}" href="{{ route('users.index') }}">
        <i class="fa fa-users icon-menu" aria-hidden="true"></i>
        <span class="nav-link-text">Usuarios</span>
    </a>
</li> 
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Giftcards">
    <a class="nav-link {{ Request::is('giftcards') ? 'nav-link-active' : '' }}" href="{{ route('giftcards.index') }}">
        <i class="fa fa-gift icon-menu" aria-hidden="true"></i>
        <span class="nav-link-text">Giftcards</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Combos">
    <a class="nav-link {{ Request::is('giftcards/combos') ? 'nav-link-active' : '' }}" href="{{ route('giftcards.combos') }}">
        <i class="fa fa-archive icon-menu" aria-hidden="true"></i>
        <span class="nav-link-text">Combos</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Transferencias">
    <a class="nav-link {{ Request::is('transfers') ? 'nav-link-active' : '' }}" href="{{ route('transfers.index') }}">
        <i class="fa fa-exchange icon-menu" aria-hidden="true"></i>
        <span class="nav-link-text">Transferencias</span>
    </a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pedidos">
    <a class="nav-link {{ Request::is('orders') ? 'nav-link-active' : '' }}" href="{{ route('orders.index') }}">
        <i class="fa fa-shopping-bag icon-menu" aria-hidden="true"></i>
        <span class="nav-link-text">Pedidos</span>
    </a>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfil">
    <a class="nav-link {{ Request::is('users/profile') ? 'nav-link-active' : '' }}" href="{{ route('users.profile') }}">
        <i class="fa fa-cogs icon-menu" aria-hidden="true"></i>
        <span class="nav-link-text">Perfil</span>
    </a>
</li>
</li>