<x-guest-layout>
    <div style="background: var(--dark); padding: 40px; border-radius: 12px; border: 1px solid var(--border); width: 100%; max-width: 420px; box-shadow: 0 20px 40px rgba(0,0,0,0.6);">
        
        <!-- Logo et Titre -->
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="font-size: 48px; margin-bottom: 10px;">🛡️</div>
            <h2 style="font-family: 'Playfair Display', serif; color: var(--gold); font-size: 28px; letter-spacing: 1px; margin: 0;">Confirmer le mot de passe</h2>
            <div class="section-divider" style="margin: 12px auto 0;"></div>
            <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-top: 15px; line-height: 1.5;">
                Pour votre sécurité, veuillez confirmer votre mot de passe avant de continuer.
            </p>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="color: rgba(255,255,255,0.7); font-size: 0.9rem; font-weight: 600;">Mot de passe actuel</label>
                <input type="password" name="password" required autocomplete="current-password"
                       style="background: var(--black); border: 1px solid var(--border); color: var(--white); padding: 12px 14px; width: 100%; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.3s;">
                @error('password')
                    <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; text-align: center; justify-content: center; padding: 14px; font-size: 1rem; box-shadow: 0 4px 15px rgba(201, 168, 76, 0.3);">
                Confirmer le mot de passe
            </button>

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('admin.dashboard') }}" style="color: var(--gold); font-size: 0.9rem; text-decoration: none; font-weight: 600;">
                    ← Annuler et retourner au tableau de bord
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>