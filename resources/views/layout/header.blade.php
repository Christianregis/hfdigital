<<<<<<< HEAD
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<!-- Navbar -->
<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('image/logo_1.jpeg') }}" alt="Logo NANA RAFF" class="logo-icon">
        <span>HF Digital</span>
    </div>
    <div class="nav-links">
        <a href="{{ route('home') }}">Accueil</a>
        <a href="{{ route('propos') }}">À propos</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('partenaires') }}">Partenaire</a>
    </div>
    <div class="auth-buttons">
        <button class="btn-outline" id="btnLogin">Se connecter</button>
        <button class="btn-outline" id="btnRegister">S'inscrire</button>
        <!-- ===== STYLE ===== -->
        <style>
            /* Icône du panier */
            .cart-promo-icon {
                cursor: pointer;
                font-size: 24px;
                transition: transform 0.2s ease;
            }

            .cart-promo-icon:hover {
                transform: scale(1.1);
            }

            /* Fond du modal */
            .promo-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 2000;
            }

            /* Contenu du modal */
            .promo-modal {
                background: #fff;
                border-radius: 12px;
                padding: 20px 25px;
                width: 320px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                animation: popIn 0.25s ease;
            }

            @keyframes popIn {
                from {
                    transform: scale(0.8);
                    opacity: 0;
                }

                to {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            /* Label et champ */
            .promo-modal label {
                font-weight: bold;
                display: block;
                margin-bottom: 6px;
            }

            .promo-modal input {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 6px;
                margin-bottom: 12px;
            }

            /* Boutons */
            .promo-btns {
                display: flex;
                justify-content: flex-end;
                gap: 8px;
            }

            .btn {
                border: none;
                border-radius: 6px;
                padding: 8px 14px;
                cursor: pointer;
            }

            .btn--cancel {
                background: #ddd;
            }

            .btn--apply {
                background: #007bff;
                color: white;
            }
        </style>

        <!-- ===== HTML ===== -->
        <span class="cart-promo-icon" id="openPromo">🛒</span>

        <div class="promo-overlay" id="promoOverlay">
            <form action="{{ route('formation.showByCode') }}" method="GET">
                 @csrf
                <div class="promo-modal">
                    <label for="promoInput">Entrez votre code promo :</label>
                    <input type="text" id="promoInput" name="codeAccess" placeholder="Ex: XWZPROMO2025" required>
                    <div class="promo-btns">
                        <button class="btn btn--cancel" id="cancelPromo">Annuler</button>
                        <button class="btn btn--apply" type="submit">Appliquer</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- ===== SCRIPT ===== -->
        <script>
            const openBtn = document.getElementById('openPromo');
            const overlay = document.getElementById('promoOverlay');
            const cancelBtn = document.getElementById('cancelPromo');
            const promoInput = document.getElementById('promoInput');

            // 🟢 Ouvrir le modal
            openBtn.addEventListener('click', () => {
                overlay.style.display = 'flex';
                promoInput.focus();
            });

            // 🔴 Fermer avec le bouton Annuler
            cancelBtn.addEventListener('click', () => {
                overlay.style.display = 'none';
                promoInput.value = '';
            });

            // 🟡 Fermer si clic en dehors du modal
            window.addEventListener('click', (e) => {
                if (e.target === overlay) {
                    overlay.style.display = 'none';
                    promoInput.value = '';
                }
            });

        </script>


    </div>
</nav>
=======
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<header>
    <div class="container nav">
        <div class="brand">
            <div class="logo" aria-label="logo">

                <img src="{{ asset('image/logo_1.jpeg') }}" alt="Logo NANA RAFF" class="logo-img">
                </svg>
            </div>
            <span style="color:#006400;"><span style="font-size : 40px; color: yellow;">N</span>ANA <span style="font-size : 40px; color: yellow;">R</span>AFF</span>
        </div>
        <nav class="menu">
            <a href="{{ route('home') }}">Accueil</a>
            <div class="dropdown">
                <a href="#extra">Service</a>
                <div class="dropdown-menu">
                    <a href="{{ route('export') }}">Exportation</a>
                    <a href="{{ route('import') }}">Importation</a>
                    <a href="{{ route('immo') }}">Immmobilier</a>
                </div>
            </div>
            <a href="{{ route('conseil') }}">Conseils</a>
            <a href="{{ route('collaborateur') }}">Collaborateur</a>
            <a href="{{ route('avis') }}">Avis</a>
            <a href="{{ route('propos') }}">A propos</a>

        </nav>
        <div class="actions">
            <button id="supportBtn" class="icon-btn" title="Service client">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 10a6 6 0 10-12 0v4a4 4 0 004 4h4a4 4 0 004-4v-4" />
                    <path d="M6 14H4a2 2 0 01-2-2v-1a2 2 0 012-2h2" />
                    <path d="M18 14h2a2 2 0 002-2v-1a2 2 0 00-2-2h-2" />
                </svg>
            </button>
            <button id="openCart" class="icon-btn badge" data-count="0" title="Panier">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1" />
                    <circle cx="20" cy="21" r="1" />
                    <path d="M1 1h4l2.68 13.39A2 2 0 0010 16h7a2 2 0 001.98-1.72L21 8H6" />
                </svg>
            </button>
            <button class="cta"><a href="{{ route('showLogInForm') }}">Se connecter</a></button>
            <button id="menuToggle" class="icon-btn menu-toggle" title="Menu">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    <nav class="menu-responsive" id="menuResponsive">
        <a href="{{ route('home') }}">Accueil</a>
        <div class="dropdown">
            <a href="#extra">Service</a>
            <div class="dropdown-menu">
                <a href="{{ route('export') }}">Exportation</a>
                <a href="{{ route('import') }}">Importation</a>
                <a href="{{ route('immo') }}">Immmobilier</a>
            </div>
        </div>
        <a href="{{ route('conseil') }}">Conseils</a>
        <a href="{{ route('collaborateur') }}">Collaborateur</a>
        <a href="{{ route('avis') }}">Avis</a>
        <a href="{{ route('propos') }}">A propos</a>
        
        <button class="cta"><a href="{{ route('showLogInForm') }}">Se Connecter</a></button>
    </nav>
    </div>
    </div>
</header>
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
