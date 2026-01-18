// /* ===========================================================
//    NANA RAFF - Client Shop (Bootstrap Version)
//    - Affichage des produits avec filtres et recherche
//    - Système de likes avec FontAwesome
//    - Gestion du panier Bootstrap
//    - Processus de commande avec modals Bootstrap
//    - Interface responsive Bootstrap
//    =========================================================== */

// /* ----------------------
//    Utilities
//    ---------------------- */
// const $ = sel => document.querySelector(sel);
// const $$ = sel => document.querySelectorAll(sel);

// function uid(prefix='id'){ return prefix + '_' + Math.random().toString(36).substr(2,9); }
// function formatCurrency(n){ return (Number(n)||0).toFixed(2).replace('.', ',') + '€'; }

// // Bootstrap toast notification
// function toast(msg, type='info'){
//   const toastContainer = document.getElementById('toastContainer') || createToastContainer();
//   const toastId = 'toast_' + Date.now();

//   const bgClass = {
//     'success': 'bg-success',
//     'error': 'bg-danger',
//     'warning': 'bg-warning',
//     'info': 'bg-primary'
//   }[type] || 'bg-primary';

//   const icon = {
//     'success': 'fas fa-check-circle',
//     'error': 'fas fa-exclamation-circle',
//     'warning': 'fas fa-exclamation-triangle',
//     'info': 'fas fa-info-circle'
//   }[type] || 'fas fa-info-circle';

//   const toastHTML = `
//     <div class="toast align-items-center text-white ${bgClass} border-0" role="alert" id="${toastId}">
//       <div class="d-flex">
//         <div class="toast-body">
//           <i class="${icon} me-2"></i>${msg}
//         </div>
//         <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
//       </div>
//     </div>
//   `;

//   toastContainer.insertAdjacentHTML('beforeend', toastHTML);
//   const toastElement = document.getElementById(toastId);
//   const bsToast = new bootstrap.Toast(toastElement);
//   bsToast.show();

//   // Remove toast element after it's hidden
//   toastElement.addEventListener('hidden.bs.toast', () => {
//     toastElement.remove();
//   });
// }

// function createToastContainer() {
//   const container = document.createElement('div');
//   container.id = 'toastContainer';
//   container.className = 'toast-container position-fixed top-0 end-0 p-3';
//   container.style.zIndex = '1060';
//   document.body.appendChild(container);
//   return container;
// }

// /* ----------------------
//    Data Management
//    ---------------------- */
// function loadProducts(){
//   return JSON.parse(localStorage.getItem('nana_products') || '[]');
// }
// function saveProducts(data){
//   localStorage.setItem('nana_products', JSON.stringify(data));
// }
// function loadCart(){
//   return JSON.parse(localStorage.getItem('nana_cart') || '[]');
// }
// function saveCart(data){
//   localStorage.setItem('nana_cart', JSON.stringify(data));
// }
// function loadLikes(){
//   return JSON.parse(localStorage.getItem('nana_likes') || '[]');
// }
// function saveLikes(data){
//   localStorage.setItem('nana_likes', JSON.stringify(data));
// }
// function loadOrders(){
//   return JSON.parse(localStorage.getItem('nana_client_orders') || '[]');
// }
// function saveOrders(data){
//   localStorage.setItem('nana_client_orders', JSON.stringify(data));
// }

