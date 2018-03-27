@extends('layouts.primary')

@section('page-title', 'Home')

@section('contents')

	<!-- slider section -->
    <section class="slider-section">
        <div class="container">
            <div class="row">
                <!-- slider images -->
                <div class="col-md-8">
                    <div class="slider-images clearfix">
                        <a href="{{ route('pages.cs') }}">
                            <img src="/frontend/dist/images/slider1.png" alt="Experience Vegas 20/7">
                        </a>
                        <!-- hover -->
                        <div class="overlay">
                            <div class="heading">
                                <a href="{{ route('pages.cs') }}">
                                    <h2>Experience Vegas 20/7</h2>
                                </a>
                            </div>

                            <div class="navigation-arrow">
                                <a href="{{ route('pages.cs') }}"><i class="fas fa-chevron-left"></i></a>
                                <a href="{{ route('pages.cs') }}"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- slider tabs -->
                <div class="col-md-4">
                    <div class="slider-tabs clearfix">
                        <!-- tabs -->
                        <div class="tabs">
                            {{-- <a class="active" href="{{ route('pages.cs') }}"><i class="far fa-futbol"></i> Football</a>
                            <a href="{{ route('pages.cs') }}"><i class="fas fa-baseball-ball"></i> Baseball</a>
                            <a href="{{ route('pages.cs') }}"><i class="fas fa-golf-ball"></i> Golf</a>
                            <a href="{{ route('pages.cs') }}"><i class="fas fa-flag-checkered"></i> Horse</a> --}}
                            @foreach ($games as $game)
                                <a href="{{ route('pages.cs') }}"><i class="{{ $game->icon }}"></i> {{ $game->name }}</a>
                            @endforeach
                        </div>

                        <!-- ads -->
                        <div class="promo-section" style="background-image: url('/frontend/dist/images/ad-bg-1.png')">
                            <a href="{{ route('register') }}" class="btn-promo">Resgister now</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- slider section ends -->

    <!-- upcoming games -->
    <section class="ucoming-games section-padding" style="background-image: url(/frontend/dist/images/upcoming-bg.png)">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-12 clearfix">
                    <div class="section-title-wrapper">
                        <div class="title">
                            <h2>Upcoming Events</h2>
                        </div>

                        <div class="navigation-btn" hidden>
                            <a href="{{ route('pages.cs') }}"><i class="fas fa-chevron-left"></i></a>
                            <a href="{{ route('pages.cs') }}"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row card-wrapper">
                <!-- single-card -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card">
                        <a href="{{ route('pages.cs') }}">
                            <img src="/frontend/dist/images/upcoming/upcoming1.png" alt="">
                        </a>

                        <!-- content -->
                        <div class="contents">
                            <div class="icon">
                                <i class="far fa-futbol"></i>
                            </div>
                            <!-- titles -->
                            <div class="titles">
                                <a href="{{ route('pages.cs') }}"><h2>England Premier League</h2></a>
                                <a href="{{ route('pages.cs') }}"><span>Moneyline</span></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- single-card ends -->
                <!-- single-card -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card">
                        <a href="{{ route('pages.cs') }}">
                            <img src="/frontend/dist/images/upcoming/upcoming2.png" alt="">
                        </a>

                        <!-- content -->
                        <div class="contents">
                            <div class="icon">
                                <i class="far fa-futbol"></i>
                            </div>
                            <!-- titles -->
                            <div class="titles">
                                <a href="{{ route('pages.cs') }}"><h2>England Premier League</h2></a>
                                <a href="{{ route('pages.cs') }}"><span>Moneyline</span></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- single-card ends -->
                <!-- single-card -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card">
                        <a href="{{ route('pages.cs') }}">
                            <img src="/frontend/dist/images/upcoming/upcoming3.png" alt="">
                        </a>

                        <!-- content -->
                        <div class="contents">
                            <div class="icon">
                                <i class="far fa-futbol"></i>
                            </div>
                            <!-- titles -->
                            <div class="titles">
                                <a href="{{ route('pages.cs') }}"><h2>England Premier League</h2></a>
                                <a href="{{ route('pages.cs') }}"><span>Moneyline</span></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- single-card ends -->
                <!-- single-card -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card">
                        <a href="{{ route('pages.cs') }}">
                            <img src="/frontend/dist/images/upcoming/upcoming4.png" alt="">
                        </a>

                        <!-- content -->
                        <div class="contents">
                            <div class="icon">
                                <i class="far fa-futbol"></i>
                            </div>
                            <!-- titles -->
                            <div class="titles">
                                <a href="{{ route('pages.cs') }}"><h2>England Premier League</h2></a>
                                <a href="{{ route('pages.cs') }}"><span>Moneyline</span></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- single-card ends -->
            </div>
        </div>
    </section>
    <!-- upcoming games ends -->

    <!-- most popular sports games -->
    <section class="popular-games section-padding" style="background-image: url(/frontend/dist/images/popular-bg.png)">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-md-12 clearfix">
                    <div class="section-title-wrapper">
                        <div class="title">
                            <h2>Most Popular Sports</h2>
                        </div>

                        <div class="navigation-btn" hidden>
                            <a href="{{ route('pages.cs') }}"><i class="fas fa-chevron-left"></i></a>
                            <a href="{{ route('pages.cs') }}"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row card-wrapper">
                <!-- single card 2 -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card-2">
                        <img src="/frontend/dist/images/popular/popular1.png" alt="">
                        <!-- overlay -->
                        <div class="overlay">
                            <div class="clearfix">
                                <p>Find the best lines, props and live betting for every NBA game this season.</p>
                                <a href="{{ route('pages.cs') }}" class="btn-common btn-tertiary">Bet in NBA</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single card 2 ends -->
                <!-- single card 2 -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card-2">
                        <img src="/frontend/dist/images/popular/popular2.png" alt="">
                        <!-- overlay -->
                        <div class="overlay">
                            <div class="clearfix">
                                <p>Find the best lines, props and live betting for every NBA game this season.</p>
                                <a href="{{ route('pages.cs') }}" class="btn-common btn-tertiary">Bet in NBA</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single card 2 ends -->
                <!-- single card 2 -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card-2">
                        <img src="/frontend/dist/images/popular/popular3.png" alt="">
                        <!-- overlay -->
                        <div class="overlay">
                            <div class="clearfix">
                                <p>Find the best lines, props and live betting for every NBA game this season.</p>
                                <a href="{{ route('pages.cs') }}" class="btn-common btn-tertiary">Bet in NBA</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single card 2 ends -->
                <!-- single card 2 -->
                <div class="col-md-3 col-sm-6 clearfix">
                    <div class="single-card-2">
                        <img src="/frontend/dist/images/popular/popular4.png" alt="">
                        <!-- overlay -->
                        <div class="overlay">
                            <div class="clearfix">
                                <p>Find the best lines, props and live betting for every NBA game this season.</p>
                                <a href="{{ route('pages.cs') }}" class="btn-common btn-tertiary">Bet in NBA</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single card 2 ends -->
            </div>
        </div>
    </section>
    <!-- most popular sports games ends -->
    
@endsection