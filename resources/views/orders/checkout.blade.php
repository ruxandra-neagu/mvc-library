@extends('layouts.main')

@section('title', 'Finalizează comanda - Universul Cărților')

@section('content')

<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="fas fa-credit-card me-2"></i>Finalizează comanda</h2>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div class="row g-4">

            {{-- STANGA - Formular --}}
            <div class="col-lg-8">

                {{-- Adresa de livrare --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Adresa de livrare
                        </h5>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nume complet</label>
                                <input type="text" name="full_name"
                                       class="form-control @error('full_name') is-invalid @enderror"
                                       value="{{ old('full_name', Auth::user()->name) }}" required>
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Telefon</label>
                                <input type="text" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Adresă</label>
                                <input type="text" name="address"
                                       class="form-control @error('address') is-invalid @enderror"
                                       placeholder="Strada, număr, bloc, apartament..."
                                       value="{{ old('address') }}" required>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Oraș</label>
                                <input type="text" name="city"
                                       class="form-control @error('city') is-invalid @enderror"
                                       value="{{ old('city') }}" required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Județ</label>
                                <input type="text" name="county"
                                       class="form-control @error('county') is-invalid @enderror"
                                       value="{{ old('county') }}" required>
                                @error('county')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Cod poștal</label>
                                <input type="text" name="postal_code"
                                       class="form-control @error('postal_code') is-invalid @enderror"
                                       value="{{ old('postal_code') }}" required>
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Metoda de plata --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-wallet me-2 text-success"></i>Metoda de plată
                        </h5>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="radio" class="btn-check" name="payment_method"
                                       id="card" value="card" required
                                       {{ old('payment_method') == 'card' ? 'checked' : '' }}>
                                <label class="btn btn-outline-dark w-100 py-3" for="card">
                                    <i class="fas fa-credit-card fa-lg mb-2 d-block"></i>
                                    <span class="fw-semibold">Plată cu cardul</span>
                                    <small class="d-block text-muted mt-1">Visa, Mastercard</small>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" class="btn-check" name="payment_method"
                                       id="ramburs" value="ramburs"
                                       {{ old('payment_method') == 'ramburs' ? 'checked' : '' }}>
                                <label class="btn btn-outline-dark w-100 py-3" for="ramburs">
                                    <i class="fas fa-money-bill-wave fa-lg mb-2 d-block"></i>
                                    <span class="fw-semibold">Ramburs la livrare</span>
                                    <small class="d-block text-muted mt-1">Plătești la primire</small>
                                </label>
                            </div>
                        </div>
                        @error('payment_method')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Detalii card --}}
                <div id="card-details" class="mt-3" style="display:none;">
                    <div class="card border-0 bg-light p-4">
                        <h6 class="fw-bold mb-3"><i class="fas fa-lock me-2 text-success"></i>Detalii card</h6>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Număr card</label>
                                <input type="text" name="card_number" id="card_number"
                                    class="form-control" placeholder="1234 5678 9012 3456"
                                    maxlength="19">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Data expirare</label>
                                <input type="text" name="card_expiry" id="card_expiry"
                                    class="form-control" placeholder="MM/YY" maxlength="5">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">CVV</label>
                                <input type="text" name="card_cvv" id="card_cvv"
                                    class="form-control" placeholder="123" maxlength="3">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nume pe card</label>
                                <input type="text" name="card_name" id="card_name"
                                    class="form-control" placeholder="NUME PRENUME">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- DREAPTA - Sumar --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Sumar comandă</h5>

                        @foreach($cartItems as $item)
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('Images/' . $item->book->image) }}"
                                 style="width: 45px; height: 60px; object-fit: contain;"
                                 class="me-3" alt="{{ $item->book->title }}">
                            <div class="flex-grow-1">
                                <div class="fw-semibold small">{{ $item->book->title }}</div>
                                <small class="text-muted">x{{ $item->quantity }}</small>
                            </div>
                            <span class="fw-bold small">{{ number_format($item->book->price * $item->quantity, 2) }} lei</span>
                        </div>
                        @endforeach

                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Livrare</span>
                            <span class="text-success fw-semibold">Gratuită</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                            <span>Total</span>
                            <span>{{ number_format($total, 2) }} lei</span>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-check-circle me-2"></i>Plasează comanda
                        </button>
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                            <i class="fas fa-arrow-left me-2"></i>Înapoi la coș
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<script>
    // Afișare detalii card
    document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            document.getElementById('card-details').style.display =
                this.value === 'card' ? 'block' : 'none';

            // Câmpuri required doar dacă e card
            ['card_number','card_expiry','card_cvv','card_name'].forEach(function(id) {
                document.getElementById(id).required = (radio.value === 'card');
            });
        });
    });

    // Format număr card
    document.getElementById('card_number').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g,'').replace(/(.{4})/g,'$1 ').trim();
    });

    // Format expiry
    document.getElementById('card_expiry').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g,'').replace(/(\d{2})(\d)/,'$1/$2');
    });
</script>

@endsection