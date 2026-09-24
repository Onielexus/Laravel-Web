<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white text-gray-800 antialiased min-h-screen flex flex-col justify-between items-center p-6">


    <!-- Main Content Center Container -->
    <main class="flex flex-col items-center justify-center text-center my-auto">
        <h1 class="text-5xl md:text-6xl font-light tracking-tight text-gray-700 flex items-center justify-center gap-3">
            <span class="inline-block transform -rotate-12"></span> Welcome!
        </h1>

        <p class="mt-4 text-lg md:text-xl font-semibold text-gray-600">
            Temporal Laravel Project
        </p>

        <!-- Button moved directly under the text with a top margin -->
        <div class="mt-8">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="bg-[#10b981] hover:bg-[#059669] text-white font-semibold py-3 px-8 rounded-md transition duration-150 ease-in-out inline-block">
                Go to Dashboard
            </a>
            @else
            <a href="{{ route('login') }}" class="bg-[#10b981] hover:bg-[#059669] text-white font-semibold py-3 px-8 rounded-md transition duration-150 ease-in-out inline-block">
                Get Started!
            </a>
            @endauth
            @endif
        </div>
    </main>

</body>

</html>