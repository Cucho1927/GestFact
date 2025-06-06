<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Login') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/styles.css'])

    </head>
    <body>
        <div class="container">
            <section class="container-left">
                <img class="fondo-login" src="img/R.jpg" alt="login-img">
                
            </section>
            <section class="container-right">
                <img id="logo-login" src="img/logos.png">
                    {{ $slot }}
            </section>
        </div>
</html>