// /* ----------------------
//    Sample Data Initialization
//    ---------------------- */
// function initSampleData(){
//   if(!localStorage.getItem('nana_products')){
//     const sampleProducts = [
//       {
//         id: uid('prod'),
//         title: 'Robe d\'été fleurie',
//         category: 'Vêtements',
//         price: 45.99,
//         stock: 12,
//         image: 'https://picsum.photos/seed/dress1/400/400',
//         description: 'Belle robe d\'été légère et confortable avec motifs floraux. Parfaite pour les journées ensoleillées.',
//         featured: true,
//         dateAdded: Date.now() - 86400000 * 5
//       },
//       {
//         id: uid('prod'),
//         title: 'Sac à main cuir',
//         category: 'Accessoires',
//         price: 89.99,
//         stock: 8,
//         image: 'https://picsum.photos/seed/bag1/400/400',
//         description: 'Sac à main élégant en cuir véritable. Design intemporel et pratique pour tous les jours.',
//         featured: false,
//         dateAdded: Date.now() - 86400000 * 3
//       },
//       {
//         id: uid('prod'),
//         title: 'Collier perles naturelles',
//         category: 'Bijoux',
//         price: 25.50,
//         stock: 25,
//         image: 'https://picsum.photos/seed/necklace1/400/400',
//         description: 'Collier délicat avec perles naturelles. Bijou raffiné pour sublimer vos tenues.',
//         featured: true,
//         dateAdded: Date.now() - 86400000 * 7
//       },
//       {
//         id: uid('prod'),
//         title: 'Sandales été',
//         category: 'Chaussures',
//         price: 65.00,
//         stock: 15,
//         image: 'https://picsum.photos/seed/sandals1/400/400',
//         description: 'Sandales confortables pour l\'été. Semelle ergonomique et design moderne.',
//         featured: false,
//         dateAdded: Date.now() - 86400000 * 2
//       },
//       {
//         id: uid('prod'),
//         title: 'Bracelet argent',
//         category: 'Bijoux',
//         price: 35.00,
//         stock: 20,
//         image: 'https://picsum.photos/seed/bracelet1/400/400',
//         description: 'Bracelet en argent sterling avec finitions délicates. Élégance assurée.',
//         featured: false,
//         dateAdded: Date.now() - 86400000 * 4
//       },
//       {
//         id: uid('prod'),
//         title: 'Écharpe soie',
//         category: 'Accessoires',
//         price: 42.00,
//         stock: 10,
//         image: 'https://picsum.photos/seed/scarf1/400/400',
//         description: 'Écharpe en soie pure avec motifs artistiques. Accessoire de luxe pour toutes saisons.',
//         featured: true,
//         dateAdded: Date.now() - 86400000 * 6
//       },
//       {
//         id: uid('prod'),
//         title: 'Baskets blanches',
//         category: 'Chaussures',
//         price: 78.99,
//         stock: 12,
//         image: 'https://picsum.photos/seed/sneakers1/400/400',
//         description: 'Baskets blanches tendance. Confort optimal et style urbain pour un look décontracté.',
//         featured: false,
//         dateAdded: Date.now() - 86400000 * 1
//       },
//       {
//         id: uid('prod'),
//         title: 'Pochette soirée',
//         category: 'Sacs',
//         price: 55.00,
//         stock: 6,
//         image: 'https://picsum.photos/seed/clutch1/400/400',
//         description: 'Pochette élégante pour vos soirées. Design sophistiqué avec finitions dorées.',
//         featured: true,
//         dateAdded: Date.now() - 86400000 * 8
//       }
//     ];
//     saveProducts(sampleProducts);
//   }
// }

// /* ----------------------
//    Product Display & Filtering
//    ---------------------- */
// let currentProducts = [];
// let filteredProducts = [];
// let currentFilters = {
//   categories: [],
//   priceRanges: [],
//   search: '',
//   sort: 'name'
// };

// function renderProducts(products = null) {
//   const grid = $('#productsGrid');
//   const loading = $('#loadingState');
//   const empty = $('#emptyState');

//   if (products === null) {
//     products = getFilteredProducts();
//   }

//   // Hide loading and empty states
//   loading.classList.add('d-none');
//   empty.classList.add('d-none');

//   if (products.length === 0) {
//     grid.innerHTML = '';
//     empty.classList.remove('d-none');
//     return;
//   }

//   const likes = loadLikes();

//   grid.innerHTML = products.map(product => `
//     <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
//       <div class="card product-card h-100" data-id="${product.id}">
//         <img src="${product.image}" alt="${product.title}" class="card-img-top product-image" loading="lazy">
//         <div class="card-body d-flex flex-column">
//           <div class="product-category mb-2">${product.category}</div>
//           <h5 class="card-title product-title">${product.title}</h5>
//           <div class="product-price mb-3">${formatCurrency(product.price)}</div>
//           <div class="mt-auto">
//             <div class="d-flex gap-2 align-items-center">
//               <button class="btn btn-primary flex-grow-1 add-to-cart" data-id="${product.id}">
//                 <i class="fas fa-cart-plus me-2"></i>Ajouter
//               </button>
//               <button class="btn btn-outline-secondary view-details" data-id="${product.id}">
//                 <i class="fas fa-eye"></i>
//               </button>
//               <button class="btn like-btn ${likes.includes(product.id) ? 'liked' : ''}" data-id="${product.id}">
//                 <i class="fas fa-heart"></i>
//               </button>
//             </div>
//           </div>
//         </div>
//       </div>
//     </div>
//   `).join('');

