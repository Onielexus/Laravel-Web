<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        :root {
            font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;
        }

        body {
            position: relative;
            overflow-x: hidden;
            background: linear-gradient(135deg, #ecfdf5 0%, #f0fdfa 40%, #eff6ff 100%);
        }

        /* Floating gradient blobs */
        .blob {
            position: fixed;
            border-radius: 9999px;
            filter: blur(70px);
            opacity: 0.45;
            z-index: 0;
            pointer-events: none;
        }

        .blob-1 {
            width: 420px;
            height: 420px;
            top: -120px;
            left: -120px;
            background: radial-gradient(circle at 30% 30%, #34d399, transparent 70%);
            animation: float-1 14s ease-in-out infinite;
        }

        .blob-2 {
            width: 480px;
            height: 480px;
            bottom: -160px;
            right: -160px;
            background: radial-gradient(circle at 70% 70%, #60a5fa, transparent 70%);
            animation: float-2 16s ease-in-out infinite;
        }

        .blob-3 {
            width: 300px;
            height: 300px;
            top: 40%;
            right: 10%;
            background: radial-gradient(circle, #a78bfa, transparent 70%);
            opacity: 0.3;
            animation: float-3 18s ease-in-out infinite;
        }

        @keyframes float-1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(40px, 60px) scale(1.1); }
        }

        @keyframes float-2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-50px, -40px) scale(1.08); }
        }

        @keyframes float-3 {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-30px, 30px); }
        }

        /* Entrance animations */
        @keyframes fade-up {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up {
            opacity: 0;
            animation: fade-up 0.8s ease-out forwards;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.3s; }
        .delay-3 { animation-delay: 0.5s; }
        .delay-4 { animation-delay: 0.7s; }

        /* Logo bounce */
        @keyframes bounce-in {
            0% { opacity: 0; transform: scale(0.5) rotate(-20deg); }
            60% { opacity: 1; transform: scale(1.1) rotate(8deg); }
            100% { opacity: 1; transform: scale(1) rotate(0deg); }
        }

        .bounce-in {
            animation: bounce-in 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        /* Button shine sweep */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }

        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.5), transparent);
            transform: skewX(-20deg);
            transition: left 0.6s ease;
        }

        .btn-shine:hover::before {
            left: 125%;
        }

        /* Chip pulse */
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.85); }
        }

        .pulse-dot {
            animation: pulse-dot 2s ease-in-out infinite;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
    </style>
</head>

<body class="text-gray-800 antialiased min-h-screen flex flex-col justify-between items-center p-6">

    <!-- Decorative floating blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <!-- Top status chip -->
    <div class="relative z-10 mt-2 fade-up">
        <span class="inline-flex items-center gap-2 rounded-full card-glass px-4 py-1.5 text-sm font-medium text-emerald-700 shadow-sm">
            <span class="h-2 w-2 rounded-full bg-emerald-500 pulse-dot"></span>
            Temporal Laravel Project is running
        </span>
    </div>

    <!-- Main Content Center Container -->
    <main class="relative z-10 flex flex-col items-center justify-center text-center my-auto max-w-2xl">

        <!-- Logo / Icon -->
        <div class="bounce-in mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-400 to-blue-500 shadow-lg shadow-emerald-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </svg>
        </div>

        <h1 class="fade-up delay-1 text-5xl md:text-6xl font-extrabold tracking-tight bg-gradient-to-r from-emerald-600 via-teal-500 to-blue-600 bg-clip-text text-transparent">
            Welcome!
        </h1>

        <p class="fade-up delay-3 mt-3 max-w-md text-sm md:text-base text-gray-500">
            Functional counter that have increment and decrement, And employee management system that gather all employee details. 
        </p>

        <!-- CTA Button -->
        <div class="fade-up delay-4 mt-10">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="btn-shine group inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg shadow-emerald-200 transition-all duration-200 ease-in-out hover:-translate-y-0.5 hover:shadow-xl">
                Go to Dashboard
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
            @else
            <a href="{{ route('login') }}" class="btn-shine group inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg shadow-emerald-200 transition-all duration-200 ease-in-out hover:-translate-y-0.5 hover:shadow-xl">
                Get Started!
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
            @endauth
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 mb-2 fade-up delay-4 text-xs text-gray-400">
        Project by Temporal
    </footer>

</body>

</html>