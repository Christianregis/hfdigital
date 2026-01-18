<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HF Digital – Formations Digitales Premium</title>
</head>

<body>

    @include('layout.header_customer')

    <!-- Hero -->
    <section class="hero fade-in">
        <h1>La plateforme moderne des compétences digitales</h1>
        <p>Apprends des métiers rentables et crée tes propres revenus grâce à des formations conçues par des experts du
            terrain.</p>
        <button class="btn-cta">Rejoindre une formation</button>
        <div class="hero-video">
            <!-- Vidéo publique réelle sur le marketing digital -->
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/5MgBikgcWnY"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </section>

    <!-- Formations -->
    <section class="formations fade-in">
        <h2 class="section-title">Nos Formations Premium</h2>
        <div class="cards" id="formationsContainer"></div>
    </section>

    <!-- Témoignages -->
    <section class="testimonials fade-in">
        <h2 class="section-title">Ils ont réussi avec HF Digital</h2>
        <div class="testimonial-grid">
            <div class="testimonial">
                <p>« Grâce à la formation WhatsApp Business, j’ai généré 3 000€ en un mois sans audience ! »</p>
                <div class="client">— Amélie D., entrepreneure</div>
            </div>
            <div class="testimonial">
                <p>« Le montage vidéo m’a permis de décrocher des clients internationaux. ROI en 2 semaines ! »</p>
                <div class="client">— Karim T., freelance</div>
            </div>
            <div class="testimonial">
                <p>« Enfin une formation claire, sans blabla. J’ai lancé ma boutique en ligne en 10 jours. »</p>
                <div class="client">— Léa M., e-commerçante</div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq fade-in">
        <h2 class="section-title">Questions Fréquentes</h2>
        <div class="faq-container" style="max-width: 800px; margin: 0 auto;">
            <div class="faq-item">
                <div class="faq-question">
                    <span>Les formations sont-elles accessibles à vie ?</span>
                    <span>+</span>
                </div>
                <div class="faq-answer">Oui, une fois achetée, vous avez un accès illimité à vie, mises à jour incluses.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Puis-je obtenir un certificat ?</span>
                    <span>+</span>
                </div>
                <div class="faq-answer">Absolument ! Un certificat officiel est délivré à la fin de chaque formation.
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Quel est le niveau requis ?</span>
                    <span>+</span>
                </div>
                <div class="faq-answer">Aucun prérequis. Nos formations sont conçues pour débutants comme experts.</div>
            </div>
        </div>
    </section>

    <!-- CTA Finale -->
    <section class="cta-final fade-in">
        <h2>Prêt à transformer ta carrière ?</h2>
        <p>Rejoins des milliers d’apprenants qui ont déjà changé leur vie grâce à HF Digital.</p>
        <button class="btn-cta-light">Commencer maintenant</button>
    </section>
    @include('layout.footer')

    <!-- Modal Connexion -->
    <div class="modal-overlay" id="loginModal">
        <div class="modal">
            <div class="modal-header">
                <h2>Se connecter</h2>
                <span class="close-modal" id="closeLogin">&times;</span>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn-modal">Se connecter</button>
            </form>
            <div class="switch-form">
                Pas encore de compte ? <a id="switchToRegister">S'inscrire</a>
            </div>
            @if ($errors->any())
                <hr>
                <div style="color: red; background-color: azure; padding: 5px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <hr>
                <div style="color: green; background-color: azure; padding: 5px;">
                    <ul>
                        <li class=" text-primary">{{ session('success') }}</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Inscription -->
    <div class="modal-overlay" id="registerModal">
        <div class="modal">
            <div class="modal-header">
                <h2>S'inscrire</h2>
                <span class="close-modal" id="closeRegister">&times;</span>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="regEmail">Email</label>
                    <input type="email" id="regEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="regPassword">Mot de passe</label>
                    <input type="password" id="regPassword" name="password" required>
                </div>
                <button type="submit" class="btn-modal">Créer mon compte</button>
            </form>
            <div class="switch-form">
                Déjà inscrit ? <a id="switchToLogin">Se connecter</a>
            </div>
        </div>
    </div>
    <script>
        const showFormationBaseUrl = "{{ route('showFormation', ['formation_id' => 'FORMATION_ID']) }}";
    </script>

    <script>
        const formations = [
            @foreach ($formations as $formation)
                        {
                    id: {{ $formation->id }},
                    title: "{{ $formation->title }}",
                    image: "{{ asset('images/' . $formation->imageFormation) }}",
                    duration: "{{ $formation->duration }} heures",
                    modules: {{ $formation->nbreModule }},
                    price: "{{ $formation->price }} fcfa",
                    description: "{{ $formation->description }}",
                    program: ["Introduction au marketing digital", "SEO avancé", "Publicité Facebook & Instagram", "Emailing stratégique", "Google Analytics", "Création de funnel de vente"]
                },
            @endforeach
        ];

        // Génération cartes
        const container = document.getElementById('formationsContainer');
        formations.forEach(f => {
            const showFormationUrl = showFormationBaseUrl.replace('FORMATION_ID', f.id);
            const card = document.createElement('div');
            card.className = 'card fade-in';
            card.innerHTML = `
                <img src="${f.image}" alt="${f.title}">
                <div class="card-content">
                <h3>${f.title}</h3>
                <p>${f.description}</p>
                <div class="card-meta">
                    <span>🕗 ${f.duration}</span>
                    <span class="price-tag">${f.price}</span>
                </div>
                <button class="btn-details" data-id="${f.id}" onclick="window.location.href='${showFormationUrl}'">Voir détails</button>
                </div>
            `;
            container.appendChild(card);
        });
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
