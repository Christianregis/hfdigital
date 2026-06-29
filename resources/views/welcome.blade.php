<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HF Digital – Formations Digitales Premium</title>
</head>

<body>

    @include('layout.header')

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

<<<<<<< HEAD
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
        <button class="btn-cta-light" onclick="window.location.href='{{ route('formation.showAll') }}'">Commencer maintenant</button>
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
=======
    <!-- Commande & Paiement (Anchor target) -->
    <section id="commande" class="container" aria-label="Commande & Paiement">
        <h2>Commande & Paiement</h2>
        <div class="sub">Panier et paiement sécurisé. OM, MoMo et carte bancaire.</div>
        <div class="flex">
            <button class="btn" id="openCart2">Voir le panier</button>
        </div>
    </section>

    @include('layout.footer')

    <!-- Product Modal -->
    <dialog id="productDialog">
        <div class="product-modal">
            <div class="pm-gallery">
                <div class="pm-main"><img id="pmMain" alt="Produit" /></div>
                <div class="pm-thumbs" id="pmThumbs"></div>
            </div>
            <div class="pm-body">
                <div class="flex space">
                    <h3 id="pmName" style="margin:0"></h3>
                    <button class="icon-btn" onclick="closeProduct()" title="Fermer">✕</button>
                </div>
                <div class="stars" id="pmStars">★★★★★</div>
                <div class="price" id="pmPrice"></div> FCFA
                <p class="muted" id="pmShort"></p>
                <div class="tabs">
                    <button class="active" data-tab="desc">Description</button>
                    <button data-tab="usage">Utilisation</button>
                    <button data-tab="precautions">Précautions</button>
                    <button data-tab="composition">Composition</button>
                </div>
                <div id="pmTabContent" class="muted"></div>
                <div class="divider"></div>
                <div class="flex space">
                    <button class="btn" id="addToCartBtn">Ajouter au panier</button>
                    <button class="like" id="likeBtn">❤ Like <span id="likeCount">0</span></button>
                </div>
                <div class="divider"></div>
                <h4>Avis & Commentaires</h4>
                <div class="flex space">
                    <div>
                        <label for="rating">Note:</label>
                        <select id="rating">
                            <option value="5">★★★★★</option>
                            <option value="4">★★★★☆</option>
                            <option value="3">★★★☆☆</option>
                            <option value="2">★★☆☆☆</option>
                            <option value="1">★☆☆☆☆</option>
                        </select>
                    </div>
                    <div>
                        <label for="sortReviews">Trier:</label>
                        <select id="sortReviews">
                            <option value="recent">Plus récents</option>
                            <option value="useful">Plus utiles</option>
                        </select>
                    </div>
                </div>
                <div class="flex" style="margin:8px 0">
                    <input id="reviewText" placeholder="Partagez votre avis…"
                        style="flex:1;padding:10px;border:1px solid #e5e7eb;border-radius:10px" />
                    <button class="btn" id="postReview">Publier</button>
                </div>
                <div class="reviews" id="reviews"></div>
                <div class="divider"></div>
                <h4>Produits similaires</h4>
                <div class="grid" id="similar"></div>
            </div>
        </div>
    </dialog>

    <!-- Cart Drawer -->
    <div id="drawer" class="drawer" aria-hidden="true">
        <div class="backdrop" onclick="toggleCart(false)"></div>
        <aside class="panel">
            <div class="flex space">
                <h3 style="margin:0">Votre panier</h3>
                <button class="icon-btn" onclick="toggleCart(false)">✕</button>
            </div>
            <div id="cartItems" style="flex:1;overflow:auto;margin-top:8px"></div>
            <div style="border-top:1px solid #e5e7eb;padding-top:10px">
                <div class="flex space"><strong>Total</strong><strong id="cartTotal">0 FCFA</strong></div>
                <div class="muted" style="margin:8px 0">Paiement (démo) :</div>
                <div class="flex" style="flex-wrap:wrap;gap:8px">
                    <label class="chip"><input type="radio" name="pay" value="OM" checked> Orange
                        Money</label>
                    <label class="chip"><input type="radio" name="pay" value="MoMo"> MTN MoMo</label>
                    <label class="chip"><input type="radio" name="pay" value="Card"> Carte
                        bancaire</label>
                </div>
                <input id="payField" placeholder="N° téléphone ou email"
                    style="width:100%;padding:10px;border:1px solid #e5e7eb;border-radius:12px;margin:10px 0" />
                <button class="btn" style="width:100%" onclick="checkout()">Payer maintenant</button>
            </div>
        </aside>
    </div>

    <!-- Chat -->
    <button class="chat-fab" id="chatFab" title="Service Client">💬</button>
    <div class="chat-box" id="chatBox" role="dialog" aria-label="Chat">
        <div class="chat-head">
            <strong>Service Client</strong>
            <button class="icon-btn" onclick="chatToggle(false)"
                style="background:rgba(255,255,255,.2);color:#fff">✕</button>
        </div>
        <div class="chat-messages" id="chatMessages"></div>
        <div class="chat-input">
            <input id="chatInput" placeholder="Écrire un message…" />
            <button class="btn" onclick="sendMsg()">Envoyer</button>
        </div>
    </div>

    <div class="toast" id="toast">Action réalisée ✅</div>

    <script>
        // JavaScript extrait du fichier HTML

        // ---------- Data (démo) ----------
        const PRODUCTS = [
            @foreach ($products as $product)
                {
                    id: '{{ $product->id }}',
                    name: '{{ $product->title }}',
                    short: '{{ $product->description }}',
                    description: '{{ $product->description }}',
                    usage: '{{ $product->utilisation }}',
                    precautions: '{{ $product->precaution }}',
                    composition: '{{ $product->composition }}',
                    price: {{ $product->price }},
                    image: '{{ asset('images/' . $product->image) }}',
                    images: ['{{ asset('images/' . $product->image2) }}',
                        '{{ asset('images/' . $product->image3) }}'
                    ],
                    category: '{{ $product->category }}',
                    likes: 120,
                    stars: 4.5
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
                },
            @endforeach
        ];

