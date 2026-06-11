<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-milk-tea/20 to-sakura/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- ========================================== -->
            <!-- SECCIÓN: BIENVENIDA + INFO DEL USUARIO     -->
            <!-- ========================================== -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8 border border-sakura/20 text-dark-chocolate">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <!-- Avatar del usuario -->
                    <div class="relative">
                        @if(Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="Profile" class="w-24 h-24 rounded-full object-cover border-4 border-sakura shadow-md">
                        @else
                            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-sakura to-gold flex items-center justify-center text-3xl font-bold text-white shadow-md">
                                {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->nombre, 0, 1)) }}
                            </div>
                        @endif
                        <span class="absolute bottom-0 right-0 w-6 h-6 bg-green-400 border-2 border-white rounded-full"></span>
                    </div>
                    
                    <!-- Info del usuario -->
                    <div class="text-center md:text-left flex-1">
                        <h1 class="text-3xl font-bold text-dark-chocolate flex items-center justify-center md:justify-start gap-2">
                            Bienvenido 
                            <span class="text-sakura"></span>
                            {{ Auth::user()->name ?? Auth::user()->nombre }}
                        </h1>
                        <p class="text-milk-tea mt-1 text-lg">
                            {{ Auth::user()->rol ?? 'Comprador reconocido' }}
                        </p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-4">
                            <div class="bg-milk-tea/10 px-4 py-2 rounded-full">
                                <span class="font-bold text-dark-chocolate">{{ $productosCount ?? 0 }}</span>
                                <span class="text-sm text-gray-600">Productos</span>
                            </div>
                            <div class="bg-milk-tea/10 px-4 py-2 rounded-full">
                                <span class="font-bold text-dark-chocolate">{{ $ventasCount ?? 0 }}</span>
                                <span class="text-sm text-gray-600">Ventas</span>
                            </div>
                            <div class="bg-milk-tea/10 px-4 py-2 rounded-full">
                                <span class="font-bold text-dark-chocolate">{{ $likesCount ?? 0 }}</span>
                                <span class="text-sm text-gray-600">Likes</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botón editar perfil -->
                    <div class="flex gap-2">
                        <a href="{{ route('profile.edit') }}" class="px-6 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition shadow-md">
                            Editar Perfil
                        </a>
                        <a href="{{ route('productos.create') }}" class="px-6 py-3 bg-gold text-dark-chocolate font-bold rounded-full hover:bg-gold/90 transition shadow-md">
                            + Nuevo Producto
                        </a>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SECCIÓN: PRODUCTOS DEL USUARIO             -->
            <!-- ========================================== -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-dark-chocolate mb-6 flex items-center gap-2">
                    Mis Productos 
                    <span class="text-sakura"></span>
                </h2>

                @if(isset($productos) && count($productos) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($productos as $producto)
                            <div class="bg-white rounded-3xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 border border-gray-100">
                                <!-- Imagen del producto -->
                                <div class="relative h-56 overflow-hidden bg-gray-100">
                                    @if($producto['imagen'] ?? false)
                                        <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-6xl bg-gradient-to-br from-sakura/20 to-gold/20">
                                            
                                        </div>
                                    @endif
                                    
                                    <!-- Badge de categoría -->
                                    @if($producto['categoria'] ?? false)
                                        <span class="absolute top-4 left-4 px-3 py-1 bg-sakura text-white text-xs font-bold rounded-full shadow">
                                            {{ $producto['categoria'] }}
                                        </span>
                                    @endif
                                </div>
                                
                                <!-- Contenido -->
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-dark-chocolate mb-2 group-hover:text-sakura transition-colors">
                                        {{ $producto['nombre'] }}
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                        {{ $producto['descripcion'] }}
                                    </p>
                                    
                                    <!-- Precio y Acciones -->
                                    <div class="flex items-center justify-between">
                                        <span class="text-2xl font-bold text-sakura">
                                            ${{ number_format($producto['precio'], 2) }}
                                        </span>
                                        <div class="flex gap-2">
                                            <button class="p-2 bg-sakura/20 text-sakura rounded-full hover:bg-sakura hover:text-white transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('carrito.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $producto['id'] }}">
                                                <input type="hidden" name="name" value="{{ $producto['nombre'] }}">
                                                <input type="hidden" name="price" value="{{ $producto['precio'] }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="px-4 py-2 bg-dark-chocolate text-white text-sm font-bold rounded-full hover:bg-aloewood transition-colors">
                                                    Buy Now
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Estado vacío -->
                    <div class="bg-white rounded-3xl shadow-lg p-12 text-center border border-gray-100">
                        <div class="text-6xl mb-4">🧁</div>
                        <h3 class="text-xl font-bold text-dark-chocolate mb-2">Aún no tienes productos</h3>
                        <p class="text-gray-600 mb-6">Comienza a vender tus deliciosos postres hoy.</p>
                        <a href="{{ route('productos.create') }}" class="inline-flex items-center px-6 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition shadow-md">
                            + Crear mi primer producto
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>