<?php
namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Producto extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'productos';
    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'categoria_id', 
        'imagenes', 'stock', 'vendedor_id', 'activo', 'especial'
    ];

    protected $casts = [
        'imagenes' => 'array',
        'precio' => 'decimal:2',
        'stock' => 'integer'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}