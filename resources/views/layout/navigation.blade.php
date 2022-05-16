<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Renta - @yield('title')</title>
    <link rel="stylesheet" href="css/nav-style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/animation.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.flipster/1.1.5/jquery.flipster.css">

</head>

<body >
    <header class="fixed-top show">
        <nav class="navbar navbar-expand-lg navbar-light px-3">
            <a class="navbar-brand p-0 show-delay" href="#"><img src="img/logo.png" class="img-logo"></a>
            <button class="navbar-toggler collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#navBar"
                aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navBar">
                <ul class="navbar-nav mx-auto paytone-font">
                    <li class="nav-item {{ '/' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ 'myAccount' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="/myAccount">My Account</a>
                    </li>
                    <li class="nav-item {{ 'aboutUs' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="aboutUs">About Us</a>
                    </li>
                    <li class="nav-item {{ 'contactUs' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="contactUs">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="bg-light">
        @yield('content')
        <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </main>

    <footer class="text-center text-white" style="background: #ffd7d7;">    
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!"
                    role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Google -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                    role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                    role="button"><i class="fab fa-instagram"></i></a>

                
               {{--  <!-- Github -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!"
                    role="button"><i class="fab fa-github"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!"
                    role="button"><i class="fab fa-linkedin-in"></i></a>    

                <!-- Twitter -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!"
                    role="button"><i class="fab fa-twitter"></i></a> --}}
                    
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Renta.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="js/main.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/mdb.min.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.flipster/1.1.5/jquery.flipster.min.js"></script>

    @yield('javascript')
    <script>
        $(document).on("scroll", function() {

            if ($(document).scrollTop() > 100) {
                $("nav img").addClass("scrollNavImg");
            } else {
                $("nav img").removeClass("scrollNavImg");
            }
        });
    </script>

</body>

</html>