//   // Bind event listeners
//   bindProductEvents();
// }

// function bindProductEvents() {
//   // Add to cart buttons
//   $$('.add-to-cart').forEach(btn => {
//     btn.addEventListener('click', (e) => {
//       e.stopPropagation();
//       const productId = btn.dataset.id;
//       addToCart(productId);
//     });
//   });

//   // View details buttons
//   $$('.view-details').forEach(btn => {
//     btn.addEventListener('click', (e) => {
//       e.stopPropagation();
//       const productId = btn.dataset.id;
//       showProductDetails(productId);
//     });
//   });

//   // Like buttons
//   $$('.like-btn').forEach(btn => {
//     btn.addEventListener('click', (e) => {
//       e.stopPropagation();
//       const productId = btn.dataset.id;
//       toggleLike(productId);
//     });
//   });

//   // Product card click (show details)
//   $$('.product-card').forEach(card => {
//     card.addEventListener('click', () => {
//       const productId = card.dataset.id;
//       showProductDetails(productId);
//     });
//   });
// }

// function getFilteredProducts() {
//   let products = [...currentProducts];

//   // Filter by categories
//   if (currentFilters.categories.length > 0 && !currentFilters.categories.includes('all')) {
//     products = products.filter(p => currentFilters.categories.includes(p.category));
//   }

//   // Filter by price ranges
//   if (currentFilters.priceRanges.length > 0) {
//     products = products.filter(p => {
//       return currentFilters.priceRanges.some(range => {
//         switch(range) {
//           case '0-25': return p.price >= 0 && p.price <= 25;
//           case '25-50': return p.price > 25 && p.price <= 50;
//           case '50-100': return p.price > 50 && p.price <= 100;
//           case '100+': return p.price > 100;
//           default: return true;
//         }
//       });
//     });
//   }

//   // Filter by search
//   if (currentFilters.search) {
//     const query = currentFilters.search.toLowerCase();
//     products = products.filter(p =>
//       p.title.toLowerCase().includes(query) ||
//       p.description.toLowerCase().includes(query) ||
//       p.category.toLowerCase().includes(query)
//     );
//   }

//   // Sort products
//   switch(currentFilters.sort) {
//     case 'price-asc':
//       products.sort((a, b) => a.price - b.price);
//       break;
//     case 'price-desc':
//       products.sort((a, b) => b.price - a.price);
//       break;
//     case 'newest':
//       products.sort((a, b) => b.dateAdded - a.dateAdded);
//       break;
//     case 'name':
//     default:
//       products.sort((a, b) => a.title.localeCompare(b.title));
//       break;
//   }

//   return products;
// }

// function updateFilters() {
//   // Get category filters
//   currentFilters.categories = [];
//   $$('input[id^="cat-"]:checked').forEach(input => {
//     const category = input.id.replace('cat-', '');
//     if (category === 'all') {
//       currentFilters.categories = ['all'];
//     } else {
//       currentFilters.categories.push(getCategoryName(category));
//     }
//   });

//   // Get price filters
//   currentFilters.priceRanges = [];
//   $$('input[id^="price-"]:checked').forEach(input => {
//     const range = input.id.replace('price-', '');
//     currentFilters.priceRanges.push(range);
//   });

//   // Get search
//   currentFilters.search = $('#productSearch').value.trim();

//   // Get sort
//   currentFilters.sort = $('#sortProducts').value;

//   // Re-render products
//   renderProducts();
// }

// function getCategoryName(key) {
//   const mapping = {
//     'vetements': 'Vêtements',
//     'accessoires': 'Accessoires',
//     'chaussures': 'Chaussures',
//     'bijoux': 'Bijoux',
//     'sacs': 'Sacs'
//   };
//   return mapping[key] || key;
// }

