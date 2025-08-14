<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Sistem Manajemen Paket')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6 col-lg-4">
                    <div class="text-center mb-4">
                        <a href="/">
                            <x-application-logo style="height: 60px; margin: auto;" />
                        </a>
                    </div>
                    <div class="card p-4">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>