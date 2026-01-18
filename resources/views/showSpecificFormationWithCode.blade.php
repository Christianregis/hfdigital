<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $formation->title }}</title>
  <meta name="description" content="HF Digital – Formation interactive pour entrepreneurs africains." />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <style>
    /* === Variables et base === */
    :root {
      --hf-green: #32C66C;
      --hf-dark: #0C3B55;
      --hf-cyan: #6AD7E1;
      --hf-gray: #e1eaf8;
      --shadow: 0 6px 20px rgba(12, 59, 85, 0.12);
      --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--hf-gray);
      color: var(--hf-dark);
      margin: 0;
      padding: 0;
    }

    /* === Navbar === */
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(106,215,225,0.2);
      padding: 1rem 2rem;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
      font-weight: 800;
      font-size: 1.5rem;
      background: linear-gradient(to right, var(--hf-dark), var(--hf-cyan));
      -webkit-background-clip: text;
      color: transparent;
    }

    /* === Bannière === */
    .banner {
      display: flex;
      align-items: center;
      padding: 6rem 2.5rem 4rem;
      max-width: 1200px;
      margin: 0 auto;
      gap: 2rem;
    }

    .banner-content { flex: 1; }
    .banner-badge {
      background: var(--hf-green);
      color: white;
      padding: 0.3rem 0.8rem;
      border-radius: 50px;
      font-size: 0.9rem;
      font-weight: 700;
    }
    .banner h1 { font-size: 2.6rem; margin: 1rem 0; }
    .banner p { font-size: 1.1rem; color: #444; }

    .banner-image {
      flex: 1;
      text-align: center;
    }

    .banner-image img {
      max-width: 100%;
      border-radius: 16px;
      box-shadow: var(--shadow);
    }

    .badges {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 1.2rem;
    }

    .badge {
      background: white;
      padding: 0.6rem 1.2rem;
      border-radius: 50px;
      box-shadow: var(--shadow);
      font-weight: 600;
      color: var(--hf-dark);
    }

    /* === Section === */
    .section {
      padding: 4rem 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .section-title {
      font-size: 2rem;
      margin-bottom: 2rem;
      position: relative;
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

    /* === Accordéon (programme) === */
    .accordion-item {
      margin-bottom: 1rem;
      background: white;
      border-radius: 12px;
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    .accordion-header {
      padding: 1rem 1.5rem;
      font-weight: 700;
      font-size: 1.1rem;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      transition: var(--transition);
    }

    .accordion-header:hover {
      color: var(--hf-green);
    }

    .accordion-content {
      max-height: 0;
      overflow: hidden;
      background: white;
      transition: max-height 0.4s ease, padding 0.4s ease;
    }

    .accordion-content.show {
      padding: 1.5rem;
      max-height: 1500px;
    }

    .accordion-content p {
      margin-bottom: 1rem;
      color: #555;
      line-height: 1.6;
    }

    /* === Vidéos === */
    .video-container {
      margin: 1rem 0;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1rem;
    }

    .video-frame {
      position: relative;
      width: 100%;
      padding-top: 56.25%; /* 16:9 ratio */
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--shadow);
    }

    .video-frame iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: none;
    }

    /* === Responsive === */
    @media (max-width: 768px) {
      .banner { flex-direction: column; text-align: center; }
    }
  </style>
</head>
<body>

@include('layout.header')

<!-- Bannière -->
<section class="banner">
  <div class="banner-content">
    <span class="banner-badge">FORMATION</span>
    <h1>{{ $formation->title }}</h1>
    <p>{{ $formation->description }}</p>
    <div class="badges">
      <div class="badge">⏱️ {{ $formation->duration }} heures</div>
      <div class="badge">📚 {{ $formation->nbreModule }} Modules</div>
      <div class="badge">⚡ Accès illimité</div>
    </div>
  </div>
  <div class="banner-image">
    <img src="{{ asset('images/'.$formation->imageFormation) }}" alt="{{ $formation->title }}">
  </div>
</section>

<!-- À propos -->
<section class="section">
  <h2 class="section-title">À propos de cette formation</h2>
  <div class="about-content" style="display:flex; gap:2rem; align-items:center;">
    <div style="flex:1;">
      <p>{{ $formation->aproposFormation }}</p>
    </div>
    <div style="flex:1; text-align:center;">
      <img src="{{ asset('images/'.$formation->imageApropos) }}" alt="Apprentissage" style="width:100%; border-radius:12px; box-shadow:var(--shadow);">
    </div>
  </div>
</section>

<!-- Programme -->
<section class="section">
  <h2 class="section-title">Contenu de la formation</h2>
  <div class="accordion" id="programAccordion">
    @foreach ($formation->chapitres as $index => $chapitre)
      <div class="accordion-item">
        <div class="accordion-header">
          <span>Chapitre {{ $index + 1 }} : {{ $chapitre->titre }}</span>
          <span>▼</span>
        </div>
        <div class="accordion-content">
          <p>{{ $chapitre->description }}</p>

          @if($chapitre->videos && $chapitre->videos->count() > 0)
            <div class="video-container">
              @foreach ($chapitre->videos as $video)
              @php
                  $embedUrl = str_replace("watch?v=", "embed/", $video->url);
              @endphp
                <div class="video-frame">
                  <iframe src="{{ $embedUrl }}" allowfullscreen></iframe>
                </div>
              @endforeach
            </div>
          @else
            <p style="color:#888;font-style:italic;">Aucune vidéo disponible pour ce chapitre.</p>
          @endif
        </div>
      </div>
    @endforeach
  </div>
</section>

@include('layout.footer')

<script>
  // Accordéon toggle
  document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const content = header.nextElementSibling;
      const isActive = content.classList.contains('show');

      document.querySelectorAll('.accordion-content').forEach(c => c.classList.remove('show'));

      if (!isActive) content.classList.add('show');
    });
  });
</script>
</body>
</html>
