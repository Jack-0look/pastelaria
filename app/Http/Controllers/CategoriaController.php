<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use MongoDB\BSON\Regex;

class CategoriaController extends Controller
{
    /**
     * Mostrar productos de una categoría específica.
     */
    public function show($slug)
    {
        // Mapeo de slugs a nombres reales de categoría
        $categoriaMap = [
            'pasteles' => 'Pasteles',
            'galletas' => 'Galletas',
            'pays' => 'Pays',
            'cupcakes' => 'Cupcakes',
            'macarons' => 'Macarons',
            'especiales' => 'Especiales',
            'cakes' => 'Cakes',
        ];

        // Obtener el nombre real de la categoría
        $categoriaNombre = $categoriaMap[strtolower($slug)] ?? ucfirst($slug);

        // Buscar productos con regex case-insensitive
        $productos = Producto::where('categoria', new Regex('^' . preg_quote($categoriaNombre) . '$', 'i'))
                             ->where('activo', true)
                             ->orderBy('created_at', 'desc')
                             ->get();

        // Si no encuentra nada, intentar con el slug directamente
        if ($productos->isEmpty()) {
            $productos = Producto::where('categoria', new Regex('^' . preg_quote($slug) . '$', 'i'))
                                 ->where('activo', true)
                                 ->orderBy('created_at', 'desc')
                                 ->get();
        }

        return view('categorias.show', [
            'categoria' => $categoriaNombre,
            'slug' => $slug,
            'productos' => $productos
        ]);
    }
}