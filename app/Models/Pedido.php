<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'producto_id',
        'fecha',
        'cantidad',
        'precio',
        'estado',
    ];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
