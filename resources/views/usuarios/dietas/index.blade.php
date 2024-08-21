<x-app-layout>
    <link rel="stylesheet" href="{{ asset('nutri_index/css/style.css') }}">


    <div class="container">

        <form method="GET" action="{{ route('usuarios.dietas.index') }}">
            <br>
            <h2>Dietas Disponibles</h2>

            <div class="select-container">
                <select name="rango_id" onchange="this.form.submit()">
                    <option value="">Seleccione un rango de calorías</option>
                    @foreach ($rangos as $rango)
                        <option value="{{ $rango->id }}" {{ request('rango_id') == $rango->id ? 'selected' : '' }}>
                            {{ $rango->inicio }} - {{ $rango->fin }} Calorías
                        </option>
                    @endforeach
                </select>
            </div>
        </form>


        <div class="dietas-cards mt-4">
            @if ($dietas->isEmpty())
                <p>No hay dietas disponibles para el rango seleccionado.</p>
                <!-- news SECCIÓN start -->
                <div class="news_section layout_padding">
                    <div class="container">
                        <h1 class="health_taital">Características</h1>
                        <p class="health_text">Calculadora de Calorías: Ingresa tu estatura, edad, peso y nivel de
                            actividad para obtener una estimación de las calorías que debes consumir diariamente para
                            alcanzar tus objetivos de salud y fitness.</p>
                        <div class="news_section_2 layout_padding">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="box_main">
                                        <h1 class="centered-textTarjetas ">Encuentra las mejores dietas adaptadas a tus
                                            necesidades</h1>
                                        <p>Explora una variedad de planes de alimentación que se ajustan a tus objetivos
                                            de salud y bienestar. Desde planes para pérdida de peso hasta opciones para
                                            ganar músculo, encuentra la dieta perfecta para ti.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="box_main active">
                                        <h4 class="centered-textTarjetas">Dietas variadas para todos los gustos</h4>
                                        <p>Descubre nuestras opciones de dietas que ofrecen una variedad de sabores y
                                            estilos culinarios. ¡Encuentra recetas deliciosas y nutritivas que se
                                            adaptan a tus preferencias y estilo de vida!</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="box_main">
                                        <h4 class="centered-textTarjetas">Recetas fáciles y rápidas para tu rutina</h4>
                                        <p>Disfruta de recetas que son rápidas de preparar y fáciles de seguir. Ideal
                                            para quienes tienen un horario ocupado pero desean mantener una alimentación
                                            saludable sin complicaciones.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- news SECCIÓN end -->
            @else
                @foreach ($dietas as $dieta)
                    <div class="card">
                        <h2>{{ $dieta->calorias }} Calorías</h2>
                        <a href="{{ route('usuarios.dietas.show', $dieta->id_dieta) }}" class="btn">Ver Detalles</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</x-app-layout>
