@extends('layouts.main')

@section('title', 'Confirmare parolă - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">

                    <h3 class="fw-bold text-center mb-3">
                        <i class="fas fa-shield-alt me-2"></i>Zonă securizată
                    </h3>

                    <p class="text-muted text-center mb-4">
                        Aceasta este o zonă securizată. Te rugăm să confirmi parola înainte de a continua.
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Parolă</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-check me-2"></i>Confirmă
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection