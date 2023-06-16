<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Posyandu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center 
        justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a>
                <h1><img src="img/inilogo.png" class="brand-image img-circle elevation-3" style="opacity: 1.2" 
                width="50" height="50">Posyandu Rungkut</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="#home" class="nav-item nav-link active">Home</a>
                    <a href="#aboutus" class="nav-item nav-link">Tentang Kami</a>
                    <a href="#layanan" class="nav-item nav-link">Layanan</a>
                    <a href="#manfaat" class="nav-item nav-link">Manfaat</a>
                    <a href="contactus.php" class="nav-item nav-link">Hubungi Kami</a>
                </div>
                <a href="admin/login.php" class="btn btn-primary rounded-pill px-2 d-none d-lg-block" style="margin-right: 10px;">
                Login Admin</a>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <header id="home">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/posyandunih.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Selamat Datang di e-Posyandu Rungkut</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Posyandu Sahabat Masyarakat</p>
                                    <a href="ambil_antrian.php" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInLeft">
                                        Ambil Antrian</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </header>
        </div>
        <!-- Carousel End -->

        <!-- About Start -->
        <header id="aboutus">
        <div class="py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">Tentang Kami</h1>
                        <p class="mb-4 text-justify">Posyandu Rungkut adalah sebuah Pusat Kesehatan Masyarakat yang berlokasi di wilayah 
                            Rungkut, Surabaya. Posyandu ini bertujuan untuk memberikan pelayanan kesehatan kepada ibu hamil, bayi dan 
                            balita di sekitar wilayah Rungkut. Posyandu Rungkut menyediakan berbagai jenis layanan kesehatan, termasuk 
                            pemeriksaan pemantauan pertumbuhan balita, konseling gizi, serta penyuluhan tentang kesehatan ibu dan anak.</p>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="img/Growth Clipart Transparent Background, 
                                Baby Growth Stage Vector, Kids Clipart, Child, Childhood PNG Image For Free Download.jpeg" alt="">
                            </div>
                            <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/tb (1).png" alt="">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/hamil.jpeg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <!-- About End -->

        <!-- Facilities Start -->
        <header id="layanan">
        <div class="py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    
                <br><br>
                <h1 class="mb-3">Layanan</h1>
                    <p>Berikut Layanan yang Tersedia pada Posyandu Rungkut </p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-13 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="facility-item text-center">
                            <div class="facility-icon bg-primary">
                                <span class="bg-primary"></span>
                                <i class="fa fa-child fa-3x text-primary"></i>
                                <span class="bg-primary"></span>
                            </div>
                            <div class="facility-text bg-primary">
                                <h3 class="text-primary mb-3">Pemeriksaan Bayi dan Balita</h3>
                                <p class="mb-0 text-justify">Beberapa kegiatan yang dilakukan dalam pemeriksaan bayi dan balita meliputi:
                                    penimbangan berat badan dan tinggi badan, pemeriksaan tumbuh kembang anak, dan penyuluhan tentang 
                                    gizi dan pola makan sehat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-13 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="facility-item text-center">
                            <div class="facility-icon bg-success">
                                <span class="bg-success"></span>
                                <i class="fa fa-female fa-3x text-success"></i>
                                <span class="bg-success"></span>
                            </div>
                            <div class="facility-text bg-success">
                                <h3 class="text-success mb-3">Pemeriksaan Ibu Hamil</h3>
                                <p class="mb-0 text-justify">Beberapa kegiatan yang dilakukan dalam pemeriksaan ibu hamil dan nifas 
                                    meliputi: pemeriksaan tekanan darah, pemeriksaan pertumbuhan janin, pemeriksaan kesehatan ibu, 
                                    dan konseling tentang kehamilan</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        </header>
        <!-- Facilities End -->

         <!-- Call To Action Start -->
         <header id="manfaat">
         <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/pos.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <br><br>
                            <h1 class="mb-4">Manfaat</h1>
                                <p class="mb-4">Posyandu memiliki manfaat penting dalam meningkatkan kesehatan masyarakat. 
                                    Melalui Posyandu, masyarakat dapat memperoleh pelayanan kesehatan dasar seperti imunisasi,
                                     pemeriksaan tumbuh kembang anak, dan pelayanan kesehatan ibu hamil. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <!-- Call To Action End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Hubungi</h3>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kecamatan Rungkut No.1</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>031-291-100 atau 0897-6872-4121</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info.posyandu@googke.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Layanan</h3>
                        <a class="btn text-white-50" >Pemeriksaan Ibu Hamil</a>
                        <a class="btn text-white-50" >Pemeriksaan Bayi dan Balita</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Photo Gallery</h3>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/classes-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Tentang Posyandu Rungkut</h3>
                        <p>Posyandu Rungkut adalah sebuah Pusat Kesehatan Masyarakat yang berlokasi di wilayah Rungkut, Surabaya.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>