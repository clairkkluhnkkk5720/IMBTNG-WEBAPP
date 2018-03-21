<div class="modal modal-warning fade text-left" id="member-{{ $user->id }}-ban-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('dashboard.members.ban', $user->id) }}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Ban Member!</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure that you want to ban this Member: <strong>{{ $user->firstname }} {{ $user->lastname }}</strong></p>
					<p>Please note that even after banning the Member, his/her pending bets will be active. But he/she won't be able to place any new bet.</p>
				</div>
				<div class="modal-footer">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-outline">BAN MEMBER</button>
				</div>
			</form>
		</div>
	</div>
</div>