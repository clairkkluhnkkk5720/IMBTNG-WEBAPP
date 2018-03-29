@extends('layouts.app')

@section('page-title', 'History')

@section('contents')

	<!-- main content section -->
    <section class="main-content-section section-padding">
        <div class="container">
            <div class="row">

                <!-- main contents wrapper -->
                <div class="col-md-12 clearfix">
                    <div class="main-content-wrapper">
                        <!-- title -->
                        <div class="inner-section-title">
                            <h2><i class="fas fa-history"></i> History</h2>
                        </div>

                        <!-- event widgets wrapper -->
                        <div class="event-widget-wrapper clearfix">
                            <!-- event widgets -->
                            <div class="event-widgets">
                               @each('partials._single-bet', $bets, 'bet', 'partials._empty-bets')
                            </div>
                        </div>
                        <!-- event widgets wrapper ends -->
                        {{ $bets->links() }}
                    </div>
                </div>
                <!-- main contents wrapper ends -->

            </div>
        </div>
    </section>
    <!-- main content section ends -->

@endsection