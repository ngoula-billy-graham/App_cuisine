<x-guest-layout>
    <div style="background: var(--dark); padding: 40px; border-radius: 12px; border: 1px solid var(--border); width: 100%; max-width: 420px; box-shadow: 0 20px 40px rgba(0,0,0,0.6);">
        
        <!-- Logo et Titre -->
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="font-size: 48px; margin-bottom: 10px;">🔑</div>
            <h2 style="font-family: 'Playfair Display', serif; color: var(--gold); font-size: 28px; letter-spacing: 1px; margin: 0;">Mot de passe oublié ?</h2>
            <div class="section-divider" style="margin: 12px auto 0;"></div>
            <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-top: 15px; line-height: 1.5;">
                Entrez votre adresse e-mail ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe.
            </p>
        </div>

        <!-- Message de succès (si le lien a été envoyé) -->
        @if (session('status'))
            <div style="background: rgba(39, 174, 96, 0.2); color: #27ae60; padding: 12px; border-radius: 6px; border: 1px solid #27ae60; margin-bottom: 20px; text-align: center; font-size: 0.9rem;">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulaire -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="color: rgba(255,255,255,0.7); font-size: 0.9rem; font-weight: 600;">Adresse Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                       style="background: var(--black); border: 1px solid var(--border); color: var(--white); padding: 12px 14px; width: 100%; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.3s;">
                @error('email')
                    <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; text-align: center; justify-content: center; padding: 14px; font-size: 1rem; box-shadow: 0 4px 15px rgba(201, 168, 76, 0.3);">
                Envoyer le lien de réinitialisation
            </button>

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('login') }}" style="color: var(--gold); font-size: 0.9rem; text-decoration: none; font-weight: 600;">
                    ← Retour à la connexion
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>