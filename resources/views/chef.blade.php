@extends('layouts.public')

@section('content')
<div class="chef-hero" style="background:var(--off-white);">
    <div class="chef-image-box">
        <span style="font-size:100px;position:relative;z-index:1;">👨‍🍳</span>
    </div>
    <div class="chef-info">
        <div class="chef-tag">Chef Cuisinier Gastronome</div>
        <h2>Le Chef DAN</h2>
        <div class="chef-subtitle">Cuisine Européenne & Africaine</div>
        <p>Passionné des arts culinaires depuis de nombreuses années, le Chef DAN a développé une expertise rare à la croisée des traditions gastronomiques européennes et africaines.</p>
        <p>Sa philosophie : sublimer les produits frais et authentiques pour créer des expériences gustatives inoubliables qui marquent les esprits et réchauffent les cœurs.</p>
        <div class="chef-stats">
            <div class="stat-item">
                <span class="stat-number">15+</span>
                <span class="stat-label">Ans d'expérience</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">1000+</span>
                <span class="stat-label">Événements réalisés</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label">Satisfaction clients</span>
            </div>
        </div>
        <div style="margin-top:20px;">
            <h4 style="font-size:13px;font-weight:700;color:var(--black);margin-bottom:10px;">Sa Philosophie :</h4>
            <ul style="list-style:none;display:flex;flex-direction:column;gap:6px;">
                <li style="font-size:12px;color:#555;display:flex;gap:8px;align-items:flex-start;"><span style="color:var(--gold);">✦</span>Menus personnalisés</li>
                <li style="font-size:12px;color:#555;display:flex;gap:8px;align-items:flex-start;"><span style="color:var(--gold);">✦</span>Mariages & Réceptions</li>
                <li style="font-size:12px;color:#555;display:flex;gap:8px;align-items:flex-start;"><span style="color:var(--gold);">✦</span>Dîners privés</li>
                <li style="font-size:12px;color:#555;display:flex;gap:8px;align-items:flex-start;"><span style="color:var(--gold);">✦</span>Banquets & Cocktails</li>
            </ul>
        </div>
    </div>
</div>

<div class="distinctions">
    <h3 style="font-size:12px;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:30px;">Distinctions & Certifications</h3>
    <div class="dist-grid">
        <div class="dist-item">
            <div class="dist-badge">🏅</div>
            <div class="dist-label">Diplôme de Cuisine Gastronomique</div>
            <div style="font-size:9px;color:rgba(255,255,255,0.35);text-align:center;">École Hôtelière de Paris</div>
        </div>
        <div class="dist-item">
            <div class="dist-badge">🎖️</div>
            <div class="dist-label">Certificat de Pâtisserie Artisanale</div>
            <div style="font-size:9px;color:rgba(255,255,255,0.35);text-align:center;"></div>
        </div>
        <div class="dist-item">
            <div class="dist-badge">⭐</div>
            <div class="dist-label">Excellence en Cuisine Africaine</div>
            <div style="font-size:9px;color:rgba(255,255,255,0.35);text-align:center;"></div>
        </div>
        <div class="dist-item">
            <div class="dist-badge">👨‍🍳</div>
            <div class="dist-label">Membre de l'Association des Chefs</div>
            <div style="font-size:9px;color:rgba(255,255,255,0.35);text-align:center;">Association Culinaire Africaine</div>
        </div>
    </div>
</div>
@endsection