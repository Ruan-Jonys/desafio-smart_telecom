<div class="bg-white shadow sm:rounded-lg p-6 w-full max-w-7xl mx-auto">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">
        {{ __('Excluir Conta') }}
    </h2>

    <div class="text-sm text-gray-600">
        {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente apagados. Antes de excluir sua conta, por favor, faça o download de quaisquer dados ou informações que deseja manter.') }}
    </div>

    <div class="mt-5">
        <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
            {{ __('Excluir Conta') }}
        </x-danger-button>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <x-dialog-modal wire:model.live="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Excluir Conta') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Tem certeza de que deseja excluir sua conta? Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente apagados. Por favor, digite sua senha para confirmar que deseja excluir permanentemente sua conta.') }}

            <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-input type="password" class="mt-1 block w-3/4"
                            autocomplete="current-password"
                            placeholder="{{ __('Senha') }}"
                            x-ref="password"
                            wire:model="password"
                            wire:keydown.enter="deleteUser" />

                <x-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Excluir Conta') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
