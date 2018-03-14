<div class="modal modal-warning fade text-left" id="member-{{ $user->id }}-unban-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('dashboard.members.unban', $user->id) }}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">RemoveBan from Member!</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure that you want to remove ban from this Member: <strong>{{ $user->firstname }} {{ $user->lastname }}</strong></p>
				</div>
				<div class="modal-footer">
					{{ csrf_field() }}
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-outline">REMOVE BAN</button>
				</div>
			</form>
		</div>
	</div>
</div>