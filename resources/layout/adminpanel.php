<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../../public/img/fav-icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../public/css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Canada, Vancouver, Street 123</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+1 (416) 555-1234</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@parstravel.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="../home/index" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>ParsTravel</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    
                    <a onclick=changeTab(home) id="home" href="../adminpanel/index" class="nav-item nav-link active">Home</a>
                    <a onclick=changeTab(about) id="about" href="../adminusers/index" class="nav-item nav-link">Users</a>
                    <a onclick=changeTab(about) id="about" href="../adminpackages/index" class="nav-item nav-link">Packages</a>
                    <a onclick=changeTab(about) id="about" href="../admindestinations/index" class="nav-item nav-link">Destinations</a>
                    <a onclick=changeTab(about) id="about" href="../admincountries/index" class="nav-item nav-link">Countries</a>
                    <a onclick=changeTab(about) id="about" href="../admincities/index" class="nav-item nav-link">Cities</a>
                    <a onclick=changeTab(about) id="about" href="../adminimages/index" class="nav-item nav-link">Images</a>
                </div>       
                
       {{content}}

        

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">ParsTravel</a>, All Right Reserved.                        
                    </div>
                    <div class="footer-menu">
                            <p class="text-muted">Website designed by Parsa Safavi</p>
                        </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="../adminpanel/index">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/lib/wow/wow.min.js"></script>
    <script src="../../public/lib/easing/easing.min.js"></script>
    <script src="../../public/lib/waypoints/waypoints.min.js"></script>
    <script src="../../public/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../public/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../public/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../public/js/main.js"></script>
    <script src="../../public/js/custom.js"></script>
</body>

</html>