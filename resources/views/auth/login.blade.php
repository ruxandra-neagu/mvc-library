@extends('layouts.main')

@section('title', 'Login - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">

                    <h3 class="fw-bold text-center mb-4">
                   Autentificare
                    </h3>

                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Parolă</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Ține-mă minte</label>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>Intră în cont
                        </button>

                        <hr class="my-4">

                        <div class="text-center">
                            <small class="text-muted">Nu ai cont?
                                <a href="{{ route('register') }}" class="text-dark fw-semibold">Înregistrează-te</a>
                            </small>
                        </div>

                        @if(Route::has('password.request'))
                        <div class="text-center mt-2">
                            <small>
                                <a href="{{ route('password.request') }}" class="text-muted">Ai uitat parola?</a>
                            </small>
                        </div>
                        @endif

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection