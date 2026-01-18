<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>NANA RAFF — Exportation</title>

    <style>
        /* ================= Variables globales ================= */
        :root {
            --primary-color: #27ae60;
            /* vert principal */
            --secondary-color: #2c3e50;
            /* bleu/gris très sombre */
            --background-color: #ecf0f1;
            /* gris clair */
            --text-color: #2c3e50;
            /* texte */
            --muted: #7f8c8d;
            --card: #ffffff;
            --glass: rgba(255, 255, 255, 0.6);
            --shadow: 0 12px 30px rgba(44, 62, 80, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }

        body {
            background: var(--background-color);
            color: var(--text-color);
            line-height: 1.6
        }


        /* ================= Hero ================= */
        .hero {
            position: relative;
            height: 320px;
            background: url('https://th.bing.com/th/id/OIP.K-hV8pLO_e7wrZGyBQMZIAHaE8?w=254&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3')center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(44, 62, 80, 0.55)
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            max-width: 800px;
            padding: 20px;
            animation: fadeInDown 1s ease
        }

        .hero-content h1 {
            font-size: 34px;
            margin-bottom: 10px
        }

        .hero-content p {
            opacity: 0.9
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* ================= Sections ================= */
        section {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px
        }

        h2.section-title {
            text-align: center;
            font-size: 26px;
            margin-bottom: 22px;
            color: var(--secondary-color)
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: .3s ease
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(44, 62, 80, 0.12)
        }

        .card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 12px
        }

        .card h3 {
            margin-bottom: 8px;
            color: var(--primary-color)
        }

        /* ================= Timeline ================= */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px
        }

        .timeline::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary-color);
            transform: translateX(-50%)
        }

        .timeline-item {
            position: relative;
            width: 50%;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin: 20px 0;
            animation: fadeInUp 1s ease both
        }

        .timeline-item:nth-child(odd) {
            left: 0
        }

        .timeline-item:nth-child(even) {
            left: 50%
        }

        .timeline-item::after {
            content: "";
            position: absolute;
            top: 20px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary-color);
            box-shadow: 0 0 0 4px white
        }

        .timeline-item:nth-child(odd)::after {
            right: -10px
        }

        .timeline-item:nth-child(even)::after {
            left: -10px
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* ================= Modal ================= */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            visibility: hidden;
            opacity: 0;
            transition: .3s ease;
            z-index: 100
        }

        .modal-backdrop.show {
            visibility: visible;
            opacity: 1
        }

        .modal {
            background: white;
            border-radius: 12px;
            max-width: 600px;
            padding: 20px;
            position: relative;
            animation: zoomIn .4s ease
        }

        .modal h3 {
            margin-bottom: 10px
        }

        .modal button.close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: 0;
            font-size: 20px;
            color: var(--muted);
            cursor: pointer
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0
            }

            to {
                transform: scale(1);
                opacity: 1
            }
        }

        /* ================= Footer ================= */
        footer {
            background: var(--secondary-color);
            color: white;
            padding: 30px 20px;
            text-align: center;
            margin-top: 40px
        }

        footer a {
            color: #ddd;
            margin: 0 8px
        }

        .logo-img {
            width: 60px;
            /* largeur du logo */
            height: auto;
            /* conserve le ratio */
            object-fit: contain;
            display: block;
            border-radius: 30%;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
@include('layout.header')
    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1>Exportation Internationale</h1>
            <p>NANA RAFF exporte vos produits au-delà des frontières, avec logistique intelligente, suivi transparent et
                conformité réglementaire.</p>
        </div>
    </section>

    <!-- Section destinations -->
    <section>
        <h2 class="section-title">Nos Destinations Clés</h2>
        <div class="grid">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1505761671935-60b3a7427bad?auto=format&fit=crop&w=800&q=80"
                    alt="Europe">
                <h3>Europe</h3>
                <p>Expéditions rapides vers l’UE, respect strict des normes de certification et douanes simplifiées.</p>
                <button
                class="btn"
                    onclick="openModal('Europe','En Europe, nous travaillons avec des transitaires certifiés pour garantir la livraison en 5 à 7 jours ouvrés.')">Détails</button>
            </div>
            <div class="card">
                <img src="https://th.bing.com/th/id/OIP.wAcygZ8BZ9NuDhJSA4rcpAHaEo?w=302&h=187&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3"
                    alt="Amérique">
                <h3>Amérique</h3>
                <p>Partenariats avec hubs logistiques aux USA et Canada pour un dédouanement fluide.</p>
                <button class="btn"
                    onclick="openModal('Amérique','Nous assurons l’export vers l’Amérique avec suivi GPS et options de livraison express.')">Détails</button>
            </div>
            <div class="card">
                <img src="https://th.bing.com/th/id/OIP.bPScqvEErl54gYflKOvD0QHaEK?w=259&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                    alt="Afrique">
                <h3>Afrique</h3>
                <p>Réseaux solides sur le continent africain, permettant une distribution efficace et abordable.</p>
                <button class="btn"
                    onclick="openModal('Afrique','Nous couvrons 15 pays africains grâce à nos partenariats de proximité.')">Détails</button>
            </div>
        </div>
    </section>

    <!-- Timeline export -->
    <section>
        <h2 class="section-title">Processus d’Exportation</h2>
        <div class="timeline">
            <div class="timeline-item">
                <h4>1. Validation Produit</h4>
                <p>Contrôle qualité, certification et documentation export.</p>
            </div>
            <div class="timeline-item">
                <h4>2. Emballage Sécurisé</h4>
                <p>Conditionnement adapté aux normes internationales.</p>
            </div>
            <div class="timeline-item">
                <h4>3. Transport & Logistique</h4>
                <p>Par avion, bateau ou route avec traçabilité en temps réel.</p>
            </div>
            <div class="timeline-item">
                <h4>4. Livraison Internationale</h4>
                <p>Service porte-à-porte avec options premium ou économique.</p>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal-backdrop" id="modalBackdrop">
        <div class="modal">
            <button class="close" onclick="closeModal()">✕</button>
            <h3 id="modalTitle"></h3>
            <p id="modalContent"></p>
        </div>
    </div>

    <!-- Footer -->
@include('layout.footer')

    <script>
        // ================= Gestion des Modals =================
        function openModal(titre, contenu) {
            document.getElementById("modalTitle").innerText = titre;
            document.getElementById("modalContent").innerText = contenu;
            document.getElementById("modalBackdrop").classList.add("show");
        }
        function closeModal() {
            document.getElementById("modalBackdrop").classList.remove("show");
        }

        // ---------- Responsive Menu Toggle ----------
        var menuToggle = document.getElementById('menuToggle');
        const menu = document.querySelector('.menu');

        if (menuToggle && menu) {
            menuToggle.addEventListener('click', () => {
                menu.classList.toggle('open');
            });

            // Close menu when a link is clicked (for single-page navigation)
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.remove('open');
                });
            });
        }



        // Responsive menu toggle
        menuToggle = document.getElementById('menuToggle');
        const menuResponsive = document.getElementById('menuResponsive');

        if (menuToggle && menuResponsive) {
            menuToggle.addEventListener('click', () => {
                menuResponsive.classList.toggle('open');
            });

            // Close responsive menu when a link is clicked
            menuResponsive.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    menuResponsive.classList.remove('open');
                });
            });
        }
    </script>
</body>

</html>
