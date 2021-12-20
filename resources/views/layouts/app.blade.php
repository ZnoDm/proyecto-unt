<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/recursos/favicon.ico') }}" type="image/x-icon">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--Iconos de Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Iconos Font awesome-->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Style CDN Glider-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @livewireStyles
        <!-- Fin de Styles -->
        
        <!-- Scripts-->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- JS CDN Glider-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        
        <!-- Fin de Scripts-->
    </head>
    <body class="font-sans antialiased" >
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Contenido -->
            <main>
                {{ $slot }}
            </main>
            <!-- Fin Contenido -->
        </div>

        {{-- Footer --}}
        <footer style="background:#1B1811">
            <x-footer></x-footer>
        </footer>
        {{-- Fin de Footer --}}

        @livewireScripts
        @stack('scripts')
       
    </body>

</html>
