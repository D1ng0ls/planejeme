<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-100">
            {{ __('Deletar conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Uma vez que sua conta for deletada, todos os seus recursos e dados serão permanentemente excluídos. Antes de deletar sua conta, por favor, faça o download de qualquer dado ou informação que deseje manter.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Deletar conta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-100">
                {{ __('Você tem certeza que quer deletar sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-400">
                {{ __('Uma vez que sua conta for deletada, todos os seus recursos e dados serão permanentemente excluídos. Por favor, insira sua senha para confirmar que deseja deletar sua conta permanentemente.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Digite sua senha') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Deletar') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
