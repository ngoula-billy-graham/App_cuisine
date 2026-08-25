<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- MÊME IMPORT DE POLICES QUE LE SITE PUBLIC -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- C'EST CETTE LIGNE QUI CHARGE VOTRE CSS -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body style="background: var(--black); color: var(--white); font-family: 'Montserrat', sans-serif;">
        
        <!-- Votre Navbar Admin personnalisée -->
        @include('partials.nav-admin')

        <main>
            @yield('content')
        </main>

    </body>
</html>