// /* ----------------------
//    Like System
//    ---------------------- */
// function toggleLike(productId) {
//   const likes = loadLikes();
//   const index = likes.indexOf(productId);

//   if (index > -1) {
//     likes.splice(index, 1);
//     toast('Produit retiré des favoris', 'info');
//   } else {
//     likes.push(productId);
//     toast('Produit ajouté aux favoris', 'success');
//   }

//   saveLikes(likes);

//   // Update UI
//   const likeBtn = $(`.like-btn[data-id="${productId}"]`);
//   if (likeBtn) {
//     likeBtn.classList.toggle('liked');
//   }
// }

// /* ----------------------
//    Product Details Modal (Bootstrap)
//    ---------------------- */
// function showProductDetails(productId) {
//   const product = currentProducts.find(p => p.id === productId);
//   if (!product) return;

//   const likes = loadLikes();
//   const isLiked = likes.includes(productId);

//   const modalContent = `
//     <div class="modal-header">
//       <h5 class="modal-title">
//         <i class="fas fa-info-circle me-2"></i>Détails du produit
//       </h5>
//       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
//     </div>
//     <div class="modal-body">
//       <div class="row">
//         <div class="col-md-6">
//           <img src="${product.image}" alt="${product.title}" class="img-fluid rounded mb-3">
//         </div>
//         <div class="col-md-6">
//           <div class="badge bg-secondary mb-2">${product.category}</div>
//           <h4 class="mb-3">${product.title}</h4>
//           <div class="h3 text-primary mb-3">${formatCurrency(product.price)}</div>
//           <p class="text-muted mb-3">${product.description}</p>
//           <div class="mb-3">
//             <strong><i class="fas fa-boxes me-2"></i>Stock disponible:</strong>
//             <span class="badge bg-success">${product.stock} unités</span>
//           </div>
//         </div>
//       </div>
//     </div>
//     <div class="modal-footer">
//       <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
//         <i class="fas fa-times me-2"></i>Fermer
//       </button>
//       <button type="button" class="btn ${isLiked ? 'btn-danger' : 'btn-outline-danger'}" onclick="toggleLike('${productId}'); updateLikeButton(this, '${productId}');">
//         <i class="fas fa-heart me-2"></i>${isLiked ? 'Retirer des favoris' : 'Ajouter aux favoris'}
//       </button>
//       <button type="button" class="btn btn-primary" onclick="addToCart('${productId}'); bootstrap.Modal.getInstance(document.getElementById('productModal')).hide();">
//         <i class="fas fa-cart-plus me-2"></i>Ajouter au panier
//       </button>
//     </div>
//   `;

//   $('#modalContent').innerHTML = modalContent;
//   const modal = new bootstrap.Modal($('#productModal'));
//   modal.show();
// }

// function updateLikeButton(button, productId) {
//   const likes = loadLikes();
//   const isLiked = likes.includes(productId);

//   if (isLiked) {
//     button.className = 'btn btn-danger';
//     button.innerHTML = '<i class="fas fa-heart me-2"></i>Retirer des favoris';
//   } else {
//     button.className = 'btn btn-outline-danger';
//     button.innerHTML = '<i class="fas fa-heart me-2"></i>Ajouter aux favoris';
//   }

//   // Update product card like button
//   const cardLikeBtn = $(`.like-btn[data-id="${productId}"]`);
//   if (cardLikeBtn) {
//     cardLikeBtn.classList.toggle('liked', isLiked);
//   }
// }

// /* ----------------------
//    Cart Management
//    ---------------------- */
// function addToCart(productId, quantity = 1) {
//   const product = currentProducts.find(p => p.id === productId);
//   if (!product) return;

//   if (product.stock < quantity) {
//     toast('Stock insuffisant', 'error');
//     return;
//   }

//   const cart = loadCart();
//   const existingItem = cart.find(item => item.productId === productId);

