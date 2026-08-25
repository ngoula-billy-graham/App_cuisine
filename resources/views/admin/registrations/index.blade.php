@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <!-- Sidebar (identique à celle du Dashboard) -->
    <div class="admin-sidebar">
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('admin.dashboard') }}'">
            <div class="menu-icon">🏠</div>
            Tableau de bord
        </div>
        <div class="sidebar-menu-item active">
            <div class="menu-icon">📚</div>
            Inscriptions formations
        </div>
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('formations.index') }}'">
            <div class="menu-icon">📖</div>
            Gestion des formations
        </div>
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('admin.orders.index') }}'">
            <div class="menu-icon">🛒</div>
            Commandes boutique
        </div>
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('posts.index') }}'">
            <div class="menu-icon">✍️</div>
            Publications
        </div>
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('products.index') }}'">
            <div class="menu-icon">🏪</div>
            Gestion boutique
        </div>
        <hr class="sidebar-divider">
        <div class="sidebar-menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="menu-icon">🚪</div>
            Déconnexion
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Contenu principal -->
    <div class="admin-content">
        <div class="admin-section-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Inscriptions aux formations</h2>
                <p style="font-size:1rem;color:#666;">Gérez les inscriptions de vos élèves.</p>
            </div>
        </div>

        <div class="admin-section">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Formation</th>
                        <th>Date d'inscription</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $reg)
                    <tr>
                        <td>{{ $reg->name }}</td>
                        <td>{{ $reg->email }}</td>
                        <td>{{ $reg->phone }}</td>
                        <td>{{ $reg->formation->title }}</td>
                        <td>{{ $reg->created_at->format('d/m/Y') }}</td>
                        <td>
                            <span class="status-badge 
                                @if($reg->status == 'en_attente') status-attente
                                @elseif($reg->status == 'confirmé') status-publie
                                @elseif($reg->status == 'annulé') status-traiter
                                @endif
                            ">
                                {{ ucfirst($reg->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('registrations.update', $reg->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" style="background:var(--black); color:var(--white); border:1px solid var(--border); padding:4px; border-radius:4px;">
                                    <option value="en_attente" {{ $reg->status == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                    <option value="confirmé" {{ $reg->status == 'confirmé' ? 'selected' : '' }}>Confirmé</option>
                                    <option value="annulé" {{ $reg->status == 'annulé' ? 'selected' : '' }}>Annulé</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection