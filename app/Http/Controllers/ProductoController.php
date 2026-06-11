<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos activos de MongoDB
    $productos = Producto::where('activo', true)
                         ->orderBy('created_at', 'desc')
                         ->get();

    return view('productos.index', compact('productos'));
    }

    public function show($id)
    {
        // Por ahora, retorna la vista de detalle
        return view('productos.show', compact('id'));
    }
    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
{
    // Debug: Ver qué llegó
    \Log::info('Datos recibidos:', $request->all());
    \Log::info('Archivos recibidos:', $request->file() ? ['tiene_archivo' => true] : ['tiene_archivo' => false]);

    // Validación
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'categoria' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
    ], [
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.mimes' => 'La imagen debe ser JPG, PNG o GIF.',
    ]);

    // Manejo de imagen
    $imagenUrl = null;
    
    if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        try {
            $imagen = $request->file('imagen');
            
            // Generar nombre único
            $nombreArchivo = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
            
            // Crear directorio si no existe
            $directorio = public_path('img/productos');
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }
            
            // Mover archivo
            $imagen->move($directorio, $nombreArchivo);
            
            // URL accesible
            $imagenUrl = asset('img/productos/' . $nombreArchivo);
            
            \Log::info('Imagen guardada exitosamente: ' . $imagenUrl);
            
        } catch (\Exception $e) {
            \Log::error('Error al guardar imagen: ' . $e->getMessage());
            // Continuar sin imagen
        }
    } else {
        \Log::warning('No se recibió imagen válida o no se subió archivo');
    }

    // Preparar datos para guardar
    $datosProducto = [
        'nombre' => $validated['nombre'],
        'descripcion' => $validated['descripcion'],
        'categoria' => $validated['categoria'],
        'precio' => $validated['precio'],
        'vendedor_id' => auth()->id(),
        'stock' => $request->input('stock', 10),
        'activo' => true,
    ];

    // Agregar imagen si existe
    if ($imagenUrl) {
        $datosProducto['imagen'] = $imagenUrl;
    }

    // Guardar en MongoDB
    $producto = Producto::create($datosProducto);

    \Log::info('Producto creado con ID: ' . $producto->id);

    return redirect()->route('profile.show')->with('success', 'Producto creado exitosamente 🧁');
}
/**
 * Buscar productos por nombre o descripción.
 */
public function buscar(Request $request)
{
    $query = $request->input('search');
    
    $productos = Producto::where('activo', true)
        ->where(function($q) use ($query) {
            $q->where('nombre', 'like', "%{$query}%")
              ->orWhere('descripcion', 'like', "%{$query}%")
              ->orWhere('categoria', 'like', "%{$query}%");
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('productos.buscar', [
        'productos' => $productos,
        'query' => $query
    ]);
}
}