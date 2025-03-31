<x-dual-logos left-logo="img/gobierno.jpg" right-logo="img/udevipo.png" left-size="h-40" right-size="h-40" />

<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex justify-between my-5">
            <x-link :href="route('register')">
                Crear cuenta
            </x-link>
            <x-link :href="route('password.request')">
                Olvidastes tu Password
            </x-link>
        </div>
        <x-primary-button class="w-full justify-center">
            {{ __('Iniciar sesión') }} <!-- { __} significa que se puede traducir -->
        </x-primary-button>
    </form>
</x-guest-layout>
<!--
    Este es un formulario de inicio de sesión en Laravel Blade. Utiliza componentes personalizados para etiquetas, entradas y botones.
    Se incluyen validaciones para el correo electrónico y la contraseña, así como opciones para recordar al usuario y enlaces para crear una cuenta o restablecer la contraseña.
    El formulario envía una solicitud POST a la ruta de inicio de sesión definida en las rutas de Laravel.
