<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
   
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <!-- Encabezado Principal -->
                <div class="mb-6 flex items-center justify-between border-b border-gray-200 pb-4">
                    <h3 class="text-2xl font-semibold text-gray-800">¡Bienvenido, {{ Auth::user()->name }}!</h3>
                    <div class="text-gray-600">
                       
                    </div>
                </div>

                <!-- Mensaje de Estado -->
                <div class="p-4 bg-blue-100 border border-blue-300 rounded-lg text-blue-800 mb-6">
                    <p class="text-lg font-medium">¡Estás dentro del panel de administración!</p>
                    <p>Desde aquí, puedes gestionar todas las publicaciones, comentarios y más. ¡Explora las diferentes secciones usando el menú de navegación!</p>
                </div>

                <!-- Estadísticas Principales -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Estadística 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4.5a1.5 1.5 0 00.5 1.09l4 3.5a1.5 1.5 0 002.5-1.09V5.5a1.5 1.5 0 00-2.5-1.09l-4 3.5A1.5 1.5 0 0012 8z" />
                            </svg>
                            <h4 class="text-xl font-semibold ml-4">Últimos Comentarios</h4>
                        </div>
                        <p class="text-gray-600">Revisa los comentarios más recientes que se han hecho en las publicaciones.</p>
                    </div>

                    <!-- Estadística 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <svg class="w-10 h-10 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16" />
                            </svg>
                            <h4 class="text-xl font-semibold ml-4">Publicaciones Recientes</h4>
                        </div>
                        <p class="text-gray-600">Mantente al tanto de las publicaciones más recientes y relevantes.</p>
                    </div>

                    <!-- Estadística 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-4">
                            <svg class="w-10 h-10 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15l3 3m0 0l3-3m-3 3V4" />
                            </svg>
                            <h4 class="text-xl font-semibold ml-4">Tareas Pendientes</h4>
                        </div>
                        <p class="text-gray-600">Revisa y gestiona las tareas pendientes para mejorar la eficiencia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>