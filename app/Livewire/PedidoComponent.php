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
    public $cantidad;
    public $precio;
    public $estado = 'pendiente';

    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->productos = Producto::all();
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
        $this->cantidad = '';
        $this->precio = '';
        $this->estado = 'pendiente';
    }

    public function store()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'fecha' => 'required|date',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,confirmado,cancelado',
        ]);

        Pedido::create([
            'cliente_id' => $this->cliente_id,
            'producto_id' => $this->producto_id,
            'fecha' => $this->fecha,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'estado' => $this->estado,
        ]);

        session()->flash('message', 'Pedido creado exitosamente.');
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
    }

    public function update()
    {
        $this->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'fecha' => 'required|date',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,confirmado,cancelado',
        ]);

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