//   if (existingItem) {
//     if (existingItem.quantity + quantity > product.stock) {
//       toast('Stock insuffisant', 'error');
//       return;
//     }
//     existingItem.quantity += quantity;
//   } else {
//     cart.push({
//       productId,
//       title: product.title,
//       price: product.price,
//       image: product.image,
//       quantity,
//       addedAt: Date.now()
//     });
//   }

//   saveCart(cart);
//   updateCartUI();
//   toast('Produit ajouté au panier', 'success');
// }

// function removeFromCart(productId) {
//   const cart = loadCart().filter(item => item.productId !== productId);
//   saveCart(cart);
//   updateCartUI();
//   renderCartItems();
//   toast('Produit retiré du panier', 'info');
// }

// function updateCartQuantity(productId, newQuantity) {
//   if (newQuantity <= 0) {
//     removeFromCart(productId);
//     return;
//   }

//   const product = currentProducts.find(p => p.id === productId);
//   if (product && newQuantity > product.stock) {
//     toast('Stock insuffisant', 'error');
//     return;
//   }

//   const cart = loadCart();
//   const item = cart.find(item => item.productId === productId);
//   if (item) {
//     item.quantity = newQuantity;
//     saveCart(cart);
//     updateCartUI();
//     renderCartItems();
//   }
// }

// function updateCartUI() {
//   const cart = loadCart();
//   const cartCount = cart.reduce((sum, item) => sum + item.quantity, 0);
//   const cartTotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

//   const countElement = $('#cartCount');
//   countElement.textContent = cartCount;
//   $('#cartSubtotal').textContent = formatCurrency(cartTotal);
//   $('#cartTotal').textContent = formatCurrency(cartTotal);

//   // Show/hide cart count badge
//   if (cartCount > 0) {
//     countElement.classList.remove('d-none');
//   } else {
//     countElement.classList.add('d-none');
//   }
// }

// function renderCartItems() {
//   const cart = loadCart();
//   const cartContent = $('#cartContent');

//   if (cart.length === 0) {
//     cartContent.innerHTML = `
//       <div class="text-center py-5">
//         <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
//         <h5>Votre panier est vide</h5>
//         <p class="text-muted">Ajoutez des produits pour commencer vos achats</p>
//       </div>
//     `;
//     return;
//   }

//   cartContent.innerHTML = cart.map(item => `
//     <div class="d-flex align-items-center border-bottom py-3">
//       <img src="${item.image}" alt="${item.title}" class="cart-item-image me-3">
//       <div class="flex-grow-1">
//         <h6 class="mb-1">${item.title}</h6>
//         <div class="text-primary fw-bold">${formatCurrency(item.price)}</div>
//         <div class="d-flex align-items-center mt-2">
//           <button class="btn btn-outline-secondary btn-sm qty-btn" onclick="updateCartQuantity('${item.productId}', ${item.quantity - 1})">
//             <i class="fas fa-minus"></i>
//           </button>
//           <span class="mx-3 fw-bold">${item.quantity}</span>
//           <button class="btn btn-outline-secondary btn-sm qty-btn" onclick="updateCartQuantity('${item.productId}', ${item.quantity + 1})">
//             <i class="fas fa-plus"></i>
//           </button>
//           <button class="btn btn-outline-danger btn-sm ms-3" onclick="removeFromCart('${item.productId}')">
//             <i class="fas fa-trash"></i>
//           </button>
//         </div>
//       </div>
//     </div>
//   `).join('');
// }

// function toggleCart() {
//   const cartSidebar = $('#cartSidebar');
//   cartSidebar.classList.toggle('open');

//   if (cartSidebar.classList.contains('open')) {
//     renderCartItems();
//   }
// }

// function closeCart() {
//   $('#cartSidebar').classList.remove('open');
// }

// /* ----------------------
//    Checkout Process (Bootstrap Modal)
//    ---------------------- */
// function processCheckout() {
//   const cart = loadCart();
//   if (cart.length === 0) {
//     toast('Votre panier est vide', 'error');
//     return;
//   }

//   showCheckoutModal();
// }

// function showCheckoutModal() {
//   const cart = loadCart();
//   const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

