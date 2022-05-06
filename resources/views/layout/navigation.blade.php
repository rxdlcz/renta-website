<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Laravel</title>
    <link rel="stylesheet" href="css/nav-style.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">

</head>

<body class="pb-5">
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light px-3">
            <a class="navbar-brand p-0" href="#"><img src="img/logo.png" class="img-logo"></a>
            <button class="navbar-toggler collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#navBar"
                aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navBar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item {{ 'home' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item {{ 'myAccount' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="/myAccount">My Account</a>
                    </li>
                    <li class="nav-item {{ 'myBills' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item {{ 'contact' == request()->path() ? 'active_link' : '' }}">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container-fluid px-5" style="margin-top: 250px;">
        @yield('content')
    </div>

    <script src="js/main.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/mdb.min.js"></script>
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
