<form wire:submit.prevent="updateProfileInformation" class="bg-white shadow sm:rounded-lg p-6 w-full max-w-7xl mx-auto">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">
        {{ __('Editar Perfil') }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="md:col-span-2">
                <input type="file" class="hidden" wire:model.live="photo" x-ref="photo"
                       x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => { photoPreview = e.target.result; };
                            reader.readAsDataURL($refs.photo.files[0]);
                        " />

                <x-label for="photo" value="{{ __('Foto') }}" />
                <div class="mt-2 flex items-center space-x-4">
                    <div x-show="!photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}"
                             alt="{{ $this->user->name }}"
                             class="rounded-full size-20 object-cover">
                    </div>
                    <div x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <x-secondary-button type="button"
                                            x-on:click.prevent="$refs.photo.click()">
                            {{ __('Selecionar nova foto') }}
                        </x-secondary-button>
                        @if ($this->user->profile_photo_path)
                            <x-secondary-button type="button"
                                                wire:click="deleteProfilePhoto">
                                {{ __('Remover foto') }}
                            </x-secondary-button>
                        @endif
                    </div>
                </div>
                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div>
            <x-label for="name" value="Nome" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div>
            <x-label for="email" value="E-mail" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <div>
            <x-label for="cnpj" value="CNPJ" />
            <x-input id="cnpj" type="text" class="mt-1 block w-full" wire:model="state.cnpj" />
            <x-input-error for="cnpj" class="mt-2" />
        </div>

        <div>
            <x-label for="address" value="Endereço" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <div>
            <x-label for="neighborhood" value="Bairro" />
            <x-input id="neighborhood" type="text" class="mt-1 block w-full" wire:model="state.neighborhood" />
            <x-input-error for="neighborhood" class="mt-2" />
        </div>

        <div>
            <x-label for="city" value="Cidade" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model="state.city" />
            <x-input-error for="city" class="mt-2" />
        </div>

        <div>
            <x-label for="state" value="Estado" />
            <x-input id="state" type="text" class="mt-1 block w-full" wire:model="state.state" />
            <x-input-error for="state" class="mt-2" />
        </div>

        <div>
            <x-label for="zipcode" value="CEP" />
            <x-input id="zipcode" type="text" class="mt-1 block w-full" wire:model="state.zipcode" maxlength="9" />
            <x-input-error for="zipcode" class="mt-2" />
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end">
        <x-action-message class="me-3" on="saved">
            {{ __('Salvo.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo" type="submit">
            {{ __('Salvar') }}
        </x-button>
    </div>
</form>
