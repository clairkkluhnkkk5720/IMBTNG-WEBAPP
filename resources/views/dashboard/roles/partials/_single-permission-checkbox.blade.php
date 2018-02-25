<div class="col-xs-6 col-sm-4 col-md-3">
	<div class="form-group">
		<label>
			<input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="minimal" 
				@if (old('permissions') and is_array(old('permissions')) and in_array($permission->id, old('permissions')) )
					checked
				@endif
			>
			&nbsp;&nbsp;{{ formatPermissionName($permission->name) }}
		</label>
	</div>
</div>