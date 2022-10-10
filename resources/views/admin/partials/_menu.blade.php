<header id="masthead" class="site-header menu-width">
    <div class="site-branding" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
        <img src="{{ asset('images/CHANNEL PRO.png') }}" alt="" style="height: 300px;">
        <!-- <h1 class="site-title"><a href="index.html" rel="home">Channel Pro TV</a></h1>
        <h2 class="site-description">Minimalist Portfolio HTML Template</h2> -->
    </div>
    <nav id="site-navigation" class="main-navigation" >
        <button class="menu-toggle">Menu</button>
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
        <div class="menu-menu-1-container">
            <ul id="menu-menu-1" class="menu">
                <li><a href="{{ route('admin.profile') }}">Profil</a></li>
                <li><a href="{{ route('admin.posts') }}">Posts</a></li>
                <!-- <li><a href="shop.html">Shop</a></li> -->
                <li><a href="{{ route('admin.rubriques') }}">Rubriques</a></li>
                <!-- <li><a href="elements.html">Elements</a></li> -->
                <li><a href="#">{{ $LoggedAdminInfo->name }}</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.logout') }}">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- #masthead -->