<<<<<<< HEAD
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
=======
        const REVIEWS = [{
                productId: 'prod1',
                user: 'Alice D.',
                rating: 5,
                comment: 'Excellent thé, je me sens plus légère !',
                date: '2025-09-20'
            },
            {
                productId: 'prod1',
                user: 'Bob M.',
                rating: 4,
                comment: 'Bon goût, aide à la digestion.',
                date: '2025-09-18'
            },
            {
                productId: 'prod2',
                user: 'Carole L.',
                rating: 5,
                comment: 'Vraiment efficace pour brûler les graisses.',
                date: '2025-09-22'
            },
            {
                productId: 'prod3',
                user: 'David P.',
                rating: 5,
                comment: 'Shaker très pratique et facile à nettoyer.',
                date: '2025-09-15'
            },
            {
                productId: 'prod4',
                user: 'Eve R.',
                rating: 4,
                comment: 'Le pack est complet, j\'ai déjà vu des résultats.',
                date: '2025-09-21'
            },
        ];

        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // ---------- DOM Elements ----------
        const productGrid = document.getElementById('productGrid');
        const productDialog = document.getElementById('productDialog');
        const pmMain = document.getElementById('pmMain');
        const pmThumbs = document.getElementById('pmThumbs');
        const pmName = document.getElementById('pmName');
        const pmPrice = document.getElementById('pmPrice');
        const pmShort = document.getElementById('pmShort');
        const pmTabContent = document.getElementById('pmTabContent');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const likeBtn = document.getElementById('likeBtn');
        const likeCountSpan = document.getElementById('likeCount');
        const reviewsContainer = document.getElementById('reviews');
        const similarProductsContainer = document.getElementById('similar');
        const searchInput = document.getElementById('searchInput');
        const categoryChips = document.getElementById('categoryChips');
        const cartDrawer = document.getElementById('drawer');
        const cartItemsContainer = document.getElementById('cartItems');
        const cartTotalSpan = document.getElementById('cartTotal');
        const openCartBtn = document.getElementById('openCart');
        const openCartBtn2 = document.getElementById('openCart2');
        const chatFab = document.getElementById('chatFab');
        const chatBox = document.getElementById('chatBox');
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');
        const toast = document.getElementById('toast');

        // ---------- Utility Functions ----------
        function showToast(message) {
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        function formatPrice(price) {
            return price;
        }

        // ---------- Product Display ----------
        function renderProducts(productsToRender) {
            productGrid.innerHTML = '';
            productsToRender.forEach(product => {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';
                productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}" />
            <h3>${product.name}</h3>
            <p class="muted">${product.short}</p>
            <div class="stars">${'★'.repeat(Math.floor(product.stars))}${'☆'.repeat(5 - Math.floor(product.stars))}</div>
            <div class="flex space">
                <strong>${product.price}</strong>
                <button class="btn" onclick="openProduct('${product.id}'); return false;">Voir le produit</button>
            </div>
        `;
                productGrid.appendChild(productCard);
            });
        }

        function openProduct(productId) {
            const product = PRODUCTS.find(p => p.id === productId);
            if (!product) return;

            pmMain.src = product.image;
            pmMain.alt = product.name;
            pmMain.dataset.productId = productId;
            pmName.textContent = product.name;
            pmPrice.textContent = formatPrice(product.price);
            pmShort.textContent = product.short;
            likeCountSpan.textContent = product.likes;

            // Render product images
            pmThumbs.innerHTML = '';
            product.images.forEach(imgSrc => {
                const img = document.createElement('img');
                img.src = imgSrc;
                img.alt = product.name;
                img.onclick = () => pmMain.src = imgSrc;
                pmThumbs.appendChild(img);
            });

            // Render tabs
            const tabs = productDialog.querySelectorAll('.tabs button');
            tabs.forEach(tab => {
                tab.classList.remove('active');
                tab.onclick = () => {
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    pmTabContent.innerHTML = product[tab.dataset.tab];
                };
            });
            // Set default tab content
            tabs[0].click();

            // Add to cart button
            addToCartBtn.onclick = () => {
                addToCart(product);
                showToast(`${product.name} ajouté au panier !`);
            };

            renderReviews(productId);
            renderSimilarProducts(productId);

            productDialog.showModal();
        }

        function closeProduct() {
            productDialog.close();
        }

        // ---------- Cart Functionality ----------
        function saveCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartBadge();
            renderCartItems();
        }

        function updateCartBadge() {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            openCartBtn.dataset.count = totalItems;
            openCartBtn2.dataset.count = totalItems; // Update the second cart button as well
        }

        function addToCart(product) {
            const existingItem = cart.find(item => item.id === product.id);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    ...product,
                    quantity: 1
                });
            }
            saveCart();
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            saveCart();
        }

        function updateQuantity(productId, quantity) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity = quantity;
                if (item.quantity <= 0) {
                    removeFromCart(productId);
                }
            }
            saveCart();
        }

        function renderCartItems() {
            cartItemsContainer.innerHTML = '';
            let total = 0;

            if (cart.length === 0) {
                cartItemsContainer.innerHTML =
                    '<p class="muted" style="text-align:center;margin-top:20px;">Votre panier est vide.</p>';
            } else {
                cart.forEach(item => {
                    total += item.price * item.quantity;
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item';
                    cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}" />
                <div class="ci-info">
                    <h4>${item.name}</h4>
                    <p class="muted">${item.price} x ${item.quantity}</p>
                    <div class="ci-actions">
                        <button onclick="updateQuantity('${item.id}', ${item.quantity - 1})">-</button>
                        <span>${item.quantity}</span>
                        <button onclick="updateQuantity('${item.id}', ${item.quantity + 1})">+</button>
                        <button class="remove-btn" onclick="removeFromCart('${item.id}')">Supprimer</button>
                    </div>
                </div>
            `;
                    cartItemsContainer.appendChild(cartItem);
                });
            }
            cartTotalSpan.textContent = formatPrice(total);
        }

        function toggleCart(open) {
            if (open) {
                cartDrawer.classList.add('open');
                cartDrawer.setAttribute('aria-hidden', 'false');
                renderCartItems();
            } else {
                cartDrawer.classList.remove('open');
                cartDrawer.setAttribute('aria-hidden', 'true');
            }
        }

        // ---------- Checkout ----------
        function checkout() {
            // Rediriger vers la page de connexion
            window.location.href = '{{ route('showLogInForm') }}';
        }

        // ---------- Reviews ----------
        function renderReviews(productId) {
            reviewsContainer.innerHTML = '';
            const productReviews = REVIEWS.filter(review => review.productId === productId);
            if (productReviews.length === 0) {
                reviewsContainer.innerHTML = '<p class="muted">Aucun avis pour ce produit.</p>';
                return;
            }
            productReviews.forEach(review => {
                const reviewElement = document.createElement('div');
                reviewElement.className = 'review';
                reviewElement.innerHTML = `
            <strong>${review.user}</strong>
            <div class="stars">${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</div>
            <p>${review.comment}</p>
            <span class="muted">${review.date}</span>
        `;
                reviewsContainer.appendChild(reviewElement);
            });
        }

        // ---------- Similar Products ----------
        function renderSimilarProducts(currentProductId) {
            similarProductsContainer.innerHTML = '';
            const currentProduct = PRODUCTS.find(p => p.id === currentProductId);
            if (!currentProduct) return;

            const similar = PRODUCTS.filter(p => p.category === currentProduct.category && p.id !== currentProductId).slice(
                0, 3);

            if (similar.length === 0) {
                similarProductsContainer.innerHTML = '<p class="muted">Aucun produit similaire trouvé.</p>';
                return;
            }

            similar.forEach(product => {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';
                productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}" />
            <h3>${product.name}</h3>
            <strong>${formatPrice(product.price)}</strong>
            <button class="btn" onclick="openProduct('${product.id}')">Voir</button>
        `;
                similarProductsContainer.appendChild(productCard);
            });
        }

        // ---------- Search and Filter ----------
        function renderCategories() {
            const categories = [...new Set(PRODUCTS.map(p => p.category))];
            categoryChips.innerHTML = '<button class="chip active" data-category="all">Tout</button>';
            categories.forEach(category => {
                const chip = document.createElement('button');
                chip.className = 'chip';
                chip.dataset.category = category;
                chip.textContent = category;
                categoryChips.appendChild(chip);
            });

            categoryChips.addEventListener('click', (e) => {
                if (e.target.classList.contains('chip')) {
                    categoryChips.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
                    e.target.classList.add('active');
                    filterProducts();
                }
            });
        }

        function filterProducts() {
            const searchTerm = searchInput.value.toLowerCase();
            const activeCategory = categoryChips.querySelector('.chip.active')?.dataset.category || 'all';

            const filteredProducts = PRODUCTS.filter(product => {
                const matchesSearch = product.name.toLowerCase().includes(searchTerm) ||
                    product.short.toLowerCase().includes(searchTerm) ||
                    product.description.toLowerCase().includes(searchTerm);
                const matchesCategory = activeCategory === 'all' || product.category === activeCategory;
                return matchesSearch && matchesCategory;
            });
            renderProducts(filteredProducts);
        }

        searchInput.addEventListener('input', filterProducts);

        // ---------- Chat Functionality ----------
        function chatToggle(open) {
            if (open) {
                chatBox.classList.add('open');
            } else {
                chatBox.classList.remove('open');
            }
        }

        function sendMsg() {
            const message = chatInput.value.trim();
            if (message) {
                const msgElement = document.createElement('div');
                msgElement.className = 'chat-message user';
                msgElement.textContent = message;
                chatMessages.appendChild(msgElement);
                chatInput.value = '';
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Simple auto-reply
                setTimeout(() => {
                    const replyElement = document.createElement('div');
                    replyElement.className = 'chat-message bot';
                    replyElement.textContent = 'Merci pour votre message. Un conseiller vous répondra sous peu.';
                    chatMessages.appendChild(replyElement);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);
            }
        }

        chatFab.addEventListener('click', () => chatToggle(true));

        // ---------- Event Listeners & Initializations ----------
        document.addEventListener('DOMContentLoaded', () => {
            renderProducts(PRODUCTS);
            renderCategories();
            updateCartBadge();

            // Event listeners for cart buttons
            openCartBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleCart(true);
            });
            openCartBtn2.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleCart(true);
            });
            // Dropdown menu functionality
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.addEventListener('click', function() {
                    this.classList.toggle('active');
                });
            });

            // Close dropdown if clicked outside
            window.addEventListener('click', function(event) {
                if (!event.target.matches('.dropdown a')) {
                    document.querySelectorAll('.dropdown').forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            });

            // Tab functionality in product modal
            productDialog.addEventListener('click', (e) => {
                if (e.target.matches('.tabs button')) {
                    productDialog.querySelectorAll('.tabs button').forEach(btn => btn.classList.remove(
                        'active'));
                    e.target.classList.add('active');
                    const product = PRODUCTS.find(p => p.id === pmMain.dataset
                        .productId); // Need to store product ID in pmMain
                    if (product) {
                        pmTabContent.innerHTML = product[e.target.dataset.tab];
                    }
                }
            });

            // Support button
            document.getElementById('supportBtn').addEventListener('click', () => {
                chatToggle(true);
                // Optionally pre-fill chat input with a support message
                chatInput.value = 'Bonjour, j\'ai besoin d\'aide concernant...';
                chatInput.focus();
            });

            // Placeholder for subscribe function
            window.subscribe = () => {
                showToast('Merci de vous être abonné à notre newsletter !');
            };
        });


        // Initial call to render products
        renderProducts(PRODUCTS);
        renderCategories();
        updateCartBadge();




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

        const slides = document.querySelectorAll('.slide');
        const dotsContainer = document.getElementById('dots');
        let currentIndex = 0;

        // Créer les dots dynamiquement
        slides.forEach((_, i) => {
            const dot = document.createElement('span');
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('#dots span');

        function showSlide(index) {
            document.querySelector('.slides').style.transform = `translateX(-${index * 100}%)`;
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');
        }

        function goToSlide(index) {
            currentIndex = index;
            showSlide(currentIndex);
        }

        // Auto défilement toutes les 5 sec
        function autoSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Initialisation
        showSlide(currentIndex);
        setInterval(autoSlide, 5000);
    </script>
>>>>>>> 4ab2363a34920e1e831fd0cf354750876d32af69
</body>

</html>
