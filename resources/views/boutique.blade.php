@extends('layouts.public')

@section('content')
<section style="background:var(--dark);padding:60px;text-align:center;">
    <p style="font-size:11px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:10px;">Commande en ligne</p>
    <h1 style="font-family:'Playfair Display',serif;font-size:42px;font-weight:600;color:var(--white);margin-bottom:12px;">Boutique</h1>
    <div class="section-divider"></div>
    <p style="font-size:13px;color:rgba(255,255,255,0.6);">Découvrez nos créations artisanales</p>
</section>

<section class="boutique-section">
    <!-- Filtres -->
    <div class="boutique-filters">
        <button class="boutique-filter-btn active" data-category="all">Tous</button>
        <button class="boutique-filter-btn" data-category="Pâtisseries">Pâtisseries</button>
        <button class="boutique-filter-btn" data-category="Chocolats">Chocolats</button>
        <button class="boutique-filter-btn" data-category="Confiseries">Confiseries</button>
        <button class="boutique-filter-btn" data-category="Spécialités">Spécialités</button>
    </div>

    <!-- Grille de produits -->
    <div class="boutique-grid" id="boutique-grid-container">
    @foreach($products as $product)
    <div class="boutique-card" data-category="{{ $product->category }}">
        <div class="boutique-card-img bc1">
            🧁
        </div>
        <div class="boutique-card-body">
            <div class="boutique-card-name">{{ $product->name }}</div>
            <div class="boutique-card-price">{{ number_format($product->price, 2) }} €</div>
            
            <!-- ➡️ Le bouton premium large que vous aviez au départ, avec l'ID pour la modale -->
            <button class="btn-cart" data-product-id="{{ $product->id }}">Ajouter au panier</button>
        </div>
    </div>
    @endforeach
</div>

    <!-- Indicateurs de confiance (FR-C06) -->
    <div class="boutique-trust">
        <div class="trust-item"><span class="trust-icon">🌱</span><div><strong>Produits Frais</strong><br><span style="font-size:10px;color:#888;">Sélection rigoureuse</span></div></div>
        <div class="trust-item"><span class="trust-icon">🏠</span><div><strong>Fait Maison</strong><br><span style="font-size:10px;color:#888;">Préparations artisanales</span></div></div>
        <div class="trust-item"><span class="trust-icon">🚚</span><div><strong>Livraison</strong><br><span style="font-size:10px;color:#888;">Rapide & sécurisée</span></div></div>
        <div class="trust-item"><span class="trust-icon">🔒</span><div><strong>Paiement Sécurisé</strong><br><span style="font-size:10px;color:#888;">100% sécurisé</span></div></div>
    </div>
</section>

<!-- MODALE DE COMMANDE (Fonctionnelle sans design) -->
<div id="orderModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:var(--dark); padding:30px; border-radius:12px; border:1px solid var(--border); max-width:400px; width:100%; color:var(--white);">
        <h3 style="font-family:'Playfair Display',serif; color:var(--gold); margin-bottom:15px;">Commander ce produit</h3>
        <form id="orderForm" action="{{ route('order.store') }}" method="POST">
            @csrf
            <input type="hidden" id="modal_product_id" name="product_id" value="">
            
            <div class="form-group" style="margin-bottom:10px;">
                <label>Nom complet *</label>
                <input type="text" name="customer_name" required style="width:100%; padding:8px; border-radius:4px; border:1px solid #444; background:var(--black); color:var(--white);">
            </div>
            <div class="form-group" style="margin-bottom:10px;">
                <label>Email *</label>
                <input type="email" name="customer_email" required style="width:100%; padding:8px; border-radius:4px; border:1px solid #444; background:var(--black); color:var(--white);">
            </div>
            <div class="form-group" style="margin-bottom:10px;">
                <label>Téléphone *</label>
                <input type="tel" name="customer_phone" required style="width:100%; padding:8px; border-radius:4px; border:1px solid #444; background:var(--black); color:var(--white);">
            </div>
            <div class="form-group" style="margin-bottom:10px;">
                <label>Quantité *</label>
                <input type="number" name="quantity" value="1" min="1" required style="width:100%; padding:8px; border-radius:4px; border:1px solid #444; background:var(--black); color:var(--white);">
            </div>
            <div class="form-group" style="margin-bottom:10px;">
                <label>Message (Optionnel)</label>
                <textarea name="message" rows="2" style="width:100%; padding:8px; border-radius:4px; border:1px solid #444; background:var(--black); color:var(--white);"></textarea>
            </div>

            <div style="display:flex; gap:10px; margin-top:20px;">
                <button type="submit" class="btn-primary" style="flex:1; padding:10px;">Envoyer la commande</button>
                <button type="button" onclick="closeModal()" style="flex:1; padding:10px; background:transparent; border:1px solid #555; color:#aaa; border-radius:4px; cursor:pointer;">Annuler</button>
            </div>
        </form>
    </div>
</div>

<!-- Message de succès (si commande envoyée) -->
@if(session('success'))
    <div style="position:fixed; top:20px; right:20px; background:#27ae60; color:white; padding:15px 25px; border-radius:8px; z-index:10000;">
        {{ session('success') }}
    </div>
@endif

<script>
    // Ouvrir la modale avec l'ID du produit
    document.querySelectorAll('.btn-cart').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const card = this.closest('.boutique-card');
            // Récupérer l'ID du produit depuis l'URL ou un attribut data
            // Pour l'instant, on le récupère via un attribut data-product-id que l'on va ajouter
            const productId = this.dataset.productId;
            if(productId) {
                document.getElementById('modal_product_id').value = productId;
                document.getElementById('orderModal').style.display = 'flex';
            } else {
                alert("Erreur : ID produit manquant.");
            }
        });
    });

    function closeModal() {
        document.getElementById('orderModal').style.display = 'none';
    }
</script>

@endsection