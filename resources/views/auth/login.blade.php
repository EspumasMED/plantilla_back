<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Qualy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .banner-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .banner-image {
            width: 60%;
            height: auto;
            max-width: 60%;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .dark .modal-content {
            background-color: #374151;
            color: #fff;
        }
        .dark .close {
            color: #fff;
        }
    </style>
</head>
<body class="antialiased font-sans">
    <div class="bg-gray-50 text-black/50 dark:bg-gray-800 dark:text-white/50 min-h-screen flex flex-col">
        <div class="flex-grow flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="w-full max-w-7xl px-4 sm:px-6 lg:px-8">
                <header class="border-b-2 border-gray-200 dark:border-neutral-700">
                    <nav class="flex flex-wrap items-center justify-between py-4">
                        <div class="flex-grow">
                            <button id="openModal" class="cursor-pointer py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-orange-500 text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-colors duration-300 disabled:opacity-50 disabled:pointer-events-none" style="background-color: #EB6B34">
                                Ingresar
                            </button>
                        </div>
                        <div class="flex flex-wrap items-center justify-center gap-4">
                            <button id="darkModeToggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                            </button>
                        </div>
                    </nav>
                </header>
                <!-- Hero -->
                <main class="relative overflow-hidden py-10 sm:py-16 lg:py-24">
                    <div class="relative z-10 text-center">
                        <div class="banner-container">
                            <img src="images/logoo.png" alt="Banner" class="banner-image rounded-lg mb-8">
                        </div>
                        <h2 class="font-bold text-gray-800 text-3xl sm:text-4xl md:text-5xl lg:text-6xl dark:text-neutral-200 mb-4">
                            Gestor de Documentos
                            <span class="block sm:inline bg-clip-text bg-gradient-to-tl from-blue-600 to-violet-600 text-transparent animate-pulse">Qualy</span>
                        </h2>
                    </div>
                    <div class="absolute top-0 start-1/2 -z-10 size-full bg-[url('https://preline.co/assets/svg/examples/polygon-bg-element.svg')] dark:bg-[url('https://preline.co/assets/svg/examples-dark/polygon-bg-element.svg')] bg-no-repeat bg-top bg-cover transform -translate-x-1/2"></div>
                </main>
                <!-- End Hero -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="text-2xl font-bold mb-4">Iniciar Sesión</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('E-Mail Address') }}</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white">
                    @error('email')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white">
                    @error('password')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" id="remember" name="remember" class="rounded border-gray-300 text-orange-600 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember Me') }}</label>
                </div>
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" style="background-color: #EB6B34">
                    {{ __('Login') }}
                </button>
                <div class="mt-4 text-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-orange-600 hover:text-orange-500 dark:text-orange-400 dark:hover:text-orange-300">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal functionality
        var modal = document.getElementById("loginModal");
        var btn = document.getElementById("openModal");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Dark mode toggle functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const html = document.documentElement;

        darkModeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('darkMode', html.classList.contains('dark'));
        });

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            html.classList.add('dark');
        }
    </script>
</body>
</html>