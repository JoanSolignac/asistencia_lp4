<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('empleadoUser.dashboard') }}">
            <x-application-logo class="h-9 w-auto fill-current text-black" />
        </a>

        <!-- Toggle Button (Hamburger) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Navigation Links -->
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('empleadoUser.dashboard') }}">{{ __('Inicio') }}</a>
                </li>


                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdownAsistencia" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Asistencia') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAsistencia">
                        <li>
                            <a class="dropdown-item text-black" href="#">
                                {{ __('General') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-black" href="#">
                                {{ __('Entradas') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-black" href="">
                                {{ __('Salidas') }}
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>

        <ul class="navbar-nav ms-auto">
            <!-- Settings Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __('Settings') }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item text-black" href="#">{{ __('Perfil') }}</a></li> -->
                    <form method="POST" action="{{ route('empleados.logout') }}">
                        @csrf
                        <li><button type="submit" class="dropdown-item text-black">{{ __('Cerrar sesión') }}</button></li>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>