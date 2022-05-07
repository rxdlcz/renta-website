<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Laravel</title>
    <style>
        body {
            background:
                linear-gradient(to left top, #8153538a 0%
                    /*bottom-right color*/
                    , #6a8b91 50%
                    /*middle color*/
                    , #008f42 100%
                    /*top-left color*/
                ),
                linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 1))
                /*"faked" black background make sure to add last or it will appear before the transparent/colored layer*/
            ;
            background-repeat: no-repeat;
        }

    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css">

</head>

<body class="antialiased">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <img src="../img/logo.png" id="icon" alt="User Icon">
                            <h3 class="mb-3 mt-2">Sign in</h3>

                            <div class="alert alert-danger" style="display:none;"></div>
                            <form id="login-form">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="email" class="form-control form-control-lg" name="email" required />
                                    <label class="form-label">Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        required />
                                    <label class="form-label">Password</label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>
                            <p class="small pb-lg-2 mt-4"><a class="text-black-50" href="#!">Forgot password?</a></p>

                            <hr class="">

                            <p>Don't have an Account yet?</p>
                            <p>Contact us at: <a href="#"">cms.renta@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/mdb.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();              
                $.ajax({
                    type: "POST",
                    url: "/login",
                    processData: false,
                    data: $('#login-form').serialize(),
                    beforeSend: function() {
                        $('.alert-danger').css("display", "none");
                        $('input[type=password]').val('');
                    },
                    success: function(data) {
                        if (data.status) {
                            window.location.href = "/home";
                        } else {
                            $('.alert-danger').css("display", "block");
                            $('.alert-danger').text('Invalid Credentials.');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
