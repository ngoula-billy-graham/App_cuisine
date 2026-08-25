@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">
        <!-- votre sidebar -->
    </div>
    <div class="admin-content">
        <div class="admin-section-header" style="margin-bottom:24px;">
            <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Ajouter un produit</h2>
            <a href="{{ route('products.index') }}" style="color:var(--gold); font-weight:600;">← Retour à la liste</a>
        </div>

        <div class="admin-card" style="max-width:800px;">
            <!-- ✅ Utilisez products.store (sans le préfixe admin.) -->
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>Nom du produit *</label>
                        @error('name')<div style="color:red;font-size:0.9rem;">{{ $message }}</div>@enderror
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="ex: Gâteau Royal" required>
                    </div>
                    <div class="form-group">
                        <label>Prix (€) *</label>
                        @error('price')<div style="color:red;font-size:0.9rem;">{{ $message }}</div>@enderror
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="45.00" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="category">
                            <option value="Pâtisseries">Pâtisseries</option>
                            <option value="Chocolats">Chocolats</option>
                            <option value="Confiseries">Confiseries</option>
                            <option value="Spécialités">Spécialités</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" value="{{ old('stock', 10) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn-send">Enregistrer le produit</button>
            </form>
        </div>
    </div>
</div>
@endsection