@extends('layouts.main')

@section('title', 'Comandă confirmată - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 text-center">

            <div class="card border-0 shadow-sm p-5">
                <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                <h2 class="fw-bold">Comanda a fost plasată!</h2>
                <p class="text-muted mb-4">
                    Îți mulțumim, <strong>{{ $order->full_name }}</strong>!
                    Comanda ta <strong>#{{ $order->id }}</strong> a fost înregistrată cu succes.
                </p>

                <div class="card bg-light border-0 p-4 text-start mb-4">
                    <div class="row g-2">
                        <div class="col-6">
                            <small class="text-muted">Adresă livrare</small>
                            <p class="fw-semibold mb-0">{{ $order->address }}, {{ $order->city }}</p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Metodă de plată</small>
                            <p class="fw-semibold mb-0">
                                @if($order->payment_method == 'card')
                                    <i class="fas fa-credit-card me-1"></i>Card
                                @else
                                    <i class="fas fa-money-bill-wave me-1"></i>Ramburs
                                @endif
                            </p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Total</small>
                            <p class="fw-semibold mb-0">{{ number_format($order->total, 2) }} lei</p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Status</small>
                            <p class="fw-semibold mb-0">
                                <span class="badge bg-warning text-dark">În așteptare</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('orders.index') }}" class="btn btn-dark">
                        <i class="fas fa-box me-2"></i>Comenzile mele
                    </a>
                    <a href="{{ route('books') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-book me-2"></i>Continuă cumpărăturile
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection