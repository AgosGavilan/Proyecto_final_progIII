<x-layouts.app :title="__('Bienvenida')">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="col-span-1 flex flex-col items-center gap-6">

            <div
                class="w-full rounded-xl overflow-hidden border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-4">
                <img src="{{ asset('build/assets/images/tiendApp_logo.png') }}" alt="Logo TiendApp"
                    class="w-full object-contain" />
            </div>
            <!-- Descripción -->
            <div
                class="text-sm text-gray-700 dark:text-gray-200 p-4 border border-neutral-300 dark:border-neutral-700 rounded-xl bg-white dark:bg-neutral-800">
                <h2 class="text-lg font-semibold mb-2">¿Qué es TiendApp?</h2>
                <p>Esta aplicación permite gestionar productos, pedidos y usuarios de manera eficiente. Pensada para
                    pequeños comercios o emprendimientos que desean mejorar su organización.</p>
            </div>
        </div>
        <div class="col-span-2 flex flex-col gap-4">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white text-center w-full">Conocé a los desarrolladores
            </h2>
            <div class="col-span-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <!-- Perfil Agostina -->
                <div
                    class="flex flex-col items-center border border-neutral-300 dark:border-neutral-700 rounded-xl p-4 bg-white dark:bg-neutral-800 text-center">
                    <img src="{{ asset('images/agostina.jpg') }}" alt="Agostina Gavilan"
                        class="w-24 h-24 rounded-full object-cover mb-2" />
                    <h3 class="font-semibold text-gray-900 dark:text-white">Agostina Gavilan</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Desarrolladora Frontend</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                        Desarrolladora Frontend con formación Full Stack, apasionada por la creación de experiencias
                        interactivas y eficientes. Me motiva el aprendizaje continuo y la colaboración en equipos
                        ágiles, aplicando metodologías como SCRUM para optimizar procesos.
                    </p><br>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Habilidades</p>
                    <div class="flex flex-wrap justify-center gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">HTML</span>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">CSS</span>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">JavaScript</span>
                        <span
                            class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">PHP</span>
                        <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Laravel</span>
                    </div><br>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Contacto</p>
                    <div class="flex gap-3">
                        <a href="https://www.linkedin.com/in/agostina-gavilan-283a03209/" target="_blank" rel="noopener noreferrer"
                            class="text-blue-500 hover:underline">LinkedIn</a>
                        <a href="https://github.com/AgosGavilan" target="_blank" rel="noopener noreferrer"
                            class="text-gray-600 hover:underline">GitHub</a>
                        <a href="mailto:agosgavilan3@gmail.com" target="_blank" rel="noopener noreferrer"
                            class="text-black-600 hover:underline">Email</a>
                    </div><br>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Formosa, Argentina</p>


                </div>

                <!-- Perfil Julian -->
                <div
                    class="flex flex-col items-center border border-neutral-300 dark:border-neutral-700 rounded-xl p-4 bg-white dark:bg-neutral-800 text-center">
                    <img src="{{ asset('images/julian.jpg') }}" alt="Otazo Julian"
                        class="w-24 h-24 rounded-full object-cover mb-2" />
                    <h3 class="font-semibold text-gray-900 dark:text-white">Otazo Julián</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Desarrollador Backend</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                        Desarrollador Backend con formación Full Stack, enfocado en construir sistemas robustos y
                        eficientes del lado del servidor. Me motiva el aprendizaje constante y el trabajo colaborativo
                        en equipos ágiles, utilizando metodologías como Kanban para mantener un flujo de trabajo claro y
                        continuo.
                    </p><br>
                     <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Habilidades</p>
                    <div class="flex flex-wrap justify-center gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">HTML</span>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">CSS</span>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">JavaScript</span>
                        <span
                            class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">PHP</span>
                        <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Laravel</span>
                    </div><br>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Contacto</p>
                    <div class="flex gap-3">
                        <a href="https://www.linkedin.com/in/julian-otazo-408774373/" target="_blank" rel="noopener noreferrer"
                            class="text-blue-500 hover:underline">LinkedIn</a>
                        <a href="https://github.com/julianotazo" target="_blank" rel="noopener noreferrer"
                            class="text-gray-600 hover:underline">GitHub</a>
                        <a href="mailto:julianotazo97@gmail.com" target="_blank" rel="noopener noreferrer"
                            class="text-black-600 hover:underline">Email</a>
                    </div><br>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Formosa, Argentina</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>