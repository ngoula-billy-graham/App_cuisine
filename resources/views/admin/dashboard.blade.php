@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <!-- Tableau de bord -->
        <div class="sidebar-menu-item active" onclick="window.location.href='{{ route('admin.dashboard') }}'">
            <div class="menu-icon">🏠</div>
            Tableau de bord
        </div>

        <!-- Inscriptions formations (lien dynamique) -->
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('registrations.index') }}'">
            <div class="menu-icon">📚</div>
            Inscriptions formations
        </div>

        <!-- Gestion des formations (lien dynamique) -->
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('formations.index') }}'">
            <div class="menu-icon">📖</div>
            Gestion des formations
        </div>

        <!-- Commandes boutique -->
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('admin.orders.index') }}'">
            <div class="menu-icon">🛒</div>
            Commandes boutique
        </div>
        <!-- Demande de devis-->
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('inquiries.index') }}'">
    <div class="menu-icon">📋</div>
    Demandes de devis
</div>
        <!-- Publications -->
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('posts.index') }}'">
            <div class="menu-icon">✍️</div>
            Publications
        </div>

        <!-- Services en ligne -->
        <div class="sidebar-menu-item" onclick="alert('Section en cours de développement')">
            <div class="menu-icon">⚙️</div>
            Services en ligne
        </div>

        <!-- Gestion boutique -->
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('products.index') }}'">
            <div class="menu-icon">🏪</div>
            Gestion boutique
        </div>

        <hr class="sidebar-divider">

        <!-- Déconnexion -->
        <div class="sidebar-menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="menu-icon">🚪</div>
            Déconnexion
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Content -->
    <div class="admin-content">
        <div class="admin-welcome">
            <h2>Bienvenue Chef DAN 👋</h2>
            <p>Gérez votre activité facilement depuis votre espace administrateur.</p>
        </div>

        <h3 style="font-family:'Playfair Display',serif;font-size:22px;margin-bottom:24px;color:var(--black);">Tableau de bord</h3>

        <!-- Section Inscriptions Formations (affichage statique pour l'exemple) -->
        <div class="admin-section">
            <div class="admin-section-header">
                <div class="admin-section-title">
                    <div class="section-icon">📚</div>
                    <div>
                        <h3>Inscriptions formations</h3>
                        <p>Liste des dernières inscriptions</p>
                    </div>
                </div>
                <button class="voir-tout">Voir tout</button>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Formation</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Marie Claire</td>
                        <td>Pâtisserie Artisanale</td>
                        <td>10/05/2024</td>
                        <td><span class="status-badge status-attente">En attente</span></td>
                        <td><button class="action-link">Confirmer</button></td>
                    </tr>
                    <tr>
                        <td>Jean Paul</td>
                        <td>Cuisine Africaine</td>
                        <td>09/05/2024</td>
                        <td><span class="status-badge status-attente">En attente</span></td>
                        <td><button class="action-link">Confirmer</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection