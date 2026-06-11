<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🛒 Tu Carrito de Compras
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($cart) > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Tabla del Carrito -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Precio</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($cart as $id => $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $item['name'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">${{ number_format($item['price'], 2) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('carrito.update', $id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('POST')
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" 
                                                   min="1" max="99" 
                                                   class="w-16 px-2 py-1 border border-gray-300 rounded-md text-sm">
                                            <button type="submit" class="px-3 py-1 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600">
                                                Actualizar
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-semibold">
                                            ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('carrito.destroy', $id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-50">
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-right font-semibold text-gray-700">TOTAL:</td>
                                    <td colspan="2" class="px-6 py-4 text-left font-bold text-xl text-gray-900">
                                        ${{ number_format($total, 2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Botones de Acción -->
<div class="mt-6 flex flex-col sm:flex-row justify-between gap-4">
    <a href="{{ route('home') }}" 
       class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-xl transition text-center shadow-md">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Seguir Comprando
    </a>
    
    <div class="flex flex-col sm:flex-row gap-3">
        <!-- Vaciar Carrito -->
        <form action="{{ route('carrito.clear') }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" 
                    class="w-full px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl transition shadow-md">
                Vaciar Carrito
            </button>
        </form>
        
        <!-- Proceder al Pago con Stripe -->
        @auth
            <form action="{{ route('payment.checkout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="w-full sm:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.5 12c0 1.44-.57 2.74-1.5 3.72V18a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-1.28A5.99 5.99 0 0112 18a5.99 5.99 0 01-3-1.28V18a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-2.28A5.99 5.99 0 013 12c0-1.44.57-2.74 1.5-3.72V6a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v1.28A5.99 5.99 0 0112 6a5.99 5.99 0 013 1.28V6a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v2.28c.93.98 1.5 2.28 1.5 3.72z"/>
                    </svg>
                    <span>Proceder al Pago</span>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" 
               class="w-full sm:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.5 12c0 1.44-.57 2.74-1.5 3.72V18a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-1.28A5.99 5.99 0 0112 18a5.99 5.99 0 01-3-1.28V18a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-2.28A5.99 5.99 0 013 12c0-1.44.57-2.74 1.5-3.72V6a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v1.28A5.99 5.99 0 0112 6a5.99 5.99 0 013 1.28V6a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v2.28c.93.98 1.5 2.28 1.5 3.72z"/>
                </svg>
                <span>Iniciar Sesión para Pagar</span>
            </a>
        @endauth
    </div>
</div>

<!-- Info de Stripe -->
<div class="mt-4 text-center text-sm text-gray-600 font-medium">
    <p class="flex items-center justify-center gap-2">
        <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
        </svg>
        <span>Pago seguro con Stripe • Modo de pruebas</span>
    </p>
</div>
                    </div>
                </div>
            @else
                <!-- Carrito Vacío -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tu carrito está vacío</h3>
                        <p class="text-gray-500 mb-4">¡Agrega algunos productos deliciosos!</p>
                        <a href="{{ route('home') }}" class="inline-block px-6 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition">
                            Ver Productos
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>