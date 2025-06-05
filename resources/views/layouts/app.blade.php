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

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Icon Fonts -->
        <link rel="stylesheet" href="/assets/vendor/fonts/iconify-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="/assets/vendor/css/core.css" />
        <link rel="stylesheet" href="/assets/css/demo.css" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Laravel Vite Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Helpers JS -->
        <script src="/assets/vendor/js/helpers.js"></script>

        <!-- Config JS (Theme options, must come after core styles and helpers) -->
        <script src="/assets/js/config.js"></script>

        <!-- DataTables -->
        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" >
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">

        <style>
            /* cores dos botões do DataTables */
            div.dataTables_wrapper div.dt-buttons button.btn-copy {
                background-color: #02afd0 !important; /* cor normal */
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
                background-color: #029cb7 !important; /* cor hover */
            }

            div.dataTables_wrapper div.dt-buttons button.btn-excel {
                background-color: #198754 !important; /* verde */
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
                background-color: #dc3545 !important; /* vermelho */
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
        </style>        
        
    </head>
    <body class="layout-menu-fixed layout-compact font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            {{-- @include('partials.menu-lateral') --}}
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
                {{-- Components --}}
                @isset($slot)
                    {{ $slot }}
                @endisset

                {{-- Layouts --}}
                @yield('content')
            </main>

            @include('partials.footer')
        </div>

        @stack('modals')    

        @livewireScripts
            
        <!-- Core JS -->
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../assets/vendor/js/menu.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- DataTables -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#datatables').DataTable({
                    pageLength: 10,
                    dom: 'Bfrtip',
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
                            first: "Primeiro",
                            previous: "Anterior",
                            next: "Próximo",
                            last: "Último"
                        }
                    }
                });
            });
        </script>                      
    </body>
</html>
