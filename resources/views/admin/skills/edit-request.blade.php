<div class="modal-content">
<form class="edit-form" id="edit-form" action="{{ route('skills.update', $skill->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<input type="hidden" name="id" value="{{ $skill->id }}">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
				<label for="name">Skill Name</label>
				<input type="text" name="name" id="name" value="{{ $skill->name }}" class="form-control" placeholder="Skill Name">
		</div>
		<div class="form-group">
				<label for="percentage">Skill Percentage</label>
				<input type="text" name="percentage" id="percentage" value="{{ $skill->percentage }}" class="form-control" placeholder="Skill Percentage">
		</div>
		<div class="form-group">
				<label for="logo-edit">Upload Logo</label>
				<input type="file" name="logo" id="logo-edit" class="form-control preview-img" />
				<div class="preview logo-preview preview-box" id="logo-preview">
					<img src="{{ asset($skill->logo) }}" alt="Image not found!" class="img-thumbnail img-fluid">
				</div>
				<small id="logoHelp" class="text-danger"></small>
		</div>
		<div class="form-group form-check" id="visibility-container" data-default="{{ $skill->visibility }}">
			<input type="hidden" id="visibility" name="visibility" value="{{ $skill->visibility == 'private' ? 'private' : 'public' }}">
			<input type="checkbox" id="visibility-checkbox-edit" class="form-check-input visibility-checkbox" {{ $skill->visibility == 'public' ? 'checked' : null }}>
			<label for="visibility-checkbox-edit" class="form-check-label">Visibility: <span class="{{ $skill->visibility == 'private' ? 'bg-danger' : 'bg-success' }} text-white rounded px-1">{{ $skill->visibility == 'private' ? 'Private' : 'Public' }}</span></label>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
		<button type="submit" class="btn btn-success">Submit</button>
	</div>
</form>
</div>