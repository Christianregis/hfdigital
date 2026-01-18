<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact – HackFactory Platform</title>
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

    /* Hero */
    .hero { text-align: center; padding: 5rem 0 3rem; }
    .hero h1 { font-size: 2.5rem; margin-bottom: 1rem; }
    .hero p { color: var(--hf-gray); max-width: 600px; margin: 0 auto; }

    /* Contact Section */
    .contact-section { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin: 4rem 0; }
    .contact-info h2, .contact-form h2 { font-size: 1.8rem; margin-bottom: 1.5rem; }
    .info-item { display: flex; gap: 1rem; margin-bottom: 1.5rem; align-items: flex-start; }
    .info-icon { color: var(--hf-green); margin-top: 4px; }
    .form-group { margin-bottom: 1.25rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
    .form-group input, .form-group textarea {
      width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;
      font-family: inherit; font-size: 1rem;
    }
    .form-group textarea { min-height: 120px; resize: vertical; }

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
      <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1 class="fade-in">Contactez-nous</h1>
      <p class="fade-in">Une question ? Une suggestion ? Notre équipe est là pour vous répondre.</p>
    </div>
  </section>

  <!-- Contact Content -->
  <div class="container">
    <div class="contact-section">
      <div class="contact-info fade-in">
        <h2>Informations de contact</h2>
        <div class="info-item">
          <i data-feather="mail" class="info-icon"></i>
          <div>
            <strong>Email</strong><br>
            contact@hfdigital.com
          </div>
        </div>
        <div class="info-item">
          <i data-feather="phone" class="info-icon"></i>
          <div>
            <strong>Téléphone</strong><br>
            +237 xx xx xx xx
          </div>
        </div>
        <div class="info-item">
          <i data-feather="map-pin" class="info-icon"></i>
          <div>
            <strong>Siège</strong><br>
            Douala, Cameroun
          </div>
        </div>
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600" alt="Équipe HackFactory" style="border-radius: 12px; margin-top: 2rem; width: 100%;">
      </div>

      <div class="contact-form fade-in">
        <h2>Envoyez un message</h2>
        <form id="contactForm">
          <div class="form-group">
            <label for="name">Nom complet</label>
            <input type="text" id="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Envoyer</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal de confirmation -->
  <div id="confirmationModal" class="modal">
    <div class="modal-content">
      <h3>Merci !</h3>
      <p>Votre message a bien été envoyé. Nous vous répondrons très bientôt.</p>
      <button class="close-modal">Fermer</button>
    </div>
  </div>

    <!-- Footer -->
@include('layout.footer')

  <script>
    // Feather Icons
    feather.replace();

    // Animation au scroll
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('appear');
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    // Formulaire + modal
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      document.getElementById('confirmationModal').style.display = 'flex';
    });

    document.querySelector('.close-modal').addEventListener('click', function() {
      document.getElementById('confirmationModal').style.display = 'none';
    });

    window.addEventListener('click', function(e) {
      const modal = document.getElementById('confirmationModal');
      if (e.target === modal) modal.style.display = 'none';
    });
  </script>
</body>
</html>
