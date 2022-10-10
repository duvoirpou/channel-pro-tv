<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Channel Pro TV</title>

    <!-- Fonts
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->

    <link rel='stylesheet' href='{{ asset('bootstrap-3.3.7-dist/css/bootstrap.min.css') }}' type='text/css' media='all' />
    {{-- <link rel='stylesheet' href='{{ asset('css/woocommerce-layout.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/woocommerce-smallscreen.css') }}' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' href='{{ asset('css/woocommerce.css') }}' type='text/css' media='all' /> --}}
    <link rel='stylesheet' href='{{ asset('css/font-awesome.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('mediaquery.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('style.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('css/easy-responsive-shortcodes.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('aos-master/dist/aos.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('DataTables/datatables.min.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('select2-4.1.0-rc.0/dist/css/select2.min.css') }}' type='text/css' />
     <!-- sweetalert2 -->
     <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    @livewireStyles

</head>

<body>
    <div id="page">
        <div class="container">
            @include('admin.partials._menu')

            @yield('content')
        </div>

    </div>
    <!-- #page -->
    @livewireScripts
    <script src='{{ asset('DataTables/jQuery-1.12.4/jquery-1.12.4.min.js') }}'></script>
    <script src='{{ asset('bootstrap-3.3.7-dist/js/bootstrap.min.js') }}'></script>
    <script src='{{ asset('js/plugins.js') }}'></script>
    <script src='{{ asset('js/scripts.js') }}'></script>
    <script src='{{ asset('js/masonry.pkgd.min.js') }}'></script>
    <script src='{{ asset('aos-master/dist/aos.js') }}'></script>
    <script type="text/javascript" src='{{ asset('DataTables/datatables.min.js') }}'></script>
    <script src='{{ asset('select2-4.1.0-rc.0/dist/js/select2.min.js') }}'></script>
    {{-- sweetalert2 --}}
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script>
        AOS.init();
    </script>
    @yield('script')
</body>

</html>
