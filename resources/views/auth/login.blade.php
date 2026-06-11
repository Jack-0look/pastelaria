<x-guest-layout>
    <!-- Contenedor principal centrado y con fondo degradado -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-aloewood to-dark-chocolate py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Tarjeta Glassmorphism -->
        <div class="max-w-md w-full space-y-8 bg-milk-tea/30 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-white/20">
            
            <!-- Logo y Título -->
            <div class="text-center">
                <h2 class="text-4xl font-extrabold text-white tracking-tight">
                     Sakura Bakery
                </h2>
                <p class="mt-2 text-sm text-white/80 font-medium">
                    Formando momentos dulces.
                </p>
            </div>

            <!-- Formulario -->
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="rounded-md shadow-sm space-y-4">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-white mb-2">Email (^///^)</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" required autocomplete="username" 
                                   class="appearance-none rounded-xl relative block w-full px-4 py-3 border-2 border-white/30 bg-white/10 text-white placeholder-white/60 focus:outline-none focus:ring-sakura focus:border-sakura focus:z-10 sm:text-sm backdrop-blur-sm transition-all duration-300" 
                                   placeholder="Enter your email">
                        </div>
                        <!-- Errores de email -->
                        @error('email')
                            <p class="mt-1 text-xs text-sakura">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-white mb-2">Contraseña ˄·͈༝·͈˄₎</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required autocomplete="current-password" 
                                   class="appearance-none rounded-xl relative block w-full px-4 py-3 border-2 border-white/30 bg-white/10 text-white placeholder-white/60 focus:outline-none focus:ring-sakura focus:border-sakura focus:z-10 sm:text-sm backdrop-blur-sm transition-all duration-300" 
                                   placeholder="Enter your password">
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-sakura">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botón Iniciar Sesión (Gradiente Sakura a Gold) -->
                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-dark-chocolate bg-gradient-to-r from-sakura to-gold hover:from-sakura/90 hover:to-gold/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sakura shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                        Iniciar sesión
                    </button>
                </div>

                <!-- Botón Crear Cuenta (Glass Outline) -->
                <div class="mt-4">
                    <a href="{{ route('register') }}" 
                       class="group relative w-full flex justify-center py-3 px-4 border-2 border-white/40 text-sm font-bold rounded-xl text-white bg-white/5 hover:bg-white/20 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sakura shadow-md transform hover:-translate-y-1 transition-all duration-300">
                        Crear una cuenta (∩˃o˂∩)☞♥
                    </a>
                </div>
            </form>

            <!-- Link Olvidaste tu contraseña -->
            @if (Route::has('password.request'))
                <div class="text-center mt-4">
                    <a class="underline text-xs font-medium text-white/70 hover:text-gold transition-colors duration-300" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-guest-layout>