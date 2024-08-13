<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de dietas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.dietas.create') }}"
                   class="inline-flex items-center px-3 py-2 btn-rubi-verde btn-rubi-verde:hover text-white text-sm font-medium rounded transition duration-150 my-2">
                   <i class="bi bi-plus-circle mr-1"></i> Agregar Nueva dieta
                </a>

                <!-- Tabla de Dietas -->
                <div class="mt-8 bg-white shadow sm:rounded-lg p-4">
                    <h3 class="text-xl font-semibold text-center mb-4">Dietas</h3>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 custom-border">
                        <thead class="text-xs text-gray-700 uppercase custom-thead-bg custom-border text-center">
                            <tr class="custom-border">
                                <th scope="col" class="px-6 py-3 custom-border text-center">ID</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Colación 1</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Colación 2</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Colación 3</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Colación 4</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Colación 5</th>
                                <th scope="col" class="px-6 py-3 custom-border text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dietas as $dieta)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $dieta->id_dieta }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $dieta->colacion1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $dieta->colacion2 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $dieta->colacion3 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $dieta->colacion4 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap custom-border text-center">{{ $dieta->colacion5 }}</td>
                                <td class="table-actions text-center">
                                    <button onclick="eliminarDieta({{ $dieta->id_dieta }})" class="btn btn-sm btn-danger text-white">Eliminar</button>
                                    <a href="{{ route('admin.dietas.show', $dieta->id_dieta) }}" class="btn btn-sm btn-info text-white">Ver Dieta</a>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

       

            </div>
        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function eliminarDieta(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, redirigir a la ruta de eliminación
                window.location.href = '/admin/dietas/' + id + '/eliminar';
            }
        });
    }
</script>


</x-app-layout>
