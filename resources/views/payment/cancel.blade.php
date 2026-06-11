<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-rose-50 to-pink-100 py-12">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 text-center">
            <div class="w-20 h-20 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Pago Cancelado</h1>
            <p class="text-gray-600 mb-6">
                Tu compra no se completó. 
                Puedes intentarlo de nuevo cuando quieras.
            </p>
            <a href="{{ route('carrito.index') }}" class="inline-block px-8 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition">
                Volver al Carrito
            </a>
        </div>
    </div>
</x-app-layout>