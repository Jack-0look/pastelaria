<x-app-layout>
    <!-- ========================================== -->
    <!-- SECCIÓN 1: HERO                            -->
    <!-- ========================================== -->
    <section class="relative bg-gradient-to-r from-sakura via-pink-200 to-white overflow-hidden py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col-reverse lg:flex-row items-center gap-10">
            <div class="w-full lg:w-1/2 text-center lg:text-left space-y-6 z-10">
                <span class="inline-block px-4 py-2 rounded-full bg-white/40 text-dark-chocolate text-sm font-bold backdrop-blur-sm border border-white/50">
                     Deliciosos & Frescos
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-dark-chocolate tracking-tight drop-shadow-sm">
                    Bakery
                </h1>
                <p class="text-xl text-dark-chocolate/80 font-medium max-w-lg mx-auto lg:mx-0">
                    Fresh pastries, dreamy cakes and sweet moments crafted every single day.
                </p>
                <div class="pt-4 flex justify-center lg:justify-start gap-4">
                    <a href="#categorias" class="px-8 py-4 bg-dark-chocolate text-white font-bold rounded-full shadow-lg hover:bg-aloewood hover:scale-105 transition-all duration-300">
                        Shop Now
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex justify-center z-10">
                <div class="relative w-full max-w-lg">
                    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-72 h-72 bg-gold/30 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-72 h-72 bg-sakura/40 rounded-full blur-3xl"></div>
                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Pastel de Chocolate" 
                         class="relative rounded-3xl shadow-2xl transform rotate-3 hover:rotate-0 transition-all duration-500 border-4 border-white/50 w-full h-auto object-cover"
                         style="min-height: 300px;">
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- SECCIÓN 2: CATEGORÍAS                      -->
    <!-- ========================================== -->
    <section id="categorias" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-dark-chocolate">Nuestra colección dulce</h2>
                <div class="w-24 h-1 bg-sakura mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Categoría 1 -->
                <a href="{{ route('categorias.show', 'cupcakes') }}" class="group relative h-64 rounded-2xl overflow-hidden shadow-md cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 bg-gray-200">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full text-white">
                        <h3 class="text-2xl font-bold mb-1">Cupcakes</h3>
                        <span class="inline-block px-3 py-1 bg-sakura text-white text-xs font-bold rounded-full">Ver más</span>
                    </div>
                </a>
                <!-- Categoría 2 -->
                <a href="{{ route('categorias.show', 'macarons') }}" class="group relative h-64 rounded-2xl overflow-hidden shadow-md cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1569864358642-9d1684040f43?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 bg-gray-200">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full text-white">
                        <h3 class="text-2xl font-bold mb-1">Macarons</h3>
                        <span class="inline-block px-3 py-1 bg-sakura text-white text-xs font-bold rounded-full">Ver más</span>
                    </div>
                </a>
                <!-- Categoría 3 -->
                <a href="{{ route('categorias.show', 'cookies') }}" class="group relative h-64 rounded-2xl overflow-hidden shadow-md cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1499636138143-bd649043ea80?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 bg-gray-200">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full text-white">
                        <h3 class="text-2xl font-bold mb-1">Cookies</h3>
                        <span class="inline-block px-3 py-1 bg-sakura text-white text-xs font-bold rounded-full">Ver más</span>
                    </div>
                </a>
                <!-- Categoría 4 -->
                <a href="{{ route('categorias.show', 'cakes') }}" class="group relative h-64 rounded-2xl overflow-hidden shadow-md cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1562772376-b6f11845488d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 bg-gray-200">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full text-white">
                        <h3 class="text-2xl font-bold mb-1">Cakes</h3>
                        <span class="inline-block px-3 py-1 bg-sakura text-white text-xs font-bold rounded-full">Ver más</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- SECCIÓN 3: BEST SELLERS                    -->
    <!-- ========================================== -->
    <section class="py-16 bg-milk-tea/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-dark-chocolate">Productos más vendidos</h2>
            </div>
            <div class="flex overflow-x-auto pb-8 gap-6 snap-x snap-mandatory" style="scrollbar-width: none; -ms-overflow-style: none;">
                <!-- Producto 1 -->
                <div class="min-w-[280px] snap-center bg-white rounded-2xl shadow-lg overflow-hidden group">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-lg text-dark-chocolate">Sakura Cake</h3>
                        <p class="text-sm text-gray-500 mb-3">Delicioso y suave</p>
                        <span class="text-xl font-bold text-sakura">$450.00</span>
                    </div>
                </div>
                <!-- Producto 2 -->
                <div class="min-w-[280px] snap-center bg-white rounded-2xl shadow-lg overflow-hidden group">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1587668178277-295251f900ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-lg text-dark-chocolate">Pink Cupcake</h3>
                        <p class="text-sm text-gray-500 mb-3">Con betún especial</p>
                        <span class="text-xl font-bold text-sakura">$85.00</span>
                    </div>
                </div>
                <!-- Producto 3 -->
                <div class="min-w-[280px] snap-center bg-white rounded-2xl shadow-lg overflow-hidden group">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551024601-5629436bb601?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-lg text-dark-chocolate">Choco Cookies</h3>
                        <p class="text-sm text-gray-500 mb-3">Crujientes y dulces</p>
                        <span class="text-xl font-bold text-sakura">$120.00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- ✅ SECCIÓN 4: PRODUCTOS REALES (MongoDB)   -->
    <!-- ========================================== -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-dark-chocolate">Todos los Productos</h2>
                <div class="w-24 h-1 bg-sakura mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Grid de productos desde MongoDB -->
            @if(isset($productos) && count($productos) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($productos as $producto)
                        <x-partials.product-card :product="$producto" />
                    @endforeach
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-16 bg-milk-tea/5 rounded-3xl">
                    <div class="text-6xl mb-4">🧁</div>
                    <h3 class="text-xl font-bold text-dark-chocolate mb-2">Aún no hay productos disponibles</h3>
                    <p class="text-gray-600 mb-6">¡Sé el primero en agregar un producto delicioso!</p>
                    @auth
                        <a href="{{ route('productos.create') }}" class="inline-flex items-center px-6 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition shadow-md">
                            + Agregar mi primer producto
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </section>
</x-app-layout>