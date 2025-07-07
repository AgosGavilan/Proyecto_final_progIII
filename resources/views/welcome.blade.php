<!DOCTYPE html>
<html lang="es" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiendApp</title>
    {{-- Tipografía Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <div class="min-h-screen flex flex-col justify-between">

        {{-- Header --}}
        <header class="flex flex-col items-center text-center min-h-[70vh] px-4 justify-center space-y-6">
            <img src="{{ asset('/build/assets/images/tiendApp_logo.png') }}" alt="Logo TiendApp" class="h-30">

            <h1 class="text-3xl md:text-5xl font-bold">
                TiendApp: Tu tienda, digitalizada
            </h1>

            <p class="text-lg md:text-xl max-w-2xl">
                Gestioná tus productos, clientes y pedidos desde un solo lugar.<br>
                Simple, rápido y accesible desde cualquier dispositivo.
            </p>

            {{-- Botón centrado con márgenes automáticos --}}
            <div class="flex justify-center">
                <a href="{{ route('login') }}"
                    class="bg-[#C1272D] hover:bg-red-700 transition-colors text-white px-8 py-4 rounded-xl text-lg shadow-md mt-8">
                    Comenzar ahora
                </a>
            </div>
        </header>



        {{-- Características --}}
        <main class="max-w-5xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div>
                <h3 class="text-xl font-semibold mb-2">📦 Gestión de Stock</h3>
                <p class="text-gray-700 dark:text-gray-300">Controlá tu inventario en tiempo real.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">👥 Clientes</h3>
                <p class="text-gray-700 dark:text-gray-300">Segmentá y fidelizá con facilidad.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">📊 Reportes</h3>
                <p class="text-gray-700 dark:text-gray-300">Tomá decisiones con datos claros.</p>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="text-center text-sm text-gray-600 dark:text-gray-400 py-6">
            © {{ date('Y') }} TiendApp — Todos los derechos reservados.
        </footer>

    </div>

</body>

</html>