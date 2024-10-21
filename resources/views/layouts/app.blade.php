<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false, sidebarCollapsed: false }" class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside :class="{'translate-x-0 ease-out': sidebarOpen, '-translate-x-full ease-in': !sidebarOpen, 'w-64': !sidebarCollapsed, 'w-20': sidebarCollapsed}" class="bg-gray-800 text-white fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform lg:translate-x-0 lg:relative lg:inset-0">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center" :class="{'justify-center': sidebarCollapsed}">
                    <img class="h-8 w-auto" src="/images/logo.png" alt="{{ config('app.name', 'Laravel') }}">
                    <span x-show="!sidebarCollapsed" class="ml-2 text-xl font-semibold">{{ config('app.name', 'Laravel') }}</span>
                </div>
                <button @click="sidebarCollapsed = !sidebarCollapsed" class="hidden lg:block p-1 rounded-md hover:bg-gray-700">
                    <i :class="sidebarCollapsed ? 'fa-chevron-right' : 'fa-chevron-left'" class="fas"></i>
                </button>
            </div>
            
            <nav class="mt-5 px-2">
                <a href="{{ url('/home') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 transition ease-in-out duration-150">
                    <i class="fas fa-tachometer-alt mr-4"></i>
                    <span x-show="!sidebarCollapsed">Dashboard</span>
                </a>
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="mt-1 group w-full flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white hover:bg-gray-700 transition ease-in-out duration-150">
                        <i class="fas fa-users mr-4"></i>
                        <span x-show="!sidebarCollapsed">Usuarios</span>
                        <i x-show="!sidebarCollapsed" :class="{'fa-chevron-down': !open, 'fa-chevron-up': open}" class="fas ml-auto"></i>
                    </button>
                    <div x-show="open" class="mt-2 space-y-1">
                        <a href="{{ url('/usuarios/listar') }}" class="group flex items-center pl-11 pr-2 py-2 text-sm leading-5 font-medium text-white rounded-md hover:bg-gray-700 transition ease-in-out duration-150">
                            Listar
                        </a>
                        <a href="{{ url('/usuarios/create') }}" class="group flex items-center pl-11 pr-2 py-2 text-sm leading-5 font-medium text-white rounded-md hover:bg-gray-700 transition ease-in-out duration-150">
                            Crear
                        </a>
                    </div>
                </div>
                <!-- Agrega más elementos del menú aquí -->
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top bar -->
            <header class="bg-white shadow-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <div class="flex items-center">
                            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none focus:text-gray-600 lg:hidden">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <div class="flex items-center">
                            <!-- Notificaciones -->
                            <div x-data="{ notificationsOpen: false }" class="relative mr-4">
                                <button @click="notificationsOpen = !notificationsOpen" class="text-gray-500 hover:text-gray-600">
                                    <i class="fas fa-bell"></i>
                                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">2</span>
                                </button>
                                <div x-show="notificationsOpen" @click.away="notificationsOpen = false" x-cloak class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg overflow-hidden z-10">
                                    <!-- Contenido de notificaciones -->
                                    <div class="py-2">
                                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                            <p class="text-gray-600 text-sm mx-2">
                                                <span class="font-bold">Jane Doe</span> comentó en tu post.
                                            </p>
                                        </a>
                                        <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-100 -mx-2">
                                            <p class="text-gray-600 text-sm mx-2">
                                                <span class="font-bold">John Doe</span> te envió un mensaje.
                                            </p>
                                        </a>
                                    </div>
                                    <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">Ver todas las notificaciones</a>
                                </div>
                            </div>
                            <!-- Usuario -->
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" class="flex items-center text-gray-500 hover:text-gray-600">
                                    <img class="h-8 w-8 rounded-full object-cover" src="/images/user.jpeg" alt="User avatar">
                                    <span class="ml-2 text-sm font-medium">{{ Auth::user()->name }}</span>
                                </button>
                                <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi cuenta</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Configuración</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Cerrar sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>