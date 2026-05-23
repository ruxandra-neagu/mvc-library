@extends('layouts.main')

@section('title', 'Parolă uitată - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">

                    <h3 class="fw-bold text-center mb-3">
                        <i class="fas fa-lock me-2"></i>Parolă uitată
                    </h3>

                    <p class="text-muted text-center mb-4">
                        Introdu adresa de email și îți vom trimite un link pentru resetarea parolei.
                    </p>

                    @if(session('status'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-paper-plane me-2"></i>Trimite link de resetare
                        </button>

                        <hr class="my-4">

                        <div class="text-center">
                            <small class="text-muted">
                                <a href="{{ route('login') }}" class="text-dark fw-semibold">
                                    <i class="fas fa-arrow-left me-1"></i>Înapoi la login
                                </a>
                            </small>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection