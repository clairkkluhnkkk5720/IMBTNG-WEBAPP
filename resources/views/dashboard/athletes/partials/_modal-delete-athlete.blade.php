<div class="modal modal-warning fade text-left" id="athlete-{{ $athlete->slug }}-delete-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('dashboard.athletes.destroy', $athlete->slug) }}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Delete Athlete!</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure that you want to delete Athlete: <strong>{{ $athlete->name }}</strong></p>
				</div>
				<div class="modal-footer">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-outline">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>