<x-guest-layout>
    <!-- Fondo degradado consistente con el login -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-aloewood to-dark-chocolate py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Tarjeta Glassmorphism -->
        <div class="max-w-md w-full space-y-6 bg-milk-tea/30 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-white/20">
            
            <!-- Header -->
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white tracking-tight">
                     Sakura Bakery
                </h2>
                <p class="mt-1 text-xs text-white/70">
                    Únete a nuestra dulce comunidad
                </p>
            </div>

            <!-- Formulario -->
            <form class="mt-6 space-y-4" action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Nombre de usuario -->
                <div>
                    <label for="name" class="block text-sm font-bold text-white mb-1">Nombre de usuario</label>
                    <input id="name" name="name" type="text" required autocomplete="name" 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border-2 border-white/30 bg-white/10 text-white placeholder-white/60 focus:outline-none focus:ring-sakura focus:border-sakura focus:z-10 sm:text-sm backdrop-blur-sm transition-all duration-300" 
                           placeholder="Choose a username">
                    @error('name')
                        <p class="mt-1 text-xs text-sakura">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-white mb-1">Email</label>
                    <input id="email" name="email" type="email" required autocomplete="username" 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border-2 border-white/30 bg-white/10 text-white placeholder-white/60 focus:outline-none focus:ring-sakura focus:border-sakura focus:z-10 sm:text-sm backdrop-blur-sm transition-all duration-300" 
                           placeholder="Enter your email">
                    @error('email')
                        <p class="mt-1 text-xs text-sakura">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-bold text-white mb-1">Contraseña</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password" 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border-2 border-white/30 bg-white/10 text-white placeholder-white/60 focus:outline-none focus:ring-sakura focus:border-sakura focus:z-10 sm:text-sm backdrop-blur-sm transition-all duration-300" 
                           placeholder="Create a password">
                    @error('password')
                        <p class="mt-1 text-xs text-sakura">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-white mb-1">Confirma tu contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border-2 border-white/30 bg-white/10 text-white placeholder-white/60 focus:outline-none focus:ring-sakura focus:border-sakura focus:z-10 sm:text-sm backdrop-blur-sm transition-all duration-300" 
                           placeholder="Confirm your password">
                </div>

                <!-- Botón Crear ahora (Gradiente) -->
                <div class="pt-2">
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-dark-chocolate bg-gradient-to-r from-sakura to-gold hover:from-sakura/90 hover:to-gold/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sakura shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                        Crear ahora
                    </button>
                </div>

                <!-- Botón Regresa al Login -->
                <div class="mt-2">
                    <a href="{{ route('login') }}" 
                       class="group relative w-full flex justify-center py-3 px-4 border-2 border-white/40 text-sm font-bold rounded-xl text-white bg-white/5 hover:bg-white/20 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sakura shadow-md transform hover:-translate-y-1 transition-all duration-300">
                        Regresa al Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>