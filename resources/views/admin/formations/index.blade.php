@extends('layouts.app')
@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">...</div>
    <div class="admin-content">
        <div class="admin-section-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Gestion des Formations</h2>
                <p style="font-size:1rem;color:#666;">Gérez vos programmes de formation (Module D).</p>
            </div>
            <a href="{{ route('formations.create') }}" class="btn-primary" style="padding:12px 24px; text-decoration:none;">+ Nouvelle formation</a>
        </div>
        <div class="admin-section">
            <table class="admin-table">
                <thead>
                    <tr><th>Titre</th><th>Date</th><th>Prix</th><th>Places</th><th>Statut</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    @foreach($formations as $formation)
                    <tr>
                        <td><strong>{{ $formation->title }}</strong></td>
                        <td>{{ $formation->start_date->format('d/m/Y') }}</td>
                        <td style="color:var(--gold);">{{ number_format($formation->price, 2) }} €</td>
                        <td>{{ $formation->places_available }}</td>
                        <td><span class="status-badge status-publie">{{ $formation->status }}</span></td>
                        <td>
                            <a href="{{ route('formations.edit', $formation->id) }}" class="action-link">✏️ Modifier</a>
                            <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Supprimer cette formation ?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="action-link" style="color:var(--red); border:none; background:none; cursor:pointer;">🗑️ Supprimer</button>
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