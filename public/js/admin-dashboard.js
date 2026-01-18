/* ===========================================================
   ADMIN DASHBOARD - Frontend standalone (Refactorisé)
   - Données simulées en localStorage
   - Modals séparés pour les produits
   - Sections: dashboard, orders, posts, users, products, settings
   - Charts: Chart.js
   - Export CSV, CRUD posts, likes/comments, order management
   =========================================================== */

/* ----------------------
   Utilities
   ---------------------- */
const $ = sel => document.querySelector(sel);
const $$ = sel => document.querySelectorAll(sel);

function uid(prefix = 'id') { return prefix + '_' + Math.random().toString(36).substr(2, 9); }
function formatCurrency(n) { return '€' + (Number(n) || 0).toFixed(2); }
function toast(msg) { console.log('Toast:', msg); /* Remplacer par une vraie notification */ }

/* ----------------------
   Data management (localStorage)
   ---------------------- */
function loadOrders() { return JSON.parse(localStorage.getItem('nana_orders') || '[]'); }
function saveOrders(data) { localStorage.setItem('nana_orders', JSON.stringify(data)); }
function loadPosts() { return JSON.parse(localStorage.getItem('nana_posts') || '[]'); }
function savePosts(data) { localStorage.setItem('nana_posts', JSON.stringify(data)); }
function loadUsers() { return JSON.parse(localStorage.getItem('nana_users') || '[]'); }
function saveUsers(data) { localStorage.setItem('nana_users', JSON.stringify(data)); }
function loadProducts() { return JSON.parse(localStorage.getItem('nana_products') || '[]'); }
function saveProducts(data) { localStorage.setItem('nana_products', JSON.stringify(data)); }

/* ----------------------
   Modal Management (Séparé)
   ---------------------- */
class ModalManager {
    constructor() {
        this.modalsLoaded = false;
        this.loadProductModals();
    }

    async loadProductModals() {
        if (this.modalsLoaded) return;

    }

    bindProductModalEvents() {

    }


