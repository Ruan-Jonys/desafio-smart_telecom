<div class="bg-white shadow sm:rounded-lg p-6 w-full max-w-7xl mx-auto">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">
        {{ __('Editar Senha') }}
    </h2>

    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Senha Atual') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full"
                     wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Nova Senha') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full"
                     wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full"
                     wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvo.') }}
        </x-action-message>

        <x-button wire:click="updatePassword">
            {{ __('Salvar') }}
        </x-button>
    </div>
</div>
