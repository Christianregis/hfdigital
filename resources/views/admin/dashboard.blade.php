<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>NANA RAFF — Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        :root {
            --primary-color: #27ae60;
            --secondary-color: #2c3e50;
            --background: #ecf0f1;
            --card: #ffffff;
            --muted: #7f8c8d;
            --glass: rgba(255, 255, 255, 0.7);
            --shadow: 0 12px 30px rgba(44, 62, 80, 0.08);
            --accent: #16a085;
            --danger: #e74c3c;
            --success: #2ecc71;
            --max-width: 1200px;
        }

        /* Basic reset */
        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%;
            background: var(--background);
            color: var(--secondary-color);
            margin: 0;
            padding: 0
        }

        a {
            color: inherit
        }

        /* Layout */
        .wrap {
            max-width: var(--max-width);
            margin: 28px auto;
            padding: 18px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 20px
        }

        @media (max-width:980px) {
            .wrap {
                grid-template-columns: 1fr;
                padding: 12px
            }
        }

        header.admin-header {
            grid-column: 1/-1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 10px
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .logo {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.16)
        }

        .brand h1 {
            font-size: 18px;
            margin: 0
        }

        /* Left sidebar */
        .sidebar {
            background: var(--card);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 12px;
            height: calc(100vh - 88px);
            overflow: auto;
            position: sticky;
            top: 20px
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 10px;
            color: var(--secondary-color);
            cursor: pointer;
            font-weight: 700
        }

        .nav-item:hover {
            background: rgba(39, 174, 96, 0.06)
        }

        .nav-item.active {
            background: linear-gradient(90deg, rgba(39, 174, 96, 0.12), rgba(39, 174, 96, 0.04));
            color: var(--primary-color)
        }

        .sidebar-section {
            margin-top: 14px;
            font-size: 13px;
            color: var(--muted);
            padding: 6px 10px
        }

        /* Main content */
        .content {
            display: flex;
            flex-direction: column;
            gap: 16px
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px
        }

        .card {
            background: var(--card);
            border-radius: 12px;
            padding: 14px;
            box-shadow: var(--shadow)
        }

        .kpi {
            display: flex;
            gap: 12px;
            align-items: center
        }

        .kpi .num {
            font-size: 20px;
            font-weight: 800;
            color: var(--primary-color)
        }

        .controls {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: flex-end
        }

        .status {
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13px
        }

        .status.pending {
            background: #fef3c7;
            color: #92400e
        }

        .status.processing {
            background: #e6fffa;
            color: #0f766e
        }

        .status.shipped {
            background: #ecfdf5;
            color: #065f46
        }

        .status.cancelled {
            background: #fee2e2;
            color: #b91c1c
        }

        /* Posts */
        .post {
            display: flex;
            gap: 12px;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid rgba(44, 62, 80, 0.04)
        }

        .post .meta {
            font-size: 12px;
            color: var(--muted)
        }

        .post .actions {
            margin-left: auto;
            display: flex;
            gap: 6px
        }

        /* Users */
        .user-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px;
            border-bottom: 1px solid #f3f5f7
        }

        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800
        }

        /* Utilities */
        .search {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px;
            border-radius: 10px;
            background: #fff;
            border: 1px solid rgba(44, 62, 80, 0.04)
        }


        .btn.ghost {
            background: transparent;
            color: var(--secondary-color);
            border: 1px solid rgba(44, 62, 80, 0.06)
        }

        /* Modal */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 90
        }


        .modal h3 {
            margin-top: 0
        }

        /* charts container */
        .charts {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 16px
        }

        @media(max-width:980px) {
            .wrap {
                padding: 12px
            }

            ;

            .charts {
                grid-template-columns: 1fr
            }

            ;

            .grid-2 {
                grid-template-columns: 1fr
            }
        }

        /* footer small */
        .footer-note {
            text-align: center;
            color: var(--muted);
            font-size: 13px;
            padding: 8px
        }

        /* small helpers */
        .muted {
            color: var(--muted)
        }

        .flex {
            display: flex;
            align-items: center;
            gap: 8px
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
</head>

<body>

    <div class="wrap">
        @if ($errors->any())
            <hr>
            <div class=" alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <hr>
            <div class=" alert alert-success">
                <ul>
                    <li class=" text-primary">{{ session('success') }}</li>
                </ul>
            </div>
        @endif
        <!-- HEADER -->
        <header class="admin-header">
            <div class="brand">
                <div class="logo" aria-label="logo">
                    <img src="{{ asset('image/logo_1.jpeg') }}" alt="Logo NANA RAFF" class="logo-img">
                </div>
                <div>
                    <h1><span style="font-size:25px;">N</span>ANA <span style="font-size:25px;">R</span>AFF —
                        {{ $user->name }} (Admin)</h1>
                    <div style="font-size:12px;color:var(--muted)">Tableau de bord • Gestion complète</div>
                </div>
            </div>

            <div class="flex">
                <div class="search" title="Recherche rapide">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21l-4.35-4.35" stroke="#2c3e50" stroke-width="2" stroke-linecap="round" />
                        <circle cx="11" cy="11" r="6" stroke="#2c3e50" stroke-width="2" />
                    </svg>
                    <input id="globalSearch" placeholder="Recherche (commandes, clients, produits)..."
                        style="border:0;outline:none;width:320px">
                    <button type="button" class="btn btn-primary text-white"><i class="fas fa-search"></i></button>
                </div>

                <button class="btn btn-success" id="newPostBtn" style="margin-left:12px" data-toggle="modal"
                    data-target="#postModal-add-post"><i class="fas fa-plus"></i>
                    Nouvelle publication</button>
                <button class="btn btn-primary" id="exportOrdersBtn" style="margin-left:8px"
                    onclick="window.location.href='{{ route('admin.orders.exportOrders', ['slug' => $user->slug]) }}'"><i
                        class=" fas fa-download"></i>
                    Exporter commandes</button>
            </div>
        </header>

        <!-- SIDEBAR -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-section">Navigation</div>
            <div class="nav-item active" data-panel="dashboard">Tableau de bord</div>
            <div class="nav-item" data-panel="orders">Commandes</div>
            <div class="nav-item" data-panel="posts">Publications</div>
            <div class="nav-item" data-panel="users">Utilisateurs</div>
            <div class="nav-item" data-panel="products">Produits</div>

            <div class="sidebar-section">Raccourcis</div>
            <div class="nav-item" id="quick-promo" data-toggle="modal" data-target="#promoModal-show-promo">Créer promo
            </div>
            <div class="nav-item" id="quick-notif" data-toggle="modal" data-target="#collaboratorModal-show-co">Collaborateur</div>
            <div class="nav-item" id="quick-notif" data-toggle="modal" data-target="#immoModal-show-immo">Immobiliers</div>
            <div class="nav-item" id="quick-notif" data-toggle="modal" data-target="#conseilModal-show-conseil">Conseils</div>

            <div style="height:22px"></div>
            <div class="sidebar-section">Statut</div>
            <div style="display:flex;gap:8px;align-items:center">
                <div style="width:10px;height:10px;background:#34d399;border-radius:999px"></div>
                <div style="font-weight:700">En ligne</div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="content" id="mainContent">

            <section class="card" id="panel-dashboard">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <div>
                        <div class="muted">Vue d'ensemble</div>
                        <h3 style="margin:6px 0 0">Performance & Résumé</h3>
                    </div>

                    <div class="flex">
                        <div style="text-align:right;margin-right:10px">
                            <div class="muted">CA estimé</div>
                            <div class="num">{{ number_format($revenue, 0, ',', ' ') }} FCFA</div>
                        </div>
                        <div style="text-align:right;margin-right:10px">
                            <div class="muted">Commandes</div>
                            <div class="num">{{ $totalOrders }}</div>
                        </div>
                        <div style="text-align:right">
                            <div class="muted">Clients</div>
                            <div class="num">{{ $totalClients }}</div>
                        </div>
                    </div>
                </div>

                <div style="height:14px"></div>

                <div class="charts card" style="padding:12px;">
                    <div class="card" style="padding:12px;">
                        <canvas id="salesChart" height="180"></canvas>
                    </div>
                    <div style="display:flex;flex-direction:column;gap:12px">
                        <div class="card" style="padding:12px">
                            <canvas id="categoryChart" height="120"></canvas>
                        </div>
                        <div class="card" style="padding:12px;display:flex;flex-direction:column;gap:12px">
                            <div style="display:flex;justify-content:space-between;align-items:center">
                                <div class="muted">Top produits</div>
                                <div class="muted">Ventes</div>
                            </div>
                            <canvas id="topProductsChart" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Scripts Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Données Laravel -> JS
                const salesByMonth = @json($salesByMonth);
                const salesByCategory = @json($salesByCategory);
                const topProducts = @json($topProducts);

                // CA par mois
                new Chart(document.getElementById('salesChart'), {
                    type: 'line',
                    data: {
                        labels: Object.keys(salesByMonth),
                        datasets: [{
                            label: 'CA',
                            data: Object.values(salesByMonth),
                            borderColor: 'blue',
                            fill: false
                        }]
                    }
                });

                // Répartition par catégorie
                new Chart(document.getElementById('categoryChart'), {
                    type: 'doughnut',
                    data: {
                        labels: Object.keys(salesByCategory),
                        datasets: [{
                            data: Object.values(salesByCategory),
                            backgroundColor: ['red', 'blue', 'green', 'orange', 'purple']
                        }]
                    }
                });

                // Top produits
                new Chart(document.getElementById('topProductsChart'), {
                    type: 'bar',
                    data: {
                        labels: Object.keys(topProducts),
                        datasets: [{
                            label: 'Ventes',
                            data: Object.values(topProducts),
                            backgroundColor: 'teal'
                        }]
                    }
                });
            </script>

            <!-- ORDERS PANEL -->
            <section class="card" id="panel-orders" style="display:none;">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <div>
                        <div class="muted">Commandes</div>
                        <h3 style="margin:6px 0 0">Toutes les commandes</h3>
                    </div>
                    <div style="display:flex;gap:8px;align-items:center">
                        <select id="filterStatus"
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                            <option value="all">Tous</option>
                            <option value="pending">En attente</option>
                            <option value="processing">En traitement</option>
                            <option value="shipped">Expédiée</option>
                            <option value="cancelled">Annulée</option>
                        </select>
                        <input id="ordersSearch" placeholder="Recherche commande / client / produit"
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                    </div>
                </div>

                <div style="height:12px"></div>

                <div style="overflow:auto">
                    <table class="table" id="ordersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Produits (Quantite)</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }} | <span
                                            class=" text-decoration-none text-primary">{{ $order->user->email }}</span></td>
                                    <td>
                                        @foreach ($order->products as $product)
                                            {{ $product->title }} ({{ $product->pivot->quantity }}),
                                        @endforeach
                                    </td>
                                    <td>{{ $order->total }} FCFA</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td class=" badge {{ $order->status == "rejected" ? " text-danger" : "text-primary" }}">
                                        {{ $order->status }}
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('admin.order.editOrder', ['slug' => $user->slug, 'order_id' => $order->id, 'status' => 'en attente']) }}'">
                                            <select name="status" id="status" class=" form-control">
                                                <option value="en attente">En attente</option>
                                                <option value="sended">Expediée</option>
                                                <option value="rejected">Rejeté</option>
                                            </select>
                                            <button class="btn btn-warning mt-1"><i
                                                    class="fas fa-edit text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="height:12px"></div>
                <div style="display:flex;justify-content:flex-end;gap:8px">
                    <button class="btn btn-secondary" id="bulkShipBtn"><i class="fas fa-comment"></i> Marquer expédiée
                        (sélection)</button>
                </div>
            </section>

            <!-- POSTS PANEL -->
            <section class="card" id="panel-posts" style="display:none;">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <div>
                        <div class="muted">Publications</div>
                        <h3 style="margin:6px 0 0">Gestion des publications</h>
                    </div>
                    <div style="display:flex;gap:8px">
                        <input id="postSearch" placeholder="Rechercher publication..."
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                        <button class="btn btn-success" id="newPostBtnTop" data-toggle="modal"
                            data-target="#postModal-add-post"><i class="fas fa-plus"></i> Nouvelle
                            publication</button>
                    </div>
                </div>

                <div style="height:12px"></div>

                <div id="postsList"
                    style="display:flex;flex-direction:column;gap:12px;max-height:520px;overflow:auto;padding-right:6px">
                    @foreach ($posts as $post)
                        <div class="post">
                            <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->nom }}"
                                style="width:120px;height:80px;object-fit:cover;border-radius:8px">
                            <div style="flex:1;display:flex;flex-direction:column">
                                <div style="display:flex;align-items:center;">
                                    <strong style="font-size:15px">{{ $post->title }}</strong>
                                    <div style="margin-left:8px" class="muted">par {{ $post->user->name }} •
                                        {{ $post->created_at }}
                                    </div>
                                    <div class="actions" style="display:flex;align-items:center;margin-left:auto">
                                        <button class="btn btn-warning text-white" data-toggle="modal"
                                            data-target="#postModal-edit-{{ $post->id }}"><i class="fas fa-edit"></i>
                                            Modifier</button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#postModal-delete-{{ $post->id }}" style="margin-left:8px"><i
                                                class="fas fa-trash"></i> Supprimer</button>
                                    </div>
                                </div>
                                <div style="margin-top:8px;color:#334155">{{ $post->content }}</div>
                            </div>
                        </div>
                        <!-- Modifier un post-->
                        <div class="modal fade" id="postModal-edit-{{ $post->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form
                                    action="{{ route('admin.post.editPost', ['slug' => $user->slug, 'post_id' => $post->id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier le post
                                                {{ $post->title }} ?
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="title" id="title" placeholder="Nouveau titre..."
                                                class="form-control mb-2 w-100">
                                            <input type="file" name="image" id="image" class=" form-control mb-2 w-100">
                                            <textarea type="number" name="content" rows="5" id="price"
                                                class=" form-control mb-2 w-100"
                                                placeholder="Nouveau contenu..."></textarea><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Fermer</button>
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i>
                                                Modifier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Supprimer un post-->
                        <div class="modal fade" id="postModal-delete-{{ $post->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer le post {{ $post->title }}
                                            ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Confirmer la suppression en appuyant sur "Supprimer"
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"
                                            onclick="window.location.href='{{ route('admin.post.deletePost', ['slug' => $user->slug, 'post_id' => $post->id]) }}'"><i
                                                class="fas fa-trah"></i> Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- USERS PANEL -->
            <section class="card" id="panel-users" style="display:none;">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <div>
                        <div class="muted">Utilisateurs</div>
                        <h3 style="margin:6px 0 0">Gestion des utilisateurs</h3>
                    </div>
                    <div style="display:flex;gap:8px">
                        <input id="userSearch" placeholder="Recherche utilisateur..."
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                        <button class="btn btn-primary" id="inviteUserBtn"><i class="fas fa-comment"></i>
                            Inviter</button>
                    </div>
                </div>

                <div style="height:12px"></div>
                <div style="overflow:auto;max-height:520px">
                    <table class="table table-hover table-bordered align-middle text-start">
                        <thead class="table-dark">
                            <tr>
                                <th>Nom utilisateur</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users_all as $user_all)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <span
                                            class="{{ $user_all->name == $user->name ? " text-primary fw-bold" : "" }}">{{ $user_all->id == $user->id ? "(Vous)" : $user_all->name }}</span>
                                    </td>
                                    <td>{{ $user_all->email }}</td>
                                    <td>{{ $user_all->role == "admin" ? "Adminstrateur" : "Client" }}</td>
                                    <td>
                                        <a class=" btn btn-danger text-decoration-none" href='#' data-toggle="modal"
                                            data-target="#userModal-delete-{{ $user_all->id }}">
                                            <i class="fas fa-trash"></i>
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>

                                <!-- Supprimer un utilisateur-->
                                <div class="modal fade" id="userModal-delete-{{ $user_all->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer l'utilisateur
                                                    {{ $user_all->name }} ?
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Confirmez la suppression en appuyant sur "Supprimer"
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button"
                                                    onclick="window.location.href='{{ route('admin.users.destroy', ['slug' => $user->slug, 'user_all_id' => $user_all->id]) }}'"><i
                                                        class="fas fa-trash"></i>
                                                    Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- PRODUCTS PANEL -->
            <section class="card" id="panel-products" style="display:none;">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <div>
                        <div class="muted">Produits</div>
                        <h3 style="margin:6px 0 0">Catalogue & Stocks</h>
                    </div>
                    <div style="display:flex;gap:8px">
                        <input id="productSearch" placeholder="Recherche produit..."
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                        <button class="btn btn-success" id="addProductBtn" data-toggle="modal"
                            data-target="#productModal-add-product"><i class="fas fa-plus"></i> Ajouter
                            produit</button>

                    </div>
                </div>

                <div style="height:12px"></div>
                <div style="overflow:auto;max-height:520px">
                    <table class="table table-hover table-bordered align-middle text-start">
                        <thead class="table-dark">
                            <tr>
                                <th>Produit</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $produit)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img src="{{ asset('images/' . $produit->image) }}" alt="{{ $produit->nom }}"
                                            style="width:50px; height:50px; object-fit:cover; border-radius:8px; margin-right:10px;">
                                        <span>{{ $produit->title }}</span>
                                    </td>
                                    <td>{{ $produit->category }}</td>
                                    <td>{{ number_format($produit->price, 2, ',', ' ') }} FCFA</td>
                                    <td>
                                        @if($produit->stock > 0)
                                            <span class="badge bg-success text-white">{{ $produit->stock }}</span>
                                        @else
                                            <span class="badge bg-danger text-white">Rupture</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class=" text-white btn btn-primary" data-toggle="modal"
                                            data-target="#productModal-see-{{ $produit->id }}"><i class="fas fa-eye"></i>
                                            Voir</a>
                                        <a href="#" class=" btn btn-warning text-white" data-toggle="modal"
                                            data-target="#productModal-edit-{{ $produit->id }}"><i class="fas fa-edit"></i>
                                            Modifier</a>
                                        <a href="#" class=" btn btn-danger text-white" data-toggle="modal"
                                            data-target="#productModal-delete-{{ $produit->id }}"><i
                                                class="fas fa-trash"></i>
                                            Supprimer</a>
                                    </td>
                                    <!-- Visualiser un produit-->
                                    <div class="modal fade" id="productModal-see-{{ $produit->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Information sur le
                                                        produit {{ $produit->title }}</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('images/' . $produit->image) }}"
                                                        alt="{{ $produit->nom }}"
                                                        style="width:100px; height:100px; object-fit:cover; border-radius:8px; margin-right:10px;">
                                                    <span>{{ $produit->title }}</span> <br>
                                                    Prix : {{ $produit->price }} FCFA <br>
                                                    Categorie du produit : {{ $produit->category }} <br>
                                                    Volume initiale en stock : {{ $produit->stock }} Article(s) <br>
                                                    Volume restant : {{ $produit->reste }} Article(s) <br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="button" data-dismiss="modal"><i
                                                            class="fas fa-check"></i> Compris</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modifier un produit-->
                                    <div class="modal fade" id="productModal-edit-{{ $produit->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form
                                                    action="{{ route('admin.product.editProduct', ['slug' => $user->slug, 'product_id' => $produit->id]) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier le
                                                            produit {{ $produit->title }} ?</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="file" name="image" id="image"
                                                            class=" form-control mb-2 w-100">
                                                        <input type="text" class=" form-control mb-2 w-100"
                                                            placeholder="Nouveau titre...."
                                                            value="{{ $produit->title }}"></input>
                                                        <input type="number" name="price" id="price"
                                                            class=" form-control mb-2 w-100"
                                                            placeholder="Nouveau prix..."><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Fermer</button>
                                                        <button class="btn btn-primary" type="submit"><i
                                                                class="fas fa-edit"></i>
                                                            Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Supprimer un produit-->
                                    <div class="modal fade" id="productModal-delete-{{ $produit->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer le
                                                        produit {{ $produit->title }} ?</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Confirmez la suppression en appuyant sur "Supprimer"
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" type="button"
                                                        onclick="window.location.href='{{ route('admin.product.deleteProduct', ['slug' => $user->slug, 'product_id' => $produit->id,]) }}'"><i
                                                            class="fas fa-trash"></i> Supprimer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Aucun produit trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- SETTINGS PANEL -->
            <section class="card" id="panel-settings" style="display:none;">
                <div>
                    <div class="muted">Paramètres</div>
                    <h3>Configuration du site</h3>
                </div>

                <div style="height:12px"></div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                    <div class="card">
                        <h3>Infos du site</h3>
                        <label>Nom du site</label>
                        <input id="siteName" placeholder="NANA RAFF"
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                        <label style="margin-top:8px">Monnaie</label>
                        <input id="currency" placeholder="FCFA"
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                        <div style="height:10px"></div>
                        <button class="btn btn-primary text-white" id="saveSettings"><i class="fas fa-save"></i>
                            Enregistrer</button>
                    </div>

                    <div class="card">
                        <h3>Maintenance</h3>
                        <label>Mode maintenance</label>
                        <select id="maintenanceMode"
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)">
                            <option value="off">Désactivé</option>
                            <option value="on">Activé</option>
                        </select>
                        <div style="height:6px"></div>
                        <label>Message public</label>
                        <textarea id="maintenanceMsg"
                            style="padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06);height:120px"></textarea>
                        <div style="height:10px"></div>
                        <button class="btn btn-success text-white" id="applyMaintenance"><i class="fas fa-save"></i>
                            Appliquer</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    @include('admin.modal-admin')

    <!-- Modal backdrop pour les modals génériques -->
    <div class="modal-backdrop" id="modalBackdrop">
        <div class="modal" id="modalContent"></div>
    </div>

    <!-- Inclusion des modals séparés pour les produits -->
    <div id="productModalsContainer"></div>

    <script src="{{ asset('js/admin-dashboard.js') }}"></script>
    <script>
        function openPostEditor(id = null) {
            const editing = id ? loadPosts().find(p => p.id === id) : null;
            openModal(`<h3>${editing ? 'Modifier publication' : 'Nouvelle publication'}</h3>
            <form id="postForm" method="POST" action="{{ route('admin.addPublication', ['slug' => $user->slug,]) }}"
                enctype="multipart/form-data">
                @csrf
                <label>Titre</label><input id="postTitle" name="title" value="${editing ? escapeHtml(editing.title) : ''}"
                    style="width:100%;padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)" required>
                <label>Image</label><input id="postImage" type="file" name="image"
                    value="${editing ? escapeHtml(editing.image) : ''}"
                    style="width:100%;padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)" required>
                <label>Contenu</label><textarea id="postContent" name="content"
                    style="width:100%;height:140px;padding:8px;border-radius:8px;border:1px solid rgba(44,62,80,0.06)" required>${editing ? escapeHtml(editing.content) : ''}</textarea>
                <div style="height:8px"></div>
                <div style="display:flex;justify-content:flex-end;gap:8px">
                    <button class="btn ghost" id="cancelPost">Annuler</button>
                    <button class="btn" id="savePost">Enregistrer</button>
                </div>
            </form>
            `, () => {
                $('#cancelPost').addEventListener('click', closeModal);
            });
        }
    </script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>

</html>
