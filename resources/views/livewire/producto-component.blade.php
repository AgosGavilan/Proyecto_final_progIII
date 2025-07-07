<div class="p-4 sm:p-6 max-w-7xl mx-auto font-poppins text-gray-900 dark:text-gray-100">

    <div class="bg-gray-100 dark:bg-gray-800 shadow-lg rounded-xl p-6 mb-6">
        <strong>Usuario:</strong>
        <span class="text-[#C1272D] font-semibold">{{ auth()->user()->name }}</span>
        <span class="ml-2">– Módulo de Productos</span>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 px-4 py-3 mb-4 rounded-lg shadow-sm">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $producto_id ? 'update' : 'store' }}"
        class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md">
        <input wire:model="nombre" type="text" placeholder="Nombre" aria-label="Nombre"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">

        <input wire:model="marca" type="text" placeholder="Marca" aria-label="Marca"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">

        <input wire:model="precio" type="number" step="0.01" placeholder="Precio" aria-label="Precio"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">

        <input wire:model="stock" type="number" placeholder="Stock" aria-label="Stock"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">

        <div class="md:col-span-2 flex justify-center">
            <button type="submit"
                class="bg-[#C1272D] hover:bg-red-700 transition-colors text-white px-6 py-3 rounded-xl w-48">
                {{ $producto_id ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>


    </form>

    <div class="overflow-x-auto bg-gray-100 dark:bg-gray-800 rounded-xl shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-[#C1272D] text-white">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Marca</th>
                    <th class="px-4 py-3">Precio</th>
                    <th class="px-4 py-3">Stock</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">{{ $producto->nombre }}</td>
                        <td class="px-4 py-3">{{ $producto->marca }}</td>
                        <td class="px-4 py-3">${{ number_format($producto->precio, 2) }}</td>
                        <td class="px-4 py-3">{{ $producto->stock }}</td>
                        <td class="px-4 py-3">{{ $producto->estado }}</td>
                        <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                            <button type="button" wire:click="edit({{ $producto->id }})"
                                aria-label="Editar producto {{ $producto->id }}"
                                class="text-sm text-green-500 hover:underline">Editar</button>
                            <button type="button" wire:click="destroy({{ $producto->id }})"
                                aria-label="Eliminar producto {{ $producto->id }}"
                                class="text-sm text-red-500 hover:underline">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>