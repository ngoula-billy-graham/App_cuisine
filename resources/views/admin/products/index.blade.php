@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <!-- Sidebar (réutilisée) -->
    <div class="admin-sidebar">
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('admin.dashboard') }}'">
            <div class="menu-icon">🏠</div> Tableau de bord
        </div>
        <div class="sidebar-menu-item active">
            <div class="menu-icon">🏪</div> Gestion boutique
        </div>
        <div class="sidebar-menu-item" onclick="alert('Section en cours')">
            <div class="menu-icon">📚</div> Inscriptions formations
        </div>
        <hr class="sidebar-divider">
        <div class="sidebar-menu-item" onclick="window.location.href='{{ route('home') }}'">
            <div class="menu-icon">🚪</div> Déconnexion
        </div>
    </div>

    <div class="admin-content">
        <div class="admin-section-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Gestion de la Boutique</h2>
                <p style="font-size:1rem;color:#666;">Gérez vos produits en ligne</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn-primary" style="padding:12px 24px; text-decoration:none; display:inline-block;">+ Ajouter un produit</a>
        </div>

        <div class="admin-section">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td style="color:var(--gold); font-weight:700;">{{ number_format($product->price, 2) }} €</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="action-link" style="margin-right:12px;">✏️ Modifier</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-link" style="color:var(--red);">🗑️ Supprimer</button>
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