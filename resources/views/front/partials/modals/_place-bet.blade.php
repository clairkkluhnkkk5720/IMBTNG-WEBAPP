<div class="modal fade" id="bet-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>

<script type="text/_template" id="pbt-loading" hidden>
	<div class="modal-body">
		<div class="text-center" style="font-size: 24px;">
			Loading <i class="fa fa-spinner"></i>
		</div>
	</div>
</script>

<script type="text/_template" id="pbt-bet-form" hidden>
	<form class="place-bet-form" method="POST">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Place Bet</h4>
		</div>
		<div class="modal-body">
			<p class="text-center text-danger error-message" hidden></p>
			<% for (var i = 0; i < players.length; i++) { %>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<a href="<% if (type == 1) { %>/athletes/<% } else { %>/teams/<% } %><%= players[i].slug %>" title="<%= players[i].name %>" target="_blank">
								<%= players[i].name %>
							</a>
						</div>
						<input class="form-control" placeholder="Amount" type="number" name="player[<%= players[i].id %>]">
						<div class="input-group-addon">$</div>
					</div>
				</div>
			<% } %>
		</div>
		<div class="modal-footer" style="text-align: center;">
			<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Place Bet</button>
		</div>
	</form>
</script>

<script type="text/_template" hidden id="pbt-open-bets">
	<% for (var i = 0; i < bets.length; i++) { %>
		<li class="new">
			<p><a href="#" class="event-title" title="<%= bets[i].event.title %>"><%= bets[i].event.title %></a></p>
			<p><a href="#" title="<%= bets[i].player.name %>"><%= bets[i].player.name %></a> - $<%= bets[i].amount %></p>
		</li>
	<% } %>
</script>

<style type="text/css">
	#bet-modal .form-group:last-child {
		margin-bottom: 0;
	}
</style>