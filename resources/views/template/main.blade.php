<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $judul }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('flt/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('flt/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="fonts/icomoon/style.css">
  
    <link href="{{ asset('cal/fullcalendar/packages/core/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('cal/fullcalendar/packages/daygrid/main.css') }}" rel='stylesheet' />
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('cal/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('flt/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flt/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('flt/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flt/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('flt/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flt/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('flt/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('sash/assets/images/brand/favicon.ico') }}">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('sash/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    {{-- <link href="{{ asset('sash/assets/css/style.css') }}" rel="stylesheet"> --}}

    <!-- Plugins CSS -->
    <link href="{{ asset('sash/assets/css/plugins.css') }}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('sash/assets/css/icons.css') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('sash/assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('sash/assets/switcher/demo.css') }}" rel="stylesheet">
    <style>
        .btn-secondary {
            margin-left: 100px; /* Menambahkan jarak 100px */
        }
        
    </style>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            max-width: 600px;
            /* menambahkan max-width untuk membatasi lebar card */
            margin: 0 auto;
            /* membuat card berada di tengah */
        }

        .card:hover {
            transform: scale(1.05);
        }

        .container {
            margin-bottom: 20px;
        }

        .section-title {
            text-align: center;
        }

        /* Animasi fade-up */
        @keyframes fade-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        [data-aos="fade-up"] {
            opacity: 0;
            animation: fade-up 1s forwards;
        }

        /* Penambahan style untuk teks Misi */
        .mission-text {
            text-align: justify;
        }

    </style>
    <style>
        .fixed-height {
            height: 300px; /* Atur tinggi sesuai kebutuhan */
            width: 100%;
            object-fit: cover; /* Memastikan gambar dipotong proporsional */
        }

        ..portfolio-item img {
            width: 100%;
            /* Tetapkan lebar 100% agar gambar menyesuaikan lebar kontainer */
            height: 100%;
            /* Tetapkan tinggi 100% agar gambar menyesuaikan tinggi kontainer */
            object-fit: cover;
            /* Atur gambar agar menutupi area kontainer dengan mempertahankan aspek rasio */
        }
    </style>
    <style>
        .entry-content p {
            text-align: justify; /* Rata kiri dan kanan */
        }
    </style>

    <!-- Template Main CSS File -->
    <link href="{{ asset('flt/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-B0dRDIKi5fj4X2twMAr4WZiqhf18wyV29iD4aotM6mJZhV7FVoKyyxTmIXJexvk8" crossorigin="anonymous">


    <!-- =======================================================
  * Template Name: Flattern
  * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <h6 href="#">JADWAL CBT CENTER</h6>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="{{ url('/login') }}" class="">
                    login
                </a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <a href="#"><img src="flt/assets/img/logo.png" alt="Flattern Logo" class="img-fluid"></a>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 footer-contact">
                        <h3>CBT Center Politeknik Kesehatan Kemenkes Medan</h3>
                        <p>
                            Gedung I Direktorat Poltekkes Kemenkes Medan <br>
                            Jl. Jamin Ginting KM 13,5 Kel. Lau Cih Kec. Medan Tuntungan 20136<br><br>
                        </p>
                    </div>
                   
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('flt/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('flt/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('flt/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('flt/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('flt/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('flt/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('flt/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('flt/assets/js/main.js') }}"></script>
    <script>
        // Asumsi Anda menggunakan library AOS untuk mengaktifkan animasi fade-up
        AOS.init();
    </script>
    
    <script>
        // Ambil elemen navbar
        const navbar = document.getElementById('navbar');

        // Periksa apakah halaman saat ini adalah halaman yang sesuai dengan navbar, misalnya 'Home'
        const isHomePage = window.location.pathname === '/';

        // Tambahkan kelas 'active' ke elemen navbar jika halaman adalah halaman yang sesuai
        if (isHomePage) {
            navbar.querySelector('a.active').classList.remove('active');
            navbar.querySelector('a[href="/"]').classList.add('active');
        }
    </script>
    <script src="{{ asset('sash/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('sash/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('sash/assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('sash/assets/js/typehead.js') }}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('sash/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('sash/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    
    <!-- Color Theme js -->

</body>

</html>
