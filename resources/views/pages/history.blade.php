@extends('layouts.app')

@section('page-title', 'History')

@section('contents')

	<!-- main content section -->
    <section class="main-content-section section-padding">
        <div class="container">
            <div class="row">

                <!-- main contents wrapper -->
                <div class="col-md-8 clearfix">
                    <div class="main-content-wrapper">
                        <!-- title -->
                        <div class="inner-section-title">
                            <h2><i class="fas fa-history"></i> History</h2>
                        </div>

                        <!-- event widgets wrapper -->
                        <div class="event-widget-wrapper clearfix">
                            <!-- event date -->
                            <div class="event-date">
                                <h3>12 / 03 / 2018</h3>
                            </div>

                            <!-- event widgets -->
                            <div class="event-widgets">
                                <!-- single event widget -->
                                <div class="single-event-widget">
                                    <!-- event details -->
                                    <div class="event-details">
                                        <p>Event ID: <span>F12345678</span></p>
                                        <p>Event Name: <span>Football Event</span></p>
                                        <p>Bet Placed: <span>$2500</span></p>
                                        <p>Bet Place on: <span>Name of  Athelete</span></p>
                                    </div>
                                    <!-- event status -->
                                    <div class="event-status">
                                        <p>Status: <span>Won</span></p>
                                    </div>
                                </div>
                                <!-- single event widget ends -->
                                <!-- single event widget -->
                                <div class="single-event-widget">
                                    <!-- event details -->
                                    <div class="event-details">
                                        <p>Event ID: <span>F12345678</span></p>
                                        <p>Event Name: <span>Football Event</span></p>
                                        <p>Bet Placed: <span>$2500</span></p>
                                        <p>Bet Place on: <span>Name of  Athelete</span></p>
                                    </div>
                                    <!-- event status -->
                                    <div class="event-status">
                                        <p>Status: <span>Lost</span></p>
                                    </div>
                                </div>
                                <!-- single event widget ends -->
                                <!-- single event widget -->
                                <div class="single-event-widget">
                                    <!-- event details -->
                                    <div class="event-details">
                                        <p>Event ID: <span>F12345678</span></p>
                                        <p>Event Name: <span>Football Event</span></p>
                                        <p>Bet Placed: <span>$2500</span></p>
                                        <p>Bet Place on: <span>Name of  Athelete</span></p>
                                    </div>
                                    <!-- event status -->
                                    <div class="event-status">
                                        <p>Status: <span>Won</span></p>
                                    </div>
                                </div>
                                <!-- single event widget ends -->
                            </div>
                        </div>
                        <!-- event widgets wrapper ends -->
                        <!-- event widgets wrapper -->
                        <div class="event-widget-wrapper clearfix">
                            <!-- event date -->
                            <div class="event-date">
                                <h3>13 / 03 / 2018</h3>
                            </div>

                            <!-- event widgets -->
                            <div class="event-widgets">
                                <!-- single event widget -->
                                <div class="single-event-widget">
                                    <!-- event details -->
                                    <div class="event-details">
                                        <p>Event ID: <span>F12345678</span></p>
                                        <p>Event Name: <span>Football Event</span></p>
                                        <p>Bet Placed: <span>$2500</span></p>
                                        <p>Bet Place on: <span>Name of  Athelete</span></p>
                                    </div>
                                    <!-- event status -->
                                    <div class="event-status">
                                        <p>Status: <span>Won</span></p>
                                    </div>
                                </div>
                                <!-- single event widget ends -->
                                <!-- single event widget -->
                                <div class="single-event-widget">
                                    <!-- event details -->
                                    <div class="event-details">
                                        <p>Event ID: <span>F12345678</span></p>
                                        <p>Event Name: <span>Football Event</span></p>
                                        <p>Bet Placed: <span>$2500</span></p>
                                        <p>Bet Place on: <span>Name of  Athelete</span></p>
                                    </div>
                                    <!-- event status -->
                                    <div class="event-status">
                                        <p>Status: <span>Lost</span></p>
                                    </div>
                                </div>
                                <!-- single event widget ends -->

                            </div>
                        </div>
                        <!-- event widgets wrapper ends -->
                    </div>
                </div>
                <!-- main contents wrapper ends -->

                <!-- sidebar wrapper -->
                <div class="col-md-4 clearfix">
                    <aside class="sidebar-wrapper clearfix">
                        <!-- Single Sidebar -->
                        <div class="single-sidebar">
                            <!-- title -->
                            <div class="inner-section-title">
                                <h2><i class="fas fa-calendar-alt"></i> Upcoming Events</h2>
                            </div>

                            <!-- sidebar widget -->
                            <div class="sidebar-widget clearfix">
                                <!-- single widget card -->
                                <div class="single-widget-card">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('pages.acs') }}"><img src="/frontend/dist/images/sidebar-widget/widget1.png" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('pages.acs') }}">
                                                <p>Lorem Ipsum is simply dummy text of the printing typesetting industry.</p>
                                            </a>
                                            <p>
                                                <a href="{{ route('pages.acs') }}" class="date"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}" class="time"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single widget card ends -->
                                <!-- single widget card -->
                                <div class="single-widget-card">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('pages.acs') }}"><img src="/frontend/dist/images/sidebar-widget/widget2.png" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('pages.acs') }}">
                                                <p>Lorem Ipsum is simply dummy text of the printing typesetting industry.</p>
                                            </a>
                                            <p>
                                                <a href="{{ route('pages.acs') }}" class="date"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}" class="time"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single widget card ends -->
                                <!-- single widget card -->
                                <div class="single-widget-card">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('pages.acs') }}"><img src="/frontend/dist/images/sidebar-widget/widget3.png" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('pages.acs') }}">
                                                <p>Lorem Ipsum is simply dummy text of the printing typesetting industry.</p>
                                            </a>
                                            <p>
                                                <a href="{{ route('pages.acs') }}" class="date"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}" class="time"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single widget card ends -->
                                <!-- single widget card -->
                                <div class="single-widget-card">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('pages.acs') }}"><img src="/frontend/dist/images/sidebar-widget/widget4.png" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('pages.acs') }}">
                                                <p>Lorem Ipsum is simply dummy text of the printing typesetting industry.</p>
                                            </a>
                                            <p>
                                                <a href="{{ route('pages.acs') }}" class="date"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}" class="time"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single widget card ends -->
                            </div>
                        </div>
                        <!-- Single Sidebar Ends -->
                        <!-- Single Sidebar -->
                        <div class="single-sidebar">
                            <!-- title -->
                            <div class="inner-section-title">
                                <h2><i class="fas fa-calendar-alt"></i> Upcoming Events</h2>
                            </div>

                            <!-- sidebar widget -->
                            <div class="sidebar-widget clearfix">
                                <!-- single widget card -->
                                <div class="single-widget-card">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('pages.acs') }}"><img src="/frontend/dist/images/sidebar-widget/widget1.png" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('pages.acs') }}">
                                                <p>Lorem Ipsum is simply dummy text of the printing typesetting industry.</p>
                                            </a>
                                            <p>
                                                <a href="{{ route('pages.acs') }}" class="date"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}" class="time"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single widget card ends -->
                                <!-- single widget card -->
                                <div class="single-widget-card">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('pages.acs') }}"><img src="/frontend/dist/images/sidebar-widget/widget2.png" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('pages.acs') }}">
                                                <p>Lorem Ipsum is simply dummy text of the printing typesetting industry.</p>
                                            </a>
                                            <p>
                                                <a href="{{ route('pages.acs') }}" class="date"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}" class="time"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single widget card ends -->
                                <!-- single widget card -->
                                <div class="single-widget-card">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{ route('pages.acs') }}"><img src="/frontend/dist/images/sidebar-widget/widget3.png" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('pages.acs') }}">
                                                <p>Lorem Ipsum is simply dummy text of the printing typesetting industry.</p>
                                            </a>
                                            <p>
                                                <a href="{{ route('pages.acs') }}" class="date"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}" class="time"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single widget card ends -->


                            </div>
                        </div>
                        <!-- Single Sidebar Ends -->
                    </aside>
                </div>
                <!-- sidebar wrapper ends -->

            </div>
        </div>
    </section>
    <!-- main content section ends -->

@endsection