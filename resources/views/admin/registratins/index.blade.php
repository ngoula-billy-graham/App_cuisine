@extends('layouts.app')
@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">...</div>
    <div class="admin-content">
        <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Inscriptions aux formations</h2>
        <div class="admin-section">
            <table class="admin-table">
                <thead>
                    <tr><th>Nom</th><th>Email</th><th>Téléphone</th><th>Formation</th><th>Date</th><th>Statut</th><th>Action</th></tr>
                </thead>
                <tbody>
                    @foreach($registrations as $reg)
                    <tr>
                        <td>{{ $reg->name }}</td>
                        <td>{{ $reg->email }}</td>
                        <td>{{ $reg->phone }}</td>
                        <td>{{ $reg->formation->title }}</td>
                        <td>{{ $reg->created_at->format('d/m/Y') }}</td>
                        <td><span class="status-badge status-attente">{{ $reg->status }}</span></td>
                        <td>
                            <form action="{{ route('registrations.update', $reg->id) }}" method="POST" style="display:inline;">
                                @csrf @method('PUT')
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