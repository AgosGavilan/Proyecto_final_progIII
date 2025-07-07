<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'marca',
        'precio',
        'stock',
        'estado',
    ];
    public function pedidos()
{
    return $this->hasMany(Pedido::class);
}

}
