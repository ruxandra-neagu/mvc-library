@extends('layouts.main')

@section('title', 'Contact - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="fw-bold mb-4">📬 Contactează-ne</h2>

            {{-- INFORMATII CONTACT --}}
            <div class="row g-4 mb-5">
                <div class="col-md-4 text-center">
                    <i class="fas fa-envelope fa-2x text-primary mb-2"></i>
                    <p class="fw-semibold mb-0">Email</p>
                    <small class="text-muted">universulcartilor.contact@gmail.com</small>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-phone fa-2x text-success mb-2"></i>
                    <p class="fw-semibold mb-0">Telefon</p>
                    <small class="text-muted">0123-456-789</small>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                    <p class="fw-semibold mb-0">Program</p>
                    <small class="text-muted">Luni-Vineri: 9:00-18:00<br>Sâmbătă: 10:00-14:00</small>
                </div>
            </div>

            <hr class="mb-4">

            {{-- FORMULAR --}}
            <h5 class="fw-bold mb-3">Trimite-ne un mesaj</h5>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nume</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Numele tău" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="email@exemplu.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Subiect</label>
                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                           placeholder="Subiectul mesajului" value="{{ old('subject') }}">
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Mesaj</label>
                    <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                              placeholder="Scrie mesajul tău aici...">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark w-100">
                    <i class="fas fa-paper-plane me-2"></i>Trimite mesajul
                </button>
            </form>

        </div>
    </div>
</div>

@endsection