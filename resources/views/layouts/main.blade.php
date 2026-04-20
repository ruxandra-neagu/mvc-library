<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Universul Cărților')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- CSS propriu -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fas fa-book-open me-2"></i>Universul Cărților
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Acasă</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books') }}">Cărți</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq') }}">Întrebări frecvente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    {{-- COS --}}
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="#">
                                <i class="fas fa-shopping-cart"></i> Coș
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-shopping-cart"></i> Coș
                            </a>
                        @endauth
                    </li>

                    {{-- AUTH --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Conectează-te
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTINUT --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1">&copy; 2024 Universul Cărților</p>
                    <p class="mb-1 small text-muted">Program: Luni-Vineri: 9:00-18:00, Sâmbătă: 10:00-14:00</p>
                    <p class="mb-0 small text-muted">universulcartilor.contact@gmail.com | 0123-456-789</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="https://www.instagram.com" target="_blank" class="text-white me-3">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="https://www.facebook.com" target="_blank" class="text-white">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>