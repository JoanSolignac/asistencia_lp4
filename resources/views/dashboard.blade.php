<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-white">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">{{ __("¡Has iniciado sesión!") }}</h4>
                        <p class="mb-0">{{ __("¡Bienvenido a tu dashboard!") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
