<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @yield('header')

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        	    <!-- Fonts -->
	    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            html, body {
                font-family: 'Nunito';

                width: 100%;
                height: 100%;

                font-size: 100%;
            }

            main
            {
                width: 100%;
                height: 100%;
            }
        </style>

    </head>
    <body>

        <main id="content">

        </main>

    </body>
</html>
