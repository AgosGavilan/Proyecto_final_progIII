<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class ProductoComponent extends Component
{
    public $productos;
    public $producto_id;
    public $nombre;
    public $marca;
    public $precio;
    public $stock;
    public $estado = 'Disponible';

    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.producto-component');
    }

    public function resetInput()
    {
        $this->producto_id = null;
        $this->nombre = '';
        $this->marca = '';
        $this->precio = '';
        $this->stock = '';
        $this->estado = 'Disponible';
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $this->estado = $this->stock > 0 ? 'Disponible' : 'Agotado';

        Producto::create([
            'nombre' => $this->nombre,
            'marca' => $this->marca,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'estado' => $this->estado,
        ]);

        session()->flash('message', 'Producto creado exitosamente.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $this->producto_id = $id;
        $this->nombre = $producto->nombre;
        $this->marca = $producto->marca;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;
        $this->estado = $producto->estado;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $this->estado = $this->stock > 0 ? 'Disponible' : 'Agotado';

        $producto = Producto::findOrFail($this->producto_id);
        $producto->update([
            'nombre' => $this->nombre,
            'marca' => $this->marca,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'estado' => $this->estado,
        ]);

        session()->flash('message', 'Producto actualizado correctamente.');
        $this->resetInput();
    }

    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();
        session()->flash('message', 'Producto eliminado.');
    }
}
