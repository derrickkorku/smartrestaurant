<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-muted">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <div class="card-body">
            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Confirm') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
