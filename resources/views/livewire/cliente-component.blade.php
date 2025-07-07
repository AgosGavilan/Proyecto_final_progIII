{{-- Tipografía sugerida (en tu layout principal): --}}
{{--
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> --}}
{{-- Tailwind config: extend -> fontFamily: { poppins: ['Poppins', 'sans-serif'] } --}}

<div class="p-4 sm:p-6 max-w-7xl mx-auto font-poppins text-gray-900 dark:text-gray-100">

    <div class="bg-gray-100 dark:bg-gray-800 shadow-lg rounded-xl p-6 mb-6">
        <strong>Usuario:</strong>
        <span class="text-[#C1272D] font-semibold">{{ auth()->user()->name }}</span>
        <span class="ml-2">– Módulo de Carga de Clientes</span>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 px-4 py-3 mb-4 rounded-lg shadow-sm">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $cliente_id ? 'update' : 'store' }}"
        class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md">
        <input wire:model="nombre" type="text" placeholder="Nombre"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">
        <input wire:model="apellido" type="text" placeholder="Apellido"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">
        <input wire:model="telefono" type="text" placeholder="Teléfono"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg md:col-span-2 w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">
        <input wire:model="email" type="email" placeholder="Email"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg md:col-span-2 w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">
        <input wire:model="domicilio" type="text" placeholder="Domicilio"
            class="border border-gray-300 dark:border-gray-600 p-3 rounded-lg md:col-span-2 w-full bg-white dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#C1272D] focus:ring-opacity-50">

        <div class="md:col-span-2 flex justify-center">
            <button type="submit"
                class="bg-[#C1272D] hover:bg-red-700 transition-colors text-white px-6 py-3 rounded-xl w-48">
                {{ $cliente_id ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>

    <div class="overflow-x-auto bg-gray-100 dark:bg-gray-800 rounded-xl shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-[#C1272D] text-white">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Apellido</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Teléfono</th>
                    <th class="px-4 py-3">Domicilio</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr class="border-t dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">{{ $cliente->nombre }}</td>
                        <td class="px-4 py-3">{{ $cliente->apellido }}</td>
                        <td class="px-4 py-3">{{ $cliente->email }}</td>
                        <td class="px-4 py-3">{{ $cliente->telefono }}</td>
                        <td class="px-4 py-3">{{ $cliente->domicilio }}</td>
                        <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                            <button wire:click="edit({{ $cliente->id }})"
                                class="text-green-600 dark:text-green-400 hover:underline">Editar</button>
                            <button wire:click="destroy({{ $cliente->id }})"
                                class="text-red-600 dark:text-red-400 hover:underline">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>