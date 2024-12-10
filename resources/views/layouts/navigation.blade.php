<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
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
                    <a class="nav-link text-black" href="{{ route('dashboard') }}">{{ __('Inicio') }}</a>
                </li>

                <!-- Dropdown for Roles -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdownRoles" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Rol') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownRoles">
                        <li><a class="dropdown-item text-black" href="{{ route('roles.create') }}">{{ __('Agregar Rol') }}</a></li>
                        <li><a class="dropdown-item text-black" href="{{ route('roles.index') }}">{{ __('Mostrar Rol') }}</a></li>
                    </ul>
                </li>

                <!-- Dropdown for Empleados -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdownEmpleados" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Empleado') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownEmpleados">
                        <li><a class="dropdown-item text-black" href="{{ route('empleados.create') }}">{{ __('Agregar Empleado') }}</a></li>
                        <li><a class="dropdown-item text-black" href="{{ route('empleados.index') }}">{{ __('Mostrar Empleado') }}</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                        <li><a class="dropdown-item text-black" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><button type="submit" class="dropdown-item text-black">{{ __('Log Out') }}</button></li>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
