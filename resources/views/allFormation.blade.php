<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HF Digital – Formations Digitales Premium</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>
  @include('layout.header')

  <!-- FORMATIONS -->
  <section class="formations">
    <h2 class="section-title" style="padding-top:40px;">Toutes nos formations </h2>
    <div class="cards" id="formationsContainer">
      @foreach($formations as $formation)
        <div class="card">
          <img src="{{ asset('images/' . $formation->imageFormation) }}" alt="{{ $formation->title }}">
          <div class="card-content">
            <h3>{{ $formation->title }}</h3>
            <p>{{ Str::limit($formation->description, 100) }}</p>
            <div class="card-meta">
              <span>🕗 {{ $formation->duration }} h</span>
              <span class="price-tag">{{ $formation->price }} fcfa</span>
            </div>

            <div style="margin-top: 1rem; margin-bottom: 1rem;">
              <strong>Modules :</strong>
              <ul style="margin: 0.5rem 0 0 1rem; color:#555;">
                @foreach($formation->chapitres->take(3) as $chapitre)
                  <li>{{ $chapitre->titre }}</li>
                @endforeach
              </ul>
            </div>

            <button class="btn-details" onclick="window.location.href='{{ route('showFormation', ['formation_id' => $formation->id]) }}'">
              Voir détails
            </button>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-final">
    <h2>Prêt à transformer ta carrière ?</h2>
    <p>Rejoins des milliers d’apprenants qui ont déjà changé leur vie grâce à HF Digital.</p>
    <button class="btn-cta-light">Commencer maintenant</button>
  </section>

  @include('layout.footer')

  <script>
    document.querySelectorAll('.faq-item').forEach(item => {
      item.addEventListener('click', () => item.classList.toggle('active'));
    });
  </script>
</body>
</html>
