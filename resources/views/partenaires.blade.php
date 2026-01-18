<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Partenariats – HackFactory Platform</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    /* Mêmes styles de base */

    :root {
      --hf-green: #32C66C;
      --hf-cyan: #00D1B2;
      --hf-bg: #F8FAFC;
      --hf-text: #1E293B;
      --hf-gray: #94A3B8;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', system-ui, sans-serif;
      background-color: var(--hf-bg);
      color: var(--hf-text);
      line-height: 1.6;
    }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
    header {
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .header-inner { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; }
    .logo { font-size: 1.5rem; font-weight: 700; color: var(--hf-green); text-decoration: none; }
    nav ul { display: flex; list-style: none; gap: 1.5rem; }
    nav a { text-decoration: none; color: var(--hf-text); font-weight: 600; }
    .header-actions { display: flex; gap: 1rem; align-items: center; }
    .btn { padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600; cursor: pointer; }
    .btn-outline { border: 2px solid var(--hf-green); color: var(--hf-green); background: transparent; }
    .btn-primary { background: var(--hf-green); color: white; border: none; }
    .cart-icon { position: relative; }
    .cart-count { position: absolute; top: -8px; right: -8px; background: var(--hf-green); color: white; font-size: 0.7rem; width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

    .hero { text-align: center; padding: 5rem 0 3rem; }
    .hero h1 { font-size: 2.5rem; margin-bottom: 1rem; }
    .hero p { color: var(--hf-gray); max-width: 600px; margin: 0 auto; }

    .partnership-section { margin: 4rem 0; }
    .benefits { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin: 3rem 0; }
    .benefit-card {
      background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      text-align: center; transition: transform 0.3s ease;
    }
    .benefit-card:hover { transform: translateY(-8px); }
    .benefit-icon { font-size: 2rem; color: var(--hf-green); margin-bottom: 1rem; }
    .benefit-card h3 { margin-bottom: 1rem; }
    .cta-section { background: linear-gradient(135deg, #32C66C, #00D1B2); color: white; padding: 4rem 0; text-align: center; border-radius: 16px; margin: 4rem 0; }
    .cta-section h2 { font-size: 2.2rem; margin-bottom: 1.5rem; }
    .cta-section p { max-width: 600px; margin: 0 auto 2rem; opacity: 0.9; }

    /* Footer */
.footer {
  background: var(--hf-dark);
  color: var(--hf-white);
  padding: var(--spacing-2xl) 0 var(--spacing-xl);
}
.footer__content {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--spacing-xl);
  margin-bottom: var(--spacing-xl);
}
.footer__logo {
  display: flex;
  align-items: center;
  gap: var(--spacing-sm);
  font-weight: 700;
  font-size: 1.25rem;
}
.footer__logo .logo-img {
  width: 60px;
  height: auto;
  object-fit: contain;
  display: block;
  border-radius: 30%;
}
.footer__links h3,
.footer__social h3 {
  margin-bottom: var(--spacing-md);
  font-size: 1.25rem;
}
.footer__links ul {
  list-style: none;
}
.footer__links li {
  margin-bottom: var(--spacing-sm);
}
.footer__links a {
  color: var(--hf-cyan);
  transition: var(--transition-fast);
}
.footer__links a:hover {
  color: var(--hf-lime);
}
.social-icons {
  display: flex;
  gap: var(--spacing-md);
}
.social-icons a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(255,255,255,0.1);
  transition: var(--transition-fast);
}
.social-icons a:hover {
  background: var(--hf-green);
  transform: translateY(-2px);
}
.footer__copyright {
  text-align: center;
  padding-top: var(--spacing-md);
  border-top: 1px solid rgba(255,255,255,0.1);
  opacity: 0.8;
}

/* Responsive */
@media (max-width: 1024px) {
  .mega-menu__content {
    grid-template-columns: repeat(2, 1fr);
    min-width: 600px;
  }
  .hero__title {
    font-size: 2.5rem;
  }
}

@media (max-width: 768px) {
  /* Mobile nav */
  .mobile-menu-toggle {
    display: flex;
  }
  .nav__list {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: var(--hf-white);
    flex-direction: column;
    padding: var(--spacing-md);
    box-shadow: var(--shadow-lg);
    z-index: 1000;
    border-radius: var(--radius-md);
  }
  .nav.mobile-open .nav__list {
    display: flex;
  }
  .nav__list li {
    width: 100%;
    text-align: center;
    margin: var(--spacing-sm) 0;
  }
  .nav__list a,
  .nav__dropdown button {
    display: block;
    padding: var(--spacing-sm);
    border-radius: var(--radius-sm);
  }

  /* Désactiver mega-menu sur mobile */
  .nav__dropdown:hover .mega-menu,
  .nav__dropdown:focus-within .mega-menu {
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
  }
  .nav__dropdown button {
    pointer-events: none;
    opacity: 0.7;
  }
  .nav__dropdown button::after {
    content: " (voir toutes)";
    font-size: 0.8rem;
  }

  /* Layout */
  .header .container {
    flex-wrap: wrap;
  }
  .header__actions {
    width: 100%;
    justify-content: space-between;
  }
  .courses__header {
    flex-direction: column;
    align-items: flex-start;
  }
  .courses__filters {
    width: 100%;
  }
  .hero__title {
    font-size: 2rem;
  }
  .hero__subtitle {
    font-size: 1rem;
  }
  .hero__cta {
    flex-direction: column;
    align-items: center;
  }
  .footer__content {
    grid-template-columns: 1fr;
    text-align: center;
  }
  .footer__logo,
  .footer__links,
  .footer__social {
    margin-bottom: var(--spacing-lg);
  }
  .preview-body {
    grid-template-columns: 1fr;
  }
}

    .fade-in { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease, transform 0.6s ease; }
    .fade-in.appear { opacity: 1; transform: translateY(0); }

    @media (max-width: 768px) {
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }

    :root {
  /* Palette HF officielle */
  --hf-green: #32C66C;
  --hf-dark: #0C3B55;
  --hf-cyan: #6AD7E1;
  --hf-lime: #A7E27B;
  --hf-white: #FFFFFF;
  --hf-gray: #F5F7FA;
  /* Dégradés */
  --gradient-primary: linear-gradient(90deg, var(--hf-lime), var(--hf-cyan));
  --gradient-secondary: radial-gradient(circle at 20% 30%, var(--hf-cyan), transparent);
  /* Typographie */
  --font-primary: 'Inter', sans-serif;
  --font-secondary: 'Poppins', sans-serif;
  /* Spacing */
  --spacing-xs: 0.25rem;
  --spacing-sm: 0.5rem;
  --spacing-md: 1rem;
  --spacing-lg: 1.5rem;
  --spacing-xl: 2rem;
  --spacing-2xl: 3rem;
  /* Border radius */
  --radius-sm: 4px;
  --radius-md: 8px;
  --radius-lg: 12px;
  --radius-xl: 16px;
  --radius-2xl: 20px;
  /* Shadows */
  --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
  --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
  --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
  --shadow-xl: 0 20px 25px rgba(0,0,0,0.15);
  --shadow-neon: 0 0 0 1px var(--hf-cyan), 0 0 12px rgba(106, 215, 225, 0.3);
  /* Transitions */
  --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
  --transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Reset et base */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
html {
  scroll-behavior: smooth;
  overflow-x: hidden;
}
body {
  font-family: var(--font-primary);
  line-height: 1.6;
  color: var(--hf-dark);
  background-color: var(--hf-gray);
}
h1, h2, h3, h4, h5, h6 {
  font-family: var(--font-secondary);
  font-weight: 700;
  line-height: 1.2;
}
a {
  text-decoration: none;
  color: inherit;
}

.hero {
  position: relative;
  height: 60vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  padding: 0;
}

.hero-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
}

.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.4); /* overlay sombre */
  z-index: 0;
}

