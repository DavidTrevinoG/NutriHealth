<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información de Salud y Estado Físico') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Actualiza la información relacionada con tu salud y estado físico ') }}
        </p>
    </header>



    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="peso" :value="__('Peso (kg)')" />
            <x-text-input id="peso" name="peso" type="text" class="mt-1 block w-full" :value="old('peso', $user->peso)" autofocus
                autocomplete="peso" />
            <x-input-error class="mt-2" :messages="$errors->get('peso')" />
        </div>
        <div>
            <x-input-label for="estatura" :value="__('Estatura (cm)')" />
            <x-text-input id="estatura" name="estatura" type="text" class="mt-1 block w-full" :value="old('estatura', $user->estatura)"
                autofocus autocomplete="estatura" />
            <x-input-error class="mt-2" :messages="$errors->get('estatura')" />
        </div>

        <div>
            <x-input-label for="edad" :value="__('Edad')" />
            <x-text-input id="edad" name="edad" type="text" class="mt-1 block w-full" :value="old('edad', $user->edad)"
                autofocus autocomplete="edad" />
            <x-input-error class="mt-2" :messages="$errors->get('edad')" />
        </div>

        <div>
            <x-input-label for="sexo" :value="__('Sexo')" />
            <select id="sexo" name="sexo" class="mt-1 block w-full">
                <option value="Masculino" {{ old('sexo', $user->sexo) === 'Masculino' ? 'selected' : '' }}>
                    {{ __('Masculino') }}</option>
                <option value="Femenino" {{ old('sexo', $user->sexo) === 'Femenino' ? 'selected' : '' }}>
                    {{ __('Femenino') }}</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
