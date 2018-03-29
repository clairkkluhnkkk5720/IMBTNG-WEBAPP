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
        
        a[disabled] {
            cursor: not-allowed;
            opacity: .85 !important;
        }

    </style>
    @yield('styles')
</head>

<body>

    <!-- header section -->
    <header class="header-section">
        <!-- top header -->
        <div class="top-header">
            <div class="container">
                <div class="row justify-content-between align-items-center">

                    <!-- logo -->
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="/frontend/dist/images/logo.png" alt="Imbeting logo">
                        </a>
                    </div>
                    <!-- logo ends -->

                    <!-- user info -->
                    <div class="header-user-info">
                        <ul>
                            {{-- <li><a href="{{ route('pages.acs') }}"><i class="fas fa-shield-alt"></i> Open bets</a></li> --}}
                            <li><a href="{{ route('pages.history') }}"><i class="far fa-clock"></i> History</a></li>
                            <li><a href="{{ route('pages.deposit') }}"><i class="fas fa-briefcase"></i> Deposit</a></li>
                            <li class="user-id"><a href="{{ route('logout') }}"><i class="far fa-user-circle"></i> Logout</a></li>
                        </ul>
                    </div>
                    <!-- user info ends -->

                </div>
            </div>
        </div>
        <!-- top header ends -->

    </header>
    <!-- header section ends -->

    <!-- status bar -->
    <section class="status-bar-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- bar -->
                    <div class="status-bar">
                        <ul>
                            <li>
                                <a>Current Balance: <span>{{ auth()->user()->balance() }} MXN</span></a>
                                <a>Amount at Risk: <span>{{ auth()->user()->risked() }} MXN</span></a>
                                <a>Available Balance: <span>{{ auth()->user()->available() }} MXN</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- status bar ends -->

    @yield('contents')

    <footer class="footer-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <!-- copyright text -->
                <div class="copyright-text">
                    <p>Copyright &copy; 2018 <a href="{{ route('home') }}">Imbting</a> All rights reserved. </p>
                </div>



                <!-- social icons -->
                <div class="footer-icons">
                    <a href="{{ route('pages.acs') }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ route('pages.acs') }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ route('pages.acs') }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ route('pages.acs') }}"><i class="fab fa-linkedin-in"></i></a>
                </div>


            </div>
        </div>
    </footer>
    <!-- footer section ends -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/frontend/dist/js/app.js"></script>
    <script type="text/javascript">
        $('a[disabled]').click(function (e) {
            e.preventDefault();
            alert('This feature will be done after getting vimeo');
        });
    </script>
    @yield('scripts')
</body>

</html>