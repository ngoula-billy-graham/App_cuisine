@extends('layouts.public')

@section('content')
<section style="background:var(--dark);padding:60px;text-align:center;">
    <p style="font-size:11px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:10px;">Notre expertise</p>
    <h1 style="font-family:'Playfair Display',serif;font-size:42px;font-weight:600;color:var(--white);margin-bottom:12px;">Nos Prestations</h1>
    <div class="section-divider"></div>
    <p style="font-size:13px;color:rgba(255,255,255,0.6);max-width:500px;margin:0 auto;">Des services culinaires d'exception pour tous vos événements</p>
</section>

<section class="section">
    <div class="prestation-grid">
        <div class="prestation-card">
            <div class="prestation-img card-img-1">🥩</div>
            <div class="prestation-body">
                <span class="prestation-tag">Service 01</span>
                <h3>Prospection des Menus</h3>
                <p>Menus gastronomiques sur mesure pour tous vos événements : mariages, réceptions, dîners privés, banquets... Cuisine européenne raffinée et spécialités africaines authentiques.</p>
                <ul style="list-style:none;margin-bottom:16px;">
                    <li style="font-size:11px;color:#555;padding:3px 0;border-bottom:1px solid #f0ece6;">✦ Menus personnalisés</li>
                    <li style="font-size:11px;color:#555;padding:3px 0;border-bottom:1px solid #f0ece6;">✦ Mariages & Réceptions</li>
                    <li style="font-size:11px;color:#555;padding:3px 0;">✦ Dîners privés</li>
                </ul>
                <button class="btn-sm">En savoir plus</button>
            </div>
        </div>
        <div class="prestation-card">
            <div class="prestation-img card-img-2">📋</div>
            <div class="prestation-body">
                <span class="prestation-tag">Service 02</span>
                <h3>Présentation & Propositions</h3>
                <p>Étude de vos besoins et conception d'une offre personnalisée. Prestation à domicile ou sur site. Devis détaillé et transparent.</p>
                <ul style="list-style:none;margin-bottom:16px;">
                    <li style="font-size:11px;color:#555;padding:3px 0;border-bottom:1px solid #f0ece6;">✦ Consultation personnalisée</li>
                    <li style="font-size:11px;color:#555;padding:3px 0;border-bottom:1px solid #f0ece6;">✦ Analyse de vos besoins</li>
                    <li style="font-size:11px;color:#555;padding:3px 0;">✦ Proposition sur mesure</li>
                </ul>
                <button class="btn-sm">En savoir plus</button>
            </div>
        </div>
        <div class="prestation-card">
            <div class="prestation-img card-img-3">🧁</div>
            <div class="prestation-body">
                <span class="prestation-tag">Service 03</span>
                <h3>Commercialisation de Produits</h3>
                <p>Pâtisseries artisanales, gâteaux de fête, chocolats, confiseries et spécialités gastronomiques. Commandes sur mesure et livraison disponible.</p>
                <ul style="list-style:none;margin-bottom:16px;">
                    <li style="font-size:11px;color:#555;padding:3px 0;border-bottom:1px solid #f0ece6;">✦ Pâtisseries artisanales</li>
                    <li style="font-size:11px;color:#555;padding:3px 0;border-bottom:1px solid #f0ece6;">✦ Gâteaux de fête</li>
                    <li style="font-size:11px;color:#555;padding:3px 0;">✦ Spécialités gastronomiques</li>
                </ul>
                <button class="btn-sm">En savoir plus</button>
            </div>
        </div>
    </div>
    <div style="background:var(--dark);padding:40px;border-radius:6px;text-align:center;margin-top:40px;">
        <div style="font-size:20px;margin-bottom:8px;">🍽️</div>
        <h3 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--white);margin-bottom:8px;">Besoin d'une prestation sur mesure ?</h3>
        <p style="font-size:13px;color:rgba(255,255,255,0.6);margin-bottom:20px;">Contactez-nous pour une étude personnalisée de votre projet.</p>
        <button class="btn-primary" onclick="window.location.href='{{ route('contact') }}'">Demander un devis</button>
    </div>
</section>
@endsection