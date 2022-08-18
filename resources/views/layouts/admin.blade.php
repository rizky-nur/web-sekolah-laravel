<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.0
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Dashboard Admin</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="/css/examples.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body>

    @if($title == 'Login')
    <div>
        @yield('Log')
    </div>
    @else
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="/dashboard">
             SMK N 1 BANTUL<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        Home</a>
        <ul class="nav-group-items">
              <li class="nav-item"><a class="nav-link" href="/dashboard/profile"><span class="nav-icon"></span>Profile Sekolah</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/pengumuman"><span class="nav-icon"></span>Pengumuman</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/berita"><span class="nav-icon"></span>Berita</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/sambutan"><span class="nav-icon"></span>Sambutan</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/contact"><span class="nav-icon"></span>Hubungi Kami</a></li>
        </ul>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        Profile</a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="/dashboard/sejarah"><span class="nav-icon"></span>Sejarah</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/VisiMisi"><span class="nav-icon"></span>VisiMisi</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/struktur"><span class="nav-icon"></span>Struktur Organisasi</a></li>
        </ul>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        Guru</a>
        <ul class="nav-group-items">
              <li class="nav-item"><a class="nav-link" href="/dashboard/guru"><span class="nav-icon"></span>Daftar Guru</a></li>
        </ul>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        siswa</a>
        <ul class="nav-group-items">
              <li class="nav-item"><a class="nav-link" href="/dashboard/siswa"><span class="nav-icon"></span>Seluruh Siswa</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/osis"><span class="nav-icon"></span>OSIS</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/mpk"><span class="nav-icon"></span>MPK</a></li>
              <li class="nav-item"><a class="nav-link" href="/dashboard/pks"><span class="nav-icon"></span>PKS</a></li>
        </ul>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        Perpustakaan</a>
        <ul class="nav-group-items">
              <li class="nav-item"><a class="nav-link" href="/dashboard/perpus"><span class="nav-icon"></span>Profile Perpustakaan</a></li>
        </ul>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        BKK</a>
        <ul class="nav-group-items">
              <li class="nav-item"><a class="nav-link" href="/dashboard/bkk"><span class="nav-icon"></span>Daftar Dudika</a></li>
        </ul>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        PPDB</a>
        <ul class="nav-group-items">
              <li class="nav-item"><a class="nav-link" href="/dashboard/ppdb"><span class="nav-icon"></span>Proses Pendaftaran PPDB</a></li>
        </ul>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        Galery</a>
        <ul class="nav-group-items">
              <li class="nav-item"><a class="nav-link" href="/dashboard/galery"><span class="nav-icon"></span>Gambar</a></li>
        </ul>
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg></a>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
          </ul>
          <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
              <p>Rizky</p></a></li>
          </ul>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="img/img/avatars/8.jpg" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                  </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                  </svg> Profile</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                  </svg> Settings</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                  </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                  </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                  </svg> Lock Account</a>
                  <form action="/LogOut" method="post">
                    @csrf
                    <button type="submit">LogOut</button>
                  </form>
              </div>
            </li>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
              </li>
              <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
          </nav>
        </div>
      </header>
   @yield('content')
   @endif
    <!-- CoreUI and necessary plugins-->
    <script src="/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="/vendors/simplebar/js/simplebar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
    </script>
    <script type="text/javascript" src="/js/trix.js"></script>

  </body>
</html>