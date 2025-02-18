<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <link rel="icon" type="image/png" href="{{ URL::asset('pengguna/image/wayang.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    {{-- Ckeditor (Editor Form) --}}
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    {{-- CDN Boostrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <script src="https://kit.fontawesome.com/35e083d87e.js" crossorigin="anonymous"></script>

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ URL::asset('user/image/wayang.png') }}">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard.index') }}" class="logo d-flex align-items-center">
                <img src="{{ URL::asset('user/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Wayang Kertas</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <li class="nav-item dropdown px-5">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth('admin')->user()->nama }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading">Profile</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('profil.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                </a>
            </li><!-- End Profile Page Nav -->

            {{-- <li class="nav-heading">Dashboard</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li> --}}
            <!-- End Dashboard Nav -->

            <li class="nav-heading">Paket Wisata</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('paketwisata.index') }}">
                    <i class="bi bi-pin-map"></i>
                    <span>Paket Wisata</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clipboard-check"></i><span>Validasi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('daftarpesanan.index') }}">
                            <i class="bi bi-circle-fill"></i><span>Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('antrian.index') }}">
                            <i class="bi bi-circle-fill"></i><span>Antrian</span>
                        </a>
                    </li>
                </ul>
            </li><!-- Nav Pesanan -->

            <li class="nav-heading">Konten</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('blog.index') }}">
                    <i class='bx bx-layout'></i>
                    <span>Blog</span>
                </a>
            </li><!-- End Contact Page Nav -->


            <li class="nav-heading">Pengguna</li>

            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('pengguna.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Pengguna</span>
                </a>
            </li><!-- End Register Page Nav --> --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clipboard-check"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <i class="bi bi-circle-fill"></i><span>Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengguna.index') }}">
                            <i class="bi bi-circle-fill"></i><span>User</span>
                        </a>
                    </li>
                </ul>
            </li><!-- Nav Pesanan -->

            {{-- <li class="nav-heading">Laporan</li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('statistik.index') }}">
                    <i class="bi bi-card-list"></i>
                    <span>Statistik</span>
                </a>
            </li> --}}
            <!-- End Register Page Nav -->
    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@yield('judul halaman')</h1>
        </div><!-- End Page Title -->

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span><em>Nagari Wayang Kertas
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </em></span></strong> All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>

</body>

</html>
