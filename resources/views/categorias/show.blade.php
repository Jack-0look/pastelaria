<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-milk-tea/10 to-sakura/5">
        
        <!-- Header de la categoría -->
        <div class="bg-gradient-to-r from-sakura to-rose-300 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" class="text-white hover:text-white/80 transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-4xl font-bold text-white">
                            {{ $categoria }}
                        </h1>
                        <p class="text-white/80 mt-1">
                            {{ $productos->count() }} productos disponibles
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            
            <!-- Filtros rápidos -->
            <div class="flex flex-wrap gap-2 mb-8">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->is('/') ? 'bg-sakura text-white' : 'bg-white text-gray-700 hover:bg-sakura/10' }}">
                    Todos
                </a>
                <a href="{{ route('categorias.show', 'pasteles') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ $slug == 'pasteles' ? 'bg-sakura text-white' : 'bg-white text-gray-700 hover:bg-sakura/10' }}">
                    🎂 Pasteles
                </a>
                <a href="{{ route('categorias.show', 'galletas') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ $slug == 'galletas' ? 'bg-sakura text-white' : 'bg-white text-gray-700 hover:bg-sakura/10' }}">
                    🍪 Galletas
                </a>
                <a href="{{ route('categorias.show', 'pays') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ $slug == 'pays' ? 'bg-sakura text-white' : 'bg-white text-gray-700 hover:bg-sakura/10' }}">
                    🥧 Pays
                </a>
                <a href="{{ route('categorias.show', 'cupcakes') }}" class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ $slug == 'cupcakes' ? 'bg-sakura text-white' : 'bg-white text-gray-700 hover:bg-sakura/10' }}">
                    🧁 Cupcakes
                </a>
            </div>

            <!-- Grid de productos -->
            @if($productos->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($productos as $producto)
                        <x-partials.product-card :product="$producto" />
                    @endforeach
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm">
                    <div class="text-6xl mb-4">🔍</div>
                    <h3 class="text-2xl font-bold text-dark-chocolate mb-2">
                        No hay productos en "{{ $categoria }}"
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Sé el primero en agregar productos a esta categoría
                    </p>
                    @auth
                        <a href="{{ route('productos.create') }}" class="inline-flex items-center px-6 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition shadow-md">
                            + Agregar producto
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition shadow-md">
                            Inicia sesión para agregar
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</x-app-layout>