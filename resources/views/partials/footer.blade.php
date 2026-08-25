<footer class="footer">
  <div class="footer-grid">
    <div>
      <div class="footer-logo">
    <div class="logo" style="cursor:default;">
        <img src="{{ asset('images/chef-dan-logo.png') }}" alt="Logo Chef Dan" style="height: 80px; width: auto; border-radius: 50%;">
    </div>
</div>
      <p class="footer-desc">Chef Cuisinier Gastronomiste spécialisé en Cuisine Européenne & Africaine. 15 ans d'expérience au service de votre table.</p>
      <div class="social-links" style="margin-top:16px;">
        <a>📷</a><a>📘</a><a>🐦</a><a>💬</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Navigation</h4>
      <a href="{{ route('home') }}">Accueil</a>
      <a href="{{ route('chef') }}">Le Chef</a>
      <a href="{{ route('prestations') }}">Prestations</a>
      <a href="{{ route('formations') }}">Formations</a>
    </div>
    <div class="footer-col">
      <a href="{{ route('galerie') }}">Galerie</a>
      <a href="{{ route('boutique') }}">Boutique</a>
      <a href="{{ route('feed') }}">Blog</a>
      <a href="{{ route('contact') }}">Contact</a>
    </div>
    <div class="footer-col">
      <h4>Services</h4>
      <a>Prospection des Menus</a>
      <a>Présentation & Propositions</a>
      <a>Commercialisation</a>
      <a>Formations</a>
    </div>
    <div class="footer-col">
      <h4>Newsletter</h4>
      <p style="font-size:11px;margin-bottom:12px;">Recevez nos actualités et offres exclusives</p>
      <div class="footer-newsletter">
        <input type="email" placeholder="votre email">
        <button>S'inscrire</button>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2024 Les Chefs d'Œuvres du Chef DAN - Tous droits réservés</span>
    <span>Mentions légales · Politique de confidentialité</span>
  </div>
</footer>