    hideAddProductModal() {
        const modal = $('#addProductModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }


    hideEditProductModal() {
        const modal = $('#editProductModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

    handleAddProduct() {
        const formData = new FormData($('#addProductForm'));
        const productData = {
            id: uid('prod'),
            title: formData.get('name'),
            category: formData.get('category'),
            price: parseFloat(formData.get('price')) || 0,
            stock: parseInt(formData.get('stock')) || 0,
            image: formData.get('image') || 'https://picsum.photos/seed/product/300/300',
            description: formData.get('description') || ''
        };

        const products = loadProducts();
        products.push(productData);
        saveProducts(products);

        this.hideAddProductModal();
        renderProducts();
        toast('Produit ajouté avec succès');
    }

    handleEditProduct() {
        const formData = new FormData($('#editProductForm'));
        const productId = formData.get('id');

        const products = loadProducts();
        const productIndex = products.findIndex(p => p.id === productId);

        if (productIndex !== -1) {
            products[productIndex] = {
                ...products[productIndex],
                title: formData.get('name'),
                category: formData.get('category'),
                price: parseFloat(formData.get('price')) || 0,
                stock: parseInt(formData.get('stock')) || 0,
                image: formData.get('image') || products[productIndex].image,
                description: formData.get('description') || ''
            };

            saveProducts(products);
            this.hideEditProductModal();
            renderProducts();
            toast('Produit modifié avec succès');
        }
    }
}

// Instance globale du gestionnaire de modals
const modalManager = new ModalManager();

/* ----------------------
   Generic modal functions (pour les autres modals)
   ---------------------- */
function openModal(html, callback) {
    const backdrop = $('#modalBackdrop');
    const content = $('#modalContent');
    content.innerHTML = html;
    backdrop.style.display = 'flex';
    if (callback) callback();
}

function closeModal() {
    $('#modalBackdrop').style.display = 'none';
}

// Fermer modal en cliquant sur backdrop
$('#modalBackdrop').addEventListener('click', e => {
    if (e.target === $('#modalBackdrop')) closeModal();
});

/* ----------------------
   Sample data initialization
   ---------------------- */
function initSampleData() {


    if (!localStorage.getItem('nana_posts')) {
        const samplePosts = [
            { id: uid('post'), author: 'Admin', title: 'Nouvelle collection été', content: 'Découvrez notre nouvelle collection pour cet été avec des pièces uniques et tendances.', image: 'https://picsum.photos/seed/post1/600/300', date: Date.now() - 86400000 * 3, likes: 12, comments: [] },
            { id: uid('post'), author: 'Admin', title: 'Promotion spéciale', content: 'Profitez de -20% sur tous les accessoires jusqu\'au 31 juillet !', image: 'https://picsum.photos/seed/post2/600/300', date: Date.now() - 86400000 * 7, likes: 8, comments: [] }
        ];
        savePosts(samplePosts);
    }

}

/* ----------------------
   UI initialization
   ---------------------- */
function initUI() {
    initSampleData();
    computeKPI();
    renderCharts();
    renderOrdersTable();
    renderPosts();
}

/* ----------------------
   Navigation
   ---------------------- */
const panels = {
    dashboard: $('#panel-dashboard'),
    orders: $('#panel-orders'),
    posts: $('#panel-posts'),
    users: $('#panel-users'),
    products: $('#panel-products'),
    settings: $('#panel-settings')
};

$$('.nav-item[data-panel]').forEach(n => {
    n.addEventListener('click', () => {
        $$('.nav-item').forEach(x => x.classList.remove('active'));
        n.classList.add('active');
        const panel = n.dataset.panel;
        // hide all
        Object.values(panels).forEach(p => p.style.display = 'none');
        panels[panel].style.display = 'block';
    });
});

/* ----------------------
   Dashboard: charts and KPIs
   ---------------------- */
let salesChart, categoryChart, topProductsChart;

function computeKPI() {
    const orders = loadOrders();
    const revenue = orders.reduce((s, o) => s + (Number(o.total) || 0), 0);
    const clients = loadUsers().filter(u => u.role === 'client').length;
    const totalOrders = orders.length;
    $('#kpi-revenue').innerText = formatCurrency(revenue);
    $('#kpi-orders').innerText = totalOrders;
    $('#kpi-clients').innerText = clients;
}

/* Chart data builder */
function buildSalesSeries(months = 12) {
    const orders = loadOrders();
    const now = new Date();
    const labels = [];
    const data = [];
    for (let i = months - 1; i >= 0; i--) {
        const d = new Date(now.getFullYear(), now.getMonth() - i, 1);
        labels.push(d.toLocaleString('fr-FR', { month: 'short', year: '2-digit' }));
        const start = new Date(d.getFullYear(), d.getMonth(), 1).getTime();
        const end = new Date(d.getFullYear(), d.getMonth() + 1, 1).getTime();
        const sum = orders.filter(o => o.date >= start && o.date < end).reduce((s, o) => s + (Number(o.total) || 0), 0);
        data.push(Math.round(sum * 100) / 100);
    }
    return { labels, data };
}

function buildCategoryBreakdown() {
    const orders = loadOrders();
    const prodMap = {};
    const products = loadProducts();
    products.forEach(p => prodMap[p.id] = p);
    const catTotals = {};
    orders.forEach(o => {
        o.items.forEach(it => {
            const prod = prodMap[it.productId];
            const cat = (prod && prod.category) || 'Autres';
            catTotals[cat] = (catTotals[cat] || 0) + it.qty * it.price;
        });
    });
    const labels = Object.keys(catTotals);
    const data = labels.map(l => Math.round(catTotals[l] * 100) / 100);
    return { labels, data };
}

function buildTopProducts(limit = 5) {
    const orders = loadOrders();
    const counter = {};
    orders.forEach(o => {
        o.items.forEach(it => {
            counter[it.productName] = (counter[it.productName] || 0) + it.qty;
        });
    });
    const entries = Object.entries(counter).sort((a, b) => b[1] - a[1]).slice(0, limit);
    return { labels: entries.map(e => e[0]), data: entries.map(e => e[1]) };
}

function renderCharts() {
    const months = Number($('#dateRange').value) || 12;
    const salesSeries = buildSalesSeries(months);
    const cat = buildCategoryBreakdown();
    const top = buildTopProducts(5);

    // destroy existing charts
    if (salesChart) salesChart.destroy();
    if (categoryChart) categoryChart.destroy();
    if (topProductsChart) topProductsChart.destroy();

    const ctx1 = $('#salesChart').getContext('2d');
    salesChart = new Chart(ctx1, {
        type: 'line',
        data: { labels: salesSeries.labels, datasets: [{ label: 'CA', data: salesSeries.data, fill: true, backgroundColor: 'rgba(39,174,96,0.12)', borderColor: 'rgba(39,174,96,0.95)', tension: 0.3 }] },
        options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });

    const ctx2 = $('#categoryChart').getContext('2d');
    categoryChart = new Chart(ctx2, { type: 'doughnut', data: { labels: cat.labels, datasets: [{ data: cat.data, backgroundColor: ['#27ae60', '#16a085', '#2ecc71', '#9ae6b4', '#81e6d9'] }] }, options: { plugins: { legend: { position: 'bottom' } } } });

    const ctx3 = $('#topProductsChart').getContext('2d');
    topProductsChart = new Chart(ctx3, { type: 'bar', data: { labels: top.labels, datasets: [{ label: 'Quantité vendue', data: top.data, backgroundColor: '#27ae60' }] }, options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } } });
}

/* wire dateRange */
$('#dateRange').addEventListener('change', () => renderCharts());

/* ----------------------
   ORDERS: render, filter, actions
   ---------------------- */
// function renderOrdersTable(filterStatus = 'all', query = '') {
//     const tbody = $('#ordersTable tbody');
//     const orders = loadOrders().slice().sort((a, b) => b.date - a.date);
//     tbody.innerHTML = '';
//     const q = (query || '').toLowerCase();

//     orders.forEach((o, idx) => {
//         if (filterStatus !== 'all' && o.status !== filterStatus) return;
//         if (q) {
//             const hay = (o.client + ' ' + o.items.map(i => i.productName).join(' ')).toLowerCase();
//             if (!hay.includes(q)) return;
//         }
//         const tr = document.createElement('tr');
//         tr.innerHTML = `
//       <td>${idx + 1}</td>
//       <td>${o.client}</td>
//       <td>${o.items.map(i => `${i.productName} x${i.qty}`).join(', ')}</td>
//       <td>${formatCurrency(o.total)}</td>
//       <td>${new Date(o.date).toLocaleDateString()}</td>
//       <td><span class="status ${o.status}">${o.status}</span></td>
//       <td style="text-align:right">
//         <select data-id="${o.id}" class="status-select" style="padding:6px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
//           <option value="pending">pending</option>
//           <option value="processing">processing</option>
//           <option value="shipped">shipped</option>
//           <option value="cancelled">cancelled</option>
//         </select>
//         <button class="btn ghost view-order" data-id="${o.id}" style="margin-left:8px">Voir</button>
//       </td>
//     `;
//         tbody.appendChild(tr);
//         tr.querySelector('.status-select').value = o.status;
//     });

//     // bind listeners
//     $$('.status-select').forEach(sel => {
//         sel.addEventListener('change', e => {
//             const id = sel.dataset.id;
//             const orders = loadOrders();
//             const o = orders.find(x => x.id === id);
//             if (o) { o.status = sel.value; saveOrders(orders); toast('Statut modifié'); renderOrdersTable($('#filterStatus').value, $('#ordersSearch').value); computeKPI(); renderCharts(); }
//         });
//     });

//     $$('.view-order').forEach(btn => {
//         btn.addEventListener('click', e => {
//             const id = btn.dataset.id;
//             const order = loadOrders().find(x => x.id === id);
//             showOrderModal(order);
//         });
//     });
// }

$('#filterStatus').addEventListener('change', () => renderOrdersTable($('#filterStatus').value, $('#ordersSearch').value));
$('#ordersSearch').addEventListener('input', () => renderOrdersTable($('#filterStatus').value, $('#ordersSearch').value));

/* Create order */
$('#createOrderBtn').addEventListener('click', () => {
    const products = loadProducts();
    openModal(`<h3>Nouvelle commande</h3>
    <div style="display:flex;gap:8px">
      <select id="newOrderProduct">${products.map(p => `<option value="${p.id}">${p.title} — ${formatCurrency(p.price)}</option>`).join('')}</select>
      <input id="newOrderQty" type="number" min="1" value="1" style="width:80px;padding:6px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
    </div>
    <div style="height:8px"></div>
    <div style="display:flex;gap:8px;justify-content:flex-end">
      <button class="btn ghost" id="cancelNewOrder">Annuler</button>
      <button class="btn" id="confirmNewOrder">Créer</button>
    </div>
  `, () => {
        $('#cancelNewOrder').addEventListener('click', closeModal);
        $('#confirmNewOrder').addEventListener('click', () => {
            const pid = $('#newOrderProduct').value;
            const qty = Number($('#newOrderQty').value) || 1;
            const prod = loadProducts().find(p => p.id === pid);
            const orders = loadOrders();
            const newO = { id: uid('o'), client: 'Admin (manual)', items: [{ productId: pid, productName: prod.title, qty, price: prod.price }], total: +(prod.price * qty).toFixed(2), date: Date.now(), status: 'processing' };
            orders.push(newO); saveOrders(orders); closeModal(); toast('Commande créée'); renderOrdersTable($('#filterStatus').value, $('#ordersSearch').value); computeKPI(); renderCharts();
        });
    });
});

/* View order modal */
function showOrderModal(order) {
    if (!order) return;
    openModal(`<h3>Commande #${order.id}</h3>
    <div><strong>Client:</strong> ${order.client}</div>
    <div><strong>Date:</strong> ${new Date(order.date).toLocaleString()}</div>
    <div style="height:8px"></div>
    <div><strong>Items:</strong>
      <ul>${order.items.map(it => `<li>${it.productName} x${it.qty} — ${formatCurrency(it.price)}</li>`).join('')}</ul>
    </div>
    <div><strong>Total:</strong> ${formatCurrency(order.total)}</div>
    <div style="height:8px"></div>
    <div style="display:flex;justify-content:flex-end;gap:8px">
      <button class="btn ghost" id="closeOrderModal">Fermer</button>
    </div>
  `, () => {
        $('#closeOrderModal').addEventListener('click', closeModal);
    });
}

/* Bulk ship (example) */
$('#bulkShipBtn').addEventListener('click', () => {
    const orders = loadOrders();
    let changed = 0;
    orders.forEach(o => { if (o.status === 'pending') { o.status = 'shipped'; changed++; } });
    saveOrders(orders);
    toast(`${changed} commandes mises à jour`);
    renderOrdersTable($('#filterStatus').value, $('#ordersSearch').value); renderCharts(); computeKPI();
});


/* ----------------------
   POSTS: CRUD, likes, comments
   ---------------------- */


function deletePost(id) {
    const posts = loadPosts().filter(p => p.id !== id);
    savePosts(posts);
    renderPosts($('#postSearch').value);
    toast('Publication supprimée');
}



/* escape helper for textarea default values (basic) */
function escapeHtml(s) { return (s || '').replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;'); }

$('#newPostBtn').addEventListener('click', () => openPostEditor());
$('#newPostBtnTop').addEventListener('click', () => openPostEditor());
$('#postSearch').addEventListener('input', () => renderPosts($('#postSearch').value));

/* ----------------------
   USERS rendering & invite
   ---------------------- */

/* ----------------------
   PRODUCTS: render, add, edit, delete
   ---------------------- */


$('#productSearch').addEventListener('input', () => renderProducts($('#productSearch').value));
$('#addProductBtn').addEventListener('click', () => {
    modalManager.showAddProductModal();
});

/* ----------------------
   Settings
   ---------------------- */
$('#saveSettings').addEventListener('click', () => {
    const siteName = $('#siteName').value;
    const currency = $('#currency').value;
    // Sauvegarder en localStorage ou envoyer au serveur
    localStorage.setItem('nana_settings', JSON.stringify({ siteName, currency }));
    toast('Paramètres sauvegardés');
});

$('#applyMaintenance').addEventListener('click', () => {
    const mode = $('#maintenanceMode').value;
    const msg = $('#maintenanceMsg').value;
    localStorage.setItem('nana_maintenance', JSON.stringify({ mode, msg }));
    toast('Mode maintenance appliqué');
});

/* ----------------------
   Helpers: load initial & wire events
   ---------------------- */
document.addEventListener('DOMContentLoaded', () => {
    initUI();

    // refresh charts every minute to simulate live
    setInterval(() => { computeKPI(); renderCharts(); }, 60 * 1000);

    // keyboard shortcut: N = new post
    document.addEventListener('keydown', e => { if (e.key.toLowerCase() === 'n') { openPostEditor(); } });
});

/* End of script */

