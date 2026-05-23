@extends('layouts.main')

@section('title', 'Verificare email - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">

                    <i class="fas fa-envelope-open-text fa-3x text-primary mb-4"></i>

                    <h3 class="fw-bold mb-3">Verifică emailul</h3>

                    <p class="text-muted mb-4">
                        Îți mulțumim că te-ai înregistrat! Te rugăm să verifici adresa de email
                        accesând linkul pe care ți l-am trimis. Dacă nu l-ai primit, îți putem
                        trimite unul nou.
                    </p>

                    @if(session('status') == 'verification-link-sent')
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            Un nou link de verificare a fost trimis la adresa ta de email.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-dark w-100 mb-3">
                            <i class="fas fa-paper-plane me-2"></i>Retrimite emailul de verificare
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection