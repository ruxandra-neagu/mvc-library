@extends('layouts.main')

@section('title', 'Dashboard - Universul Cărților')

@section('content')

<div class="container py-5">
    <h2 class="fw-bold">Bun venit, {{ Auth::user()->name }}! 👋</h2>
    <p class="text-muted">Ești autentificat cu succes.</p>

    <div class="row g-4 mt-3">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4">
                <i class="fas fa-shopping-cart fa-2x text-primary mb-3"></i>
                <h5>Coșul meu</h5>
                <p class="text-muted small">Vezi produsele adăugate în coș</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Vezi coșul</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4">
                <i class="fas fa-box fa-2x text-success mb-3"></i>
                <h5>Comenzile mele</h5>
                <p class="text-muted small">Urmărește statusul comenzilor</p>
                <a href="#" class="btn btn-outline-success btn-sm">Vezi comenzile</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4">
                <i class="fas fa-user fa-2x text-warning mb-3"></i>
                <h5>Profilul meu</h5>
                <p class="text-muted small">Editează datele contului tău</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-warning btn-sm">Vezi profilul</a>
            </div>
        </div>
    </div>
</div>

@endsection