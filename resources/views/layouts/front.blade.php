<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

         <!-- Styles -->
         @livewireStyles

         <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Favicons -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/fonts/icomoon/style.css">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="/css/aos.css">

        <!-- MAIN CSS -->
        <link rel="stylesheet" href="/css/style.css">
        

       
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <x-banner />
            @include('frontend-nav')
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{-- {{ $header }} --}}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        {{-- font Awsoms --}}
        <script src="https://kit.fontawesome.com/93534b4b07.js" crossorigin="anonymous"></script>
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/jquery-migrate-3.0.0.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/jquery.sticky.js"></script>
        <script src="/js/jquery.waypoints.min.js"></script>
        <script src="/js/jquery.animateNumber.min.js"></script>
        <script src="/js/jquery.fancybox.min.js"></script>
        <script src="/js/jquery.stellar.min.js"></script>
        <script src="/js/jquery.easing.1.3.js"></script>
        <script src="/js/bootstrap-datepicker.min.js"></script>
        <script src="/js/isotope.pkgd.min.js"></script>
        <script src="/js/aos.js"></script>

        <script src="/js/main.js"></script>
        @livewireScripts
    </body>
</html>
