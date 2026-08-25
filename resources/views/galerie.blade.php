@extends('layouts.public')

@section('content')
<section class="galerie-section">
    <div class="galerie-title">
        <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:8px;">Portfolio</p>
        <h2>Galerie</h2>
        <div class="section-divider"></div>
        <p>Découvrez quelques-unes de nos créations culinaires</p>
    </div>
    <div class="galerie-filters">
        <button class="galerie-filter-btn active">Tout</button>
        <button class="galerie-filter-btn">Plats</button>
        <button class="galerie-filter-btn">Pâtisseries</button>
        <button class="galerie-filter-btn">Événements</button>
        <button class="galerie-filter-btn">Ateliers</button>
    </div>
    <div class="galerie-grid">
        <div class="galerie-item g1">🥩</div>
        <div class="galerie-item g2">🍰</div>
        <div class="galerie-item g3">🍷</div>
        <div class="galerie-item g4">🥗</div>
        <div class="galerie-item g5">🧁</div>
        <div class="galerie-item g6">🍤</div>
        <div class="galerie-item g7">🍽️</div>
        <div class="galerie-item g8">🥐</div>
        <div class="galerie-item g9">🍫</div>
    </div>
    <div class="galerie-cta">
        <h3>Vous avez un projet culinaire ?</h3>
        <p>Faites confiance au Chef DAN pour le réaliser.</p>
        <button class="btn-primary" onclick="window.location.href='{{ route('contact') }}'">Demander un devis</button>
    </div>
</section>
@endsection