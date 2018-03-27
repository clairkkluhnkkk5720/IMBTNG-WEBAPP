@extends('layouts.app')

@section('page-title', 'Home')

@section('contents')

	

    <!-- main content section -->
    <section class="main-content-section section-padding">
        <div class="container">
            <div class="row">

                <!-- main contents wrapper -->
                <div class="col-md-8 clearfix">
                    <div class="main-content-wrapper bet-wrapper">
                        <!-- title -->
                        <div class="inner-section-title">
                            <div class="col-md-4">
                                <h2><i class="fas fa-history"></i> Todays Event</h2>
                            </div>
                            <!-- filter options -->
                            <div class="filter-option col-md-8" hidden>
                                <form>
                                    <div class="form-row align-items-center">

                                        <div class="col-sm-6">
                                            <label class="sr-only" for="inlineFormInputGroup">search</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="search">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><a href="{{ route('pages.acs') }}"><i class="fas fa-search"></i></a></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="sr-only" for="inlineFormInputGroup">select</label>
                                            <div class="input-group">
                                                <select class="form-control">
                                                  <option>Rooster</option>
                                                  <option>Horse</option>
                                                  <option>Football</option>
                                                  <option>Baseball</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- event widgets wrapper -->
                        <div class="event-widget-wrapper clearfix">
                            <!-- single bet widget -->
                            <div class="single-bet-widget">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{ route('pages.acs') }}">
                                            <img src="/frontend/dist/images/bet/bet1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <!-- bet details -->
                                        <div class="bet-details">
                                            <a href="{{ route('pages.acs') }}"><h2>Event Title</h2></a>
                                            <div class="date">
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </div>
                                            <a href="{{ route('pages.acs') }}" class="team-name">Game Name</a>
                                            <p>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                        </div>

                                        <!-- bet buttons -->
                                        <div class="bet-buttons">
                                            <a disabled title="Will be done after getting Vimeo" href="{{ route('pages.acs') }}" class="btn-common btn-primary"><i class="fas fa-dollar-sign"></i> Place bet</a>
                                            {{-- <a href="{{ route('pages.acs') }}" class="btn-common btn-tertiary"><i class="far fa-play-circle"></i> Watch live</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single bet widget ends -->
                            <!-- single bet widget -->
                            <div class="single-bet-widget">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{ route('pages.acs') }}">
                                            <img src="/frontend/dist/images/bet/bet2.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <!-- bet details -->
                                        <div class="bet-details">
                                            <a href="{{ route('pages.acs') }}"><h2>Event Title</h2></a>
                                            <div class="date">
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </div>
                                            <a href="{{ route('pages.acs') }}" class="team-name">Game Name</a>
                                            <p>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                        </div>

                                        <!-- bet buttons -->
                                        <div class="bet-buttons">
                                            <a disabled title="Will be done after getting Vimeo" href="{{ route('pages.acs') }}" class="btn-common btn-primary"><i class="fas fa-dollar-sign"></i> Place bet</a>
                                            {{-- <a href="{{ route('pages.acs') }}" class="btn-common btn-tertiary"><i class="far fa-play-circle"></i> Watch live</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single bet widget ends -->
                            <!-- single bet widget -->
                            <div class="single-bet-widget">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{ route('pages.acs') }}">
                                            <img src="/frontend/dist/images/bet/bet3.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <!-- bet details -->
                                        <div class="bet-details">
                                            <a href="{{ route('pages.acs') }}"><h2>Event Title</h2></a>
                                            <div class="date">
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </div>
                                            <a href="{{ route('pages.acs') }}" class="team-name">Game Name</a>
                                            <p>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                        </div>

                                        <!-- bet buttons -->
                                        <div class="bet-buttons">
                                            <a disabled title="Will be done after getting Vimeo" href="{{ route('pages.acs') }}" class="btn-common btn-primary"><i class="fas fa-dollar-sign"></i> Place bet</a>
                                            {{-- <a href="{{ route('pages.acs') }}" class="btn-common btn-tertiary"><i class="far fa-play-circle"></i> Watch live</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single bet widget ends -->
                            <!-- single bet widget -->
                            <div class="single-bet-widget">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{ route('pages.acs') }}">
                                            <img src="/frontend/dist/images/bet/bet4.png" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <!-- bet details -->
                                        <div class="bet-details">
                                            <a href="{{ route('pages.acs') }}"><h2>Event Title</h2></a>
                                            <div class="date">
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-calendar-alt"></i> 12/15/2016</a>
                                                <a href="{{ route('pages.acs') }}"><i class="fas fa-clock"></i> 12:30 PM</a>
                                            </div>
                                            <a href="{{ route('pages.acs') }}" class="team-name">Game Name</a>
                                            <p>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                        </div>

                                        <!-- bet buttons -->
                                        <div class="bet-buttons">
                                            <a disabled title="Will be done after getting Vimeo" href="{{ route('pages.acs') }}" class="btn-common btn-primary"><i class="fas fa-dollar-sign"></i> Place bet</a>
                                            {{-- <a href="{{ route('pages.acs') }}" class="btn-common btn-tertiary"><i class="far fa-play-circle"></i> Watch live</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single bet widget ends -->
                        </div>
                        <!-- event widgets wrapper ends -->
                        <!-- pagination -->
                        <div class="pagination-wrapper text-right" hidden>
                            <a href="{{ route('pages.acs') }}" class="pagination pagi-next"><i class="fas fa-angle-left"></i></a>
                            <a href="{{ route('pages.acs') }}" class="pagination pagi-prev"><i class="fas fa-angle-right"></i></a>
                        </div>
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