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
        <link href="/../assets/img/favicon.png" rel="icon">
        <link href="/../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="/../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="/../assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="/../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="/../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="/../assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Template Main CSS File -->
        <link href="/../assets/css/style.css" rel="stylesheet">
        
        

       
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            {{-- @livewire('navigation-menu') --}}
            @include('theme-Nav')
            @include('theme-sidebar')
            <!-- Page Heading -->
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
        <!-- Vendor JS Files -->
            <script src="/../assets/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="/../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="/../assets/vendor/chart.js/chart.umd.js"></script>
            <script src="/../assets/vendor/echarts/echarts.min.js"></script>
            <script src="/../assets/vendor/quill/quill.min.js"></script>
            <script src="/../assets/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="/../assets/vendor/tinymce/tinymce.min.js"></script>
            <script src="/../assets/vendor/php-email-form/validate.js"></script>

            <!-- Template Main JS File -->
            <script src="/../assets/js/main.js"></script>
        @livewireScripts
    </body>
</html>
