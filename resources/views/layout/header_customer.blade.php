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

            <button type="button" class="btn" onclick="openModal()">Mes commandes</button>
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
            <button class="cta"><a href="{{ route('showLogInForm') }}">Se deconnecter</a></button>
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

        <button type="button" class="btn" onclick="openModal()">Mes commandes</button>
        <button class="cta"><a href="{{ route('showLogInForm') }}">Se deconnecter</a></button>
    </nav>
    </div>
    </div>
</header>
