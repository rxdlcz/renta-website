<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Renta - @yield('title')</title>
    <link rel="stylesheet" href="css/nav-style.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.flipster/1.1.5/jquery.flipster.css">
    

    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Koulen&family=Paytone+One&display=swap'); */
        @import url('https://fonts.googleapis.com/css2?family=Koulen&family=Nunito:wght@300&family=Paytone+One&display=swap');

    </style>

</head>

<body>
    <header class="fixed-top ">
        <nav class="navbar navbar-expand-lg navbar-light px-3">
            <a class="navbar-brand p-0" href="#"><img src="img/logo.png" class="img-logo"></a>
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
                    <li class="nav-item {{ 'contact' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
        <div style="height:10vw;"></div>
    </main>

    <footer class="bg-light text-center text-white mt-5 ">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!"
                    role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!"
                    role="button"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                    role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                    role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!"
                    role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!"
                    role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="js/main.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/mdb.min.js"></script>

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
