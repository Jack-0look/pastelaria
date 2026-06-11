<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Producto;

class ProfileController extends Controller
{
     /**
     * Muestra el perfil del usuario con sus productos.
     */
    public function show(): View
    {
        $user = Auth::user();
        
        // Obtener productos del usuario (simulado con datos dummy por ahora)
        // Cuando conectes con MongoDB, cambia esto por:
        // $productos = app('App\Models\Producto')->where('vendedor_id', $user->id)->get();

        // Obtener productos reales del usuario desde MongoDB
    $productos = Producto::where('vendedor_id', $user->id)
                         ->where('activo', true)
                         ->orderBy('created_at', 'desc')
                         ->get();

    return view('profile.show', [
        'user' => $user,
        'productos' => $productos,
        'productosCount' => $productos->count(),
        'ventasCount' => 12, // Esto lo calculas después con una colección de órdenes
        'likesCount' => 48   // Esto lo calculas después
    ]);
        
        $productos = [
            [
                'id' => 1,
                'nombre' => 'Strawberry Cake',
                'descripcion' => 'Fresh handmade strawberry cake with premium cream.',
                'precio' => 450.00,
                'categoria' => 'Pasteles',
                'imagen' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
            ],
            [
                'id' => 2,
                'nombre' => 'Sakura Cupcake',
                'descripcion' => 'Soft vanilla cupcake with sakura frosting and berries.',
                'precio' => 85.00,
                'categoria' => 'Cupcakes',
                'imagen' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
            ],
            [
                'id' => 3,
                'nombre' => 'Choco Cookies',
                'descripcion' => 'Crunchy outside and soft inside.',
                'precio' => 120.00,
                'categoria' => 'Galletas',
                'imagen' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
            ]
        ];

        return view('profile.show', [
            'user' => $user,
            'productos' => $productos,
            'productosCount' => count($productos),
            'ventasCount' => 12, // Simulado
            'likesCount' => 48   // Simulado
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
