<nav x-data="{ open: false }" class="bg-gradient-to-r from-pink-50 to-rose-100 border-b border-rose-200 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Logo + Categorías -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                        <span class="text-3xl group-hover:scale-110 transition-transform">🧁</span>
                        <span class="font-bold text-xl text-rose-700 group-hover:text-rose-900 transition-colors">
                            Pastelaria
                        </span>
                    </a>
                </div>

                <!-- Categorías - Desktop -->
                <div class="hidden md:flex md:items-center md:ms-10 space-x-1">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-rose-700 hover:bg-rose-200">
                        🏠 Inicio
                    </x-nav-link>
                    
                    <x-nav-link :href="route('categorias.show', 'pasteles')" :active="request()->routeIs('categorias.show')" class="text-rose-700 hover:bg-rose-200">
                        🎂 Pasteles
                    </x-nav-link>
                    
                    <x-nav-link :href="route('categorias.show', 'galletas')" :active="request()->routeIs('categorias.show')" class="text-rose-700 hover:bg-rose-200">
                        🍪 Galletas
                    </x-nav-link>
                    
                    <x-nav-link :href="route('categorias.show', 'pays')" :active="request()->routeIs('categorias.show')" class="text-rose-700 hover:bg-rose-200">
                        🥧 Pays
                    </x-nav-link>
                    
                    <x-nav-link :href="route('categorias.show', 'especiales')" :active="request()->routeIs('categorias.show')" class="text-rose-700 hover:bg-rose-200">
                        ✨ Especiales
                    </x-nav-link>
                </div>
            </div>

            <!-- Buscador + Carrito + Usuario -->
            <div class="hidden md:flex md:items-center md:ms-6 space-x-4">
                
                <!-- Buscador -->
                <form action="{{ route('productos.buscar') }}" method="GET" class="relative">
                    <input type="text" name="search" placeholder="Buscar postre..." 
                           value="{{ request('search') }}"
                           class="pl-10 pr-4 py-2 border border-rose-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-transparent w-48 transition-all">
                    <svg class="absolute left-3 top-2.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </form>

                <!-- Carrito -->
                <a href="{{ route('carrito.index') }}" class="relative p-2 text-rose-700 hover:text-rose-900 hover:bg-rose-200 rounded-full transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    @if(App\Http\Controllers\CartController::count() > 0)
                        <span class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-rose-500 rounded-full animate-pulse">
                            {{ App\Http\Controllers\CartController::count() }}
                        </span>
                    @endif
                    <span class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 text-xs text-rose-600 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                        Mi carrito
                    </span>
                </a>

                <!-- Menú de Usuario -->
                @auth
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 px-3 py-2 border border-rose-300 text-sm font-medium rounded-full text-rose-700 bg-white hover:bg-rose-50 focus:outline-none transition">
                                @if(Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar }}" class="w-8 h-8 rounded-full object-cover" alt="Avatar">
                                @else
                                    <span class="w-8 h-8 rounded-full bg-rose-200 flex items-center justify-center text-rose-700 font-bold">
                                        {{ strtoupper(substr(Auth::user()->nombre ?? Auth::user()->name, 0, 1)) }}
                                    </span>
                                @endif
                                <span class="hidden lg:inline">{{ Auth::user()->nombre ?? Auth::user()->name }}</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.show')">
                                👤 Mi Perfil
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('carrito.index')">
                                🛒 Ver Carrito
                            </x-dropdown-link>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                🚪 Cerrar Sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @else
                <div class="flex items-center space-x-2">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-rose-700 hover:text-rose-900 transition">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-rose-500 rounded-full hover:bg-rose-600 transition shadow-md hover:shadow-lg">
                        Registrarse
                    </a>
                </div>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-rose-700 hover:text-rose-900 hover:bg-rose-200 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-rose-100">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-rose-700">
                🏠 Inicio
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categorias.show', 'pasteles')" class="text-rose-700">
                🎂 Pasteles
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categorias.show', 'galletas')" class="text-rose-700">
                🍪 Galletas
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categorias.show', 'pays')" class="text-rose-700">
                🥧 Pays
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('carrito.index')" class="text-rose-700 flex justify-between">
                <span>🛒 Carrito</span>
                @if(App\Http\Controllers\CartController::count() > 0)
                    <span class="bg-rose-500 text-white px-2 py-0.5 rounded-full text-xs">{{ App\Http\Controllers\CartController::count() }}</span>
                @endif
            </x-responsive-nav-link>
        </div>
        
        @auth
        <div class="pt-4 pb-3 border-t border-rose-100 px-4">
            <div class="flex items-center px-3">
                <div class="flex-shrink-0">
                    @if(Auth::user()->avatar)
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->avatar }}" alt="">
                    @else
                        <span class="h-10 w-10 rounded-full bg-rose-200 flex items-center justify-center text-rose-700 font-bold">
                            {{ strtoupper(substr(Auth::user()->nombre ?? Auth::user()->name, 0, 1)) }}
                        </span>
                    @endif
                </div>
                <div class="ms-3">
                    <div class="font-medium text-base text-rose-800">{{ Auth::user()->nombre ?? Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-rose-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.show')" class="text-rose-700">
                    👤 Mi Perfil
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="text-rose-700">
                        🚪 Cerrar Sesión
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>