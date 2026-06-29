<!DOCTYPE html>
<html lang="fr">
<head>
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
  </script>
</body>
</html>
