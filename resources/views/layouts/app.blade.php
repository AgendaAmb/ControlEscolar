<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <academic-program-header>
            <a href="https://ambiental.uaslp.mx">
                @section('headerPicture')
                <img class="img-fluid mt-4" src="{{ asset('storage/headers/logod.png') }}">
                @show
            </a>
        </academic-program-header>
        <main id="fondoRayas" @section('container-class') class="container-fluid" @show> 
            @yield('main') 
        </main>
    </div>
    @stack('vuejs')
</body>
</html>
