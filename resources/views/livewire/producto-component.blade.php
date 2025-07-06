<div class="p-6 max-w-4xl mx-auto relative">

    <div class="bg-white shadow-md rounded p-4 mb-4 text-gray-800">
        <strong>Usuario:</strong> <span class="text-blue-700 font-semibold">{{ auth()->user()->name }}</span>
        <span class="ml-2">– Módulo de Productos</span>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $producto_id ? 'update' : 'store' }}" class="grid grid-cols-2 gap-4 mb-6">
        <input wire:model="nombre" type="text" placeholder="Nombre" class="border p-2 rounded">
        <input wire:model="marca" type="text" placeholder="Marca" class="border p-2 rounded">
        <input wire:model="precio" type="number" step="0.01" placeholder="Precio" class="border p-2 rounded">
        <input wire:model="stock" type="number" placeholder="Stock" class="border p-2 rounded">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded col-span-2">
            {{ $producto_id ? 'Actualizar' : 'Guardar' }}
        </button>
    </form>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr class="border-t">
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->marca }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->estado }}</td>
                    <td class="space-x-2">
                        <button wire:click="edit({{ $producto->id }})" class="bg-yellow-400 px-2 py-1 rounded">Editar</button>
                        <button wire:click="destroy({{ $producto->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
