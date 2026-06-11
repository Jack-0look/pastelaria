<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Crear sesión de checkout de Stripe
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->back()->with('error', 'Tu carrito está vacío');
        }

        // Calcular total en centavos (Stripe usa centavos)
        $total = 0;
        $lineItems = [];

        foreach($cart as $item) {
            $amount = intval($item['price'] * 100); // Convertir a centavos
            $total += $amount * $item['quantity'];
            
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'mxn',
                    'product_data' => [
                        'name' => $item['name'],
                        'images' => $item['image'] ? [asset($item['image'])] : [],
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // Crear sesión de checkout
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success', ['session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('carrito.index'),
            'metadata' => [
                'user_id' => auth()->id(),
                'cart' => json_encode($cart),
            ],
        ]);

        return redirect($session->url);
    }

    /**
     * Página de éxito después del pago
     */
    public function success(Request $request)
    {
        // Limpiar carrito
        session()->forget('cart');

        return view('payment.success', [
            'session_id' => $request->session_id
        ]);
    }

    /**
     * Página de cancelación
     */
    public function cancel()
    {
        return view('payment.cancel');
    }
}