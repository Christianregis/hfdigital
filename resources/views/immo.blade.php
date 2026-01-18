<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Immobilier – NANA RAFF</title>
    <meta name="description"
        content="Découvrez nos offres immobilières premium à Douala et Yaoundé : maisons saines, espaces verts, et bien-être intégré." />
    <meta name="theme-color" content="#8CC342" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .property-card {
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .property-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .property-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .property-card:nth-child(4) {
            animation-delay: 0.3s;
        }

        .property-img {
            height: 200px;
            overflow: hidden;
        }

        .property-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .property-body {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .property-body h3 {
            margin: 0 0 8px;
            color: var(--black);
        }

        .property-body .price {
            font-weight: 700;
            color: var(--green-dark);
            margin: 4px 0;
        }

        .property-meta {
            display: flex;
            gap: 12px;
            margin: 8px 0;
            font-size: 0.85rem;
            color: var(--muted);
        }

        .property-tag {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <!-- Header identique -->
    @include('layout.header')

    <main class="container" style="padding: 40px 0;">
        <h2>Immobilier Bien-Être</h2>
        <p class="sub">Des espaces de vie sains, verts et inspirants à Douala et Yaoundé. Conçus pour votre équilibre
            corps-esprit.</p>

        <div class="grid" id="propertiesGrid">
            <!-- Les biens seront injectés dynamiquement -->
        </div>

        <div
            style="margin-top: 40px; background: var(--card); padding: 24px; border-radius: var(--radius); box-shadow: var(--shadow);">
            <h3>Une approche unique</h3>
            <p>
                Chez <strong>NANA RAFF</strong>, nous croyons que le bien-être commence par un environnement sain.
                Nos résidences intègrent :
            </p>
            <ul style="padding-left: 20px; margin: 12px 0; color: var(--muted);">
                <li>Des matériaux non toxiques et durables</li>
                <li>Des espaces verts partagés (jardins médicinaux, aires de relaxation)</li>
                <li>Une orientation bioclimatique pour réduire la climatisation</li>
                <li>Accès à nos services de coaching santé et nutrition</li>
            </ul>
            <button class="btn" onclick="openSupport('Bonjour, je souhaite visiter une résidence NANA RAFF 🏡')">Prendre
                rendez-vous</button>
        </div>
    </main>

    <!-- Footer amélioré -->
    @include('layout.footer')

    <script>
        // Données fictives mais réalistes
        const properties = [
            @foreach ($immos as $immo)
                {
                    title: "{{ $immo->title }}",
                    price: "{{ $immo->price }} FCFA",
                    type: "{{ $immo->description }}",
                    image: "{{ $immo->image }}",
                    tag: "{{ $immo->sector }}"
                },
            @endforeach
            {
                title: "Appartement Lumière – Akwa",
                price: "420 000 FCFA",
                type: "Appartement",
                rooms: "3 chambres",
                area: "145 m²",
                image: "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                tag: "Vue mer"
            },
            {
                title: "Résidence",
                price: "120 000 000 FCFA",
                type: "Maison",
                rooms: "5 chambres",
                area: "480 m²",
                image: "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                tag: "Jardin médicinal"
            },
            {
                title: "Studio Bien-Être – Deido",
                price: "22 000 FCFA",
                type: "Studio",
                rooms: "1 chambre",
                area: "65 m²",
                image: "https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                tag: "Premier prix"
            }
        ];

        const grid = document.getElementById('propertiesGrid');
        properties.forEach((prop, i) => {
            const card = document.createElement('div');
            card.className = 'property-card';
            card.innerHTML = `
        <div class="property-img">
          <img src="${prop.image}" alt="${prop.title}">
        </div>
        <div class="property-body">
          <span class="property-tag">${prop.tag}</span>
          <h3>${prop.title}</h3>
          <div class="price">${prop.price}</div>
          <div class="property-meta">
            <span>${prop.type}</span>
          </div>
          <button class="btn secondary" style="margin-top:auto" onclick="openSupport('Intéressé par ${prop.title} 🏠')">Demander une visite</button>
        </div>
      `;
            grid.appendChild(card);
        });

        // Utilitaires
        const cartCount = JSON.parse(localStorage.getItem('cart') || '[]').reduce((s, i) => s + i.qty, 0);
        document.getElementById('openCart').setAttribute('data-count', cartCount);

        // Simuler openSupport (copié de dynam.js)
        window.openSupport = function (msg) {
            const chatBox = document.getElementById('chatBox');
            chatBox.classList.add('open');
            setTimeout(() => {
                document.getElementById('chatInput').value = msg;
                const box = document.getElementById('chatMessages');
                const m = document.createElement('div');
                m.className = 'msg me';
                m.textContent = msg;
                box.appendChild(m);
                box.scrollTop = box.scrollHeight;
                setTimeout(() => {
                    const r = document.createElement('div');
                    r.className = 'msg';
                    r.textContent = 'Merci pour votre demande ! Un conseiller vous contactera sous 24h.';
                    box.appendChild(r);
                    box.scrollTop = box.scrollHeight;
                }, 800);
            }, 200);
        };
    </script>

    <!-- Chat widget (copié de index.html) -->
    <button class="chat-fab" id="chatFab" title="Service Client">💬</button>
    <div class="chat-box" id="chatBox" role="dialog" aria-label="Chat">
        <div class="chat-head">
            <strong>Service Client</strong>
            <button class="icon-btn" onclick="document.getElementById('chatBox').classList.remove('open')"
                style="background:rgba(255,255,255,.2);color:#fff">✕</button>
        </div>
        <div class="chat-messages" id="chatMessages"></div>
        <div class="chat-input">
            <input id="chatInput" placeholder="Écrire un message…" />
            <button class="btn" onclick="sendMsg()">Envoyer</button>
        </div>
    </div>
</body>

</html>
