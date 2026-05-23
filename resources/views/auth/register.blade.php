@extends('layouts.main')

@section('title', 'Înregistrare - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">

                    <h3 class="fw-bold text-center mb-4">
                     </i>Înregistrare
                    </h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nume</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
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

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Confirmă parola</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                         </i>Creează cont
                        </button>

                        <hr class="my-4">

                        <div class="text-center">
                            <small class="text-muted">Ai deja cont?
                                <a href="{{ route('login') }}" class="text-dark fw-semibold">Autentifică-te</a>
                            </small>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection