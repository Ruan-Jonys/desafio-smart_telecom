<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      class="layout-menu-fixed layout-compact"
      data-assets-path="/assets/"
      data-template="vertical-menu-template-free">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

        <!-- Fonts (Bunny e Google Fonts) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Icon Fonts (Iconify e Bootstrap Icons) -->
        <link rel="stylesheet" href="/assets/vendor/fonts/iconify-icons.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >

        <!-- Core CSS do template e Demo -->
        <link rel="stylesheet" href="/assets/vendor/css/core.css" />
        <link rel="stylesheet" href="/assets/css/demo.css" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Tailwind CSS para utilitários e layouts (opcional, caso use Tailwind em componentes) -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Vendor CSS (ex: scrollbar customizado) -->
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Laravel Vite Scripts (assets compilados do Laravel) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Livewire Styles (se usar Livewire) -->
        @livewireStyles

        <!-- Helpers JS do template (deve vir após core styles) -->
        <script src="/assets/vendor/js/helpers.js"></script>
        <!-- Configuração do tema -->
        <script src="/assets/js/config.js"></script>

        <!-- DataTables CSS e JS + Botões de exportação -->
        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" >
        <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <style>
            /* Estilo dos botões de exportação do DataTables */
            div.dataTables_wrapper div.dt-buttons button.btn-copy {
                background-color: #02afd0 !important;
                color: white !important;
                font-weight: 600 !important;
                padding: 0.5rem 1rem !important;
                border-radius: 0.375rem !important;
                border: none !important;
                margin-right: 0.5rem !important;
                cursor: pointer !important;
                transition: background-color 0.3s ease !important;
            }
            div.dataTables_wrapper div.dt-buttons button.btn-copy:hover {
                background-color: #029cb7 !important;
            }
            div.dataTables_wrapper div.dt-buttons button.btn-excel {
                background-color: #198754 !important;
                color: white !important;
                font-weight: 600 !important;
                padding: 0.5rem 1rem !important;
                border-radius: 0.375rem !important;
                border: none !important;
                margin-right: 0.5rem !important;
                cursor: pointer !important;
                transition: background-color 0.3s ease !important;
            }
            div.dataTables_wrapper div.dt-buttons button.btn-excel:hover {
                background-color: #157347 !important;
            }
            div.dataTables_wrapper div.dt-buttons button.btn-pdf {
                background-color: #dc3545 !important;
                color: white !important;
                font-weight: 600 !important;
                padding: 0.5rem 1rem !important;
                border-radius: 0.375rem !important;
                border: none !important;
                cursor: pointer !important;
                transition: background-color 0.3s ease !important;
            }
            div.dataTables_wrapper div.dt-buttons button.btn-pdf:hover {
                background-color: #bb2d3b !important;
            }

            /* Centralização e estilização dos botões de paginação do DataTables */
            .dataTables_wrapper .dataTables_paginate {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 1rem;
                gap: 0;
            }
            .dataTables_wrapper .dataTables_paginate span {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 0;
            }
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                border-radius: 0.5rem !important;
                background: #fff !important;
                color: #02afd0 !important;
                border: 2px solid #02afd0 !important;
                margin: 0 8px !important;
                width: 36px;
                height: 36px;
                font-size: 1.2rem;
                font-weight: bold;
                text-align: center;
                line-height: 32px;
                transition: background 0.2s, color 0.2s;
                display: flex;
                justify-content: center;
                align-items: center;
                box-shadow: 0 0 4px rgba(2, 175, 208, 0.08);
            }
            .dataTables_wrapper .dataTables_paginate .paginate_button.current,
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                background: #02afd0 !important;
                color: #fff !important;
                border: 2px solid #02afd0 !important;
            }
            .dataTables_wrapper .dataTables_paginate .paginate_button:focus {
                outline: none !important;
                box-shadow: 0 0 0 2px #02afd033 !important;
            }
            .dataTables_wrapper .dataTables_paginate .paginate_button i {
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto;
                font-size: 1em !important;
                vertical-align: middle;
                line-height: 1;
                min-width: unset;
                min-height: unset;
            }
        </style>              
    </head>
    <body class="layout-menu-fixed layout-compact font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            {{-- Menu de navegação --}}
            @include('partials.navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{-- Componente slot --}}
                @isset($slot)
                    {{ $slot }}
                @endisset

                {{-- Renderiza conteúdo das views Blade --}}
                @yield('content')
            </main>

            {{-- Rodapé global --}}
            @include('partials.footer')
        </div>

        @stack('modals')    

        @livewireScripts
            
        <!-- Core JS do template e bootstrap -->
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../assets/vendor/js/menu.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- DataTables JS e botões de exportação -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script>
            // Inicializa DataTables com botões de exportação e traduções para português
            $(document).ready(function () {
                $('#datatables').DataTable({
                    pageLength: 10,
                    dom: 'Bfrtip',
                    pagingType: "simple_numbers",
                    buttons: [
                        { extend: 'copy', text: '<i class="bi bi-clipboard"></i> Copiar', className: 'btn-copy' },
                        { extend: 'excel', text: '<i class="bi bi-file-earmark-excel"></i> Excel', className: 'btn-excel' },
                        { extend: 'pdf', text: '<i class="bi bi-file-earmark-pdf"></i> PDF', className: 'btn-pdf' }
                    ],
                    language: {
                        decimal: ",",
                        thousands: ".",
                        processing: "Processando...",
                        search: "Pesquisa:",
                        lengthMenu: "Mostrar _MENU_ registros",
                        info: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        infoEmpty: "Mostrando 0 até 0 de 0 registros",
                        infoFiltered: "(filtrado de _MAX_ registros no total)",
                        paginate: {
                            previous: "<i class='bi bi-chevron-left'></i>", 
                            next: "<i class='bi bi-chevron-right'></i>" 
                        }
                    }
                });
            });
        </script>                   
    </body>
</html>