<div class="single-bet-widget">
    <div class="media">
        <div class="media-left">
            <a href="{{ route('bets.place', $event->slug) }}">
                <img src="/uploads/events/thumbs/{{ $event->thumb }}" alt="{{ $event->title }}">
            </a>
        </div>
        <div class="media-body">
            <!-- bet details -->
            <div class="bet-details">
                <a href="{{ route('bets.place', $event->slug) }}"><h2>{{ $event->title }}</h2></a>
                <div class="date">
                    <a href="{{ route('bets.place', $event->slug) }}">
                        <i class="fas fa-calendar-alt"></i> 
                        {{ $event->live_at->toDayDateTimeString() }}
                    </a>
                </div>
                <a class="team-name">{{ $event->game->name }}</a>
                <p>{{ $event->details }}</p>
            </div>

            <!-- bet buttons -->
            <div class="bet-buttons">
                @if ($event->winner_id)
                    <strong>Event Ended. Winner : {{ $event->winner()->first()->name }}</strong>
                @else
                    <a href="{{ route('bets.place', $event->slug) }}" class="btn-common btn-primary">
                        <i class="fas fa-dollar-sign"></i> Place bet
                    </a>
                @endif
                {{-- <a href="{{ route('pages.acs') }}" class="btn-common btn-tertiary"><i class="far fa-play-circle"></i> Watch live</a> --}}
            </div>
        </div>
    </div>
</div>
<!-- single bet widget ends -->