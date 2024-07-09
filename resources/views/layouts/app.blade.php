<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="ausaa, kenya, sda, mission, students, group, society, ak, ausaakenya">
    @isset($description)
    <meta name='description' content='{{$description}}'>
    @endisset
    @isset($logo)
    <link href="{{$logo}}" type="image/x-icon" rel="icon">
    @else
    <link href="{{asset('storage/images/logo.png')}}" type="image/x-icon" rel="icon">
    @endisset
    <meta charset="utf-8">
    <title>AUSAA KENYA | Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('storage/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('storage/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('storage/css/style.css')}}" rel="stylesheet">
    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 100px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: transparent;
            color: green;
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
            font-size: 32px;
        }
    </style>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WGKYPYEH0D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-WGKYPYEH0D');
    </script>
</head>
<!-- Google tag (gtag.js) -->

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">AUSAA KENYA</h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">Muthaiga Suites, Block 2, First Floor, Suite No. A2</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far text-primary me-2">@</i>
                    <p class="m-0">info@ausaakenya.com</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-primary m-0">AUSAA KENYA</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="/#about" class="nav-item nav-link">About</a>
                    <a href="/#activities" class="nav-item nav-link">Activities</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">More</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="{{route('article.index')}}" class="dropdown-item">Articles</a>
                            <a href="/#leadership" class="dropdown-item">Leadership</a>
                            <a href="" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="/#contact" class="nav-item nav-link">Contact</a>
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-between bg-light" style="width: 50px; height: 50px;">
                        <img src="{{asset('storage/images/logo.png')}}" alt="" style="width:100%;object-fit:scale-down;">
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">AUSAA</p>
                        <h5 class="m-0 text-warning">KENYA</h5>
                    </div>
                    <div class="ms-2 text-center" style="font-size:xxx-large">
                        <a href="/dashboard"><i class="bi bi-person-circle text-light"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <div>
        @yield('content')
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Muthaiga Suites, Block 2, First Floor, Suite No. A2</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+254 723 987 039</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@ausaakenya.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Major Upcoming Event</h4>
                    <h6 class="text-light">Date</h6>
                    <p class="mb-4">{{date('jS F, Y')}}</p>
                    <h6 class="text-light">Venue</h6>
                    <p class="mb-0">Juja</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Our Activities</h4>
                    <a class="btn btn-link" href="">Mission Work</a>
                    <a class="btn btn-link" href="">Home Visits</a>
                    <a class="btn btn-link" href="">Health Session</a>
                    <a class="btn btn-link" href="">Bible Congresses</a>
                    <a class="btn btn-link" href="">Social Weekends</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Events Newsletter</h4>
                    <p>Subscribe to our events update.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form action="" method="post">
                            @csrf
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="/">AUSAAKenyaSociety</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed By <a class="border-bottom" href="https://apektechinc.com">APEK TECH Inc.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('storage/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('storage/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('storage/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('storage/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('storage/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('storage/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('storage/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('storage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('storage/js/main.js')}}"></script>
</body>

</html>