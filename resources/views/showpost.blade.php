@extends('app')
@section('extra-meta')
{{-- <meta http-equiv="refresh" content="3600"> --}}
@endsection
@section('content')
    <div id="content" class="site-content">
        <div id="primary" class="content-area column two-thirds single-portfolio">
            <main id="main" class="site-main">

                <article class="portfolio hentry">
                    <header class="entry-header">
                        <div class="entry-thumbnail">
                            {{-- <img width="800" height="533" src="http://s3.amazonaws.com/caymandemo/wp-content/uploads/sites/15/2015/09/30162427/p1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/> --}}
                            <video class="lazy" controls preload="none" poster="{{ asset('images/CHANNEL PRO.png') }}" loop width="100%" height="200">
                                <source src="{{ asset('videos') }}/{{ $recup->video }}">
                                Votre navigateur ne permet pas de lire cette vidéo.
                                Mais vous pouvez toujours
                                <a href="{{ asset('videos') }}/{{ $recup->video }}">la télécharger</a> !
                            </video>
                        </div>
                        <h1 class="entry-title">{{ $recup->libelle }}</h1>
                        {{-- <a class='portfoliotype'>summer</a> --}}
                        <a class='portfoliotype' style="font-size: 24px">{{ $recup->titre }}</a>
                        {{-- <a class='portfoliotype'>yellow</a> --}}
                    </header>
                    <div class="entry-content">
                        <blockquote>
                            <p>
                                {{ $recup->description }}
                            </p>
                        </blockquote>
                        <a class='portfoliotype'>Posté à {{ $recup->created_at->format('H:i:s') }} le {{ $recup->created_at->format('d-m-Y') }}</a>
                    </div>
                </article>

                <!-- <nav class="navigation post-navigation" role="navigation">
                    <h1 class="screen-reader-text">Post navigation</h1>
                    <div class="nav-links">
                        <div class="nav-previous">
                            <a href="{{ route('Post.show', $recup->id_post-1) }}" rel="prev"> <span class="meta-nav">←</span> Eliza and John</a>
                        </div>
                        <div class="nav-next">
                            <a href="{{ route('Post.show', $recup->id_post+1) }}" rel="next">Sunset Beach <span class="meta-nav">→</span></a>
                        </div>
                    </div>
                </nav> -->
                <!-- .navigation -->

            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->

        <div id="secondary" class="column third">
            @if (isset($LoggedUtilisateurInfo->pseudo))
            @livewire('commentaires', [
                'recup_post' => $recup->id_post,
                'recup_utilisateur' => $LoggedUtilisateurInfo->id_utilisateur,
            ])
            @else
            @livewire('commentaires', [
                'recup_post' => $recup->id_post,
            ])
            @endif
        </div>
    </div>
    <!-- #content -->
@endsection
