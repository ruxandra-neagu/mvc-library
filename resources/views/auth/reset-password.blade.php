@extends('layouts.main')

@section('title', 'Resetare parolă - Universul Cărților')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">

                    <h3 class="fw-bold text-center mb-4">
                        <i class="fas fa-key me-2"></i>Resetare parolă
                    </h3>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $request->email) }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Parolă nouă</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Confirmă parola nouă</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-key me-2"></i>Resetează parola
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection