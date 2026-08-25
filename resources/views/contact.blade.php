@extends('layouts.public')

@section('content')
<section style="background:var(--dark);padding:60px;text-align:center;">
    <p style="font-size:11px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);font-weight:700;margin-bottom:10px;">Nous joindre</p>
    <h1 style="font-family:'Playfair Display',serif;font-size:42px;font-weight:600;color:var(--white);margin-bottom:12px;">Contact</h1>
    <div class="section-divider"></div>
</section>

<section class="contact-section">
    <div class="contact-grid">
        <div>
            <div class="contact-form-title">
                <h2>Contactez-nous<br>& <span>Demandez un Devis</span></h2>
                <p>Une question, une demande particulière ? Remplissez le formulaire.</p>
            </div>

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf 

                @if(session('success'))
                    <div style="background:#d4edda;color:#155724;padding:12px;border-radius:4px;margin-bottom:20px;border:1px solid #c3e6cb;">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-row">
                    <div class="form-group">
                        <label>Nom complet</label>
                        <input type="text" name="name" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="votre@email.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="tel" name="phone" placeholder="+33 6 12 34 56 78">
                    </div>
                    <div class="form-group">
                        <label>Type de prestation</label>
                        <select name="service_type">
                            <option value="">Sélectionner...</option>
                            <option value="Chef à domicile">Chef à domicile</option>
                            <option value="Organisation événement">Organisation événement</option>
                            <option value="Formation">Formation</option>
                            <option value="Commande boutique">Commande boutique</option>
                        </select>
                    </div>
                </div>
                <!-- ➡️ NOUVEAUX CHAMPS POUR LE DEVIS -->
                <div class="form-row">
                    <div class="form-group">
                        <label>Date souhaitée</label>
                        <input type="date" name="preferred_date">
                    </div>
                    <div class="form-group">
                        <label>Nombre de personnes</label>
                        <input type="number" name="number_of_people" placeholder="ex: 50">
                    </div>
                </div>
                <div class="form-group">
                    <label>Votre message</label>
                    <textarea name="message" placeholder="Décrivez votre projet..." required></textarea>
                </div>
                
                <button type="submit" class="btn-send">Envoyer ma demande</button>
            </form>
        </div>

        <div class="contact-info">
            <div class="contact-info-item">
                <div class="contact-info-icon">📞</div>
                <div class="contact-info-text"><div class="label">Téléphone</div><div class="value">+33 6 12 34 56 78</div></div>
            </div>
            <div class="contact-info-item">
                <div class="contact-info-icon">✉️</div>
                <div class="contact-info-text"><div class="label">Email</div><div class="value">contact@chefdan.com</div></div>
            </div>
            <div class="contact-info-item">
                <div class="contact-info-icon">📍</div>
                <div class="contact-info-text"><div class="label">Localisation</div><div class="value">Paris, France</div></div>
            </div>
        </div>
    </div>
</section>
@endsection