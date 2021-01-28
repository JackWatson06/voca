<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

		@include('head/header')

    <body class="antialiased">
			@yield('body')
    </body>
</html>
