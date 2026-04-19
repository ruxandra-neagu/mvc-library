<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Universul Cărților')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Acasă</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cărți</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Evenimente</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Coș <span class="badge bg-danger">0</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTINUT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; {{ date('Y') }} Universul Cărților</p>
            <p class="mb-1">Program: Luni - Vineri: 9:00 - 18:00 | Sâmbătă: 10:00 - 14:00</p>
            <p class="mb-0">universulcartilor.contact@gmail.com | 0123-456-789</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>