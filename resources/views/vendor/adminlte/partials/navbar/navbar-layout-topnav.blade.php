<nav
    class="main-header navbar {{ config('adminlte.classes_topnav_nav', 'navbar-expand-md') }} {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    @php
        $currentRoute = \Route::currentRouteName();
    @endphp
    <div class="{{ config('adminlte.classes_topnav_container', 'container') }}">

        {{-- Navbar brand logo --}}
        @if (config('adminlte.logo_img_xl'))
            @include('adminlte::partials.common.brand-logo-xl')
        @else
            @include('adminlte::partials.common.brand-logo-xs')
        @endif

        {{-- Navbar toggler button --}}
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar collapsible menu --}}
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            {{-- Navbar left links --}}
            <ul class="nav navbar-nav">
                {{-- Configured left links --}}
                {{-- @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item') --}}
                <li class="nav-item">
                    <a href="{{ route('funcionario.index') }}"
                        class="nav-link @if ($currentRoute === 'funcionario.index') active @endif">
                        <p>
                            Funcionários
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vacina.index') }}"
                        class="nav-link @if ($currentRoute === 'funcionario.index') active @endif">
                        <p>
                            Vacinas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('aplicacao.index') }}"
                        class="nav-link @if ($currentRoute === 'funcionario.index') active @endif">
                        <p>
                            Aplicações
                        </p>
                    </a>
                </li>
                {{-- Custom left links --}}
                @yield('content_top_nav_left')
            </ul>
        </div>

        {{-- Navbar right links --}}
        <ul class="navbar-nav ml-auto order-1 order-md-3 navbar-no-expand">
            {{-- Custom right links --}}
            @yield('content_top_nav_right')

            {{-- Configured right links --}}
            @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

            {{-- User menu link --}}
            @include('utils.layout.menuHeader')
        </ul>
    </div>

</nav>
