@extends('layouts.public')

@section('content')
<!-- Hero -- >
<section class="hero">
    <!-- Images du carrousel -->
    <img src="{{ asset('images/hero1.jpg') }}" class="hero-image active" alt="Plat gastronomique">
    <img src="{{ asset('images/hero2.jpg') }}" class="hero-image" alt="Plat gastronomique 2">
    <img src="{{ asset('images/hero3.jpg') }}" class="hero-image" alt="Plat gastronomique 3">
    
    <!-- NOUVEAU : Overlay Spotlight -->
    <div class="hero-overlay"></div>

    <!-- Contenu -->
    <div class="hero-content">
        <h1>L'ART CULINAIRE</h1>
        <span class="subtitle-italic">au service de votre table</span>
        <p>Cuisine Européenne &amp; Africaine<br>Prestations • Formations • Produits d'Exception</p>
        
        <div class="hero-buttons">
            <button class="btn-primary" onclick="window.location.href='{{ route('prestations') }}'">Découvrir nos Prestations</button>
            <button class="btn-outline" onclick="window.location.href='{{ route('chef') }}'">Qui est le Chef Dan ?</button>
        </div>

        <div class="hero-badges">
            <div class="badge-item">
                <div class="badge-icon">🏆</div>
                <div class="badge-label">Expertise</div>
                <div class="badge-sublabel">Plus de 15 ans</div>
            </div>
            <div class="badge-item">
                <div class="badge-icon">❤️</div>
                <div class="badge-label">Passion</div>
                <div class="badge-sublabel">L'amour du goût</div>
            </div>
            <div class="badge-item">
                <div class="badge-icon">⭐</div>
                <div class="badge-label">Qualité</div>
                <div class="badge-sublabel">Produits frais</div>
            </div>
            <div class="badge-item">
                <div class="badge-icon">✨</div>
                <div class="badge-label">Créativité</div>
                <div class="badge-sublabel">Plats uniques</div>
            </div>
        </div>
    </div>
</section>

<!-- Prestations Section -->
<section class="section">
    <div class="section-title" style="color:var(--black);">
        <h2 style="color:var(--black);">Nos Prestations</h2>
        <div class="section-divider"></div>
        <p>Le Chef DAN met son expertise à votre disposition pour sublimer tous vos moments.</p>
    </div>
    
    <div class="prestation-grid">
        <div class="prestation-card">
            <div class="prestation-img card-img-1">🥩</div>
            <div class="prestation-body">
                <span class="prestation-tag">Service 01</span>
                <h3>Prospection des Menus</h3>
                <p>Menus gastronomiques sur mesure pour vos événements : mariages, réceptions, dîners privés. Cuisine européenne raffinée et spécialités africaines authentiques.</p>
                <button class="btn-sm" onclick="window.location.href='{{ route('prestations') }}'">En savoir plus</button>
            </div>
        </div>
        
        <div class="prestation-card">
            <div class="prestation-img card-img-2">📋</div>
            <div class="prestation-body">
                <span class="prestation-tag">Service 02</span>
                <h3>Présentation & Propositions</h3>
                <p>Étude de vos besoins et conception d'une offre personnalisée. Prestation à domicile ou sur site. Devis détaillé et transparent.</p>
                <button class="btn-sm" onclick="window.location.href='{{ route('prestations') }}'">En savoir plus</button>
            </div>
        </div>
        
        <div class="prestation-card">
            <div class="prestation-img card-img-3">🧁</div>
            <div class="prestation-body">
                <span class="prestation-tag">Service 03</span>
                <h3>Commercialisation de Produits</h3>
                <p>Pâtisseries artisanales, gâteaux de fête, chocolats, confiseries et spécialités. Commandes sur mesure et livraison disponible.</p>
                <button class="btn-sm" onclick="window.location.href='{{ route('prestations') }}'">En savoir plus</button>
            </div>
        </div>
    </div>

    <div style="text-align:center;margin-top:30px;">
        <p style="font-size:13px;color:#888;margin-bottom:12px;">Besoin d'une prestation sur mesure ?<br>Contactez-nous pour une étude personnalisée de votre projet.</p>
        <button class="btn-primary" onclick="window.location.href='{{ route('contact') }}'" style="font-size:11px;">Demander un devis</button>
    </div>
</section>

<!-- Nouvelle Quote Section - Parfaitement centrée -->
<section class="quote-section-visual">
    <!-- Guillemet décoratif gauche -->
    <div class="quote-start"></div>
    
    <!-- Citation centrée -->
    <p class="quote-text">
        « Chaque plat raconte une histoire ; chaque saveur éveille une émotion,<br>chaque repas crée un souvenir inoubliable. »
    </p>
    <span class="quote-author">— Chef DAN —</span>
</section>

@endsection
<style>
    /* --- Quote Section - Positionnement Centré Parfait --- */
    .quote-section-visual {
        position: relative;
        width: 100%;
        min-height: 650px; /* Ajustez selon la hauteur de votre image */
        background-image: url('{{ asset('images/quote-bg.jpg') }}') !important;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        
        /* ✅ Centrage vertical et horizontal strict */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        border-top: 1px solid rgba(255,255,255,0.05);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    /* Overlay pour la lisibilité du texte sans cacher le plat */
    .quote-section-visual::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at center, rgba(0,0,0,0.0) 0%, rgba(0,0,0,0.5) 70%);
        z-index: 1;
    }

    /* --- Guillemets Dorés Immenses (Symétriques) --- */
    .quote-section-visual::after {
        content: '"';
        position: absolute;
        font-family: 'Playfair Display', serif;
        font-size: 250px; /* Immense */
        color: var(--gold);
        opacity: 0.15; /* Très subtil et transparent */
        top: 50%;
        right: 5%;
        transform: translateY(-50%);
        z-index: 1;
        line-height: 1;
        pointer-events: none;
    }
    .quote-start {
        content: '"';
        position: absolute;
        font-family: 'Playfair Display', serif;
        font-size: 250px;
        color: var(--gold);
        opacity: 0.15;
        top: 50%;
        left: 5%;
        transform: translateY(-50%);
        z-index: 1;
        line-height: 1;
        pointer-events: none;
    }

    /* --- Texte de la citation (Centré) --- */
    .quote-section-visual > * {
        position: relative;
        z-index: 2;
    }

    .quote-text {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        color: var(--white); /* Blanc pur */
        max-width: 800px;
        margin: 0 auto 15px;
        line-height: 1.5;
        text-align: center; /* Centré comme sur la maquette */
        text-shadow: 0 8px 30px rgba(0,0,0,0.8); /* Ombre puissante pour la lisibilité */
    }

    .quote-author {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        color: var(--gold); /* Doré comme sur la maquette */
        font-size: 1.4rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.8);
        letter-spacing: 2px;
        text-align: center;
    }

    /* --- Responsive Mobile (Pour que les guillemets ne cachent pas le texte) --- */
    @media (max-width: 768px) {
        .quote-section-visual {
            min-height: 450px;
            background-position: center 20%;
        }
        .quote-section-visual::after, .quote-start {
            font-size: 120px; /* Guillemets plus petits sur mobile */
            opacity: 0.1;
        }
        .quote-text { font-size: 1.5rem; max-width: 85%; }
        .quote-author { font-size: 1.1rem; }
    }
    @media (max-width: 480px) {
        .quote-section-visual { min-height: 350px; }
        .quote-section-visual::after, .quote-start { font-size: 80px; }
        .quote-text { font-size: 1.2rem; }
        .quote-start { left: 2%; }
        .quote-section-visual::after { right: 2%; }
    }
</style>