<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $formation->title }}</title>
  <meta name="description" content="HF Digital – Plateforme de formation digitale interactive pour les jeunes entrepreneurs africains." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <style>
    :root {
      --hf-green: #32C66C;
      --hf-dark: #0C3B55;
      --hf-cyan: #6AD7E1;
      --hf-lime: #A7E27B;
      --hf-white: #FFFFFF;
      --hf-gray: #e1eaf8;
      --shadow: 0 6px 20px rgba(12, 59, 85, 0.12);
      --shadow-glow: 0 0 12px rgba(106, 215, 225, 0.4);
      --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--hf-gray);
      color: var(--hf-dark);
      overflow-x: hidden;
    }

    /* Navbar */
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.2rem 2.5rem;
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(106, 215, 225, 0.2);
      z-index: 1000;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-weight: 800;
      font-size: 1.6rem;
      background: linear-gradient(to right, var(--hf-dark), var(--hf-cyan));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .logo-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, var(--hf-green), var(--hf-cyan));
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      font-size: 1.1rem;
    }

    .nav-links {
      display: flex;
      gap: 1.8rem;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--hf-dark);
      font-weight: 600;
      position: relative;
      padding-bottom: 4px;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--hf-green);
      transition: var(--transition);
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .auth-buttons {
      display: flex;
      gap: 1rem;
    }

    .btn-outline {
      background: transparent;
      border: 2px solid var(--hf-dark);
      color: var(--hf-dark);
      padding: 0.5rem 1.25rem;
      border-radius: 50px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }

    .btn-outline:hover {
      background: var(--hf-dark);
      color: var(--hf-white);
    }

    .cart-icon {
      font-size: 1.4rem;
      margin-left: 1rem;
      cursor: pointer;
      color: var(--hf-dark);
      transition: var(--transition);
    }

    .cart-icon:hover {
      color: var(--hf-green);
      transform: scale(1.1);
    }
    /* Banner */
    .banner {
      display: flex;
      align-items: center;
      padding: 5rem 2.5rem;
      max-width: 1400px;
      margin: 0 auto;
      gap: 3rem;
    }

    .banner-content {
      flex: 1;
    }

    .banner-badge {
      display: inline-block;
      background: var(--hf-green);
      color: white;
      padding: 0.3rem 0.8rem;
      border-radius: 50px;
      font-size: 0.9rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .banner h1 {
      font-size: 2.8rem;
      margin-bottom: 1.2rem;
      line-height: 1.2;
    }

    .banner p {
      font-size: 1.15rem;
      margin-bottom: 2rem;
      color: #444;
      line-height: 1.6;
    }

    .badges {
      display: flex;
      gap: 1.2rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .badge {
      background: white;
      padding: 0.6rem 1.2rem;
      border-radius: 50px;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      box-shadow: var(--shadow);
      font-weight: 600;
      color: var(--hf-dark);
    }

    .btn-join {
      background: var(--hf-green);
      color: white;
      border: none;
      padding: 0.9rem 2.2rem;
      border-radius: 50px;
      font-size: 1.15rem;
      font-weight: 700;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: var(--shadow);
    }

    .btn-join:hover {
      background: #28a755;
      transform: translateY(-3px);
      box-shadow: var(--shadow-glow);
    }

    .banner-image {
      flex: 1;
      text-align: center;
    }

    .banner-image img {
        position: relative;
      max-width: 100%;
      border-radius: 20px;
      box-shadow: var(--shadow);
      top: 60px;
    }

    /* Section About */
    .section {
      padding: 5rem 2.5rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .section-title {
      font-size: 2.2rem;
      margin-bottom: 2rem;
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 60px;
      height: 4px;
      background: var(--hf-green);
      border-radius: 2px;
    }

    .about-content {
      display: flex;
      gap: 3rem;
      align-items: center;
    }

    .about-text {
      flex: 1;
      font-size: 1.1rem;
      line-height: 1.7;
      color: #444;
    }

    .about-image {
      flex: 1;
      text-align: center;
    }

    .about-image img {
      max-width: 100%;
      border-radius: 16px;
      box-shadow: var(--shadow);
      transform: rotate(-2deg);
      transition: var(--transition);
    }

    .about-image img:hover {
      transform: rotate(0);
    }

    /* Learn Section */
    .learn-list {
      margin: 2.5rem 0;
    }

    .learn-item {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      margin-bottom: 1.2rem;
      font-size: 1.05rem;
      line-height: 1.6;
    }

    .learn-icon {
      color: var(--hf-green);
      font-size: 1.4rem;
      margin-top: 0.2rem;
    }

    /* Program Section */
    .accordion {
      margin-top: 2rem;
    }

    .accordion-item {
      margin-bottom: 1rem;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: var(--shadow);
      background: white;
    }

    .accordion-header {
      padding: 1.2rem 1.5rem;
      background: white;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 700;
      font-size: 1.15rem;
      transition: var(--transition);
    }

    .accordion-header:hover {
      color: var(--hf-green);
    }

    .accordion-header.active {
      color: var(--hf-cyan);
      box-shadow: inset 0 -2px 0 var(--hf-cyan);
    }

    .accordion-content {
      padding: 0 1.5rem;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease, padding 0.4s ease;
      background: white;
    }

    .accordion-content.show {
      padding: 1.5rem;
      max-height: 500px;
    }

    .accordion-content p {
      margin-bottom: 1rem;
      color: #555;
      line-height: 1.6;
    }

    .accordion-video {
      width: 100%;
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 1rem;
    }

    /* Pricing */
    .pricing-box {
      background: white;
      border-radius: 20px;
      padding: 2.5rem;
      text-align: center;
      max-width: 600px;
      margin: 4rem auto;
      box-shadow: var(--shadow);
      border: 2px solid var(--hf-cyan);
    }

    .pricing-title {
      font-size: 1.8rem;
      margin-bottom: 1.2rem;
      color: var(--hf-dark);
    }

    .price {
      font-size: 2.2rem;
      font-weight: 800;
      color: var(--hf-green);
      margin: 1rem 0;
    }

    .free-note {
      color: #666;
      margin: 1rem 0;
      font-style: italic;
    }

    .btn-join-hf {
      background: var(--hf-cyan);
      color: var(--hf-dark);
      border: none;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-weight: 700;
      font-size: 1.15rem;
      cursor: pointer;
      transition: var(--transition);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 0 0 rgba(106, 215, 225, 0.4); }
      70% { box-shadow: 0 0 0 12px rgba(106, 215, 225, 0); }
      100% { box-shadow: 0 0 0 0 rgba(106, 215, 225, 0); }
    }

    /* Footer */
    .footer {
      background: var(--hf-dark);
      color: white;
      padding: 3rem 2rem 2rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      margin-bottom: 2rem;
    }

    .footer h3 {
      margin-bottom: 1.2rem;
      font-size: 1.3rem;
    }

    .footer ul {
      list-style: none;
    }

    .footer ul li {
      margin-bottom: 0.7rem;
    }

    .footer a {
      color: #a0d0e0;
      text-decoration: none;
      transition: var(--transition);
    }

    .footer a:hover {
      color: var(--hf-cyan);
    }

    .social-icons {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .social-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255,255,255,0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-decoration: none;
      transition: var(--transition);
    }

    .social-icon:hover {
      background: var(--hf-cyan);
      transform: translateY(-3px);
    }

    .copyright {
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid rgba(255,255,255,0.1);
      color: #a0d0e0;
      font-size: 0.9rem;
    }

    /* Animations */
    .fade-up {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-up.appear {
      opacity: 1;
      transform: translateY(0);
    }

    .fade-left {
      opacity: 0;
      transform: translateX(-40px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-left.appear {
      opacity: 1;
      transform: translateX(0);
    }

    /* Responsive */
    @media (max-width: 992px) {
      .banner, .about-content {
        flex-direction: column;
        text-align: center;
      }

      .badges, .banner-content, .about-text {
        text-align: center;
      }

      .badges {
        justify-content: center;
      }

      .banner h1 {
        font-size: 2.3rem;
      }
    }

    @media (max-width: 768px) {
      header {
        padding: 1rem;
      }

      nav ul {
        display: none;
      }

      .banner, .section {
        padding: 3rem 1.5rem;
      }

      .banner h1 {
        font-size: 2rem;
      }

      .btn-join, .btn-join-hf {
        width: 100%;
      }
    }

    /* Modals */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(12, 59, 85, 0.85);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 2000;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.4s ease;
    }

    .modal-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    .modal {
      background: white;
      width: 90%;
      max-width: 450px;
      border-radius: 20px;
      padding: 2.5rem;
      position: relative;
      transform: scale(0.9);
      transition: transform 0.4s ease;
    }

    .modal-overlay.active .modal {
      transform: scale(1);
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .modal h2 {
      font-size: 1.6rem;
      color: var(--hf-dark);
    }

    .close-modal {
      font-size: 1.8rem;
      cursor: pointer;
      color: #999;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: var(--hf-dark);
    }

    .form-group input {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 1rem;
    }

    .btn-modal {
      width: 100%;
      padding: 0.9rem;
      background: var(--hf-green);
      color: white;
      border: none;
      border-radius: 10px;
      font-weight: 700;
      cursor: pointer;
      margin-top: 0.5rem;
    }

    .switch-form {
      text-align: center;
      margin-top: 1.2rem;
      color: #666;
    }

    .switch-form a {
      color: var(--hf-green);
      text-decoration: none;
      font-weight: 600;
      cursor: pointer;
    }

    /* Animations */
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-in.appear {
      opacity: 1;
      transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
      }

      .hero h1 {
        font-size: 2.2rem;
      }

      .hero p {
        font-size: 1.1rem;
      }

      .auth-buttons {
        gap: 0.5rem;
      }

      .btn-outline {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
@include('layout.header')

  <!-- Banner -->
  <section class="banner fade-up" style="margin-top: 10px;">
    <div class="banner-content">
      <span class="banner-badge">FORMATION</span>
      <h1>{{ $formation->title }}</h1>
      <p>{{ $formation->description }}</p>
      <div class="badges">
        <div class="badge">⏱️ Durée : {{ $formation->duration }} heures</div>
        <div class="badge">📚 {{ $formation->nbreModule }} Modules</div>
        <div class="badge">{{ $formation->price }} FCFA</div>
        <div class="badge">⚡ Accès immédiat</div>
      </div>
<style>

  .contact-btn {
    background-color: var(--hf-cyan);
    color: var(--hf-dark);
    border: none;
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  .contact-btn:hover {
    background-color: var(--hf-green);
    color: white;
  }

  /* Modal */
  .modal {
    display: none;
    position: fixed;
    z-index: 20;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.5);
    justify-content: center; align-items: center;
    animation: fadeIn 0.4s ease;
  }

  .modal-content {
    background-color: var(--hf-white);
    padding: 25px 20px;
    border-radius: 15px;
    width: 90%;
    max-width: 400px;
    position: relative;
    animation: slideUp 0.5s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  }

  .modal h2 {
    margin-bottom: 10px;
    color: var(--hf-green);
  }

  .modal p {
    font-size: 15px;
    color: #555;
    margin-bottom: 25px;
  }

  .modal-icons {
    display: flex;
    justify-content: center;
    gap: 30px;
  }

  .icon-link {
    text-decoration: none;
    color: var(--hf-dark);
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.2s ease;
  }

  .icon-link:hover {
    transform: scale(1.1);
  }

  .icon-link i {
    font-size: 45px;
    margin-bottom: 8px;
  }

  .close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 22px;
    cursor: pointer;
    color: #777;
  }

  @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
  @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
</style>

<!-- Bouton d'ouverture -->
<button id="openContactModal" class="contact-btn">Contacter le gérant</button>

<!-- Modal -->
<div class="modal" id="contactModal">
  <div class="modal-content">
    <span class="close" id="closeContactModal">&times;</span>
    <h2>Contacter le gérant</h2>
    <p>Veuillez choisir un moyen de contact :</p>
    <div class="modal-icons">
      <!-- Lien WhatsApp -->
      <a href="https://wa.me/237620660692" target="_blank" class="icon-link" title="Contacter via WhatsApp">
        <i class="fab fa-whatsapp" style="color: #25D366;"></i>
        <span>WhatsApp</span>
      </a>

      <!-- Lien Gmail -->
      <a href="mailto:hfdigital.com" class="icon-link" title="Envoyer un mail">
        <i class="fas fa-envelope" style="color: #D44638;"></i>
        <span>Gmail</span>
      </a>
    </div>
  </div>
</div>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
  const modal = document.getElementById('contactModal');
  const openBtn2 = document.getElementById('openContactModal');
  const closeBtn = document.getElementById('closeContactModal');

  openBtn2.addEventListener('click', () => modal.style.display = 'flex');
  closeBtn.addEventListener('click', () => modal.style.display = 'none');
  window.addEventListener('click', e => { if(e.target == modal) modal.style.display = 'none'; });
</script>

    </div>
    <div class="banner-image">
      <img src="{{ asset('images/'.$formation->imageFormation) }}" alt="Formation">
    </div>
  </section>

  <!-- À propos -->
  <section class="section fade-up">
    <h2 class="section-title">À propos de cette formation</h2>
    <div class="about-content">
      <div class="about-text">
        <p>{{ $formation->aproposFormation }}</p>
      </div>
      <div class="about-image">
        <img src="{{ asset('images/'.$formation->imageApropos) }}" alt="Apprentissage">
      </div>
    </div>
  </section>

  <!-- Qu’allez-vous apprendre ? -->
  <section class="section fade-left">
    <h2 class="section-title">Qu’allez-vous apprendre ?</h2>
    <div class="learn-list">
      <div class="learn-item">
        <span class="learn-icon">✅</span>
        <span>{{ $formation->apprentissage1 }}</span>
      </div>
      <div class="learn-item">
        <span class="learn-icon">✅</span>
        <span>{{ $formation->apprentissage2 }}</span>
      </div>
      <div class="learn-item">
        <span class="learn-icon">✅</span>
        <span>{{ $formation->apprentissage3 }}</span>
      </div>
      <div class="learn-item">
        <span class="learn-icon">✅</span>
        <span>{{ $formation->apprentissage4 }}</span>
      </div>
    <div style="text-align: center; margin-top: 2rem;">
      <button class="btn-join">Commander Maintenant 🛒</button>
    </div>
  </section>

  <!-- Programme -->
  <section class="section fade-up">
    <h2 class="section-title">Parcourez le programme de cette formation !</h2>
    <div class="accordion" id="programAccordion">
      <!-- Chapitres générés en JS -->
    </div>
  </section>

  <!-- Prix -->
  <section class="section">
    <div class="pricing-box fade-up">
      <h3 class="pricing-title">{{ $formation->title }}</h3>
      <p>⏱️ {{ $formation->duration }} heures • 📚 {{ $formation->nbreModule }} Modules • ⚡ Accès immédiat</p>
      <div class="price">{{ $formation->price }} FCFA</div>
      <p class="free-note">Cette formation n'attend plus que vous.</p>
      <button class="btn-join-hf">Commander Maintenant 🛒</button>
    </div>
  </section>

  <!-- Footer -->
@include('layout.footer')

  <!-- Modal Inscription -->
  <div class="modal-overlay" id="registerModal">
    <div class="modal">
      <div class="modal-header">
        <h2>S'inscrire</h2>
        <span class="close-modal" id="closeRegister">&times;</span>
      </div>
      <form>
        <div class="form-group">
          <label for="name">Nom complet</label>
          <input type="text" id="name" required>
        </div>
        <div class="form-group">
          <label for="regEmail">Email</label>
          <input type="email" id="regEmail" required>
        </div>
        <div class="form-group">
          <label for="regPassword">Mot de passe</label>
          <input type="password" id="regPassword" required>
        </div>
        <button type="submit" class="btn-modal">Créer mon compte</button>
      </form>
      <div class="switch-form">
        Déjà inscrit ? <a id="switchToLogin">Se connecter</a>
      </div>
    </div>
  </div>


  <script>
    // Programme de la formation
    const chapters = [
        @php
            $s=1
        @endphp
        @foreach ($formation->chapitres as $chapter)

            {
                title: "Chapitre {{ $s }} : {{ $chapter->titre }}",
                desc: "{{ $chapter->description }}",
            },
            @php
                $s=$s+1
            @endphp
        @endforeach
    ];

    // Génération des accordéons
    const accordionContainer = document.getElementById('programAccordion');
    chapters.forEach((chap, index) => {
      const item = document.createElement('div');
      item.className = 'accordion-item';
      item.innerHTML = `
        <div class="accordion-header" data-index="${index}">
          ${chap.title}
          <span>▼</span>
        </div>
        <div class="accordion-content">
          <p>${chap.desc}</p>
        </div>
      `;
      accordionContainer.appendChild(item);
    });

    // Toggle accordéon
    document.querySelectorAll('.accordion-header').forEach(header => {
      header.addEventListener('click', () => {
        const content = header.nextElementSibling;
        const isActive = header.classList.contains('active');

        // Fermer tous
        document.querySelectorAll('.accordion-header').forEach(h => h.classList.remove('active'));
        document.querySelectorAll('.accordion-content').forEach(c => c.classList.remove('show'));

        // Ouvrir celui cliqué
        if (!isActive) {
          header.classList.add('active');
          content.classList.add('show');
        }
      });
    });

    // Scroll animations
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('appear');
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-up, .fade-left').forEach(el => observer.observe(el));

    // Modals
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const btnLogin = document.getElementById('btnLogin');
    const btnRegister = document.getElementById('btnRegister');
    const closeLogin = document.getElementById('closeLogin');
    const closeRegister = document.getElementById('closeRegister');
    const switchToRegister = document.getElementById('switchToRegister');
    const switchToLogin = document.getElementById('switchToLogin');

    btnLogin.onclick = () => loginModal.classList.add('active');
    btnRegister.onclick = () => registerModal.classList.add('active');
    closeLogin.onclick = () => loginModal.classList.remove('active');
    closeRegister.onclick = () => registerModal.classList.remove('active');
    switchToRegister.onclick = () => {
        loginModal.classList.remove('active');
        registerModal.classList.add('active');
    };
    switchToLogin.onclick = () => {
        registerModal.classList.remove('active');
        loginModal.classList.add('active');
    };

    // Fermer en cliquant dehors
    window.onclick = (e) => {
        if (e.target === loginModal) loginModal.classList.remove('active');
        if (e.target === registerModal) registerModal.classList.remove('active');
    };
  </script>
</body>
</html>
