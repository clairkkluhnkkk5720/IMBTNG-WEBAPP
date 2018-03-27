<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/dist/css/app.css">
    <title>@yield('page-title') - IMBTING</title>
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
                        <a href="{{ route('index') }}">
                            <img src="/frontend/dist/images/logo.png" alt="Imbeting logo">
                        </a>
                    </div>
                    <!-- logo ends -->

                    <!-- call to actions -->
                    <div class="header-cta">
                        <!-- social icons -->
                        <div class="social-icons">
                            {{-- <a href="{{ route('pages.cs') }}"><i class="far fa-question-circle"></i></a> --}}
                            <a href="{{ route('pages.cs') }}"><i class="far fa-envelope"></i></a>
                            <a href="{{ route('pages.cs') }}"><i class="far fa-comment-alt"></i></a>
                        </div>

                        <!-- cta buttons -->
                        <div class="cta-buttons">
                            <a href="{{ route('login') }}" class="btn-common btn-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn-common btn-secondary">Join now</a>
                        </div>
                        <!-- cta buttons ends -->
                    </div>
                    <!-- call to actions ends -->

                </div>
            </div>
        </div>
        <!-- top header ends -->

        <!-- main navigaiton -->
        <div class="main-navigation">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav clearfix">
                            <ul class="nav-fill">
                                <li><a href="{{ route('pages.cs') }}"><i class="fas fa-trophy"></i> Football Leaderboards</a></li>
                                <li><a href="{{ route('pages.cs') }}"><i class="fas fa-power-off"></i> Getting Started</a></li>
                                <li><a href="{{ route('pages.cs') }}"><i class="fas fa-certificate"></i> Bovada Rewards</a></li>
                                <li><a href="{{ route('pages.cs') }}"><i class="fas fa-users"></i> Refer A Friend</a></li>
                                <li><a href="{{ route('pages.cs') }}"><i class="fas fa-bullhorn"></i> Promotions</a></li>
                                <li><a href="{{ route('pages.cs') }}"><i class="fas fa-key"></i> Red Room</a></li>
                                <li><a href="{{ route('pages.cs') }}"><i class="fas fa-file-alt"></i> Match Previews</a></li>
                                <li><a href="{{ route('pages.about') }}"><i class="far fa-user"></i> About</a></li>
                                <li><a href="{{ route('pages.contact') }}"><i class="fas fa-envelope"></i> Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

        <!-- main navigaiton ends -->
    </header>
    <!-- header section ends -->

    @yield('contents')

    <!-- footer section -->
    <footer class="footer-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <!-- copyright text -->
                <div class="copyright-text">
                    <p>Copyright &copy; 2018 <a href="{{ route('index') }}">Imbting</a> All rights reserved. </p>
                </div>

                <!-- social icons -->
                <div class="footer-icons">
                    <a href="{{ route('pages.cs') }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ route('pages.cs') }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ route('pages.cs') }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ route('pages.cs') }}"><i class="fab fa-linkedin-in"></i></a>
                </div>

            </div>
        </div>
    </footer>
    <!-- footer section ends -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/frontend/dist/js/app.js"></script>
    @yield('scripts')
</body>
</html>