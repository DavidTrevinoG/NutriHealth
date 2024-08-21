<nav x-data="{ open: false }" style="background-color: #BDFFC7; border-bottom: 1px solid #D1D5DB;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="logo"><a href=""><img src="images/logo_no back.png" width="75"></a></div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if(Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" style="color: #000;">
                            {{ __('Admin Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.dietas.index')" :active="request()->routeIs('admin.dietas.index')" style="color: #000;">
                            {{ __('Dietas') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.colaciones.index')" :active="request()->routeIs('admin.colaciones.index')" style="color: #000;">
                            {{ __('Colaciones') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.ingredientes.index')" :active="request()->routeIs('admin.ingredientes.index')" style="color: #000;">
                            {{ __('Ingredientes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.ejercicios.index')" :active="request()->routeIs('admin.ejercicios.index')" style="color: #000;">
                            {{ __('Ejercicios') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.tipo-ejercicio.index')" :active="request()->routeIs('admin.tipo-ejercicio.index')" style="color: #000;">
                            {{ __('Tipos de Ejercicio') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.publicaciones.index')" :active="request()->routeIs('admin.publicaciones.index')" style="color: #000;">
                            {{ __('Publicaciones') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.comentarios.index')" :active="request()->routeIs('admin.comentarios.index')" style="color: #000;">
                            {{ __('Comentarios') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.comentarios-comentarios.index')" :active="request()->routeIs('admin.comentarios-comentarios.index')" style="color: #000;">
                            {{ __('Comentarios de Comentarios') }}
                        </x-nav-link>
                    @else
                        @auth
                        <x-nav-link :href="route('/dashboard')" :active="request()->routeIs('/dashboard')" style="color: #000;">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.ejercicios.indexUsuarios', ['id_tipo' => 1]) }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ejercicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.foro.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Foro</a>
                        </li>



                  
                    @endif
                    
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500" style="background-color: #BDFFC7; color: #000;">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" style="color: #000;">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" style="color: #000;">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400" style="background-color: #BDFFC7;">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="background-color: #BDFFC7;">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->is_admin)
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" style="color: #000;">
                    {{ __('Admin Dashboard') }}
                </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" style="color: #000;">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200" style="background-color: #BDFFC7;">
            <div class="px-4">
                <div class="font-medium text-base" style="color: #000;">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm" style="color: #000;">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" style="color: #000;">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" style="color: #000;">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
