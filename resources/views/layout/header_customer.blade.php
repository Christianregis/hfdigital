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
        <a href="{{ route('avis',['slug'=>$user->slug]) }}">Avis</a>
        <a href="{{ route('propos') }}">À propos</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('partenaires') }}">Partenaire</a>
    </div>
    <div class="auth-buttons">
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
        <button style=" padding: 10px; background-color: red; color: #ddd; border-radius: 20px; border: none; cursor: pointer;" onclick="window.location.href='{{ route('home') }}'">Deconnection</button>
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
