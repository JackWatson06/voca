<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

		@include('header')

    <body class="antialiased">
			@yield('body')
    </body>
</html>
