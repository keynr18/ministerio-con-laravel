<nav class="navbar navbar-expand-md navbar-light bg-success border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand me-4" href="/">
            <x-jet-application-mark width="36" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @auth

                    @if(Auth::user()->rol == '0')

                    <x-jet-nav-link class="text-white" href="{{ route('productor.home')}}" :active="request()->routeIs('productor.home')">
                        {{ __('Haciendas') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link class="text-white" href="{{ route('productor.produccion')}}" :active="request()->routeIs('productor.produccion')">
                        {{ __('Producciones') }}
                    </x-jet-nav-link>

                    @else

                        @if(Auth::user()->rol == '2')

                            <x-jet-nav-link class="text-white" href="{{ route('admin.home')}}" :active="request()->routeIs('admin.home')">
                                {{ __('Eventos') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link class="text-white" href="{{ route('admin.pro')}}" :active="request()->routeIs('admin.pro')">
                                {{ __('Productores') }}
                            </x-jet-nav-link>
                            <x-jet-nav-link class="text-white" href="{{ route('admin.busqueda')}}" :active="request()->routeIs('admin.busqueda')">
                                {{ __('Buscar Haciendas') }}
                            </x-jet-nav-link>

                            @else

                                <x-jet-nav-link class="text-white" href="{{ route('admin.home')}}" :active="request()->routeIs('admin.home')">
                                    {{ __('Eventos') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link class="text-white" href="{{ route('admin.pro')}}" :active="request()->routeIs('admin.pro')">
                                    {{ __('Productores') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link class="text-white" href="{{ route('admin.busqueda')}}" :active="request()->routeIs('admin.busqueda')">
                                    {{ __('Buscar Haciendas') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link class="text-white" href="{{ route('admin.personal')}}" :active="request()->routeIs('admin.personal')">
                                    {{ __('personal') }}
                                </x-jet-nav-link>
                        @endif
                    @endif
                @else
                
                <x-jet-nav-link href="" class="text-white" data-bs-toggle="modal" data-bs-target="#a" :active="request()->routeIs('dashboard')">
                    {{ __('¿Quienes somos') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="" class="text-white" data-bs-toggle="modal" data-bs-target="#b" :active="request()->routeIs('dashboard')">
                    {{ __('Misión') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="" class="text-white" data-bs-toggle="modal" data-bs-target="#c" :active="request()->routeIs('dashboard')">
                    {{ __('Vision') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="" class="text-white" data-bs-toggle="modal" data-bs-target="#d" :active="request()->routeIs('dashboard')">
                    {{ __('Objetivos Estrategicos') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="" class="text-white" data-bs-toggle="modal" data-bs-target="#e" :active="request()->routeIs('dashboard')">
                    {{ __('Competencias Generales') }}
                </x-jet-nav-link>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav align-items-baseline">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Management -->
                            <h6 class="dropdown-header">
                                {{ __('Manage Team') }}
                            </h6>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <hr class="dropdown-divider">

                            <!-- Team Switcher -->
                            <h6 class="dropdown-header">
                                {{ __('Switch Teams') }}
                            </h6>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                @endif

                <!-- Settings Dropdown -->
                @auth
                    <x-jet-dropdown id="settingsDropdown" class="text-white">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                {{ Auth::user()->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Manage Account') }}
                            </h6>

                            @if(Auth::user()->rol == '1' || Auth::user()->rol == '2')
                            <x-jet-dropdown-link href="{{ route('admin.perfil') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>
                            @else
                            <x-jet-dropdown-link href="{{ route('productor.perfil') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>
                            @endif

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <hr class="dropdown-divider">

                            <!-- Authentication -->
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </x-jet-dropdown-link>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    @else
                    <ul class="navbar-nav me-auto">
                       
                        <x-jet-nav-link href="{{route('login')}}" class="btn btn-danger text-white" :active="request()->routeIs('dashboard')">
                            {{ __('Iniciar Sesion') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{route('registro')}}"  class="btn btn-primary text-white" :active="request()->routeIs('dashboard')">
                            {{ __('Registrarte') }}
                        </x-jet-nav-link> 
                    </ul>
                @endauth
            </ul>
        </div>
    </div>
</nav>