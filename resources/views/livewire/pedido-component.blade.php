<div class="p-4 sm:p-6 max-w-7xl mx-auto font-poppins text-gray-900 dark:text-gray-100">

    <div class="bg-gray-100 dark:bg-gray-800 shadow-lg rounded-xl p-6 mb-6">
        <strong>Usuario:</strong>
        <span class="text-[#C1272D] font-semibold">{{ auth()->user()->name }}</span>
        <span class="ml-2">– Módulo de Pedidos</span>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 px-4 py-3 mb-4 rounded-lg shadow-sm">
            {{ session('message') }}
        </div>
    @endif


    @if ($errorStock)
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
            class="bg-red-100 text-red-500 dark:bg-red-900 dark:text-red-300 px-4 py-3 mb-4 rounded-lg shadow-sm">
            {{ $errorStock }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $pedido_id ? 'update' : 'store' }}"
        class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md">

        <select wire:model="cliente_id" aria-label="Seleccione Cliente"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">
            <option value="">Seleccione Cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
            @endforeach
        </select>

        <select wire:model="producto_id" aria-label="Seleccione Producto"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">
            @if ($productoSeleccionado)
                <div class="md:col-span-2 text-sm text-gray-600 dark:text-gray-300">
                    <p><strong>Precio unitario:</strong> ${{ number_format($productoSeleccionado->precio, 2) }}</p>
                </div>
            @endif
            <option value="">Seleccione Producto</option>
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>

        <input wire:model="fecha" type="date" aria-label="Fecha"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50" />

        <input wire:model.lazy="cantidad" type="number" min="0" placeholder="Cantidad" aria-label="Cantidad"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50" />

        <input wire:model="precio" type="number" step="0.01" placeholder="Precio" aria-label="Precio" readonly
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-gray-200 dark:bg-gray-700 dark:text-white focus:outline-none" />


        <select wire:model="estado" aria-label="Estado"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">

            @if ($pedido_id)
                <option value="en preparacion">En preparación</option>
                <option value="en camino">En camino</option>
                <option value="entregado">Entregado</option>
                <option value="cancelado">Cancelado</option>
            @else
                <option value="en preparacion">En preparación</option>
            @endif
        </select>

        <div class="md:col-span-2 flex justify-center">
            <button type="submit"
                class="bg-[#C1272D] hover:bg-red-700 transition-colors text-white px-6 py-3 rounded-xl w-48">
                {{ $pedido_id ? 'Actualizar Pedido' : 'Realizar Pedido' }}
            </button>
        </div>
    </form>

    <div class="overflow-x-auto bg-gray-100 dark:bg-gray-800 rounded-xl shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-[#C1272D] text-white">
                <tr>
                    <th class="px-4 py-3">Cliente</th>
                    <th class="px-4 py-3">Producto</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Cantidad</th>
                    <th class="px-4 py-3">Precio</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">{{ $pedido->cliente->nombre }} {{ $pedido->cliente->apellido }}</td>
                        <td class="px-4 py-3">{{ $pedido->producto->nombre }}</td>
                        <td class="px-4 py-3">{{ $pedido->fecha }}</td>
                        <td class="px-4 py-3">{{ $pedido->cantidad }}</td>
                        <td class="px-4 py-3">${{ number_format($pedido->precio, 2) }}</td>
                        <td class="px-4 py-3">
                            @php
                                $estadoColor = match ($pedido->estado) {
                                    'en preparacion' => 'text-yellow-600 dark:text-yellow-400',
                                    'en camino' => 'text-blue-600 dark:text-blue-400',
                                    'entregado' => 'text-green-600 dark:text-green-400',
                                    'cancelado' => 'text-red-600 dark:text-red-400',
                                    default => 'text-gray-600 dark:text-gray-300',
                                };
                            @endphp

                            <span class="font-semibold {{ $estadoColor }}">
                                {{ ucfirst($pedido->estado) }}
                            </span>

                        </td>
                        <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                            <button type="button" wire:click="edit({{ $pedido->id }})"
                                aria-label="Editar pedido {{ $pedido->id }}"
                                class="text-green-600 dark:text-green-400 hover:underline">Editar</button>
                            <button type="button" wire:click="destroy({{ $pedido->id }})"
                                aria-label="Eliminar pedido {{ $pedido->id }}"
                                class="text-red-600 dark:text-red-400 hover:underline">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>