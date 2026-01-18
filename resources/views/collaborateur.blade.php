<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Collaborateurs – NANA RAFF</title>
    <meta name="description"
        content="Découvrez nos partenaires et collaborateurs professionnels en Afrique et en Europe." />
    <meta name="theme-color" content="#8CC342" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        :root {
            --primary-color: #27ae60;
            --secondary-color: #2c3e50;
            --background-color: #ecf0f1;
            --text-color: #2c3e50;
            --muted: #7f8c8d;
            --glass: rgba(255, 255, 255, 0.65);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }

        html,
        body {
            height: 100%;
            background: var(--background-color);
            color: var(--text-color);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        header {
            position: relative;
            z-index: 30;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.6));
            backdrop-filter: blur(6px);
            box-shadow: 0 6px 18px rgba(44, 62, 80, 0.08);
        }

        .nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 18px;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateY(-2px);
        }

        .logo-img {
            width: 60px;
            height: auto;
            border-radius: 30%;
        }

        nav ul {
            display: flex;
            gap: 12px;
            align-items: center;
            list-style: none;
        }

        nav li {
            padding: 8px 12px;
            border-radius: 8px;
            color: var(--muted);
            font-weight: 600;
        }

        nav li:hover {
            color: var(--secondary-color);
            background: rgba(44, 62, 80, 0.03);
        }

        main {
            max-width: 1200px;
            margin: 80px auto 80px;
            padding: 20px;
            position: relative;
            z-index: 10;
        }

        h2 {
            margin-top: 25px;
            text-align: center;
            font-size: 28px;
            margin-bottom: 12px;
            color: var(--secondary-color);
        }

        .sub {
            text-align: center;
            margin-bottom: 32px;
            color: var(--muted);
        }

        .partner-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        @media(max-width:900px) {
            .partner-grid {
                grid-template-columns: 1fr;
            }
        }

        .partner-info {
            display: flex;
            flex-direction: column;
            gap: 16px;
            background: white;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(44, 62, 80, 0.06);
        }

        .partner-info h3 {
            margin-bottom: 6px;
            color: var(--secondary-color);
        }

        .partner-info p {
            color: var(--muted);
        }

        .partner-info img {
            width: 100%;
            border-radius: 12px;
            object-fit: cover;
        }

        form.partner-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
            background: white;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(44, 62, 80, 0.06);
        }

        form input,
        form textarea {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid rgba(44, 62, 80, 0.1);
            font-size: 14px;
            outline: none;
        }

        form textarea {
            resize: none;
            height: 140px;
        }

        .btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 700;
            border: 0;
            cursor: pointer;
            transition: transform .18s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }
        .partner-card {
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

        .partner-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .partner-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .partner-card:nth-child(4) {
            animation-delay: 0.3s;
        }

        .partner-card:nth-child(5) {
            animation-delay: 0.4s;
        }

        .partner-media {
            height: 180px;
            overflow: hidden;
            position: relative;
        }

        .partner-media img,
        .partner-media iframe {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: none;
        }

        .partner-body {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .partner-body h3 {
            margin: 0 0 8px;
            color: var(--black);
        }

        .partner-body p {
            flex: 1;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .partner-tag {
            display: inline-block;
            background: #ecfccb;
            color: #1a2e05;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 0.8rem;
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <!-- Header identique à index.html -->
    @include('layout.header')

    <main class="container" style="padding: 40px 0;">
        <h2>Nos Collaborateurs</h2>
        <p class="sub">Partenaires stratégiques, fournisseurs certifiés et réseaux professionnels en Afrique et en
            Europe.</p>

        <div class="grid" id="partnersGrid">
            <!-- Les cartes seront injectées dynamiquement -->
        </div>

        <h2>Devenez partenaire NANA RAFF</h2>
        <div class="sub">Rejoignez notre réseau et bénéficiez d’opportunités uniques pour votre entreprise ou projet.
        </div>

        <div class="partner-grid">
            <!-- Section d'information -->
            <div class="partner-info">
                <h3>Pourquoi devenir partenaire ?</h3>
                <p>En rejoignant NANA RAFF, vous bénéficiez de :</p>
                <ul style="color:var(--muted);margin-left:16px;">
                    <li>Visibilité accrue de vos produits/services</li>
                    <li>Accès à notre réseau de clients premium</li>
                    <li>Opportunités de co-marketing et événements exclusifs</li>
                    <li>Support personnalisé pour maximiser votre impact</li>
                </ul>
                <img src="https://th.bing.com/th/id/OIP.mncoKq4PjzL7VaP07a-_VgHaDV?w=346&h=157&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3"
                    alt="Partenariat illustration">
            </div>

            <!-- Formulaire de partenariat -->
            <form class="partner-form" id="partnerForm">
                <h3>Envoyer une demande de partenariat</h3>
                <input type="text" id="partnerName" placeholder="Nom de votre entreprise" required>
                <input type="email" id="partnerEmail" placeholder="Email" required>
                <input type="text" id="partnerSubject" placeholder="Sujet" required>
                <textarea id="partnerMessage" placeholder="Votre message / proposition" required></textarea>
                <button type="submit" class="btn">Envoyer la demande</button>
            </form>
        </div>
    </main>

    <!-- Footer amélioré (identique à celui de index.html mis à jour) -->
    @include('layout.footer')

    <script>
        // Données dynamiques des collaborateurs (fictifs mais réalistes)
        const partners = [
            @foreach ($collaborators as $co)
                {
                    name: "{{ $co->name }}",
                    sector: "{{$co->sector}}",
                    description: "{{ $co->description }}",
                    media: "{{ $co->image }}",
                    type: "image"
                },
            @endforeach
            {
                name: "Saker",
                sector: "Boulangerie - Patisserie",
                description: "Principale fournisseur et fabroicant de produits de boulangerie au Cameroun.",
                media: "https://tse1.mm.bing.net/th/id/OIP.chEqPKH5r919jN32mNH74QHaHe?rs=1&pid=ImgDetMain&o=7&rm=3", // Vidéo courte sur la qualité alimentaire (publique)
                type: "image"
            },
            {
                name: "Doov",
                sector: "Fabricant d'oeuf",
                description: "Leader africain dans la production d'œufs de consommation.",
                media: "https://tse1.mm.bing.net/th/id/OIP._rk2p1n17BDyYNqcwq9S8AAAAA?rs=1&pid=ImgDetMain&o=7&rm=3",
                type: "image"
            },
            {
                name: "Carrefour",
                sector: "Secteur alimentaire",
                description: "Géant de la distribution avec une forte présence en Afrique.",
                media: "https://tse4.mm.bing.net/th/id/OIP.NogAfPSSxFisiP226YNisAHaDt?rs=1&pid=ImgDetMain&o=7&rm=3",
                type: "image"
            }
        ];

        const grid = document.getElementById('partnersGrid');
        partners.forEach(partner => {
            const card = document.createElement('div');
            card.className = 'partner-card';

            let mediaHtml = '';
            if (partner.type === 'video') {
                mediaHtml = `<iframe src="${partner.media}" title="${partner.name}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            } else {
                mediaHtml = `<img src="${partner.media}" alt="${partner.name}">`;
            }

            card.innerHTML = `
        <div class="partner-media">
          ${mediaHtml}
        </div>
        <div class="partner-body">
          <h3>${partner.name}</h3>
          <p>${partner.description}</p>
          <span class="partner-tag">${partner.sector}</span>
        </div>
      `;
            grid.appendChild(card);
        });

        // Simuler badge panier (optionnel)
        const cartCount = JSON.parse(localStorage.getItem('cart') || '[]').reduce((s, i) => s + i.qty, 0);
        document.getElementById('openCart').setAttribute('data-count', cartCount);
    </script>
</body>

</html>
