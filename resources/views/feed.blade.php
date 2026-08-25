@extends('layouts.public')
@section('content')
<div class="feed-layout">
    <div class="feed-main">
        <div class="feed-hero">
            <div class="feed-hero-bg"></div>
            <div class="feed-hero-content">
                <h1>FEED DES CRÉATIONS</h1>
                <div class="italic-gold">du Chef Dan</div>
                <p>Découvrez nos dernières créations, événements et moments d'exception.</p>
            </div>
        </div>
        <div class="feed-search">
            <div class="search-box">
                <input type="text" id="feed-search-input" placeholder="Rechercher une création par titre...">
                <span class="search-icon">🔍</span>
            </div>
        </div>
        <div class="feed-filters">
            <button class="filter-btn active" data-category="all">🔲 Tous</button>
            <button class="filter-btn" data-category="Plats">🍖 Plats</button>
            <button class="filter-btn" data-category="Pâtisseries">🎂 Pâtisseries</button>
            <button class="filter-btn" data-category="Événements">🥂 Événements</button>
            <button class="filter-btn" data-category="Formations">📚 Formations</button>
            <button class="filter-btn" data-category="Cuisine Africaine">🌍 Cuisine Africaine</button>
        </div>

        <div class="feed-grid" id="feed-grid-container">
            @include('partials.feed-cards', ['posts' => $posts])
            @foreach($posts as $post)
            <div class="creation-card" data-category="{{ $post->category }}">
                <div class="card-img card-img-1">
                    <div class="card-tag">{{ $post->category }}</div>
                    🍽️
                </div>
                <div class="card-body">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ Str::limit($post->content, 80) }}</p>
                    <div class="card-meta">
                        <span class="card-time">{{ $post->created_at->diffForHumans() }}</span>
                        <div class="card-stats">
                            <span class="card-stat">👁 {{ $post->views }}</span>
                        </div>
                    </div>
                    <div style="margin-top: 12px; display: flex; align-items: center; gap: 10px;">
                        <button class="like-btn" data-post-id="{{ $post->id }}" 
                                style="background: none; border: none; color: #e74c3c; font-size: 1.2rem; cursor: pointer; display: flex; align-items: center; gap: 4px;">
                            ❤️ <span class="like-count">{{ $post->likes }}</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Bouton Charger plus (FR-B09) -->
        <div style="text-align:center; padding:30px;">
    <button class="btn-primary" id="load-more-btn" 
            data-next-page="{{ $posts->currentPage() + 1 }}" 
            data-last-page="{{ $posts->lastPage() }}" 
            style="font-size:0.9rem; cursor:pointer;">
        Charger plus de créations
    </button>
</div>
    </div>

    <div class="feed-sidebar">
        <!-- Sidebar des Services, Formations, Boutique (FR-B07) -->
        <div class="sidebar-section">
            <div class="sidebar-title">Services Disponibles</div>
            <div class="service-item"><div class="service-icon">🏠</div><div class="service-info"><div class="service-name">Chef à domicile</div><div class="service-desc">Disponible</div></div></div>
        </div>
    </div>
</div>
@endsection