<nav class="admin-navbar" id="admin-nav">
    <div class="logo" onclick="window.location.href='{{ route('home') }}'">
        <div class="logo-icon">👨‍🍳</div>
        <div class="logo-text">
            <div class="top">Les Chefs d'Œuvres</div>
            <div class="bottom">— Du Chef Dan —</div>
        </div>
    </div>
    <div style="display:flex;align-items:center;gap:16px;">
        <div class="admin-user">
            <div class="admin-avatar">D</div>
            <div class="admin-user-info">
                <div class="admin-name">Chef DAN</div>
                <div class="admin-role">Administrateur</div>
            </div>
        </div>
        <!-- Formulaire de déconnexion Laravel -->
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="admin-logout">⬚</button>
        </form>
    </div>
</nav>