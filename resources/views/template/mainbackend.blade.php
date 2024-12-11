<!doctype html>
<html lang="en" dir="ltr">

<head>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <!-- TITLE -->
    <title>{{ $judul }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('sash/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="{{ asset('sash/assets/css/style.css') }}" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="{{ asset('sash/assets/css/plugins.css') }}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('sash/assets/css/icons.css') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('sash/assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('sash/assets/switcher/demo.css') }}" rel="stylesheet">

     <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs5.min.css" rel="stylesheet">
     
</head>

<body class="app sidebar-mini ltr light-mode">


  

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                      
                       
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <!-- SEARCH -->
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <img src="" alt="profile-user"
                                                    class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ $user->name }}</h5>
                                                        <small class="text-muted">{{ $user->username }}</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="{{ route('logout') }}">
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="">
                            <img src="flt/assets/img/logos.png" class="header-brand-img light-logo1 img-fluid"
                                 alt="logo" style="max-width: 150px;">
                        </a>                        
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/dashboard') }}"><i
                                        class="side-menu__icon fe fe-home"></i><span
                                        class="side-menu__label">Dashboard</span></a>
                            </li>
                           
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ url('/jadwalbackend') }}">
                                    <i class="side-menu__icon fa fa-calendar"></i>
                                    <span class="side-menu__label">Jadwal</span>
                                </a>
                            </li>                           
                            
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    @yield('content')
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->
        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Jadwal CBT <span></span> <a href="javascript:void(0)">Center</a>Politeknik Kesehatan Medan<span
                            class="fa fa-heart text-danger"></span>Since<a href="javascript:void(0)">2024</a>.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

    <!-- BACK-TO-TOP -->
    <!-- JQUERY JS -->
    <script src="{{ asset('sash/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('sash/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('sash/assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('sash/assets/js/sticky.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('sash/assets/js/circle-progress.min.js') }}"></script>

    <!-- PIETY CHART JS-->
    <script src="{{ asset('sash/assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/peitychart/peitychart.init.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('sash/assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('sash/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{ asset('sash/assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('sash/assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('sash/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('sash/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/apexchart/irregular-data-series.js') }}"></script>

    <!-- INTERNAL Flot JS -->
    <script src="{{ asset('sash/assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/flot/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/flot/dashboard.sampledata.js') }}"></script>

    <!-- INTERNAL Vector js -->
    <script src="{{ asset('sash/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('sash/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('sash/assets/plugins/sidemenu/sidemenu.js') }}"></script>

	<!-- TypeHead js -->
	<script src="{{ asset('sash/assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('sash/assets/js/typehead.js') }}"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{ asset('sash/assets/js/index1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('sash/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('sash/assets/js/custom.js') }}"></script>

    <!-- Custom-switcher -->
    <script src="{{ asset('sash/assets/js/custom-swicher.js') }}"></script>

    <!-- Switcher js -->
    <script src="{{ asset('sash/assets/switcher/js/switcher.js') }}"></script>
    <script>
        // Mendapatkan URL halaman saat ini
        var currentUrl = window.location.href;
    
        // Mendapatkan elemen tombol sidebar yang ingin diaktifkan
        var sidebarButton = document.querySelector('.side-menu__item[href="' + currentUrl + '"]');
    
        // Periksa apakah elemen tombol ditemukan
        if (sidebarButton) {
            // Tambahkan kelas 'active' ke tombol sidebar
            sidebarButton.classList.add('active');
    
            // Periksa apakah tombol tersebut adalah submenu
            var submenu = sidebarButton.closest('.slide-menu');
            if (submenu) {
                // Jika tombol adalah submenu, tambahkan kelas 'show' ke submenu tersebut
                submenu.classList.add('show');
    
                // Temukan dan aktifkan parent slide-item
                var parentSlideItem = sidebarButton.closest('.slide');
                if (parentSlideItem) {
                    parentSlideItem.classList.add('active');
                }
            }
        }
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentUrl = window.location.href;
        var sidebarLinks = document.querySelectorAll('.side-menu__item');
    
        sidebarLinks.forEach(function(link) {
            if (link.getAttribute('href') === currentUrl) {
                link.classList.add('active');
                // Jika tombol adalah submenu, aktifkan juga tombol utama
                var parentSlide = link.closest('.slide');
                if (parentSlide) {
                    parentSlide.classList.add('active');
                    // Aktifkan juga submenu jika ada
                    var submenu = parentSlide.querySelector('.slide-menu');
                    if (submenu) {
                        submenu.classList.add('show');
                    }
                }
            }
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            $('#basic-datatable').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
    
   


<!-- Summernote JS -->
<script>
    $(document).ready(function() {
        $('#isi_syarat').summernote({
            height: 200,   // Set editor height
            minHeight: null, // Set minimum height of editor
            maxHeight: null, // Set maximum height of editor
            focus: true ,
            toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['height', ['height']],
                    ]    // Set focus to editable area after initializing summernote
        });
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

</body>

</html>