<nav class="navbar" id="public-nav">
  <div class="logo" onclick="window.location.href='{{ route('home') }}'">
    <img src="{{ asset('images/chef-dan-logo.png') }}" alt="Logo Chef Dan" class="nav-logo-img">
</div>
  <ul class="nav-links">
    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
    <li><a href="{{ route('chef') }}" class="{{ request()->routeIs('chef') ? 'active' : '' }}">Le Chef</a></li>
    <li><a href="{{ route('prestations') }}" class="{{ request()->routeIs('prestations') ? 'active' : '' }}">Prestations</a></li>
    <li><a href="{{ route('formations') }}" class="{{ request()->routeIs('formations') ? 'active' : '' }}">Formations</a></li>
    <li><a href="{{ route('galerie') }}" class="{{ request()->routeIs('galerie') ? 'active' : '' }}">Galerie</a></li>
    <li><a href="{{ route('feed') }}" class="{{ request()->routeIs('feed') ? 'active' : '' }}">Feed Créations</a></li>
    <li><a href="{{ route('boutique') }}" class="{{ request()->routeIs('boutique') ? 'active' : '' }}">Boutique</a></li>
    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
    <li><span class="nav-search">🔍</span></li>
    <li><a class="btn-devis" href="{{ route('contact') }}">Demander un devis</a></li>
  </ul>
</nav>