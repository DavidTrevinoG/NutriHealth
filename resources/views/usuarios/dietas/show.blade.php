<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Dieta') }}
        </h2>
    </x-slot>

    <div class="containerMostrarDiestas">
        @foreach (['colacion1', 'colacion2', 'colacion3', 'colacion4', 'colacion5'] as $colacionKey)
            @php
                $colacion = $colaciones[$colacionKey] ?? null;
            @endphp

            <div class="colacion-container bg-custom mb-6 p-4 border border-gray-300 rounded-lg">
                @if ($colacion)
                    <div class="colacion-details flex">
                        <div class="colacion-image-container w-1/3 pr-4">
                            <img src="{{ asset($colacion->imagen) }}" alt="{{ $colacion->nombre_colacion }}" class="colacion-image">
                        </div>
                        <div class="colacion-info w-2/3">
                            <h2 class="text-xl font-semibold mb-2 text-custom-primary">{{ $colacion->nombre_colacion }}</h2>
                            <ul class="list-disc pl-5 text-custom-secondary">
                                @foreach ($colacion->ingredientes as $ingrediente)
                                    <li class="mb-2">{{ $ingrediente->nombre_ingrediente }}: {{ $ingrediente->cantidad }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <p>Colación no encontrada.</p>
                @endif
            </div>
        @endforeach
    </div>

    <style>
        .containerMostrarDiestas {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .colacion-container {
            background-color: #d9fff5;
        }

        .colacion-details {
            display: flex;
            align-items: flex-start;
        }

        .colacion-image-container {
            padding-right: 16px;
        }

        .colacion-image {
            width: 500px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .colacion-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .text-custom-primary {
            color: #02BDB0;
        }

        .text-custom-secondary {
            color: #4bc5b8;
        }
    </style>
</x-app-layout>
