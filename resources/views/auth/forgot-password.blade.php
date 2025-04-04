<x-dual-logos />

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('
                ¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex justify-between my-5">
            <x-link :href="route('register')">
                Crear cuenta
            </x-link>
            <x-link :href="route('login')">
                Iniciar sesión
            </x-link>
        </div>
        <x-primary-button class="w-full justify-center">
            {{ __('Enviar correo') }}
        </x-primary-button>
    </form>
</x-guest-layout>
