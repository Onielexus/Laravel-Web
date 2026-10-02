<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 flex flex-col items-center text-center">
            <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-emerald-400 to-blue-500 shadow-md shadow-emerald-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="10" rx="2" />
                    <path d="M7 11V7a5 5 0 0110 0v4" />
                </svg>
            </div>

            <h1 class="text-2xl font-extrabold tracking-tight bg-gradient-to-r from-emerald-600 via-teal-500 to-blue-600 bg-clip-text text-transparent">
                Forgot your password?
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>

        @session('status')
            <div class="mb-4 flex items-center gap-2 rounded-md bg-green-50 border border-green-200 px-3 py-2 font-medium text-sm text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />

                <div class="relative mt-1">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 6l-10 7L2 6" />
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                        </svg>
                    </span>
                    <x-input id="email" class="block w-full pl-9 transition duration-150 ease-in-out focus:shadow-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-button class="transition-transform duration-150 ease-in-out hover:-translate-y-0.5 hover:shadow-lg">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>