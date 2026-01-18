<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Dashboard Final - HF Digital Admin</title>
    <meta name="description" content="Dashboard admin fusionné - HackFactory" />
    <!-- Fonts & icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        :root {
            --bg: #071826;
            --card: #0f394e;
            --muted: #9fcfe0;
            --accent: #6ad7e1;
            --green: #32C66C;
            --danger: #ef5350;
            --glass: rgba(255, 255, 255, 0.03);
            --radius: 14px;
            --maxw: 1400px;
            font-family: 'Inter', sans-serif;
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%;
            margin: 0;
            background: var(--bg);
            color: #e6f7fb;
            -webkit-font-smoothing: antialiased
        }

        a {
            color: inherit
        }

        header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: linear-gradient(180deg, rgba(10, 40, 60, 0.6), transparent);
            backdrop-filter: blur(4px);
            border-bottom: 1px solid rgba(106, 215, 225, 0.06)
        }

        .hdr {
            max-width: var(--maxw);
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px
        }

        .brand {
            display: flex;
            gap: 12px;
            align-items: center;
            font-weight: 700
        }

        .logo-sq {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--green);
            display: grid;
            place-items: center;
            color: #04221b;
            font-weight: 800
        }

        .hdr-actions {
            display: flex;
            gap: 10px;
            align-items: center
        }

        .btn {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.04);
            background: transparent;
            color: var(--accent);
            cursor: pointer
        }

        .btn--success {
            background: var(--green);
            color: #032011;
            border: none
        }

        .btn--danger {
            background: var(--danger);
            color: #fff;
            border: none
        }

        main {
            max-width: var(--maxw);
            margin: 20px auto;
            padding: 0 16px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px
        }

        @media(min-width:1024px) {
            main {
                grid-template-columns: 1fr 340px;
            }
        }

        /* Cards */
        .card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border-radius: var(--radius);
            padding: 16px;
            box-shadow: 0 6px 30px rgba(2, 8, 12, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.02)
        }

        .card h2,
        .card h3 {
            margin: 0 0 12px 0;
            color: var(--accent);
            font-size: 1.05rem
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px
        }

        @media(min-width:640px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr)
            }
        }

        .stat {
            padding: 12px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--green), var(--accent));
            color: #02241b;
            text-align: center
        }

        .stat small {
            display: block;
            opacity: 0.9
        }

        .stat b {
            display: block;
            font-size: 1.25rem;
            margin-top: 6px
        }

        /* Chart */
        .chart-wrap {
            height: 260px;
            border-radius: 10px;
            padding: 8px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.01), rgba(255, 255, 255, 0.02));
            overflow: hidden
        }

        /* Tables */
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.92rem
        }

        .table th {
            color: var(--accent);
            text-align: left;
            padding: 10px 8px;
            border-bottom: 1px solid rgba(106, 215, 225, 0.06)
        }

        .table td {
            padding: 10px 8px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
            color: var(--muted)
        }

        .badge {
            padding: 6px 8px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 0.82rem
        }

        .badge--success {
            background: rgba(50, 198, 108, 0.12);
            color: var(--green)
        }

        .badge--pending {
            background: rgba(255, 167, 38, 0.08);
            color: #FFA726
        }

        .badge--cancel {
            background: rgba(239, 83, 80, 0.08);
            color: var(--danger)
        }

        /* Sidebar tabs */
        .tabs {
            display: flex;
            gap: 6px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
            margin-bottom: 12px;
            flex-wrap: wrap
        }

        .tab-btn {
            padding: 8px 10px;
            background: transparent;
            border: none;
            color: var(--muted);
            cursor: pointer;
            border-radius: 8px
        }

        .tab-btn.active {
            color: var(--accent);
            background: rgba(106, 215, 225, 0.03);
            border: 1px solid rgba(106, 215, 225, 0.04)
        }

        /* Forms */
        label {
            display: block;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: 6px;
            font-size: 0.9rem
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.04);
            background: var(--glass);
            color: #e6f7fb;
            margin-bottom: 10px;
            font-size: 0.95rem
        }

        textarea {
            resize: vertical;
            min-height: 80px
        }

        /* Small UI */
        .row {
            display: flex;
            gap: 8px;
            align-items: center
        }

        .space-between {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .muted {
            color: var(--muted);
            font-size: 0.9rem
        }

        /* Responsive tweaks */
        @media(max-width:600px) {
            .hdr {
                padding: 10px
            }

            .card {
                padding: 12px
            }

            .stat b {
                font-size: 1rem
            }
        }

        /* Notification */
        .notif {
            position: fixed;
            right: 18px;
            bottom: 18px;
            background: var(--green);
            color: #012012;
            padding: 12px 14px;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(3, 16, 12, 0.45);
            display: none;
            z-index: 9999
        }

        /* small link style */
        .link {
            color: var(--accent);
            cursor: pointer;
            text-decoration: underline
        }

        .small {
            font-size: 0.85rem;
            color: var(--muted)
        }

        #logout-btn a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="hdr">
            <div class="brand">
                <div class="logo-sq">HF</div>
                <div>
                    <div style="font-size:14px">HF Digital Admin ({{$user->name}})</div>
                    <div class="small">Tableau de bord · Administration</div>
                </div>
            </div>
            <div class="hdr-actions">
                <button class="btn" id="darkmode-toggle" title="Toggle style" style="display:none">Mode</button>
                <button class="btn btn--danger" id="logout-btn"><a href="{{ route('home') }}">Deconnexion</a></button>
            </div>
        </div>
    </header>
    @if ($errors->any())
        <hr>
        <div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <hr>
        <div style="color: green; background-color: #d4edda; padding: 10px; border-radius: 5px;">
            <ul>
                <li class=" text-primary">{{ session('success') }}</li>
            </ul>
        </div>
    @endif
    <main>
        <!-- MAIN CONTENT -->
        <section class="card">
            <div class="space-between" style="margin-bottom:12px">
                <h2>Vue d'ensemble</h2>
                <div class="small muted">Données securisée</div>
            </div>

            <div class="stats-grid" style="margin-bottom:14px">
                <div class="stat"><small>Formations</small><b id="total-courses">{{ $formation_count }}</b></div>
                <div class="stat"><small>Utilisateurs</small><b id="total-users">{{ $customer_count }}</b></div>
                <div class="stat"><small>Avis</small><b id="total-reviews">{{ $avis_count }}</b></div>
            </div>

            <div class="card">
                <h3>Utilisateurs récents</h3>
                <div style="overflow:auto">
                    <table class="table" id="users-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Achats</th>
                                <th>Dernière modifcation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- SIDEBAR -->
        <aside>
            <div class="card">
                <div class="tabs" role="tablist" aria-label="Panneau latéral">
                    <button class="tab-btn active" data-tab="add-course">Ajouter</button>
                    <button class="tab-btn" data-tab="courses">Formations</button>
                    <button class="tab-btn" data-tab="reviews">Avis</button>
                </div>

                <!-- ADD COURSE -->
                <div class="tab-panel active" id="add-course-tab">
                    <h3>Ajouter une formation</h3>
                    <form id="course-form" method="POST"
                        action="{{ route('admin.formation.addFormation', ['slug' => $user->slug]) }}"
                        enctype="multipart/form-data" style="background-color: white;">
                        @csrf
                        <label for="title">Titre de la formation</label>
                        <input id="title" name="title" required placeholder="Ex : Formation Laravel Avancée">

                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Décrivez la formation..."></textarea>

                        <label for="price">Prix (€)</label>
                        <input id="price" name="price" type="number" placeholder="49.00" required>

                        <label for="duration">Durée (heures)</label>
                        <input id="duration" name="duration" type="number" placeholder="12">

                        <label for="nbreModule">Nombre de modules</label>
                        <input id="nbreModule" name="nbreModule" type="number" placeholder="5" required>

                        <label for="imageFormation">Image principale</label>
                        <input id="imageFormation" name="imageFormation" type="file" accept="image/*">

                        <label for="aproposFormation">À propos de la formation</label>
                        <textarea id="aproposFormation" name="aproposFormation"
                            placeholder="Texte 'À propos' de la formation..."></textarea>

                        <label for="imageApropos">Image 'À propos'</label>
                        <input id="imageApropos" name="imageApropos" type="file" accept="image/*">

                        <div class="apprentissage">
                            <h4>🎯 Objectifs d’apprentissage</h4>
                            <input name="apprentissage1" placeholder="Compétence 1">
                            <input name="apprentissage2" placeholder="Compétence 2">
                            <input name="apprentissage3" placeholder="Compétence 3">
                            <input name="apprentissage4" placeholder="Compétence 4">
                        </div>

                        <div id="chapitres-container">
                            <h4>📚 Chapitres</h4>
                            <div class="chapitre">
                                <label>Titre du chapitre</label>
                                <input name="chapitres[0][titre]" placeholder="Ex : Introduction à Laravel" required>
                                <label>Description</label>
                                <textarea name="chapitres[0][description]"
                                    placeholder="Description du chapitre..."></textarea>

                                <div class="videos-container">
                                    <label>🎥 Vidéos du chapitre</label>
                                    <div class="video">
                                        <input name="chapitres[0][videos][0][titre]" placeholder="Titre vidéo" required>
                                        <input name="chapitres[0][videos][0][url]"
                                            placeholder="URL vidéo (YouTube, etc.)" required>
                                    </div>
                                </div>
                                <button type="button" class="btn btn--small add-video">+ Ajouter une vidéo</button>
                            </div>
                        </div>

                        <button type="button" class="btn btn--secondary" id="add-chapter">+ Ajouter un chapitre</button>

                        <div style="display:flex;gap:8px;margin-top:12px">
                            <button class="btn btn--success" type="submit">Enregistrer la formation</button>
                            <button class="btn" type="button" id="reset-course">Réinitialiser</button>
                        </div>
                    </form>

                    <style>
                        form {
                            max-width: 600px;
                            margin: auto;
                            padding: 20px;
                            border-radius: 12px;
                            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                        }

                        label {
                            display: block;
                            font-weight: 600;
                            margin-top: 10px;
                        }

                        input,
                        textarea,
                        select {
                            width: 100%;
                            padding: 8px;
                            border: 1px solid #ddd;
                            border-radius: 6px;
                            margin-top: 4px;
                            margin-bottom: 10px;
                            font-size: 14px;
                            color: black;
                        }

                        textarea {
                            resize: vertical;
                            min-height: 60px;
                        }

                        h4 {
                            margin-top: 15px;
                            color: #333;
                        }

                        .btn {
                            background: #eee;
                            border: none;
                            border-radius: 6px;
                            padding: 8px 12px;
                            cursor: pointer;
                            transition: 0.2s;
                        }

                        .btn:hover {
                            background: #ddd;
                        }

                        .btn--success {
                            background: #28a745;
                            color: white;
                        }

                        .btn--secondary {
                            background: #007bff;
                            color: white;
                        }

                        .btn--danger {
                            background: #dc3545;
                            color: white;
                        }

                        .btn--small {
                            font-size: 13px;
                            padding: 5px 10px;
                            margin-top: 6px;
                        }

                        .chapitre,
                        .video {
                            border: 1px solid #ddd;
                            padding: 10px;
                            border-radius: 8px;
                            margin-bottom: 10px;
                            background: #f9f9f9;
                        }
                    </style>

                </div>

                <!-- COURSES LIST -->
                <div class="tab-panel" id="courses-tab" style="display:none">
                    <h3>Formations disponibles</h3>
                    <div id="courses-list" style="max-height:320px;overflow:auto"></div>
                </div>

                <!-- REVIEWS -->
                <div class="tab-panel" id="reviews-tab" style="display:none">
                    <h3>Avis récents</h3>
                    <div id="reviews-list" style="max-height:300px;overflow:auto"></div>
                </div>
            </div>
        </aside>
    </main>

    <!-- Notification UI -->
    <div class="notif" id="notif">Action effectuée</div>

    <script>
        // --- Mock data (fusion des deux sources) ---
        let mockSalesData = [
            { month: 'Jan', sales: 4000, revenue: 8000 },
            { month: 'Fév', sales: 3000, revenue: 6000 },
            { month: 'Mar', sales: 5000, revenue: 10000 },
            { month: 'Avr', sales: 4500, revenue: 9000 },
            { month: 'Mai', sales: 6000, revenue: 12000 },
            { month: 'Juin', sales: 5500, revenue: 11000 }
        ];

        let mockOrders = [
            { id: '#1004', user: 'Lucas M.', course: 'Production Audio', amount: '79,00 €', status: 'cancelled', date: '2024-06-12' },
            { id: '#1003', user: 'Sophie C.', course: 'Data Science', amount: '99,00 €', status: 'completed', date: '2024-06-13' },
            { id: '#1002', user: 'Thomas M.', course: 'Développement Web', amount: '299,00 €', status: 'pending', date: '2024-06-14' },
            { id: '#1001', user: 'Marie D.', course: 'Marketing Digital', amount: '199,00 €', status: 'completed', date: '2024-06-15' }
        ];

        let mockUsers = [
            @foreach ($customers as $customer)
                { id: {{ $customer->id }}, name: '{{ $customer->name }}', email: '{{ $customer->email }}', lastLogin: '{{ $customer->updated_at }}', purchases: 3 },
            @endforeach

        ];

        let mockCourses = [
            @foreach ($formations as $formation)
                { id: {{ $formation->id }}, title: '{{ $formation->title }}', category: '{{ $formation->nbreModule }} modules', price: '{{ $formation->price }} FCFA', sales: 0 , code: '{{ $formation->codeAccess }}'},
            @endforeach
        ];

        let mockReviews = [
            @foreach ($avis as $avi)
                { user: '{{ $avi->user->name }}', rating: {{ $avi->star }}, comment: '{{ $avi->description }}' },
            @endforeach
        ];

        let mockPromos = [
            { code: 'HF10', type: 'percentage', value: 10, desc: '10% de réduction' },
            { code: 'SUMMER50', type: 'fixed', value: 50, desc: '50€ de réduction' }
        ];

        // --- Utilities ---
        const $ = selector => document.querySelector(selector);
        const $$ = selector => Array.from(document.querySelectorAll(selector));
        function showNotif(text, timeout = 3000) {
            const n = $('#notif');
            n.textContent = text;
            n.style.display = 'block';
            n.style.opacity = '1';
            clearTimeout(n._t);
            n._t = setTimeout(() => { n.style.opacity = '0'; setTimeout(() => n.style.display = 'none', 250); }, timeout);
        }

        function formatCurrency(euroStr) { return euroStr; } // placeholder

        // --- Renderers ---
        function renderOverview() {
            $('#total-courses').textContent = mockCourses.length;
            const totalRevenue = mockOrders.reduce((s, o) => {
                // parse strings like "199,00 €"
                const num = parseFloat(o.amount.replace(/[^\d,.-]/g, '').replace(',', '.')) || 0;
                return s + num;
            }, 0);
            $('#total-reviews').textContent = mockReviews.length;
        }

        // function renderChart() {
        //     const container = $('#sales-chart');
        //     // Draw a responsive SVG bar chart
        //     const w = Math.max(container.clientWidth, 520);
        //     const h = 240;
        //     const padding = { l: 36, r: 20, t: 20, b: 36 };
        //     const maxR = Math.max(...mockSalesData.map(d => d.revenue));
        //     const barCount = mockSalesData.length;
        //     const barGap = 14;
        //     const barWidth = (w - padding.l - padding.r - (barCount - 1) * barGap) / barCount;
        //     let svg = `<svg width="100%" viewBox="0 0 ${w} ${h}" preserveAspectRatio="xMidYMid meet" style="display:block">`;
        //     // axes
        //     svg += `<line x1="${padding.l}" y1="${h - padding.b}" x2="${w - padding.r}" y2="${h - padding.b}" stroke="rgba(255,255,255,0.06)"/>`;
        //     mockSalesData.forEach((d, i) => {
        //         const x = padding.l + i * (barWidth + barGap);
        //         const barH = (d.revenue / maxR) * (h - padding.t - padding.b);
        //         const y = (h - padding.b) - barH;
        //         svg += `<g transform="translate(${x},0)">`;
        //         svg += `<rect x="0" y="${y}" width="${barWidth}" height="${barH}" rx="6" fill="${i % 2 ? 'url(#grad)' : '#32C66C'}" opacity="0.95" />`;
        //         svg += `<text x="${barWidth / 2}" y="${h - padding.b + 16}" font-size="12" fill="${'#9fcfe0'}" text-anchor="middle">${d.month}</text>`;
        //         svg += `<text x="${barWidth / 2}" y="${y - 8}" font-size="11" fill="#dff7ef" font-weight="700" text-anchor="middle">${Intl.NumberFormat('fr-FR').format(d.revenue)}€</text>`;
        //         svg += `</g>`;
        //     });
        //     // gradient definition
        //     svg = `<svg width="0" height="0" style="position:absolute"><defs><linearGradient id="grad" x1="0" x2="1"><stop offset="0" stop-color="#32C66C"/><stop offset="1" stop-color="#6AD7E1"/></linearGradient></defs></svg>` + svg;
        //     svg += `</svg>`;
        //     container.innerHTML = svg;
        // }

    //     function renderOrders() {
    //         const tbody = $('#orders-table tbody');
    //         tbody.innerHTML = mockOrders.map(o => `
    //     <tr>
    //       <td>${o.id}</td>
    //       <td>${o.user}</td>
    //       <td>${o.course}</td>
    //       <td>${o.amount}</td>
    //       <td><span class="badge ${o.status === 'completed' ? 'badge--success' : o.status === 'pending' ? 'badge--pending' : 'badge--cancel'}">${o.status}</span></td>
    //       <td>${o.date}</td>
    //       <td><button class="btn" onclick="editOrder('${o.id}')">Modifier</button> <button class="btn btn--danger" onclick="deleteOrder('${o.id}')">Suppr.</button></td>
    //     </tr>
    //   `).join('');
    //     }
        const deleteCustomerBaseUrl = "{{ route('admin.customer.deleteCustomer', ['slug' => $user->slug, 'customer_id' => 'CUSTOMER_ID']) }}";

        function renderUsers() {
            const tbody = document.querySelector('#users-table tbody'); // ⚠️ utilise querySelector, pas jQuery ici
            tbody.innerHTML = mockUsers.map(u => {
                const deleteUrl = deleteCustomerBaseUrl.replace('CUSTOMER_ID', u.id); // Remplace l'ID dynamiquement
                return `
        <tr>
          <td>${u.name}</td>
          <td>${u.email}</td>
          <td>${u.purchases}</td>
          <td>${u.lastLogin || '-'}</td>
          <td><button class="btn btn--danger" onclick="window.location.href='${deleteUrl}'">Suppr.</button></td>
        </tr>
      `;
            }).join('');
        }


        function renderCourses() {
            const container = $('#courses-list');
            const deleteFormationBaseUrl = "{{ route('admin.formation.deleteFormation', ['slug' => $user->slug, 'formation_id' => 'FORMATION_ID']) }}";

            container.innerHTML = mockCourses.map(c => {
                const deleteUrl = deleteFormationBaseUrl.replace('FORMATION_ID', c.id);
                return `
        <div style="padding:10px;border-bottom:1px solid rgba(255,255,255,0.02);display:flex;justify-content:space-between;align-items:center">
          <div>
            <strong>${c.title}</strong><div class="small muted">${c.category} · ${c.price} · Ventes: ${c.sales} . Code : ${c.code}</div>
          </div>
          <div style="display:flex;gap:6px">
            <button class="btn btn--danger" onclick="window.location.href='${deleteUrl}'">Suppr</button>
          </div>
        </div>
      `}).join('');
        }

        function renderReviews() {
            const container = $('#reviews-list');
            container.innerHTML = mockReviews.map(r => `
        <div style="padding:10px;border-bottom:1px solid rgba(255,255,255,0.02)">
          <strong>${r.user}</strong>
          <div style="margin-top:6px">${'⭐'.repeat(r.rating)} <div class="small" style="margin-top:6px">${r.comment}</div></div>
        </div>
      `).join('');
        }

        // --- Actions ---
        function editOrder(id) { showNotif('Modifier commande ' + id); /* placeholder */ }
        function deleteOrder(id) {
            if (!confirm('Supprimer la commande ' + id + ' ?')) return;
            mockOrders = mockOrders.filter(o => o.id !== id);
            renderOrders(); renderOverview();
            showNotif('Commande ' + id + ' supprimée');
        }

        function deleteUser(id) {
            if (!confirm('Supprimer l\'utilisateur id=' + id + ' ?')) return;
            mockUsers = mockUsers.filter(u => u.id !== id);
            renderUsers(); renderOverview();
            showNotif('Utilisateur supprimé');
        }

        function editCourse(id) {
            const c = mockCourses.find(x => x.id === id);
            if (!c) { showNotif('Cours non trouvé'); return; }
            // pré-remplir le formulaire pour édition (simple UI)
            $('#title').value = c.title;
            $('#category').value = c.category;
            $('#price').value = parseFloat(c.price.replace(/[^\d,.-]/g, '').replace(',', '.')) || '';
            $('#duration').value = '';
            $('#level').value = 'beginner';
            $('#desc').value = '';
            showNotif('Formulaire rempli pour édition (édition non persistée automatique)');
        }

        function deleteCourse(id) {
            if (!confirm('Supprimer la formation id=' + id + ' ?')) return;
            mockCourses = mockCourses.filter(c => c.id !== id);
            renderCourses(); renderOverview();
            showNotif('Formation supprimée');
        }

        function deletePromo(code) {
            if (!confirm('Supprimer la promo ' + code + ' ?')) return;
            mockPromos = mockPromos.filter(p => p.code !== code);
            renderPromos();
            showNotif('Promotion supprimée');
        }

        // --- Export CSV ---
        function exportOrdersCSV() {
            if (!mockOrders.length) { showNotif('Aucune commande à exporter'); return; }
            const headers = ['ID', 'Utilisateur', 'Formation', 'Montant', 'Statut', 'Date'];
            const rows = mockOrders.map(o => [o.id, o.user, o.course, o.amount, o.status, o.date]);
            const csvContent = [headers.join(';'), ...rows.map(r => r.map(v => `"${String(v).replace(/"/g, '""')}"`).join(';'))].join('\n');
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'orders_export.csv';
            document.body.appendChild(a);
            a.click();
            a.remove();
            URL.revokeObjectURL(url);
            showNotif('Export CSV téléchargé');
        }

        // --- Forms handling ---
        document.addEventListener('DOMContentLoaded', () => {
            // feather icons
            if (window.feather) feather.replace();

            // initial render
            renderOverview(); renderUsers(); renderCourses(); renderReviews();

            // responsive redraw chart on resize
            let resizeTimer; window.addEventListener('resize', () => { clearTimeout(resizeTimer); resizeTimer = setTimeout(renderChart, 150); });

            // tab handling (sidebar)
            $$('.tab-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    $$('.tab-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    // show/hide panels
                    $$('.tab-panel').forEach(p => p.style.display = 'none');
                    const id = btn.dataset.tab + '-tab';
                    const panel = document.getElementById(id);
                    if (panel) panel.style.display = '';
                });
            });

            $('#reset-course').addEventListener('click', () => $('#course-form').reset());

            // notif send
            $('#send-notif').addEventListener('click', () => {
                const msg = $('#notif-msg').value.trim();
                if (!msg) { alert('Message vide'); return; }
                // simulate send
                $('#notif-msg').value = '';
                showNotif('Notification envoyée');
            });

            // logout
            $('#logout-btn').addEventListener('click', () => {
                if (confirm('Voulez-vous vraiment vous déconnecter ?')) { showNotif('Déconnexion (simulation)'); }
            });

            // export button
            $('#export-orders-btn').addEventListener('click', exportOrdersCSV);

            // small functions used in template scope:
            window.editOrder = editOrder;
            window.deleteOrder = deleteOrder;
            window.editCourse = editCourse;
            window.deleteCourse = deleteCourse;
            window.deleteUser = deleteUser;
            window.deletePromo = deletePromo;
        });

        // small accessibility improvements: focus outline for keyboard users
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') document.documentElement.style.scrollBehavior = 'smooth';
        });
    </script>
    <script>
        let chapitreIndex = 0;

        document.getElementById('add-chapter').addEventListener('click', () => {
            chapitreIndex++;
            const container = document.getElementById('chapitres-container');
            const newChap = document.createElement('div');
            newChap.classList.add('chapitre');
            newChap.innerHTML = `
        <label>Titre du chapitre</label>
        <input name="chapitres[${chapitreIndex}][titre]" placeholder="Titre du chapitre" required>
        <label>Description</label>
        <textarea name="chapitres[${chapitreIndex}][description]" placeholder="Description..."></textarea>

        <div class="videos-container">
            <label>🎥 Vidéos du chapitre</label>
            <div class="video">
                <input name="chapitres[${chapitreIndex}][videos][0][titre]" placeholder="Titre vidéo" required>
                <input name="chapitres[${chapitreIndex}][videos][0][url]" placeholder="URL vidéo" required>
            </div>
        </div>
        <button type="button" class="btn btn--small add-video">+ Ajouter une vidéo</button>
    `;
            container.appendChild(newChap);
        });

        // Gérer l’ajout de vidéos dans chaque chapitre
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('add-video')) {
                const chapitre = e.target.closest('.chapitre');
                const videosContainer = chapitre.querySelector('.videos-container');
                const videosCount = videosContainer.querySelectorAll('.video').length;
                const chapIndex = Array.from(chapitre.parentNode.children).indexOf(chapitre);
                const newVideo = document.createElement('div');
                newVideo.classList.add('video');
                newVideo.innerHTML = `
            <input name="chapitres[${chapIndex}][videos][${videosCount}][titre]" placeholder="Titre vidéo" required>
            <input name="chapitres[${chapIndex}][videos][${videosCount}][url]" placeholder="URL vidéo" required>
        `;
                videosContainer.appendChild(newVideo);
            }
        });
    </script>

</body>

</html>
