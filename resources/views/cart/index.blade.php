@extends('layouts.main')

@section('title', 'Coșul meu - Universul Cărților')

@section('content')

<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="fas fa-shopping-cart me-2"></i>Coșul meu</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
            <h4 class="text-muted">Coșul tău este gol</h4>
            <a href="{{ route('books') }}" class="btn btn-dark mt-3">
                <i class="fas fa-book me-2"></i>Vezi cărțile
            </a>
        </div>
    @else
        <div class="row g-4">
            <div class="col-lg-8">
                @foreach($cartItems as $item)
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center">
                                @if($item->book->image)
                                    <img src="{{ asset('Images/' . $item->book->image) }}"
                                         alt="{{ $item->book->title }}"
                                         class="img-fluid rounded" style="max-height: 80px;">
                                @endif
                            </div>
                            <div class="col-md-4">
                                <h6 class="fw-bold mb-1">{{ $item->book->title }}</h6>
                                <small class="text-muted">{{ $item->book->author }}</small>
                            </div>
                            <div class="col-md-3">
                                <form method="POST" action="{{ route('cart.update', $item) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex align-items-center gap-2">
                                        <form method="POST" action="{{ route('cart.update', $item) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ max(1, $item->quantity - 1) }}">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                        </form>

                                        <span class="fw-bold px-2">{{ $item->quantity }}</span>

                                        <form method="POST" action="{{ route('cart.update', $item) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 text-center fw-bold">
                                {{ number_format($item->book->price * $item->quantity, 2) }} RON
                            </div>
                            <div class="col-md-1 text-center">
                                <form method="POST" action="{{ route('cart.remove', $item) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Sumar comandă</h5>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Produse ({{ $cartItems->count() }})</span>
                            <span>{{ number_format($total, 2) }} RON</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Livrare</span>
                            <span class="text-success">Gratuită</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                            <span>Total</span>
                            <span>{{ number_format($total, 2) }} RON</span>
                        </div>

                      <a href="{{ route('orders.checkout') }}" class="btn btn-dark w-100 mb-2">
                            <i class="fas fa-credit-card me-2"></i>Finalizează comanda
                        </a>
                        <a href="{{ route('books') }}" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Continuă cumpărăturile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection