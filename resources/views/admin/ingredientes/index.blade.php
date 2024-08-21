<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de dietas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">


                <!-- Contenedor de Ingredientes -->
                <div class="mt-8 bg-white shadow sm:rounded-lg p-4">
                    <h3 class="text-xl font-semibold text-center mb-4">Ingredientes</h3>
                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 custom-border">
                            <thead class="text-xs text-gray-700 uppercase custom-thead-bg custom-border text-center">
                                <tr class="custom-border">

                                    <th scope="col" class="px-6 py-3 custom-border text-center">Nombre</th>
                                    <th scope="col" class="px-6 py-3 custom-border text-center">Cantidad</th>
                                    <th scope="col" class="px-6 py-3 custom-border text-center">ID Colación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingredientes as $ingrediente)
                                    <tr class="border-b">

                                        <td class="px-6 py-4 whitespace-nowrap custom-border text-center">
                                            {{ $ingrediente->nombre_ingrediente }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap custom-border text-center">
                                            {{ $ingrediente->cantidad }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap custom-border text-center">
                                            {{ $ingrediente->id_colacion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>



</x-app-layout>
