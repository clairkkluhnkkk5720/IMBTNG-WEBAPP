<div class="form-group">
	<label>
		<input type="checkbox" name="roles[]" value="{{ $role->id }}" class="minimal" 
			@if (old('roles') and is_array(old('roles')) and in_array($role->id, old('permissions')) )
				checked
			@endif
		>
		&nbsp;&nbsp;{{ $role->name }}
		<p style="font-weight: normal; padding-left: 27px;">{{ $role->details }}</p>
	</label>
</div>