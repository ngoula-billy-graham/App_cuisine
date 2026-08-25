<x-guest-layout>
    <div style="background: var(--dark); padding: 40px; border-radius: 12px; border: 1px solid var(--border); width: 100%; max-width: 420px; box-shadow: 0 20px 40px rgba(0,0,0,0.6);">
        
        <!-- Logo et Titre -->
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="font-size: 48px; margin-bottom: 10px;">👨‍🍳</div>
            <h2 style="font-family: 'Playfair Display', serif; color: var(--gold); font-size: 32px; letter-spacing: 1px; margin: 0;">Connexion Admin</h2>
            <div class="section-divider" style="margin: 12px auto 0;"></div>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group" style="margin-bottom: 16px;">
                <label style="color: rgba(255,255,255,0.7); font-size: 0.9rem; font-weight: 600;">Adresse Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                       style="background: var(--black); border: 1px solid var(--border); color: var(--white); padding: 12px 14px; width: 100%; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.3s;">
                @error('email')
                    <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 16px;">
                <label style="color: rgba(255,255,255,0.7); font-size: 0.9rem; font-weight: 600;">Mot de passe</label>
                <input type="password" name="password" required 
                       style="background: var(--black); border: 1px solid var(--border); color: var(--white); padding: 12px 14px; width: 100%; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.3s;">
                @error('password')
                    <span style="color: #e74c3c; font-size: 0.85rem; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin: 20px 0 25px;">
                <label style="display: flex; align-items: center; gap: 8px; color: rgba(255,255,255,0.6); font-size: 0.9rem; cursor: pointer;">
                    <input type="checkbox" name="remember" style="accent-color: var(--gold);"> Se souvenir de moi
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--gold); font-size: 0.85rem; text-decoration: none; font-weight: 600;">Mot de passe oublié ?</a>
                @endif
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; text-align: center; justify-content: center; padding: 14px; font-size: 1rem; box-shadow: 0 4px 15px rgba(201, 168, 76, 0.3);">
                Se connecter
            </button>
        </form>
    </div>
</x-guest-layout>