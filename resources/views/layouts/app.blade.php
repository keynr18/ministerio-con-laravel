<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        
        <!-- Styles -->
       <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased bg-light">
        <!--<x-jet-banner />-->
        @livewire('navigation-menu')

        <!-- Page Heading -->
       <!-- <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                 $header }}
            </div>
        </header>-->
        @include('botones')

        <!-- Page Content -->
        <main class="container my-3">
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts


        @stack('scripts')
    </body>
</html>
