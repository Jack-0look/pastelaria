@props(['product'])

<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group border border-rose-100">
    <!-- Imagen del producto -->
    <!-- Imagen del producto -->
<div class="relative h-48 bg-gradient-to-br from-rose-50 to-pink-50 overflow-hidden">
    @if(!empty($product->imagen) && $product->imagen !== 'null')
        <img src="{{ $product->imagen }}" 
             alt="{{ $product->nombre }}" 
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
             onerror="this.src='https://via.placeholder.com/400x300?text=Sin+Imagen'">
    @else
        <div class="w-full h-full flex items-center justify-center text-6xl">
            🧁
        </div>
    @endif
    
    <!-- Badge de categoría -->
    @if($product->categoria)
        <span class="absolute top-3 left-3 px-3 py-1 bg-rose-500 text-white text-xs font-medium rounded-full shadow">
            {{ $product->categoria }}
        </span>
    @endif
</div>
    
    <!-- Contenido -->
    <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800 mb-1 group-hover:text-rose-700 transition-colors">
            {{ $product['nombre'] }}
        </h3>
        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
            {{ $product['descripcion'] }}
        </p>
        
        <!-- Precio y Acción -->
        <div class="flex items-center justify-between">
            <div>
                <span class="text-2xl font-bold text-rose-600">
                    ${{ number_format($product['precio'], 2) }}
                </span>
                @if($product['precio_anterior'] ?? false)
                    <span class="text-sm text-gray-400 line-through ml-2">
                        ${{ number_format($product['precio_anterior'], 2) }}
                    </span>
                @endif
            </div>
            
            <form action="{{ route('carrito.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <input type="hidden" name="name" value="{{ $product['nombre'] }}">
                <input type="hidden" name="price" value="{{ $product['precio'] }}">
                <input type="hidden" name="image" value="{{ $product['imagen'] ?? '' }}">
                <input type="hidden" name="quantity" value="1">
                
                <button type="submit" 
                        class="px-4 py-2 bg-rose-500 hover:bg-rose-600 text-white text-sm font-medium rounded-full transition-all shadow-md hover:shadow-lg active:scale-95 flex items-center gap-1">
                    <span>🛒</span> Agregar
                </button>
            </form>
        </div>
    </div>
</div>