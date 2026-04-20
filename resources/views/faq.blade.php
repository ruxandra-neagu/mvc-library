@extends('layouts.main')

@section('title', 'Întrebări Frecvente - Universul Cărților')

@section('content')

<div class="container py-5">
    <h2 class="fw-bold mb-4">❓ Întrebări Frecvente</h2>

    <div class="accordion" id="faqAccordion">

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Cum pot deveni membru?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Puteți deveni membru completând formularul de pe pagina de abonamente.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Care sunt beneficiile unui membru?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Membrii beneficiază de reduceri la cărți și acces prioritar la evenimente.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Cum pot contacta serviciul de suport?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Puteți contacta serviciul de suport prin email la
                    <strong>universulcartilor.contact@gmail.com</strong>
                    sau telefon la <strong>0123-456-789</strong>.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Ce metode de plată sunt acceptate?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Acceptăm plăți prin card de credit, PayPal și plata la livrare.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                    Cum pot returna o comandă?
                </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Retururile se pot realiza în librăria fizică sau prin poștă în termen de 30 de zile.
                </div>
            </div>
        </div>

    </div>
</div>

@endsection