<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class ClienteComponent extends Component
{
    public $clientes;
    public $cliente_id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $domicilio;

    public function render()
    {
        $this->clientes = Cliente::all();
        return view('livewire.cliente-component');
    }

    public function resetInput()
    {
        $this->cliente_id = null;
        $this->nombre = '';
        $this->apellido = '';
        $this->email = '';
        $this->telefono = '';
        $this->domicilio = '';
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required|string',
            'domicilio' => 'required|string',
        ]);

        Cliente::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'domicilio' => $this->domicilio,
        ]);

        session()->flash('message', 'Cliente creado exitosamente.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->cliente_id = $id;
        $this->nombre = $cliente->nombre;
        $this->apellido = $cliente->apellido;
        $this->email = $cliente->email;
        $this->telefono = $cliente->telefono;
        $this->domicilio = $cliente->domicilio;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $this->cliente_id,
            'telefono' => 'required|string',
            'domicilio' => 'required|string',
        ]);

        $cliente = Cliente::findOrFail($this->cliente_id);
        $cliente->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'domicilio' => $this->domicilio,
        ]);

        session()->flash('message', 'Cliente actualizado correctamente.');
        $this->resetInput();
    }

    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        session()->flash('message', 'Cliente eliminado.');
    }
}