.hero-content {
  position: relative;
  z-index: 1;
  text-align: center;
  color: white;
  max-width: 800px;
  padding: 0 1.5rem;
}

.hero-content h1 {
  font-size: 2.8rem;
  margin-bottom: 1rem;
  text-shadow: 0 2px 6px rgba(0,0,0,0.3);
}

.hero-content p {
  font-size: 1.2rem;
  opacity: 0.9;
  text-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

@media (max-width: 768px) {
  .hero-content h1 { font-size: 2rem; }
  .hero-content p { font-size: 1rem; }
}
  </style>
</head>
<body>

@include('layout.header')

  <section class="hero">
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="https://cdn.pixabay.com/video/2025/02/23/260397_tiny.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1 class="fade-in">Devenez partenaire</h1>
      <p class="fade-in">Collaborez avec HF Digital pour amplifier votre impact dans l’éducation numérique.</p>
    </div>
  </section>

  <div class="container partnership-section">
    <div class="fade-in">
      <h2 style="text-align: center; margin-bottom: 2rem;">Pourquoi collaborer avec nous ?</h2>
      <div class="benefits">
        <div class="benefit-card">
          <div class="benefit-icon" data-feather="users"></div>
          <h3>Communauté engagée</h3>
          <p>Accédez à plus de 10 000 apprenants passionnés et actifs.</p>
        </div>
        <div class="benefit-card">
          <div class="benefit-icon" data-feather="award"></div>
          <h3>Contenu premium</h3>
          <p>Vos marques associées à des formations de haute qualité.</p>
        </div>
        <div class="benefit-card">
          <div class="benefit-icon" data-feather="trending-up"></div>
          <h3>Visibilité accrue</h3>
          <p>Présence sur nos canaux (email, réseaux, événements).</p>
        </div>
      </div>
    </div>

    <div class="cta-section fade-in">
      <h2>Prêt à innover ensemble ?</h2>
      <p>Que vous soyez une entreprise tech, une école, ou un influenceur, parlons de ce que nous pouvons construire.</p>
      <a href="{{ route('contact') }}" class="btn btn-primary" style="background: white; color: var(--hf-green); font-weight: 700; padding: 0.75rem 2rem;">Contacter l’équipe partenariats</a>
    </div>

    <div class="fade-in" style="text-align: center; margin-top: 3rem;">
      <h3>Nos partenaires actuels</h3>
      <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem; margin-top: 2rem;">
        <img src="data:image/webp;base64,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" alt="Openclassroom" height="40">
        <img src="data:image/webp;base64,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" alt="Coursera" height="40">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/120px-Netflix_2015_logo.svg.png" alt="Netflix" height="40">
        <img src="data:image/webp;base64,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" alt="Alibaba" height="40">
      </div>
    </div>
  </div>

  <!-- Footer -->
@include('layout.footer')
  <script>
    feather.replace();
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('appear');
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
  </script>
</body>
</html>
