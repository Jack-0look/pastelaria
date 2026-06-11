<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-milk-tea/10 to-sakura/5">
        
        <!-- Header de búsqueda -->
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
                            Resultados de búsqueda
                        </h1>
                        <p class="text-white/80 mt-1">
                            Buscando: "{{ $query }}" - {{ $productos->count() }} resultados
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            
            <!-- Barra de búsqueda -->
            <div class="mb-8">
                <form action="{{ route('productos.buscar') }}" method="GET" class="max-w-2xl mx-auto">
                    <div class="flex gap-2">
                        <input type="text" 
                               name="search" 
                               value="{{ $query }}"
                               placeholder="Buscar postres..." 
                               class="flex-1 px-6 py-3 border-2 border-rose-200 rounded-full focus:outline-none focus:border-sakura focus:ring-2 focus:ring-sakura/20"
                               autofocus>
                        <button type="submit" class="px-8 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition shadow-md">
                            Buscar
                        </button>
                    </div>
                </form>
            </div>

            <!-- Resultados -->
            @if($productos->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($productos as $producto)
                        <x-partials.product-card :product="$producto" />
                    @endforeach
                </div>
            @else
                <!-- Sin resultados -->
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm">
                    <div class="text-6xl mb-4">🔍</div>
                    <h3 class="text-2xl font-bold text-dark-chocolate mb-2">
                        No encontramos "{{ $query }}"
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Intenta con otros términos como "pastel", "galletas", "chocolate"...
                    </p>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition shadow-md">
                        Ver todos los productos
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>