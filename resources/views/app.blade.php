<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('extra-meta')
    <title>Channel Pro TV</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel='stylesheet' href='{{ asset('bootstrap-3.3.7-dist/css/bootstrap.min.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' href='{{ asset('css/font-awesome.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('mediaquery.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('style.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/bloc.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/easy-responsive-shortcodes.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('aos-master/dist/aos.css') }}' type='text/css' media='all' />
    {{-- <link rel='stylesheet' href='{{ asset('select2-4.1.0-rc.0/dist/css/select2.min.css') }}' type='text/css' /> --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}
    <style>
        #circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
        }

        .loader {
            width: calc(100% - 0px);
            height: calc(100% - 0px);
            border: 15px solid #48545F;
            border-top: 15px solid #F89622;
            border-radius: 50%;
            animation: rotate 1.5s linear infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    @livewireStyles
</head>

<body>
    <div id="page">
        <div class="container">
            @include('partials._menu')

            @yield('content')
        </div>
        @include("partials._footer")
    </div>
    <!-- #page -->

    @livewireScripts

    <script src='{{ asset('DataTables/jQuery-1.12.4/jquery-1.12.4.min.js') }}'></script>
    <script src='{{ asset('bootstrap-3.3.7-dist/js/bootstrap.min.js') }}'></script>
    <script src="{{ asset('js/font-awesome.min.js') }}"></script>
    <script src='{{ asset('js/plugins.js') }}'></script>
    <script src='{{ asset('js/scripts.js') }}'></script>
    <script src='{{ asset('js/masonry.pkgd.min.js') }}'></script>
    <script src='{{ asset('aos-master/dist/aos.js') }}'></script>
    @yield('extra-js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src='{{ asset('select2-4.1.0-rc.0/dist/js/select2.min.js') }}'></script> --}}
    {{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
    <script>
        AOS.init({
            // Global settings:
            disable: false, // accepte les valeurs suivantes : 'phone', 'tablet', 'mobile', boolean, expression ou function
            startEvent: 'DOMContentLoaded', // nom de l'événement envoyé sur le document, qu'AOS doit initialiser sur
            initClassName: 'aos-init', // classe appliquée après l'initialisation
            animatedClassName: 'aos-animate', // classe appliquée sur l'animation
            useClassNames: false, // si vrai, ajoutera le contenu de `data -aos` as classes on scroll
            disableMutationObserver: false, // désactive les détections automatiques des mutations (avancé)
            debounceDelay: 50, // le délai d'anti-rebond utilisé lors du redimensionnement de la fenêtre (avancé)
            throttleDelay: 99, // le délai d'accélération utilisé pendant défilement de la page (avancé)


            // Paramètres pouvant être remplacés élément par élément, par les attributs `data-aos-*` :
            offset: 120, // décalage (en px) par rapport au point de déclenchement d'origine
            delay: 0, // valeurs de 0 à 3000, au pas de 50ms
            duration: 400, // valeurs de 0 à 3000, au pas de 50ms
            easing: 'ease', // accélération par défaut pour les animations AOS
            once: false, // si l'animation ne doit se produire qu'une seule fois - lors du défilement vers le bas
            mirror: false, // si les éléments doivent s'animer lors du défilement devant eux
            anchorPlacement: 'top-bottom', // définit quelle position de l'élément par rapport à la fenêtre doit déclencher l'animation

        });
        AOS.refresh();
        //lazyload();
        /*$(document).ready(function() {
            $('.js-example-basic-single').select2({
                theme: "classic",
                //selectOnClose: true,
                //closeOnSelect: false,
                maximumSelectionLength: 2,
                tags: true,
            });
        });*/

        /* setInterval();
        function load_messages(){
            $('#messages').load('/messages');
        } */


        function myfunction() {
            var x = document.getElementById('password');
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

        }

        window.livewire.on('commentUpdated',()=>{
            $('#modelId').modal('hide');
        });
    </script>
</body>

</html>
