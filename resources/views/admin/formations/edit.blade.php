@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">
        <!-- ... votre sidebar ... -->
    </div>
    <div class="admin-content">
        <div class="admin-section-header" style="margin-bottom:24px;">
            <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Modifier la formation</h2>
            <a href="{{ route('formations.index') }}" style="color:var(--gold); font-weight:600;">← Retour à la liste</a>
        </div>

        <div class="admin-card" style="max-width:800px;">
            <form action="{{ route('formations.update', $formation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label>Titre *</label>
                        @error('title')
                            <div style="color: #e74c3c; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="title" value="{{ old('title', $formation->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Prix (€) *</label>
                        @error('price')
                            <div style="color: #e74c3c; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="number" step="0.01" name="price" value="{{ old('price', $formation->price) }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Date de début *</label>
                        @error('start_date')
                            <div style="color: #e74c3c; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="date" name="start_date" value="{{ old('start_date', $formation->start_date?->format('Y-m-d')) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Places disponibles *</label>
                        @error('places_available')
                            <div style="color: #e74c3c; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="number" name="places_available" value="{{ old('places_available', $formation->places_available) }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description *</label>
                    @error('description')
                        <div style="color: #e74c3c; font-weight: 600; font-size: 0.9rem; margin-bottom: 6px;">
                            {{ $message }}
                        </div>
                    @enderror
                    <textarea name="description" required>{{ old('description', $formation->description) }}</textarea>
                </div>

                <button type="submit" class="btn-send">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection