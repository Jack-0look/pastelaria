<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    /**
     * Muestra la página del carrito con todos los productos.
     */
    public function index()
    {
        // Obtenemos el carrito de la sesión (si no existe, array vacío)
        $cart = Session::get('cart', []);
        
        // Calculamos el total
        $total = $this->calcularTotal($cart);

        return view('carrito.index', compact('cart', 'total'));
    }

    /**
     * Agrega un producto al carrito.
     */
    public function store(Request $request): RedirectResponse
    {
        $id = $request->input('product_id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image', ''); // Imagen opcional
        $quantity = $request->input('quantity', 1);

        // Obtenemos el carrito actual
        $cart = Session::get('cart', []);

        // Si el producto ya existe, sumamos la cantidad
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Si no existe, lo agregamos nuevo
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => $quantity
            ];
        }

        // Guardamos el carrito actualizado en la sesión
        Session::put('cart', $cart);

        return back()->with('success', 'Producto agregado al carrito correctamente 🛒');
    }

    /**
     * Elimina un producto del carrito.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return back()->with('success', 'Producto eliminado del carrito');
    }

    /**
     * Actualiza la cantidad de un producto en el carrito.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $quantity = $request->input('quantity');
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            // Aseguramos que la cantidad sea al menos 1
            $cart[$id]['quantity'] = max(1, (int)$quantity);
            Session::put('cart', $cart);
        }

        return back()->with('success', 'Cantidad actualizada');
    }

    /**
     * Vacía el carrito completamente.
     */
    public function clear(): RedirectResponse
    {
        Session::forget('cart');
        return back()->with('success', 'Carrito vaciado');
    }

    /**
     * Función auxiliar para calcular el total.
     */
    private function calcularTotal($cart): float
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    /**
     * Función auxiliar para contar cuántos items hay (útil para el navbar).
     */
    public static function count()
    {
        $cart = Session::get('cart', []);
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }
}