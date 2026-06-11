<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-50 to-emerald-100 py-12">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">¡Pago Exitoso!</h1>
            <p class="text-gray-600 mb-6">
                Tu compra ha sido procesada correctamente. 
                Recibirás un correo de confirmación pronto.
            </p>
            <div class="bg-gray-50 rounded-xl p-4 mb-6 text-left">
                <p class="text-sm text-gray-500">ID de sesión:</p>
                <p class="font-mono text-xs text-gray-700 break-all">{{ $session_id }}</p>
            </div>
            <a href="{{ route('home') }}" class="inline-block px-8 py-3 bg-sakura text-white font-bold rounded-full hover:bg-sakura/90 transition">
                Seguir Comprando
            </a>
        </div>
    </div>
</x-app-layout>