<div class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if (Auth::user()->role == 'admin')
                    @include('admin.partials.options.admin')
                @else
                    @include('admin.partials.options.user')
                @endif
            </ul>
        </nav>
    </div>
</div>