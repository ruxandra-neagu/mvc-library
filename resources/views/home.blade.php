@extends('layouts.app')

@section('title', 'Acasă - Universul Cărților')

@section('content')

{{-- HERO --}}
<section class="bg-dark text-white py-5">
    <div class="container text-center py-4">
        <h1 class="display-4 fw-bold">Descoperă lumea cărților</h1>
        <p class="lead mt-3">Cele mai bune cărți la prețuri accesibile, livrate rapid la ușa ta.</p>
        <a href="{{ route('books') }}" class="btn btn-warning btn-lg mt-3">
            <i class="fas fa-book me-2"></i>Vezi toate cărțile
        </a>
    </div>
</section>

{{-- CATEGORII --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Categorii populare</h2>
        <div class="row g-3 justify-content-center">
            @foreach([
                ['icon' => 'fas fa-heart', 'label' => 'Romanță', 'color' => 'danger'],
                ['icon' => 'fas fa-brain', 'label' => 'Dezvoltare personală', 'color' => 'primary'],
                ['icon' => 'fas fa-landmark', 'label' => 'Clasici', 'color' => 'secondary'],
                ['icon' => 'fas fa-chart-line', 'label' => 'Business', 'color' => 'success'],
                ['icon' => 'fas fa-child', 'label' => 'Parenting', 'color' => 'warning'],
            ] as $cat)
            <div class="col-6 col-md-2">
                <a href="{{ route('books', ['category' => $cat['label']]) }}" class="text-decoration-none text-dark">
                    <div class="card text-center border-0 shadow-sm h-100 p-3 category-card">
                        <i class="{{ $cat['icon'] }} fa-2x text-{{ $cat['color'] }} mb-2"></i>
                        <small class="fw-semibold">{{ $cat['label'] }}</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CELE MAI VANDUTE --}}
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Cele mai vândute</h2>
        <div class="row g-4">
            @foreach($featured as $book)
            <div class="col-6 col-md-3">
                <a href="{{ route('books.show', $book) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('Images/' . $book->image) }}"
                             class="card-img-top p-3"
                             style="height:200px; object-fit:contain;"
                             alt="{{ $book->title }}">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title fw-bold">{{ $book->title }}</h6>
                            <small class="text-muted">{{ $book->author }}</small>
                            <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-danger">{{ number_format($book->price, 2) }} lei</span>
                                <button class="btn btn-sm btn-dark" onclick="event.preventDefault()">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('books') }}" class="btn btn-outline-dark">Vezi toate cărțile →</a>
        </div>
    </div>
</section>

{{-- DE CE NOI --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">De ce să alegi Universul Cărților?</h2>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <i class="fas fa-truck fa-2x text-primary mb-3"></i>
                <h5>Livrare rapidă</h5>
                <p class="text-muted">Comenzile sunt livrate în 1-3 zile lucrătoare.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-shield-alt fa-2x text-success mb-3"></i>
                <h5>Plată securizată</h5>
                <p class="text-muted">Tranzacții 100% sigure și protejate.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-undo fa-2x text-warning mb-3"></i>
                <h5>Retur gratuit</h5>
                <p class="text-muted">30 de zile pentru retur fără costuri suplimentare.</p>
            </div>
        </div>
    </div>
</section>

@endsection