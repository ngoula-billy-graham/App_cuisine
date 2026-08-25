@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">
        <!-- ... votre menu sidebar (identique au dashboard) ... -->
    </div>
    <div class="admin-content">
        <div class="admin-section-header" style="margin-bottom:24px;">
            <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Modifier "{{ $post->title }}"</h2>
            <a href="{{ route('posts.index') }}" style="color:var(--gold); font-weight:600;">← Retour à la liste</a>
        </div>

        <div class="admin-card" style="max-width:800px;">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <!-- Champ Titre avec affichage d'erreur propre -->
                    <div class="form-group">
                        <label>Titre *</label>
                        @error('title')
                            <div style="color: #e74c3c; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
                    </div>

                    <!-- Champ Catégorie -->
                    <div class="form-group">
                        <label>Catégorie *</label>
                        <select name="category" required>
                            <option value="Plats gastronomiques" {{ $post->category == 'Plats gastronomiques' ? 'selected' : '' }}>Plats gastronomiques</option>
                            <option value="Pâtisseries" {{ $post->category == 'Pâtisseries' ? 'selected' : '' }}>Pâtisseries</option>
                            <option value="Événements" {{ $post->category == 'Événements' ? 'selected' : '' }}>Événements</option>
                            <option value="Formations" {{ $post->category == 'Formations' ? 'selected' : '' }}>Formations</option>
                            <option value="Cuisine africaine" {{ $post->category == 'Cuisine africaine' ? 'selected' : '' }}>Cuisine africaine</option>
                        </select>
                    </div>
                </div>

                <!-- Champ Description / Contenu -->
                <div class="form-group">
                    <label>Description / Contenu *</label>
                    <textarea name="content" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <button type="submit" class="btn-send">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection