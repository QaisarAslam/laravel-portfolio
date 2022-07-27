<div class="modal-content">
	<form id="edit-form" action="{{ route('categories.update', $category->id) }}" method="post">
		@csrf
		@method('PUT')
		<input type="hidden" name="id" value="{{ $category->id }}">

		<div class="modal-header">
			<h5 class="modal-title" id="modal-title">Edit Category</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<div class="modal-body">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control name" placeholder="Enter Category Name" value="{{ $category->name }}">
				<small id="nameHelp" class="text-danger"></small>
			</div>
			<div class="form-group form-check" id="visibility-container" data-default="{{ $category->visibility }}">
				<input type="hidden" id="visibility" name="visibility" value="{{ $category->visibility == 'private' ? 'private' : 'public' }}">
				<input type="checkbox" id="visibility-checkbox-edit" class="form-check-input visibility-checkbox" {{ $category->visibility == 'public' ? 'checked' : null }}>
				<label for="visibility-checkbox-edit" class="form-check-label">Visibility: <span class="{{ $category->visibility == 'private' ? 'bg-danger' : 'bg-success' }} text-white rounded px-1">{{ $category->visibility == 'private' ? 'Private' : 'Public' }}</span></label>
			</div>
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>