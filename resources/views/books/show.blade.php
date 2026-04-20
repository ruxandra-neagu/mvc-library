@extends('layouts.main')

@section('title', $book->title . ' - Universul Cărților')

@section('content')

<div class="container py-5">

    {{-- BREADCRUMB --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acasă</a></li>
            <li class="breadcrumb-item"><a href="{{ route('books') }}">Cărți</a></li>
            <li class="breadcrumb-item active">{{ $book->title }}</li>
        </ol>
    </nav>

    <div class="row g-5">

        {{-- IMAGINE --}}
        <div class="col-md-4 text-center">
            <img src="{{ asset('Images/' . $book->image) }}"
                 alt="{{ $book->title }}"
                 class="img-fluid rounded shadow"
                 style="max-height: 400px; object-fit: contain;">
        </div>

        {{-- DETALII --}}
        <div class="col-md-8">
            <h1 class="fw-bold">{{ $book->title }}</h1>
            <p class="text-muted fs-5">de <strong>{{ $book->author }}</strong></p>

            <hr>

            <table class="table table-borderless w-auto">
                <tr>
                    <td class="text-muted pe-4">Editura</td>
                    <td><strong>{{ $book->publisher }}</strong></td>
                </tr>
                <tr>
                    <td class="text-muted pe-4">Categorie</td>
                    <td>
                        <a href="{{ route('books', ['category' => $book->category]) }}" class="badge bg-secondary text-decoration-none">
                            {{ $book->category }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="text-muted pe-4">Stoc</td>
                    <td>
                        @if($book->stock > 0)
                            <span class="text-success fw-semibold"><i class="fas fa-check-circle me-1"></i>În stoc ({{ $book->stock }} disponibile)</span>
                        @else
                            <span class="text-danger fw-semibold"><i class="fas fa-times-circle me-1"></i>Stoc epuizat</span>
                        @endif
                    </td>
                </tr>
            </table>

            <hr>

            {{-- PRET + BUTON --}}
            <div class="d-flex align-items-center gap-4 mt-4">
                <span class="fs-2 fw-bold text-danger">{{ number_format($book->price, 2) }} lei</span>
                @auth
                    <button class="btn btn-dark btn-lg" {{ $book->stock == 0 ? 'disabled' : '' }}>
                        <i class="fas fa-cart-plus me-2"></i>Adaugă în coș
                    </button>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark btn-lg">
                        <i class="fas fa-cart-plus me-2"></i>Adaugă în coș
                    </a>
                @endauth
            </div>

            {{-- BENEFICII --}}
            <div class="mt-4 d-flex gap-4 text-muted">
                <small><i class="fas fa-truck me-1 text-primary"></i>Livrare 1-3 zile</small>
                <small><i class="fas fa-undo me-1 text-warning"></i>Retur 30 zile</small>
                <small><i class="fas fa-shield-alt me-1 text-success"></i>Plată securizată</small>
            </div>
        </div>

    </div>

    {{-- DESCRIERE --}}
    @if($book->description)
    <div class="mt-5">
        <h5 class="fw-bold">Descriere</h5>
        <hr>
        <p class="text-muted lh-lg text-justify" style="text-align: justify;">{{ $book->description }}</p>
    </div>
    @endif


    @if($similar->count() > 0)
    <div class="mt-5">
        <h4 class="fw-bold mb-4">Cărți similare</h4>
        <div class="row g-4">
            @foreach($similar as $sim)
            <div class="col-6 col-md-3">
                <a href="{{ route('books.show', $sim) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('Images/' . $sim->image) }}"
                             class="card-img-top p-3"
                             style="height: 180px; object-fit: contain;"
                             alt="{{ $sim->title }}">
                        <div class="card-body">
                            <h6 class="fw-bold">{{ $sim->title }}</h6>
                            <small class="text-muted">{{ $sim->author }}</small>
                            <p class="text-danger fw-bold mt-2">{{ number_format($sim->price, 2) }} lei</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>

@endsection