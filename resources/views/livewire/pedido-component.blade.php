<div class="p-6 max-w-5xl mx-auto">

    <div class="bg-white shadow-md rounded p-4 mb-4 text-gray-800">
        <strong>Usuario:</strong> <span class="text-blue-700 font-semibold">{{ auth()->user()->name }}</span>
        <span class="ml-2">– Módulo de Pedidos</span>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $pedido_id ? 'update' : 'store' }}" class="grid grid-cols-2 gap-4 mb-6">
        <select wire:model="cliente_id" class="border p-2 rounded">
            <option value="">Seleccione Cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
            @endforeach
        </select>

        <select wire:model="producto_id" class="border p-2 rounded">
            <option value="">Seleccione Producto</option>
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>

        <input wire:model="fecha" type="date" class="border p-2 rounded">
        <input wire:model="cantidad" type="number" placeholder="Cantidad" class="border p-2 rounded">
        <input wire:model="precio" type="number" step="0.01" placeholder="Precio" class="border p-2 rounded">
        <select wire:model="estado" class="border p-2 rounded">
            <option value="pendiente">Pendiente</option>
            <option value="confirmado">Confirmado</option>
            <option value="cancelado">Cancelado</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded col-span-2">
            {{ $pedido_id ? 'Actualizar' : 'Guardar' }}
        </button>
    </form>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr class="border-t">
                    <td>{{ $pedido->cliente->nombre }} {{ $pedido->cliente->apellido }}</td>
                    <td>{{ $pedido->producto->nombre }}</td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>${{ number_format($pedido->precio, 2) }}</td>
                    <td>{{ ucfirst($pedido->estado) }}</td>
                    <td class="space-x-2">
                        <button wire:click="edit({{ $pedido->id }})" class="bg-yellow-400 px-2 py-1 rounded">Editar</button>
                        <button wire:click="destroy({{ $pedido->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
