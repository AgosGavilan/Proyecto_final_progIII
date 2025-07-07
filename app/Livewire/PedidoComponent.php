<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;

class PedidoComponent extends Component
{
    public $pedidos;
    public $clientes;
    public $productos;
    public $pedido_id;
    public $cliente_id;
    public $producto_id;
    public $fecha;
    public $cantidad = 0;
    public $precio;
    public $estado = 'en preparacion';
    public $productoSeleccionado;
    public $errorStock;


    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->productos = Producto::all(); // Asegura que incluya 'precio'
    }

    public function render()
    {
        $this->pedidos = Pedido::with('cliente', 'producto')->get();
        return view('livewire.pedido-component');
    }

    public function resetInput()
    {
        $this->pedido_id = null;
        $this->cliente_id = '';
        $this->producto_id = '';
        $this->fecha = '';
        $this->cantidad = 0;
        $this->precio = '';
        $this->estado = 'en preparacion';
        $this->productoSeleccionado = null;
    }

    public function updatedProductoId($value)
    {
        $this->productoSeleccionado = $this->productos->firstWhere('id', $value);

        if ($this->productoSeleccionado && $this->cantidad) {
            $this->precio = $this->productoSeleccionado->precio * $this->cantidad;
        }
    }

    public function updatedCantidad($value)
{
    $this->errorStock = null;

    if ($this->productoSeleccionado) {
        // Si el producto está agotado (stock 0)
        if ($this->productoSeleccionado->stock == 0) {
            $this->errorStock = 'Este producto está agotado.';
            $this->precio = null;
            return;
        }

        // Si la cantidad supera el stock
        if ($value > $this->productoSeleccionado->stock) {
            $this->errorStock = 'La cantidad supera el stock disponible.';
            $this->precio = null;
        } else {
            $this->precio = $this->productoSeleccionado->precio * $value;
        }
    }
}

    public function store()
{
    $this->errorStock = null;

    $this->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'producto_id' => 'required|exists:productos,id',
        'fecha' => 'required|date',
        'cantidad' => 'required|integer|min:1',
        'precio' => 'required|numeric|min:0',
        'estado' => 'required|in:en preparacion,en camino,entregado,cancelado',
    ]);

    // Verificar stock antes de guardar
    if ($this->productoSeleccionado && $this->cantidad > $this->productoSeleccionado->stock) {
        $this->errorStock = 'La cantidad supera el stock disponible.';
        $this->dispatch('cantidadReset', cantidad: 0);
        $this->cantidad = 0;
        return;
    }

    // Crear el pedido
    Pedido::create([
        'cliente_id' => $this->cliente_id,
        'producto_id' => $this->producto_id,
        'fecha' => $this->fecha,
        'cantidad' => $this->cantidad,
        'precio' => $this->precio,
        'estado' => $this->estado,
    ]);

    // Restar stock del producto
    Producto::where('id', $this->producto_id)->decrement('stock', $this->cantidad);

    // Refrescar lista de productos en este componente
    $this->productos = Producto::all();

    // (Opcional) Notificar a otro componente
    // $this->dispatch('stock-actualizado');

    session()->flash('message', 'Pedido realizado exitosamente.');
    $this->resetInput();
}



    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);

        $this->pedido_id = $pedido->id;
        $this->cliente_id = $pedido->cliente_id;
        $this->producto_id = $pedido->producto_id;
        $this->fecha = $pedido->fecha;
        $this->cantidad = $pedido->cantidad;
        $this->precio = $pedido->precio;
        $this->estado = $pedido->estado;

        $this->productoSeleccionado = $this->productos->firstWhere('id', $pedido->producto_id);
    }

    public function update()
{
    $this->errorStock = null;

    $this->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'producto_id' => 'required|exists:productos,id',
        'fecha' => 'required|date',
        'cantidad' => 'required|integer|min:1',
        'precio' => 'required|numeric|min:0',
        'estado' => 'required|in:en preparacion,en camino,entregado,cancelado',
    ]);

    // Verificar stock antes de actualizar
    if ($this->productoSeleccionado && $this->cantidad > $this->productoSeleccionado->stock) {
    $this->errorStock = 'La cantidad supera el stock disponible.';
    $this->cantidad = null;
    $this->cantidad = 0;
    return;
}

    $pedido = Pedido::findOrFail($this->pedido_id);

    $pedido->update([
        'cliente_id' => $this->cliente_id,
        'producto_id' => $this->producto_id,
        'fecha' => $this->fecha,
        'cantidad' => $this->cantidad,
        'precio' => $this->precio,
        'estado' => $this->estado,
    ]);

    session()->flash('message', 'Pedido actualizado correctamente.');
    $this->resetInput();
}



    public function destroy($id)
    {
        Pedido::findOrFail($id)->delete();
        session()->flash('message', 'Pedido eliminado.');
    }
}