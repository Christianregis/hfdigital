<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>À Propos – NANA RAFF</title>
  <meta name="description" content="Découvrez l’histoire, les valeurs et l’engagement de NANA RAFF pour la santé naturelle au Cameroun et en Afrique." />
  <meta name="theme-color" content="#8CC342" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    .about-hero {
      position: relative;
      height: 50vh;
      min-height: 360px;
      border-radius: 20px;
      overflow: hidden;
      margin: 24px 0;
    }
    .about-hero .overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, rgba(18,78,6,.7), rgba(140,195,66,.45));
      mix-blend-mode: multiply;
    }
    .about-hero .content {
      position: absolute;
      inset: 0;
      display: grid;
      place-items: center;
      color: white;
      text-align: center;
      padding: 20px;
    }
    .about-section {
      padding: 40px 0;
      line-height: 1.7;
    }
    .about-section h2 {
      font-family: Montserrat, Poppins, sans-serif;
      margin: 0 0 16px;
    }
    .about-section p {
      margin: 0 0 16px;
    }
    .product-highlight {
      background: var(--card);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 24px;
      margin: 24px 0;
      display: flex;
      gap: 24px;
      align-items: center;
    }
    @media (max-width: 760px) {
      .product-highlight {
        flex-direction: column;
        text-align: center;
      }
    }
    .product-highlight img {
      width: 220px;
      max-width: 100%;
      border-radius: 14px;
      object-fit: cover;
    }
    .values-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-top: 30px;
    }
    @media (max-width: 820px) { .values-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 520px) { .values-grid { grid-template-columns: 1fr; } }
    .value-card {
      background: var(--card);
      padding: 20px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.6s forwards;
    }
    @keyframes fadeInUp {
      to { opacity: 1; transform: translateY(0); }
    }
    .value-card:nth-child(2) { animation-delay: 0.1s; }
    .value-card:nth-child(3) { animation-delay: 0.2s; }
  </style>
</head>
<body>
  <!-- Header identique à index.html -->
@include('layout.header')

  <main class="container">
    <!-- Hero -->
    <section class="about-hero">
      <div class="overlay"></div>
      <div class="content">
        <h1>À Propos de NANA RAFF</h1>
        <p>Notre histoire, nos valeurs, notre engagement.</p>
      </div>
    </section>

    <!-- Contenu principal -->
    <section class="about-section">
      <h2>Notre Mission</h2>
      <p>
        Fondée à Douala au Cameroun, <strong>NANA RAFF</strong> est une marque engagée dans la promotion de la santé naturelle, du bien-être et de la minceur durable en Afrique.
        Nous sélectionnons des ingrédients d’origine végétale, certifiés et traçables, pour vous offrir des solutions efficaces, sûres et respectueuses de votre corps.
      </p>
      <p>
        Notre mission ? Rendre accessible à tous une hygiène de vie équilibrée, grâce à des produits comme <strong>LK Saint</strong>, des conseils personnalisés et un accompagnement humain.
      </p>

      <!-- Mise en avant du produit LK Saint -->
      <div class="product-highlight">
        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Lk Saint - Laxatif végétal">
        <div>
          <h3>LK Saint – Laxatif Végétal Naturel</h3>
          <p>
            Lk Saint est un laxatif végétal préparé à partir d’écorces de graines d’Ispaghul (Plantago ovata) sous forme de poudre.
            Au contact de l’eau, la poudre gonfle, augmente le volume des selles et stimule naturellement l’activité intestinale.
          </p>
          <p><strong>Mode d’emploi :</strong> Diluer 1 cuillère à café (7g) dans un grand verre d’eau froide. Remuer et boire immédiatement. Prendre un second verre d’eau après.</p>
          <p><em>Peut être utilisé pendant la grossesse et l’allaitement. Ne pas utiliser chez les enfants de moins de 6 ans.</em></p>
        </div>
      </div>

      <h3>Nos Valeurs</h3>
      <div class="values-grid">
        <div class="value-card">
          <h4>🌿 Naturel & Transparent</h4>
          <p>Ingrédients 100 % traçables, sans additifs cachés. Étiquetage clair et honnête.</p>
        </div>
        <div class="value-card">
          <h4>🌍 Engagé en Afrique</h4>
          <p>Partenariats locaux, emballages durables, logistique éthique.</p>
        </div>
        <div class="value-card">
          <h4>💚 Santé avant tout</h4>
          <p>Nos produits sont conçus avec l’avis de professionnels de santé.</p>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
@include('layout.footer')

  <!-- Scripts -->
  <script>

    // Badge panier (copié de dynam.js)
    const cartCount = JSON.parse(localStorage.getItem('cart') || '[]').reduce((s, i) => s + i.qty, 0);
    document.getElementById('openCart').setAttribute('data-count', cartCount);
  </script>
</body>
</html>
