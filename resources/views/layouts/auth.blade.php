<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/dist/css/app.css">
    <title>@yield('page-title') - IMBTING</title>
    <style type="text/css">
        .log-in-section .log-in-inputs {
            padding-bottom: 15px;
        }
        .log-in-section .log-in-inputs .form-control.has-error {
            border-color: #dc3545;
            margin-bottom: 0;
        }
        .log-in-section .log-in-inputs .form-control + .help-block {
            display: none;
        }
        .log-in-section .log-in-inputs .form-control.has-error + .help-block {
            display: block;
            margin-bottom: 20px;
            margin-top: 5px;
        }
        .log-in-section .log-in-inputs .form-control.has-error::-webkit-input-placeholder {
            color: #dc3545;
            opacity: 1;
        }

        .log-in-section .log-in-inputs .form-control.has-error:-ms-input-placeholder {
            color: #dc3545;
            opacity: 1;
        }

        .log-in-section .log-in-inputs .form-control.has-error::-ms-input-placeholder {
            color: #dc3545;
            opacity: 1;
        }

        .log-in-section .log-in-inputs .form-control.has-error::placeholder {
            color: #dc3545;
            opacity: 1;
        }
        .global-alert {
            border-radius: 0;
            margin: 0;
        }
    </style>
    @yield('styles')
</head>

<body>

    @if (session()->has('global.success'))
        <div class="alert global-alert alert-success alert-dismissible fade show" role="alert">
            {!! session('global.success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('global.error'))
        <div class="alert global-alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('global.error') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="log-in-section d-flex align-items-center" style="background-image: url(/frontend/dist/images/login-page-bg.png)">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Log In section Logo -->
                <div class="col-md-4">
                    <div class="log-in-logo">
                        <a href="{{ route('index') }}">
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