@extends('layouts.main')

@section('title', 'Cărți - Universul Cărților')

@section('content')

<div class="container py-5">

    <h2 class="mb-4 fw-bold">📚 Toate cărțile</h2>

    {{-- SEARCH + FILTRE --}}
    <form method="GET" action="{{ route('books') }}" class="row g-2 mb-4">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Caută după titlu sau autor..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="category" class="form-select">
                <option value="">Toate categoriile</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-dark w-100">Filtrează</button>
        </div>
    </form>

    {{-- LISTA CARTI --}}
    <div class="row g-4">
        @forelse($books as $book)
        <div class="col-6 col-md-3">
           <a href="{{ route('books.show', $book) }}" class="text-decoration-none text-dark">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('Images/' . $book->image) }}"
                     class="card-img-top p-3"
                     style="height: 200px; object-fit: contain;"
                     alt="{{ $book->title }}">
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title fw-bold">{{ $book->title }}</h6>
                    <small class="text-muted">{{ $book->author }}</small>
                    <small class="text-muted">{{ $book->publisher }}</small>
                    <span class="badge bg-secondary mt-1 mb-2" style="width:fit-content">{{ $book->category }}</span>
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-danger fs-6">{{ number_format($book->price, 2) }} lei</span>
                        @auth
                            <button class="btn btn-sm btn-dark">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-dark">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        @endauth
                    </div>
                </div>
            </a>
        </div>
        </div>
        @empty
            <div class="col-12 text-center text-muted py-5">
                <i class="fas fa-search fa-3x mb-3"></i>
                <p>Nicio carte găsită.</p>
            </div>
        @endforelse
    </div>


{{-- PAGINARE --}}
<div class="mt-4 d-flex flex-column align-items-center gap-2">
    <small class="text-muted">
        Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->total() }} results
    </small>
    <nav>
        {{ $books->withQueryString()->onEachSide(1)->links('pagination::bootstrap-5') }}
    </nav>
</div>

</div>

@endsection