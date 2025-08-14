<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Informasi Paket</title>

        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="main-wrapper">
            {{-- Navbar Sederhana untuk Pengunjung --}}
            <nav class="navbar navbar-expand-lg navbar-dark navbar-pln border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <x-application-logo style="height: 36px;" />
                    </a>
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('admin.index') }}" class="nav-link">Dashboard Admin</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>

            <main class="container" style="padding-top: 80px; padding-bottom: 40px;">
                @yield('content')
            </main>
        </div>

        {{-- TAMBAHKAN ELEMEN POP-UP INI --}}
        <div id="imagePopupOverlay" class="image-popup-overlay">
            <img id="popupImage" src="" alt="Zoomed Image">
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        {{-- TAMBAHKAN SCRIPT POP-UP INI --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const popupOverlay = document.getElementById('imagePopupOverlay');
                const popupImage = document.getElementById('popupImage');
                
                document.body.addEventListener('click', function(e) {
                    if (e.target.classList.contains('image-popup-trigger')) {
                        e.preventDefault();
                        const imageUrl = e.target.getAttribute('data-image-url');
                        popupImage.setAttribute('src', imageUrl);
                        popupOverlay.style.display = 'flex';
                    }
                });

                popupOverlay.addEventListener('click', function () {
                    this.style.display = 'none';
                    popupImage.setAttribute('src', '');
                });
            });
        </script>
    </body>
</html>