<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-milk-tea/20 to-sakura/10 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-dark-chocolate mb-2">
                    🧁 Crear Nuevo Producto
                </h1>
                <p class="text-milk-tea">Agrega un nuevo postre a tu tienda</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-sakura/20">
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre del producto -->
                    <div class="mb-6">
                        <label for="nombre" class="block text-sm font-bold text-dark-chocolate mb-2">
                            Nombre del Producto *
                        </label>
                        <input type="file" 
                            name="imagen" 
                            id="imagen" 
                            accept="image/*"
                            class="hidden">
                    </div>

                    <!-- Descripción -->
                    <div class="mb-6">
                        <label for="descripcion" class="block text-sm font-bold text-dark-chocolate mb-2">
                            Descripción *
                        </label>
                        <textarea name="descripcion" 
                                  id="descripcion" 
                                  rows="4" 
                                  required
                                  class="w-full px-4 py-3 border-2 border-rose-200 rounded-xl focus:outline-none focus:border-sakura focus:ring-2 focus:ring-sakura/20 transition-all"
                                  placeholder="Describe tu producto: ingredientes, tamaño, etc."></textarea>
                    </div>

                    <!-- Categoría y Precio (en una fila) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Categoría -->
                        <div>
                            <label for="categoria" class="block text-sm font-bold text-dark-chocolate mb-2">
                                Categoría *
                            </label>
                            <select name="categoria" 
                                    id="categoria" 
                                    required
                                    class="w-full px-4 py-3 border-2 border-rose-200 rounded-xl focus:outline-none focus:border-sakura focus:ring-2 focus:ring-sakura/20 transition-all">
                                <option value="">Selecciona una categoría</option>
                                <option value="Pasteles">🎂 Pasteles</option>
                                <option value="Galletas">🍪 Galletas</option>
                                <option value="Pays">🥧 Pays</option>
                                <option value="Cupcakes">🧁 Cupcakes</option>
                                <option value="Macarons">🌸 Macarons</option>
                                <option value="Especiales">✨ Especiales</option>
                            </select>
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="precio" class="block text-sm font-bold text-dark-chocolate mb-2">
                                Precio (MXN) *
                            </label>
                            <input type="number" 
                                   name="precio" 
                                   id="precio" 
                                   step="0.01" 
                                   min="0"
                                   required
                                   class="w-full px-4 py-3 border-2 border-rose-200 rounded-xl focus:outline-none focus:border-sakura focus:ring-2 focus:ring-sakura/20 transition-all"
                                   placeholder="0.00">
                        </div>
                    </div>

                    <!-- Imagen del producto -->
                    <div class="mb-6">
                        <label for="imagen" class="block text-sm font-bold text-dark-chocolate mb-2">
                            Imagen del Producto
                        </label>
                        <div class="border-2 border-dashed border-rose-200 rounded-xl p-6 text-center hover:border-sakura transition-colors cursor-pointer" onclick="document.getElementById('imagen').click()">
                            <input type="file" 
                                   name="imagen" 
                                   id="imagen" 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="previewImage(this)">
                            <div id="preview-container">
                                <svg class="mx-auto h-12 w-12 text-rose-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="mt-2 text-sm text-rose-600">Haz clic para subir una imagen</p>
                                <p class="text-xs text-gray-500">PNG, JPG hasta 5MB</p>
                            </div>
                            <img id="image-preview" class="hidden mt-4 max-h-48 mx-auto rounded-lg shadow-md">
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex gap-4 pt-4">
                        <a href="{{ route('profile.show') }}" 
                           class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-bold rounded-xl text-center hover:bg-gray-50 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="flex-1 px-6 py-3 bg-gradient-to-r from-sakura to-gold text-dark-chocolate font-bold rounded-xl hover:from-sakura/90 hover:to-gold/90 transition-all shadow-lg hover:shadow-xl">
                            💾 Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('image-preview').classList.remove('hidden');
                    document.getElementById('preview-container').classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>