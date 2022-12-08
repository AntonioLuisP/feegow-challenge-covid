@auth
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <span>
                {{ Auth::user()->name }}
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <li class="user-header bg-gray h-auto">
                <p>
                    {{ Auth::user()->formatName() }}
                </p>
            </li>
            {{-- <li class="user-body border-bottom-0">
                <a href="{{ route('user.show', ['user' => Auth::user()->id]) }}" class="btn btn-sm btn-default btn-flat">Ver Conta</a>
                <a href="{{ route('user.edit', ['user' => Auth::user()->id]) }}"
                    class="btn btn-sm btn-default btn-flat float-right">Editar conta</a>
            </li> --}}
            <li class="user-footer">
                <a class="btn btn-sm btn-default btn-flat  float-right btn-block" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off text-red"></i>
                    {{ __('adminlte::adminlte.log_out') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </li>
@endauth
@guest
    <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link">Fazer Login</a>
    </li>
@endguest
