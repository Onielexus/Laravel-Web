<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-extrabold tracking-tight bg-gradient-to-r from-emerald-600 via-teal-500 to-blue-600 bg-clip-text text-transparent">
                Welcome back
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                {{ __('Log in to pick up right where you left off.') }}
            </p>
        </div>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 flex items-center gap-2 rounded-md bg-green-50 border border-green-200 px-3 py-2 font-medium text-sm text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />

                <div class="relative mt-1">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16v16H4z" stroke="none" />
                            <path d="M22 6l-10 7L2 6" />
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                        </svg>
                    </span>
                    <x-input id="email" class="block w-full pl-9 transition duration-150 ease-in-out focus:shadow-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
            </div>

            <!-- Password Field with Show/Hide Eye Toggle -->
            <div class="mt-4" x-data="{ showPassword: false }">
                <x-label for="password" value="{{ __('Password') }}" />

                <div class="relative mt-1">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="10" rx="2" />
                            <path d="M7 11V7a5 5 0 0110 0v4" />
                        </svg>
                    </span>

                    <x-input
                        id="password"
                        class="block w-full pl-9 pr-10 transition duration-150 ease-in-out focus:shadow-md"
                        ::type="showPassword ? 'text' : 'password'"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 transition-colors duration-150 focus:outline-none"
                        tabindex="-1"
                    >
                        <!-- Eye Icon (Show) -->
                        <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <!-- Eye Slash Icon (Hide) -->
                        <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.02 10.02 0 012.122-.063c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me & Forgot Password Row -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center cursor-pointer group">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 group-hover:text-gray-800 transition-colors duration-150">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="no-underline text-sm text-gray-600 hover:text-emerald-600 transition-colors duration-150 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500" href="{{ route('password.request') }}">
                        {{ __('Forgot password') }}
                    </a>
                @endif
            </div>

            <!-- Bottom Row: Register & Log In -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('register'))
                    <a class="no-underline text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors duration-150 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 me-4" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @else
                    <div></div>
                @endif

                <x-button class="transition-transform duration-150 ease-in-out hover:-translate-y-0.5 hover:shadow-lg">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>