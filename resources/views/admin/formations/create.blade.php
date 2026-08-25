@extends('layouts.app')
@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">...</div>
    <div class="admin-content">
        <div class="admin-section-header" style="margin-bottom:24px;">
            <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Ajouter une formation</h2>
            <a href="{{ route('formations.index') }}" style="color:var(--gold);">← Retour</a>
        </div>
        <div class="admin-card" style="max-width:800px;">
            <form action="{{ route('formations.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>Titre *</label>
                        @error('title')<div style="color:red;font-size:0.9rem;">{{ $message }}</div>@enderror
                        <input type="text" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Prix (€) *</label>
                        @error('price')<div style="color:red;font-size:0.9rem;">{{ $message }}</div>@enderror
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date de début *</label>
                        @error('start_date')<div style="color:red;font-size:0.9rem;">{{ $message }}</div>@enderror
                        <input type="date" name="start_date" value="{{ old('start_date') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Places disponibles *</label>
                        @error('places_available')<div style="color:red;font-size:0.9rem;">{{ $message }}</div>@enderror
                        <input type="number" name="places_available" value="{{ old('places_available', 10) }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description *</label>
                    @error('description')<div style="color:red;font-size:0.9rem;">{{ $message }}</div>@enderror
                    <textarea name="description" required>{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn-send">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection