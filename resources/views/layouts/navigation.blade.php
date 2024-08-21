<nav x-data="{ open: false }"
    style="background: linear-gradient(90deg, #77d176 0%, #0083B0 100%); border-bottom: 1px solid #D1D5DB;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="logo">
                            <a href="/dashboard">
                                <img src="../images/logo_no back.png" width="150"> <!-- Aumenta el tamaño del logo -->
                            </a>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" style="color: #fff;">
                            {{ __('Inicio') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.dietas.index')" :active="request()->routeIs('admin.dietas.index')" style="color: #fff;">
                            {{ __('Dietas') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.colaciones.index')" :active="request()->routeIs('admin.colaciones.index')" style="color: #fff;">
                            {{ __('Colaciones') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.rangos.index')" :active="request()->routeIs('admin.rangos.index')" style="color: #fff;">
                            {{ __('Rangos de Calorías') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.ingredientes.index')" :active="request()->routeIs('admin.ingredientes.index')" style="color: #fff;">
                            {{ __('Ingredientes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.ejercicios.index')" :active="request()->routeIs('admin.ejercicios.index')" style="color: #fff;">
                            {{ __('Ejercicios') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.tipo-ejercicio.index')" :active="request()->routeIs('admin.tipo-ejercicio.index')" style="color: #fff;">
                            {{ __('Tipos de Ejercicio') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.publicaciones.index')" :active="request()->routeIs('admin.publicaciones.index')" style="color: #fff;">
                            {{ __('Publicaciones') }}
                        </x-nav-link>
                    @else
                        @auth
                            <nav style="display: flex; align-items: center;">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                    style="font-weight: 600; color: #fff; margin-right: 15px; font-size: 18px;">
                                    {{ __('Inicio') }}
                                </x-nav-link>
                                <x-nav-link :href="route('usuarios.ejercicios.indexUsuarios')" :active="request()->routeIs('usuarios.ejercicios.indexUsuarios')"
                                    style="font-weight: 600; color: #fff; margin-right: 15px; font-size: 18px;">
                                    {{ __('Ejercicios') }}
                                </x-nav-link>
                                <x-nav-link :href="route('usuarios.dietas.index')" :active="request()->routeIs('usuarios.dietas.index')"
                                    style="font-weight: 600; color: #fff; margin-right: 15px; font-size: 18px;">
                                    {{ __('Dietas') }}
                                </x-nav-link>
                                <x-nav-link :href="route('usuarios.posts.index')" :active="request()->routeIs('usuarios.posts.index')"
                                    style="font-weight: 600; color: #fff; margin-right: 15px; font-size: 18px;">
                                    {{ __('Foro') }}
                                </x-nav-link>
                            </nav>

                        @endauth
                    @endif
                </div>
            </div>

            <!-- User Profile & Settings -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @php
                    // Calcular calorías diarias recomendadas
                    $calorias =
                        Auth::user()->sexo == 'Masculino'
                            ? 66 + 13.7 * Auth::user()->peso + 5 * Auth::user()->estatura - 6.8 * Auth::user()->edad
                            : 655 + 9.6 * Auth::user()->peso + 1.8 * Auth::user()->estatura - 4.7 * Auth::user()->edad;

                    // Obtener el rango en la base de datos
                    $rango = DB::table('rangos')
                        ->where('inicio', '<=', $calorias)
                        ->where('fin', '>=', $calorias)
                        ->first();
                @endphp

                @if (!Auth::user()->is_admin)
                    <li class="nav-item" style="list-style: none; margin-right: 15px;">
                        <a class="nav-link" href="{{ route('usuarios.dietas.indexSelect', $rango->id ?? 5) }}"
                            style="font-weight: 600; color: #fff; text-decoration: none;">
                            Calorías Diarias Recomendadas: {{ $calorias }}
                        </a>
                    </li>
                @endif


                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                @if (Auth::user()->profile_photo)
                                    <img src="../../{{ Auth::user()->profile_photo }}" alt="Foto de perfil"
                                        class="w-9 h-8 rounded-full mr-2">
                                @else
                                    <svg class="w-9 h-8 rounded-full bg-gray-300 text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" fill="none"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M12 14c3.313 0 6-2.687 6-6s-2.687-6-6-6S6 4.687 6 8s2.687 6 6 6zM12 15c-4.418 0-8 2.686-8 6v1h16v-1c0-3.314-3.582-6-8-6z" />
                                    </svg>
                                @endif
                            </div>
                            <div>&nbsp;&nbsp;{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>


            <!-- Hamburger Menu -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>



        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
</nav>
