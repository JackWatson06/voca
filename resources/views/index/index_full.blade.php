<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="w-100 h-100 p-0 m-0">

		@include('head/header')

    <body class="w-100 h-100 p-0 m-0">
			@yield('body')
    </body>
</html>
