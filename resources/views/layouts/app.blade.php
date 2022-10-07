<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100vh">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/DataTables/datatables.min.css')}}">
        <style>
            body{
                font-family: 'nunito', sans-serif;
                background-color: #edf6f9;
            }
            .active{
                border-bottom: 2px solid #000000;
            }
            .custom_navbar{
                background-color: #57cc99;
            }
        </style>
        @stack('styles')
    </head>
    <body class="container-fluid px-0" style="height: 100vh">
       
            @include('layouts.navigation')

         
            @yield('content')
        </div>
        <script src="{{asset('assets/Jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/popper.js')}}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{asset('assets/DataTables/datatables.min.js')}}"> </script>
        @stack('scripts')
    </body>
</html>
