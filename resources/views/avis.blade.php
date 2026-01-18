<!DOCTYPE html>
<html lang="fr">
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis – HF Digital</title>
    <style>
        :root {
            --hf-green: #32C66C;
            --hf-dark: #0C3B55;
            --hf-cyan: #6AD7E1;
            --hf-lime: #A7E27B;
            --hf-white: #FFFFFF;
            --hf-gray: #F5F7FA;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: var(--hf-gray);
            color: var(--hf-dark);
        }

        h1 {
            text-align: center;
            color: var(--hf-green);
            margin: 40px 15px 20px;
            animation: slideDown 1s ease forwards;
            font-size: clamp(1.6rem, 3vw, 2rem);
        }

        .avis-container {
            width: 95%;
            max-width: 900px;
            margin: 0 auto 60px;
            background-color: var(--hf-white);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease forwards;
        }

        .btn {
            background-color: var(--hf-cyan);
            color: var(--hf-dark);
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
            width: 100%;
            max-width: 250px;
            margin: 10px auto;
            display: block;
        }

        .btn:hover {
            background-color: var(--hf-green);
            color: var(--hf-white);
        }

        .sort-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 15px;
            font-size: 14px;
            color: var(--hf-dark);
            gap: 8px;
        }

        .sort-container select {
            padding: 6px 10px;
            border-radius: 8px;
            border: 1px solid var(--hf-gray);
            font-size: 14px;
            flex-shrink: 0;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.4s ease;
            padding: 10px;
        }

        .modal-content {
            background-color: var(--hf-white);
            padding: 25px;
            border-radius: 15px;
            width: 100%;
            max-width: 450px;
            position: relative;
            animation: slideUp 0.4s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: var(--hf-dark);
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid var(--hf-gray);
            font-size: 16px;
            background-color: #fafafa;
        }

        .stars {
            display: flex;
            margin-bottom: 10px;
            justify-content: center;
        }

        .stars span {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }

        .stars span.hover,
        .stars span.selected {
            color: var(--hf-lime);
        }

        .avis-list {
            margin-top: 20px;
        }

        .avis-item {
            background-color: var(--hf-gray);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            animation: fadeInUp 0.5s ease forwards;
            position: relative;
        }

        @media (min-width: 600px) {
            .avis-item {
                flex-direction: row;
            }
        }

        .avis-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            flex-shrink: 0;
            align-self: center;
        }

        .avis-content {
            flex: 1;
        }

        .avis-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
            gap: 5px;
        }

        .avis-name {
            font-weight: bold;
            font-size: 1rem;
        }

        .avis-date {
            font-size: 12px;
            color: #555;
        }

        .avis-message {
            margin-top: 5px;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    @include('layout.header_customer')

    <h1 style="margin-top: 150px;">Vos Avis sur HF Digital</h1>

    <div class="avis-container">
        <button class="btn" id="openModalBtn1">Poster un avis</button>

        <div class="sort-container">
            Trier par :
            <select id="sortSelect">
                <option value="date-desc">Date décroissante</option>
                <option value="date-asc">Date croissante</option>
                <option value="rating-desc">Note décroissante</option>
                <option value="rating-asc">Note croissante</option>
            </select>
        </div>

        <div class="avis-list" id="avisList"></div>
    </div>

    <!-- Modal -->
    <div class="modal" id="avisModal">
        <form action="{{ route('avis.submitAvis', ['slug' => $user->slug]) }}" method="POST">
            @csrf
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2 style="text-align:center; color:var(--hf-green); margin-bottom:15px;">Poster un avis</h2>

                <div class="stars" id="stars">
                    <select name="star" style="font-size: 30px; border:none; background:transparent; cursor:pointer;">
                        <option value="1">&#9733;</option>
                        <option value="2">&#9733;&#9733;</option>
                        <option value="3">&#9733;&#9733;&#9733;</option>
                        <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                        <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                    </select>
                </div>

                <input type="text" id="name" placeholder="Votre nom" name="name">
                <textarea id="message" rows="4" placeholder="Votre avis" name="description"></textarea>
                <button class="btn" id="submitAvis" type="submit">Envoyer</button>
            </div>
        </form>
    </div>

    @include('layout.footer')

    <script>
        const modal = document.getElementById('avisModal');
        const openBtn1 = document.getElementById('openModalBtn1');
        const closeBtn = document.getElementById('closeModal');
        const submitBtn = document.getElementById('submitAvis');
        const avisList = document.getElementById('avisList');
        const sortSelect = document.getElementById('sortSelect');
        let avisArray = [];

        openBtn1.addEventListener('click', () => modal.style.display = 'flex');
        closeBtn.addEventListener('click', () => modal.style.display = 'none');
        window.addEventListener('click', e => { if (e.target === modal) modal.style.display = 'none'; });

        function randomAvatar() {
            const avatars = [
                'https://i.pravatar.cc/60?img=1',
                'https://i.pravatar.cc/60?img=2',
                'https://i.pravatar.cc/60?img=3',
                'https://i.pravatar.cc/60?img=4',
                'https://i.pravatar.cc/60?img=5'
            ];
            return avatars[Math.floor(Math.random() * avatars.length)];
        }

        function renderAvis() {
            avisList.innerHTML = '';
            avisArray.forEach((avis) => {
                avisList.innerHTML += `
                    <div class="avis-item">
                        <img class="avis-avatar" src="${avis.avatar}" alt="Avatar">
                        <div class="avis-content">
                            <div class="avis-header">
                                <span class="avis-name">${avis.name}</span>
                                <span class="avis-date">${avis.date}</span>
                            </div>
                            <div class="avis-message">${'★'.repeat(avis.rating)}${'☆'.repeat(5 - avis.rating)}<br>${avis.message}</div>
                        </div>
                    </div>`;
            });
        }

        submitBtn.addEventListener('click', e => {
            const name = document.getElementById('name').value.trim();
            const message = document.getElementById('message').value.trim();
            const rating = document.querySelector('[name="star"]').value;
            if (!name || !message || !rating) {
                alert('Veuillez remplir tous les champs.');
                e.preventDefault();
                return;
            }
            const now = new Date();
            const dateStr = now.toLocaleDateString() + ' ' + now.toLocaleTimeString();
            avisArray.push({ name, message, rating: parseInt(rating), date: dateStr, avatar: randomAvatar() });
            renderAvis();
        });
    </script>
</body>

=======
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
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
</html>
