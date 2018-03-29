<!-- single event widget -->
<div class="single-event-widget">
    <!-- event details -->
    <div class="event-details">
        <p>Event ID: <span>E00{{ $bet->event->id }}</span></p>
        <p>Event Name: <span>{{ $bet->event->title }}</span></p>
        <p>Bet Placed: <span>{{ $bet->amount }}</span></p>
        <p>Bet Place on: 
            <span>
                {{ $bet->event->event_category_id == 1 ? $bet->athlete->name : $bet->team->name }}
            </span>
        </p>
    </div>
    <!-- event status -->
    <div class="event-status">
        <p>Status: <span>{{ $bet->player_id == $bet->event->winner_id ? 'Won' : 'Lost' }}</span></p>
    </div>
</div>
<!-- single event widget ends -->