//   const modalContent = `
//     <div class="modal-header">
//       <h5 class="modal-title">
//         <i class="fas fa-credit-card me-2"></i>Finaliser la commande
//       </h5>
//       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
//     </div>
//     <div class="modal-body">
//       <form id="checkoutForm">
//         <div class="mb-4">
//           <h6><i class="fas fa-truck me-2"></i>Informations de livraison</h6>
//           <div class="row mb-3">
//             <div class="col-md-6">
//               <label class="form-label">Prénom *</label>
//               <input type="text" class="form-control" name="firstName" required>
//             </div>
//             <div class="col-md-6">
//               <label class="form-label">Nom *</label>
//               <input type="text" class="form-control" name="lastName" required>
//             </div>
//           </div>
//           <div class="mb-3">
//             <label class="form-label">Email *</label>
//             <input type="email" class="form-control" name="email" required>
//           </div>
//           <div class="mb-3">
//             <label class="form-label">Téléphone *</label>
//             <input type="tel" class="form-control" name="phone" required>
//           </div>
//           <div class="mb-3">
//             <label class="form-label">Adresse *</label>
//             <input type="text" class="form-control" name="address" required>
//           </div>
//           <div class="row">
//             <div class="col-md-8">
//               <label class="form-label">Ville *</label>
//               <input type="text" class="form-control" name="city" required>
//             </div>
//             <div class="col-md-4">
//               <label class="form-label">Code postal *</label>
//               <input type="text" class="form-control" name="zipCode" required>
//             </div>
//           </div>
//         </div>

//         <div class="mb-4">
//           <h6><i class="fas fa-receipt me-2"></i>Résumé de la commande</h6>
//           <div class="bg-light p-3 rounded">
//             ${cart.map(item => `
//               <div class="d-flex justify-content-between mb-2">
//                 <span>${item.title} x${item.quantity}</span>
//                 <span class="fw-bold">${formatCurrency(item.price * item.quantity)}</span>
//               </div>
//             `).join('')}
//             <hr>
//             <div class="d-flex justify-content-between fw-bold fs-5">
//               <span>Total</span>
//               <span class="text-primary">${formatCurrency(total)}</span>
//             </div>
//           </div>
//         </div>
//       </form>
//     </div>
//     <div class="modal-footer">
//       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
//         <i class="fas fa-times me-2"></i>Annuler
//       </button>
//       <button type="button" class="btn btn-primary" onclick="submitOrder()">
//         <i class="fas fa-check me-2"></i>Confirmer la commande
//       </button>
//     </div>
//   `;

//   $('#modalContent').innerHTML = modalContent;
//   const modal = new bootstrap.Modal($('#productModal'));
//   modal.show();
// }

// function submitOrder() {
//   const form = $('#checkoutForm');
//   if (!form.checkValidity()) {
//     form.reportValidity();
//     return;
//   }

//   const formData = new FormData(form);
//   const cart = loadCart();
//   const orderData = {
//     id: uid('order'),
//     items: cart,
//     customer: {
//       firstName: formData.get('firstName'),
//       lastName: formData.get('lastName'),
//       email: formData.get('email'),
//       phone: formData.get('phone'),
//       address: formData.get('address'),
//       city: formData.get('city'),
//       zipCode: formData.get('zipCode')
//     },
//     total: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0),
//     status: 'pending',
//     date: Date.now()
//   };

//   // Save order
//   const orders = loadOrders();
//   orders.push(orderData);
//   saveOrders(orders);

//   // Clear cart
//   saveCart([]);
//   updateCartUI();
//   closeCart();

//   // Hide current modal
//   bootstrap.Modal.getInstance($('#productModal')).hide();

//   // Show success message
//   toast('Commande passée avec succès !', 'success');
//   showOrderConfirmation(orderData);
// }

// function showOrderConfirmation(order) {
//   const modalContent = `
//     <div class="modal-header border-0">
//       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
//     </div>
//     <div class="modal-body text-center py-5">
//       <div class="mb-4">
//         <i class="fas fa-check-circle fa-4x text-success"></i>
//       </div>
//       <h3 class="mb-3">Commande confirmée !</h3>
//       <p class="mb-3">Votre commande <strong>#${order.id}</strong> a été enregistrée avec succès.</p>
//       <p class="mb-4">Vous recevrez un email de confirmation à l'adresse <strong>${order.customer.email}</strong></p>

