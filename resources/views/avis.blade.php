<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Avis Clients – NANA RAFF</title>
  <meta name="description" content="Découvrez les témoignages authentiques de nos clients sur nos produits santé, minceur et coaching." />
  <meta name="theme-color" content="#8CC342" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    .reviews-hero {
      position: relative;
      height: 50vh;
      min-height: 360px;
      border-radius: 20px;
      overflow: hidden;
      margin: 24px 0;
    }
    .reviews-hero .overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, rgba(18,78,6,.7), rgba(140,195,66,.45));
      mix-blend-mode: multiply;
    }
    .reviews-hero .content {
      position: absolute;
      inset: 0;
      display: grid;
      place-items: center;
      color: white;
      text-align: center;
      padding: 20px;
    }
    .review-card {
      background: var(--card);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 20px;
      display: flex;
      gap: 16px;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.6s forwards;
    }
    @keyframes fadeInUp {
      to { opacity: 1; transform: translateY(0); }
    }
    .review-card:nth-child(2) { animation-delay: 0.1s; }
    .review-card:nth-child(3) { animation-delay: 0.2s; }
    .review-card:nth-child(4) { animation-delay: 0.3s; }

    .avatar {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      object-fit: cover;
      flex-shrink: 0;
    }
    .review-body h4 { margin: 0 0 6px; color: var(--black); }
    .review-body .stars { color: #f59e0b; margin: 4px 0; }
    .review-body p { color: var(--muted); line-height: 1.6; }
    .review-body small { color: var(--muted); font-size: 0.85rem; }

    /* Modal d’avis détaillé */
    .review-modal {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.6);
      z-index: 2000;
      place-items: center;
    }
    .review-modal.open { display: grid; }
    .review-modal-content {
      background: white;
      border-radius: 18px;
      max-width: 600px;
      width: 92%;
      padding: 24px;
      max-height: 80vh;
      overflow: auto;
    }
    .review-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }
    .review-modal-avatar {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      object-fit: cover;
    }
    .review-modal-header h3 { margin: 0; }
    .review-modal-header button {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Header identique à index.html -->
@include('layout.header')

  <main class="container">
    <!-- Hero -->
    <section class="reviews-hero">
      <div class="overlay"></div>
      <div class="content">
        <h1>Avis & Témoignages</h1>
        <p>Des clients réels, des résultats concrets.</p>
      </div>
    </section>

    <!-- Liste des avis -->
    <section>
      <h2>Ce que disent nos clients</h2>
      <div class="sub">Tous les avis sont publiés sans modération. Les photos sont libres de droits ou illustratives.</div>
      <div class="grid" id="reviewsGrid" style="grid-template-columns:1fr;margin-top:16px;gap:16px;"></div>
    </section>
  </main>

  <!-- Footer -->
@include('layout.footer')

  <!-- Modal détaillé -->
  <div class="review-modal" id="reviewModal">
    <div class="review-modal-content">
      <div class="review-modal-header">
        <div style="display:flex;align-items:center;gap:12px">
          <img class="review-modal-avatar" id="modalAvatar" src="" alt="Avatar">
          <div>
            <h3 id="modalName"></h3>
            <div class="stars" id="modalStars"></div>
          </div>
        </div>
        <button onclick="closeModal()">✕</button>
      </div>
      <p id="modalText"></p>
      <small id="modalDate"></small>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    // Données fictives mais réalistes + images publiques
    const mockReviews = [
      {
        name: "Amina B.",
        avatar: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=120&q=80",
        rating: 5,
        text: "Grâce au LK5 9g et au coaching personnalisé, j’ai perdu 8 kg en 2 mois sans fatigue. Mon transit est régulier, je me sens légère !",
        date: "2025-09-12",
        product: "LK5 9g"
      },
      {
        name: "Jean-Pierre M.",
        avatar: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=120&q=80",
        rating: 4,
        text: "Le shaker est solide et ne fuit pas. J’utilise la protéine vanille tous les matins. Excellent goût, pas de grumeaux.",
        date: "2025-08-28",
        product: "LK5 500g"
      },
      {
        name: "Fatou D.",
        avatar: "https://images.unsplash.com/photo-1573496359142-b8d87734a5cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=120&q=80",
        rating: 5,
        text: "J’ai repris confiance en moi après mon accouchement. Le programme minceur post-partum m’a redonné mon corps en 10 semaines. Merci !",
        date: "2025-07-19",
        product: "Coaching"
      },
      {
        name: "Thomas K.",
        avatar: "https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=120&q=80",
        rating: 5,
        text: "Lk Saint a changé ma vie digestive. Plus de ballonnements, plus de constipation. Je le prends tous les matins avec un jus de citron.",
        date: "2025-10-01",
        product: "Lk Saint"
      }
    ];

    function openModal(review) {
      document.getElementById('modalAvatar').src = review.avatar;
      document.getElementById('modalName').textContent = review.name;
      document.getElementById('modalStars').textContent = '★'.repeat(review.rating) + '☆'.repeat(5 - review.rating);
      document.getElementById('modalText').textContent = review.text;
      document.getElementById('modalDate').textContent = new Date(review.date).toLocaleDateString('fr-FR');
      document.getElementById('reviewModal').classList.add('open');
    }

    function closeModal() {
      document.getElementById('reviewModal').classList.remove('open');
    }

    // Générer les cartes
    const grid = document.getElementById('reviewsGrid');
    mockReviews.forEach(review => {
      const card = document.createElement('div');
      card.className = 'review-card';
      card.innerHTML = `
        <img class="avatar" src="${review.avatar}" alt="${review.name}">
        <div class="review-body">
          <h4>${review.name}</h4>
          <div class="stars">${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</div>
          <p>${review.text.substring(0, 120)}…</p>
          <small>${new Date(review.date).toLocaleDateString('fr-FR')} • ${review.product}</small>
        </div>
      `;
      card.style.cursor = 'pointer';
      card.onclick = () => openModal(review);
      grid.appendChild(card);
    });

    // Année dynamique

    // Badge panier (copié de dynam.js)
    const cartCount = JSON.parse(localStorage.getItem('cart') || '[]').reduce((s, i) => s + i.qty, 0);
    document.getElementById('openCart').setAttribute('data-count', cartCount);
  </script>
</body>
</html>
