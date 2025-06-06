<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="layout-wide customizer-hide"
    data-assets-path="{{ asset('assets/') }}"
    data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Authenticação</title>

    <!-- Favicon da aplicação -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">

    <!-- Fonts do Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Iconify para ícones personalizados -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}">

    <!-- Core CSS do template -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    <!-- Vendor CSS (scrollbar customizado) -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">

    <!-- CSS específico da página de autenticação -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">

    <!-- Helpers JS (deve ser carregado antes da configuração do tema) -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!-- Configuração do tema (deve ser carregada após helpers.js) -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Estilos do Livewire (caso use componentes Livewire) -->
    @livewireStyles

    <style>
        /* Botão customizado com cor da marca */
        .btn-custom {
            background-color: #02afd0;
            border-color: #02afd0;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0295b3; /* Tom mais escuro no hover */
            border-color: #0295b3;
        }
    </style>
</head>
<body>
    <div class="font-sans text-gray-900 antialiased">
        {{-- Slot para os componentes de página (ex: telas de login, registro, etc) --}}
        @isset($slot)
            {{ $slot }}
        @endisset
    </div>

    <!-- Core JS do template -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Main JS (scripts principais do template) -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Github button widget (opcional, para mostrar botão de star/follow do GitHub) -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Scripts do Livewire (caso use Livewire) -->
    @livewireScripts
</body>
</html>