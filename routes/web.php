<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

// Pagos con Stripe (requieren auth)
Route::middleware('auth')->group(function () {
    Route::post('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
});

Route::get('/', [ProductoController::class, 'index'])->name('home');
// Búsqueda de productos
Route::get('/buscar', [ProductoController::class, 'buscar'])->name('productos.buscar');

// Categorías
Route::get('/categorias/{slug}', [CategoriaController::class, 'show'])->name('categorias.show');

// Productos
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

// Carrito
Route::get('/carrito', [CartController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CartController::class, 'store'])->name('carrito.store');
Route::post('/carrito/eliminar/{id}', [CartController::class, 'destroy'])->name('carrito.destroy');
Route::post('/carrito/actualizar/{id}', [CartController::class, 'update'])->name('carrito.update');
Route::post('/carrito/vaciar', [CartController::class, 'clear'])->name('carrito.clear');

// ============================================
// 🔐 RUTAS PROTEGIDAS (Requieren login)
// ============================================

// ✅ Dashboard (requerido por Laravel Breeze)
Route::get('/dashboard', function () {
    return redirect()->route('home'); // Redirige al home si ya está logueado
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para CRUD de productos (solo autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
});


// Perfil (ya creado por Breeze, pero puedes extenderlo)
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show'); // <- AGREGA ESTA LÍNEA
    Route::get('/perfil/editar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';