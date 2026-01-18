<!DOCTYPE html>
<html lang="fr">
<head>
<<<<<<< HEAD
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>À propos – HF Digital</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    :root {
      --hf-green: #32C66C;
      --hf-cyan: #00D1B2;
      --hf-bg: #F8FAFC;
      --hf-text: #1E293B;
      --hf-gray: #94A3B8;
    }

    * {
      margin: 0; padding: 0; box-sizing: border-box;
    }

    body {
      font-family: 'Inter', system-ui, sans-serif;
      background-color: var(--hf-bg);
      color: var(--hf-text);
      line-height: 1.6;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    /* Header */
    header {
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .header-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--hf-green);
      text-decoration: none;
    }

    nav ul {
      display: flex;
      list-style: none;
      gap: 1.5rem;
    }

    nav a {
      text-decoration: none;
      color: var(--hf-text);
      font-weight: 600;
      transition: color 0.3s;
    }

    nav a:hover {
      color: var(--hf-green);
    }

    /* Hero section */
    .hero1 {
      position: relative;
      height: 65vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .hero-video {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .hero-overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    .hero-content {
      position: relative;
      z-index: 1;
      text-align: center;
      color: white;
      padding: 0 1.5rem;
      max-width: 800px;
    }

    .hero-content h1 {
      font-size: 2.8rem;
      margin-bottom: 1rem;
      text-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }

    .hero-content p {
      font-size: 1.2rem;
      opacity: 0.9;
    }

    /* About sections */
    .about-content {
      margin: 4rem 0;
    }

    .about-section {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3rem;
      align-items: center;
      margin-bottom: 4rem;
    }

    .about-text h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
      color: var(--hf-green);
    }

    .about-text p {
      margin-bottom: 1rem;
      color: var(--hf-text);
    }

    .stats {
      display: flex;
      gap: 2rem;
      margin-top: 2rem;
      flex-wrap: wrap;
    }

    .stat-item {
      text-align: center;
      flex: 1;
      min-width: 120px;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--hf-green);
    }

    .stat-label {
      color: var(--hf-gray);
    }

    /* Footer */
    footer {
      background: #0F172A;
      color: white;
      padding: 3rem 1rem 1.5rem;
      margin-top: 4rem;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      margin-bottom: 2rem;
    }

    .footer-col h3 {
      font-size: 1.25rem;
      margin-bottom: 1rem;
      color: var(--hf-green);
    }

    .footer-col ul {
      list-style: none;
    }

    .footer-col ul li {
      margin-bottom: 0.5rem;
    }

    .footer-col a {
      color: #CBD5E1;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-col a:hover {
      color: var(--hf-green);
    }

    .social-links {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .social-links a {
      color: white;
      font-size: 1.3rem;
    }

    .copyright {
      text-align: center;
      padding-top: 1.5rem;
      border-top: 1px solid #334155;
      color: #94A3B8;
      font-size: 0.9rem;
    }

    /* Animations */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-in.appear {
      opacity: 1;
      transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .hero-content h1 { font-size: 2.3rem; }
      .about-section { gap: 2rem; }
    }

    @media (max-width: 768px) {
      nav ul { display: none; } /* tu pourras remplacer par un menu burger plus tard */
      .hero { height: 50vh; }
      .hero-content h1 { font-size: 1.8rem; }
      .hero-content p { font-size: 1rem; }
      .about-section { grid-template-columns: 1fr; text-align: center; }
      .stats { flex-direction: column; align-items: center; }
      iframe, img { max-width: 100%; height: auto; }
    }
  </style>
</head>
<body>

  @include('layout.header')

  <section class="hero1">
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content fade-in">
      <h1>À propos de HF Digital</h1>
      <p>Nous formons les créateurs, développeurs et entrepreneurs de demain.</p>
    </div>
  </section>

  <div class="container about-content">
    <div class="about-section fade-in">
      <div class="about-text">
        <h2>Notre mission</h2>
        <p>HF Digital Platform a été fondée en 2022 avec une vision claire : démocratiser l’accès à des formations de qualité dans les domaines les plus innovants du numérique.</p>
        <p>Nos cours sont conçus par des professionnels en activité, avec des projets concrets, des feedbacks personnalisés et une communauté engagée.</p>
        <div class="stats">
          <div class="stat-item">
            <div class="stat-number">50+</div>
            <div class="stat-label">Formations</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">10K+</div>
            <div class="stat-label">Apprenants</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">95%</div>
            <div class="stat-label">Satisfaction</div>
          </div>
        </div>
      </div>
      <div>
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600" alt="Équipe HF Digital" style="border-radius: 12px; width: 100%;">
      </div>
    </div>

    <div class="about-section fade-in">
      <div>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/5MgBikgcWnY" title="Présentation HF Digital" frameborder="0" allowfullscreen style="border-radius: 12px;"></iframe>
      </div>
      <div class="about-text">
        <h2>Notre approche pédagogique</h2>
        <p>Nous croyons en l’apprentissage par la pratique. Chaque formation inclut :</p>
        <ul style="margin-left: 1.5rem; margin-top: 1rem;">
          <li>✅ Des projets réels à construire</li>
          <li>✅ Des corrections personnalisées</li>
          <li>✅ Un accès à vie au contenu</li>
          <li>✅ Une communauté Slack active</li>
        </ul>
        <p>Rejoignez une communauté de passionnés qui transforment leurs idées en réalité.</p>
      </div>
    </div>
  </div>

  @include('layout.footer')

  <script>
    feather.replace();
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('appear');
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
=======
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
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
  </script>
</body>
</html>
