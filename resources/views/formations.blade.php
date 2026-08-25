@extends('layouts.public')

@section('content')
<!-- Hero Banner (Module D) -->
<section class="formations-hero">
    <div class="formations-hero-bg"></div>
    <div class="formations-hero-content" style="position:relative;z-index:2;">
        <p style="font-size:11px;letter-spacing:3px;color:var(--gold);font-weight:700;margin-bottom:10px;">LE CHEF DAN</p>
        <h1>Formations en<br>Cuisine & Pâtisserie</h1>
        <p class="sub">Le Chef DAN vous forme aux Arts Culinaires</p>
        <p style="font-size:13px;color:rgba(255,255,255,0.6);margin:10px 0 24px;">Cuisine Gastronomique • Pâtisserie • Techniques de Chef</p>
    </div>
</section>

<!-- Liste des formations dynamiques -->
<div style="background:var(--off-white);padding:60px;color:var(--black);">
    <div class="section-title" style="color:var(--black);">
        <p style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:8px;">Notre offre</p>
        <h2 style="color:var(--black);">Nos Programmes de Formation</h2>
        <div class="section-divider"></div>
    </div>

    <div class="programmes-grid">
        @foreach($formations as $formation)
        <div class="programme-card">
            <div class="prog-icon">🍳</div>
            <div class="prog-info">
                <h4>{{ $formation->title }}</h4>
                <p>{{ $formation->description }}</p>
                <div style="margin-top:12px; display:flex; gap:15px; flex-wrap:wrap; align-items:center;">
                    <span style="font-size:0.9rem; color:var(--gold); font-weight:700;">
                        {{ $formation->places_available }} places disponibles
                    </span>
                    <span style="font-size:0.9rem; color:#666;">
                        🗓️ {{ \Carbon\Carbon::parse($formation->start_date)->format('d/m/Y') }}
                    </span>
                    <span style="font-size:0.9rem; color:#666; font-weight:700;">
                        {{ number_format($formation->price, 2) }} €
                    </span>
                </div>
                
                <!-- Formulaire d'inscription rapide -->
                <form action="{{ route('formation.register') }}" method="POST" style="margin-top:15px; display:flex; flex-wrap:wrap; gap:10px;">
                    @csrf
                    <input type="hidden" name="formation_id" value="{{ $formation->id }}">
                    <input type="text" name="name" placeholder="Votre nom" required style="flex:1; min-width:120px; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    <input type="email" name="email" placeholder="Email" required style="flex:1; min-width:120px; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    <input type="tel" name="phone" placeholder="Téléphone" required style="flex:1; min-width:100px; padding:8px; border:1px solid #ddd; border-radius:4px;">
                    <button type="submit" class="btn-sm" style="background:var(--gold); color:var(--black); border:none;">S'inscrire</button>
                </form>
                
                <!-- Affichage des erreurs spécifiques à cette formation -->
                @error('formation')
                    <div style="color:#e74c3c; font-size:0.85rem; margin-top:8px;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection