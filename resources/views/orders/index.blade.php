@extends('layouts.main')

@section('title', 'Comenzile mele - Universul Cărților')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="fas fa-box me-2"></i>Comenzile mele</h2>

    @if($orders->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-box-open fa-4x text-muted mb-4"></i>
            <h4 class="text-muted">Nu ai nicio comandă încă</h4>
            <a href="{{ route('books') }}" class="btn btn-dark mt-3">
                <i class="fas fa-book me-2"></i>Vezi cărțile
            </a>
        </div>
    @else
        @foreach($orders as $order)
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <small class="text-muted">Comandă</small>
                        <p class="fw-bold mb-0">#{{ $order->id }}</p>
                    </div>
                    <div class="col-md-3">
                        <small class="text-muted">Data</small>
                        <p class="fw-semibold mb-0">{{ $order->created_at->format('d.m.Y') }}</p>
                    </div>
                    <div class="col-md-2">
                        <small class="text-muted">Total</small>
                        <p class="fw-bold text-danger mb-0">{{ number_format($order->total, 2) }} lei</p>
                    </div>
                    <div class="col-md-2">
                        <small class="text-muted">Plată</small>
                        <p class="fw-semibold mb-0">
                            @if($order->payment_method == 'card')
                                <i class="fas fa-credit-card me-1"></i>Card
                            @else
                                <i class="fas fa-money-bill-wave me-1"></i>Ramburs
                            @endif
                        </p>
                    </div>
                    <div class="col-md-2 text-md-end mt-3 mt-md-0">
                        @php
                            $statusColors = [
                                'pending'   => 'warning',
                                'confirmed' => 'info',
                                'shipped'   => 'primary',
                                'delivered' => 'success',
                                'cancelled' => 'danger',
                            ];
                            $statusLabels = [
                                'pending'   => 'În așteptare',
                                'confirmed' => 'Confirmat',
                                'shipped'   => 'Expediat',
                                'delivered' => 'Livrat',
                                'cancelled' => 'Anulat',
                            ];
                        @endphp
                        <span class="badge bg-{{ $statusColors[$order->status] }} text-dark">
                            {{ $statusLabels[$order->status] }}
                        </span>
                    </div>
                </div>

                {{-- Produsele din comanda --}}
                <hr class="my-3">

                    @php $minutesLeft = 15 - $order->created_at->diffInMinutes(now()); @endphp

                    @if($order->status === 'pending' && $minutesLeft > 0)
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <form method="POST" action="{{ route('orders.cancel', $order) }}"
                                onsubmit="return confirm('Ești sigur că vrei să anulezi comanda?')">
                                @csrf
                                @method('DELETE')
                               {{-- Modal Anulare --}}
                        <div class="modal fade" id="cancelModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-body text-center p-5">
                                        <i class="fas fa-exclamation-triangle fa-4x text-warning mb-4"></i>
                                        <h4 class="fw-bold mb-2">Anulezi comanda?</h4>
                                        <p class="text-muted mb-4">
                                            Această acțiune nu poate fi anulată.<br>
                                            Ești sigur că vrei să continui?
                                        </p>
                                        <div class="d-flex gap-3 justify-content-center">
                                            <button type="button" class="btn btn-outline-secondary px-4"
                                                    data-bs-dismiss="modal">
                                                <i class="fas fa-arrow-left me-2"></i>Nu, înapoi
                                            </button>
                                            <form id="cancelForm" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-4">
                                                    <i class="fas fa-times me-2"></i>Da, anulează
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function confirmCancel(orderId) {
                                document.getElementById('cancelForm').action = '/orders/' + orderId + '/cancel';
                                new bootstrap.Modal(document.getElementById('cancelModal')).show();
                            }
                        </script>
                            </form>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>Poți anula în următoarele
                                <strong>{{ $minutesLeft }}</strong> minute
                            </small>
                        </div>
                    @elseif($order->status === 'pending')
                        <small class="text-muted d-block mb-3">
                            <i class="fas fa-lock me-1"></i>Termenul de anulare a expirat
                        </small>
                    @endif

                <div class="row g-2">
                    @foreach($order->items as $item)
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('Images/' . $item->book->image) }}"
                                 style="width: 35px; height: 45px; object-fit: contain;">
                            <div>
                                <small class="fw-semibold d-block">{{ $item->book->title }}</small>
                                <small class="text-muted">x{{ $item->quantity }} · {{ number_format($item->price, 2) }} lei</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        @endforeach
    @endif
</div>

@endsection