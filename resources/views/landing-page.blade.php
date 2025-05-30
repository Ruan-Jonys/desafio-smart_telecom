<!doctype html>

<html
  lang="en"
  class="layout-menu-fixed layout-compact"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Smart Telecom</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Icones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <div class="content">
      <nav class="navbar m-4 p-2 px-3 rounded-3 shadow-sm navbar-example navbar-expand-lg bg-body-tertiary"
           style="width: 80%; position: absolute; top: 10px; left: 50%; transform: translateX(-50%);">
        <div class="container-fluid">
          {{-- Imagem da logo --}}
          <div><img src="/assets/img/logo/logo-p.png" alt="#" height="50px" style="margin-right:20px; margin-left:-20px"></div>
          
          {{-- Menu simples --}}
          <div class="collapse navbar-collapse" id="navbar-ex-3">
            <div class="navbar-nav me-auto">
              <a class="nav-item nav-link active" href="#">Inicio</a>
              <a class="nav-item nav-link" href="">Nossos Serviços</a>
              <a class="nav-item nav-link" href="">Orçamento</a>
              <a class="nav-item nav-link" href="">Artigo Smart</a>
              <a class="nav-item nav-link" href="">Materiais Smart</a>
            </div>
            
            {{-- Botão de Entrar com ícone --}}
            <form onsubmit="return false">
              <button class="btn btn-primary d-inline-block" type="button"><i class="bi bi-box-arrow-in-right" style="margin-left: -10px; margin-right: 10px"></i><a href="/login"  style="text-decoration: none; color:white;">Entrar</a></button>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>