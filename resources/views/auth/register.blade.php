<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-extrabold tracking-tight bg-gradient-to-r from-emerald-600 via-teal-500 to-blue-600 bg-clip-text text-transparent">
                Create your account
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                {{ __("It only takes a minute to get started.") }}
            </p>
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />

                <div class="relative mt-1">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 21v-1a7 7 0 0114 0v1" />
                        </svg>
                    </span>
                    <x-input id="name" class="block w-full pl-9 transition duration-150 ease-in-out focus:shadow-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />

                <div class="relative mt-1">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 6l-10 7L2 6" />
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                        </svg>
                    </span>
                    <x-input id="email" class="block w-full pl-9 transition duration-150 ease-in-out focus:shadow-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />

                <div class="relative mt-1">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="10" rx="2" />
                            <path d="M7 11V7a5 5 0 0110 0v4" />
                        </svg>
                    </span>
                    <x-input id="password" class="block w-full pl-9 transition duration-150 ease-in-out focus:shadow-md" type="password" name="password" required autocomplete="new-password" />
                </div>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />

                <div class="relative mt-1">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="10" rx="2" />
                            <path d="M7 11V7a5 5 0 0110 0v4" />
                            <polyline points="9 15 11 17 15 13" />
                        </svg>
                    </span>
                    <x-input id="password_confirmation" class="block w-full pl-9 transition duration-150 ease-in-out focus:shadow-md" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-emerald-600 transition-colors duration-150 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-emerald-600 transition-colors duration-150 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-6">
                <a class="no-underline text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors duration-150 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered') }}
                </a>

                <x-button class="ms-4 transition-transform duration-150 ease-in-out hover:-translate-y-0.5 hover:shadow-lg">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>