//       <div class="bg-light p-3 rounded text-start mb-4">
//         <h6><i class="fas fa-info-circle me-2"></i>Récapitulatif :</h6>
//         <div class="row">
//           <div class="col-6">Total :</div>
//           <div class="col-6 fw-bold text-primary">${formatCurrency(order.total)}</div>
//         </div>
//         <div class="row">
//           <div class="col-6">Statut :</div>
//           <div class="col-6"><span class="badge bg-warning">En attente de traitement</span></div>
//         </div>
//         <div class="row">
//           <div class="col-6">Livraison :</div>
//           <div class="col-6">Sous 3-5 jours ouvrés</div>
//         </div>
//       </div>

//       <button class="btn btn-primary btn-lg" data-bs-dismiss="modal">
//         <i class="fas fa-shopping-bag me-2"></i>Continuer mes achats
//       </button>
//     </div>
//   `;

//   $('#modalContent').innerHTML = modalContent;
//   const modal = new bootstrap.Modal($('#productModal'));
//   modal.show();
// }

// /* ----------------------
//    Event Listeners
//    ---------------------- */
// function initEventListeners() {
//   // Navigation
//   $$('.nav-link').forEach(item => {
//     item.addEventListener('click', (e) => {
//       e.preventDefault();
//       $$('.nav-link').forEach(i => i.classList.remove('active'));
//       item.classList.add('active');
//     });
//   });

//   // Search
//   $('#productSearch').addEventListener('input', debounce(() => {
//     updateFilters();
//   }, 300));

//   // Sort
//   $('#sortProducts').addEventListener('change', updateFilters);

//   // Filters
//   $$('input[type="checkbox"]').forEach(checkbox => {
//     checkbox.addEventListener('change', () => {
//       // Handle "all categories" logic
//       if (checkbox.id === 'cat-all' && checkbox.checked) {
//         $$('input[id^="cat-"]:not(#cat-all)').forEach(cb => cb.checked = false);
//       } else if (checkbox.id.startsWith('cat-') && checkbox.id !== 'cat-all' && checkbox.checked) {
//         $('#cat-all').checked = false;
//       }

//       updateFilters();
//     });
//   });

//   // Clear filters
//   $('#clearFilters').addEventListener('click', () => {
//     $$('input[type="checkbox"]').forEach(cb => cb.checked = false);
//     $('#cat-all').checked = true;
//     $('#productSearch').value = '';
//     $('#sortProducts').value = 'name';
//     updateFilters();
//   });

//   // Cart
//   $('#cartToggle').addEventListener('click', toggleCart);
//   $('#closeCart').addEventListener('click', closeCart);
//   $('#checkoutBtn').addEventListener('click', processCheckout);

//   // Keyboard shortcuts
//   document.addEventListener('keydown', (e) => {
//     if (e.key === 'Escape') {
//       closeCart();
//     }
//   });
// }

// /* ----------------------
//    Utility Functions
//    ---------------------- */
// function debounce(func, wait) {
//   let timeout;
//   return function executedFunction(...args) {
//     const later = () => {
//       clearTimeout(timeout);
//       func(...args);
//     };
//     clearTimeout(timeout);
//     timeout = setTimeout(later, wait);
//   };
// }

// /* ----------------------
//    Initialization
//    ---------------------- */
// function init() {
//   initSampleData();
//   currentProducts = loadProducts();

//   // Show loading state
//   $('#loadingState').classList.remove('d-none');

//   // Simulate loading delay
//   setTimeout(() => {
//     renderProducts();
//     updateCartUI();
//     initEventListeners();
//   }, 500);
// }

// // Initialize when DOM is ready
// document.addEventListener('DOMContentLoaded', init);

// /* ----------------------
//    Global Functions (for inline event handlers)
//    ---------------------- */
// window.addToCart = addToCart;
// window.removeFromCart = removeFromCart;
// window.updateCartQuantity = updateCartQuantity;
// window.toggleLike = toggleLike;
// window.updateLikeButton = updateLikeButton;
// window.processCheckout = processCheckout;
// window.submitOrder = submitOrder;

