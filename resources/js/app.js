// Définition de la fonction de filtrage (accessible partout)
function filterPosts() {
    const searchInput = document.getElementById('feed-search-input');
    const posts = document.querySelectorAll('.creation-card');
    const activeCategory = document.querySelector('.filter-btn.active')?.dataset.category || 'all';
    const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

    posts.forEach(post => {
        let postCategory = post.dataset.category || '';
        const normalize = (str) => str ? str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase() : '';
        const categoryMatch = (activeCategory === 'all') || (normalize(postCategory) === normalize(activeCategory));
        const titleMatch = post.querySelector('h3')?.textContent.toLowerCase().includes(searchTerm);
        post.style.display = (categoryMatch && titleMatch) ? 'block' : 'none';
    });
}

// === SLIDER DU HÉROS + INTERACTIONS DU FEED ===
document.addEventListener('DOMContentLoaded', function() {
    
    // --- 1. Slider du héros ---
    const heroImages = document.querySelectorAll('.hero-image');
    let currentHeroIndex = 0;
    if (heroImages.length > 0) {
        heroImages[0].classList.add('active');
        setInterval(() => {
            heroImages[currentHeroIndex].classList.remove('active');
            currentHeroIndex = (currentHeroIndex + 1) % heroImages.length;
            heroImages[currentHeroIndex].classList.add('active');
        }, 4000);
    }

    // --- 2. Feed interactions ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const searchInput = document.getElementById('feed-search-input');
    const posts = document.querySelectorAll('.creation-card');

    // Si on n'est pas sur la page Feed, on arrête tout
    if (posts.length === 0) return;

    // Appliquer le filtre au chargement
    filterPosts();

    // Événements des boutons de filtre
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterPosts();
        });
    });

    // Événement de la barre de recherche
    if (searchInput) {
        searchInput.addEventListener('keyup', filterPosts);
    }

    // Système de Likes
    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const postId = this.dataset.postId;
            const url = `/posts/${postId}/like`;
            const counter = this.querySelector('.like-count');

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                counter.textContent = data.likes;
            })
            .catch(error => console.error('Erreur like:', error));
        });
    });
});

// --- Module B : Charger plus de créations ---
const loadMoreBtn = document.getElementById('load-more-btn');
const feedContainer = document.getElementById('feed-grid-container');

if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function() {
        const currentBtn = this;
        const nextPage = currentBtn.dataset.nextPage;
        const lastPage = currentBtn.dataset.lastPage;

        currentBtn.textContent = 'Chargement...';
        currentBtn.disabled = true;

        fetch(`/feed/load-more?page=${nextPage}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            if (html.trim() === '') {
                currentBtn.textContent = 'Plus aucune création';
                return;
            }
            feedContainer.insertAdjacentHTML('beforeend', html);
            currentBtn.dataset.nextPage = parseInt(nextPage) + 1;
            currentBtn.textContent = 'Charger plus de créations';
            currentBtn.disabled = false;

            if (parseInt(nextPage) >= parseInt(lastPage)) {
                currentBtn.style.display = 'none';
            }

            // Réappliquer le filtre sur les nouvelles cartes
            filterPosts(); // Maintenant cette fonction est globale
        })
        .catch(error => {
            console.error('Erreur lors du chargement :', error);
            currentBtn.textContent = 'Erreur. Réessayer';
            currentBtn.disabled = false;
        });
    });
}

// --- Module C : Filtrage de la boutique ---
const boutiqueFilterBtns = document.querySelectorAll('.boutique-filter-btn');
const boutiqueCards = document.querySelectorAll('.boutique-card');

if (boutiqueFilterBtns.length > 0) {
    boutiqueFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            boutiqueFilterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const category = this.dataset.category;
            boutiqueCards.forEach(card => {
                const cardCategory = card.dataset.category;
                card.style.display = (category === 'all' || cardCategory === category) ? 'block' : 'none';
            });
        });
    });
}