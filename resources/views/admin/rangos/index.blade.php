<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Rangos de Calorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.rangos.create') }}"
                   class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">
                    <i class="bi bi-plus-circle mr-1"></i> Agregar Rangos de Calorías
                </a>

                <div class="mt-8 bg-white shadow sm:rounded-lg p-4">
                    <h3 class="text-xl font-semibold text-center mb-4">Rangos de Calorías</h3>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 custom-border">
                        <thead class="text-xs text-gray-700 uppercase custom-thead-bg custom-border text-center">
                            <tr class="custom-border">
                                <th scope="col" class="px-6 py-3 custom-border text-center">ID</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Inicio</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Fin</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rangos as $rango)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $rango->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $rango->inicio }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $rango->fin }}</td>
                            
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">
                                    <a href="{{ route('admin.rangos.edit', $rango->id) }}"
                                        class="btn-rubi-amarillo btn-rubi-amarillo:hover text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                         Editar
                                     </a>
                                     
                                    <form action="{{ route('admin.rangos.destroy', $rango->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-rubi-rojo btn-rubi-rojo:hover text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const form = this;
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás recuperar este rango de calorías!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
