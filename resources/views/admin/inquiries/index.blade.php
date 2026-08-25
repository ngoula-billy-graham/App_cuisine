@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <div class="admin-sidebar">
        <!-- ... votre menu sidebar ... -->
    </div>
    <div class="admin-content">
        <div class="admin-section-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--black);">Demandes de devis</h2>
                <p style="font-size:1rem;color:#666;">Gérez les demandes reçues via le formulaire de contact.</p>
            </div>
        </div>

        <div class="admin-section">
            <table class="admin-table">
                <thead>
                    <tr><th>Nom</th><th>Service</th><th>Date souh.</th><th>Nb pers.</th><th>Date réception</th><th>Statut</th><th>Action</th></tr>
                </thead>
                <tbody>
                    @foreach($inquiries as $inquiry)
                    <tr>
                        <td><strong>{{ $inquiry->name }}</strong></td>
                        <td>{{ $inquiry->service_type ?? 'Non précisé' }}</td>
                        <td>{{ $inquiry->preferred_date ? \Carbon\Carbon::parse($inquiry->preferred_date)->format('d/m/Y') : '-' }}</td>
                        <td>{{ $inquiry->number_of_people ?? '-' }}</td>
                        <td>{{ $inquiry->created_at->format('d/m/Y') }}</td>
                        <td>
                            <span class="status-badge 
                                @if($inquiry->status == 'nouveau') status-nouveau
                                @elseif($inquiry->status == 'lu') status-cours
                                @elseif($inquiry->status == 'traité') status-livree
                                @endif
                            ">
                                {{ ucfirst($inquiry->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('inquiries.update', $inquiry->id) }}" method="POST" style="display:inline;">
                                @csrf @method('PUT')
                                <select name="status" onchange="this.form.submit()" style="background:var(--black); color:var(--white); border:1px solid var(--border); padding:4px; border-radius:4px;">
                                    <option value="nouveau" {{ $inquiry->status == 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                                    <option value="lu" {{ $inquiry->status == 'lu' ? 'selected' : '' }}>Lu</option>
                                    <option value="traité" {{ $inquiry->status == 'traité' ? 'selected' : '' }}>Traité</option>
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