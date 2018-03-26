<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/dist/css/app.css">
    <title>IMBTING | @yield('page-title')</title>
    <style type="text/css">
        .log-in-section .log-in-inputs {
            padding-bottom: 15px;
        }
    </style>
    @yield('styles')
</head>

<body>

    <section class="log-in-section d-flex align-items-center" style="background-image: url(/frontend/dist/images/login-page-bg.png)">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Log In section Logo -->
                <div class="col-md-4">
                    <div class="log-in-logo">
                        <a href="#">
                            <img src="/frontend/dist/images/logo-login.png" alt="IMBTING">
                        </a>
                    </div>
                </div>
                <!-- Log In section Logo  ends-->
            </div>

            <div class="row justify-content-center">
                <!-- Log in inouts -->
                <div class="col-md-4">
                    <div class="log-in-inputs clearfix">
                        
                        @yield('contents')

                    </div>
                </div>
                <!-- Log in inouts ends -->
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/frontend/dist/js/app.js"></script>
    @yield('scripts')
</body>
</html>