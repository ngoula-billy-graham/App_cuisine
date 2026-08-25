@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">
        <!-- ... votre sidebar ... -->
    </div>
    <div class="admin-content">
        <div class="admin-section-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Gestion des Publications</h2>
                <p style="font-size:1rem;color:#666;">Gérez vos créations culinaires (Module B).</p>
            </div>
            <a href="{{ route('posts.create') }}" class="btn-primary" style="padding:12px 24px; text-decoration:none; display:inline-block;">+ Nouvelle création</a>
        </div>
        <div class="admin-section">
            <table class="admin-table">
                <thead>
                    <tr><th>Titre</th><th>Catégorie</th><th>Date</th><th>Likes</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td><strong>{{ $post->title }}</strong></td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td>❤️ {{ $post->likes }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="action-link" style="margin-right:12px;">✏️ Modifier</a>
                            
                            <!-- Bouton Supprimer qui appelle la modale JS -->
                            <button type="button" onclick="openModal({{ $post->id }})" class="action-link" style="color:var(--red); background:none; border:none; cursor:pointer;">
                                🗑️ Supprimer
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ➡️ Modale de confirmation (Boîte noire et dorée) -->
<div id="deleteModal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.8); align-items:center; justify-content:center;">
    <div style="background:var(--dark); border:1px solid var(--border); border-radius:12px; padding:30px; max-width:450px; width:90%; box-shadow:0 20px 50px rgba(0,0,0,0.8);">
        <h3 style="font-family:'Playfair Display',serif; color:var(--gold); font-size:24px; margin-bottom:15px;">Confirmation</h3>
        <p style="color:rgba(255,255,255,0.8); font-size:1.1rem; line-height:1.5; margin-bottom:25px;">
            Voulez-vous vraiment supprimer cette création ? <br><strong style="color:var(--white);">Cette action est irréversible.</strong>
        </p>
        <div style="display:flex; gap:15px; justify-content:flex-end;">
            <!-- Bouton Annuler -->
            <button onclick="closeModal()" style="padding:10px 20px; background:transparent; border:1px solid var(--border); color:rgba(255,255,255,0.7); border-radius:6px; cursor:pointer; transition:0.2s;">Annuler</button>
            
            <!-- Formulaire DELETE -->
            <form id="deleteForm" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="padding:10px 24px; background:var(--red); border:none; color:var(--white); border-radius:6px; cursor:pointer; font-weight:700;">Supprimer</button>
            </form>
        </div>
    </div>
</div>

<!-- 🔧 Le petit JavaScript qui contrôle la modale -->
<script>
    function openModal(id) {
        // Mettre à jour l'action du formulaire avec l'ID du post à supprimer
        document.getElementById('deleteForm').action = '/admin/posts/' + id;
        // Afficher la modale
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeModal() {
        // Cacher la modale
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>

<!-- Petit CSS anti-clignotement -->
<style>
    [x-cloak] { display: none !important; }
</style>
@endsection

