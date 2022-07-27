<div class="modal-content">
	<form class="edit-form" id="edit-form" action="{{ route('tags.update', $tag->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<input type="hidden" name="id" value="{{ $tag->id }}">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label for="name">Tag Name</label>
				<input type="text" name="name" id="name" value="{{ $tag->name }}" class="form-control" placeholder="Tag Name">
				<small id="nameHelp" class="text-danger"></small>
			</div>
			<div class="form-group form-check" id="visibility-container" data-default="{{ $tag->visibility }}">
				<input type="hidden" id="visibility" name="visibility" value="{{ $tag->visibility == 'private' ? 'private' : 'public' }}">
				<input type="checkbox" id="visibility-checkbox-edit" class="form-check-input visibility-checkbox" {{ $tag->visibility == 'public' ? 'checked' : null }}>
				<label for="visibility-checkbox-edit" class="form-check-label">Visibility: <span class="{{ $tag->visibility == 'private' ? 'bg-danger' : 'bg-success' }} text-white rounded px-1">{{ $tag->visibility == 'private' ? 'Private' : 'Public' }}</span></label>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>