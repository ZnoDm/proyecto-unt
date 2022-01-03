<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/recursos/favicon.ico') }}" type="image/x-icon">
        <title>Trámites</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--Iconos de Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        @livewireStyles
        <!-- Fin de Styles -->

        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- sweet alert 2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- Fin de Scripts -->

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- SideBar -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-6">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Trámites</h1>
                    <ul class="text-sm text-gray-600 mb-4">
                        <li class="leading-7 mb-1 border-l-4 {{request()->routeIs('tramite.practica.*') ? 'border-indigo-400' :'border-transparent'}} pl-2">
                            <a href="{{route('tramite.practica.index')}}">Practicas</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 {{request()->routeIs('tramite.tesis.*') ? 'border-indigo-400' :'border-transparent'}} pl-2">
                            <a href="{{route('tramite.tesis.index')}}">Tesis</a>
                        </li>
                    </ul>
                </aside>
                
                <div class="col-span-4 bg-white rounded-lg shadow-lg">
                    <main class="text-gray-600 p-4 m-5">
                        {{$slot}}
                    </main>
                </div>
            </div>
            <!-- Fin del SideBar -->
        </div>

        {{-- Footer --}}
        <footer style="background:#1B1811">
            <x-footer></x-footer>
        </footer>
        {{-- Fin de Footer --}}


        {{--Scripts--}}
        @stack('scripts')

        @livewireScripts
    </body>
</html>
