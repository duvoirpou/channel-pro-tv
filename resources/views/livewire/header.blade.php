<div>
    <header id="masthead" class="site-header menu-width">
        <div class="site-branding" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
            <img src="{{ asset('images/CHANNEL PRO.png') }}" alt="" style="height: 300px;">
            <!-- <h1 class="site-title"><a href="index.html" rel="home">Channel Pro TV</a></h1>
            <h2 class="site-description">Minimalist Portfolio HTML Template</h2> -->
        </div>
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle">Menu</button>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
            <div class="menu-menu-1-container">
                <ul id="menu-menu-1" class="menu">
                    <li><a href="/">Acceuil</a></li>
                    <li><a href="{{ route('about') }}" class="text-capitalize">à PROPOS</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    @if (isset($LoggedUtilisateurInfo->pseudo))
                    <li><a href="#">{{ $LoggedUtilisateurInfo->pseudo }}</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('utilisateur.logout') }}">Déconnexion</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a href="{{ route('connexion') }}">Connexion</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <!-- #masthead -->

</div>
