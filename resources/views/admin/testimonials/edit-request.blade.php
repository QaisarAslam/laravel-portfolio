<div class="modal-content">
<form class="edit-form" id="edit-form" action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
	@csrf
	@method('PUT')
	<input type="hidden" name="id" value="{{ $testimonial->id }}">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label for="name">Testimonial Name</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Testimonial Name" value="{{ $testimonial->name }}">
			<small class="text-danger"></small>
		</div>
		<div class="form-group">
			<label for="location">Testimonial Location</label>
			<input type="text" name="location" id="location" class="form-control" placeholder="Testimonial Location" value="{{ $testimonial->location }}">
			<small class="text-danger"></small>
		</div>
		<div class="form-group">
			<label for="detail">Detail</label>
			<textarea name="detail" id="detail" class="form-control">{{ $testimonial->detail }}</textarea>
			<small class="text-danger"></small>
		</div>
		<div class="form-group">
			<label for="image">Upload Image</label>
			<input type="file" name="image" id="image" class="form-control preview-img">
			<div class="preview image-preview preview-box" id="image-preview">
				<img src="{{ asset($testimonial->image) }}" alt="Image not found!" class="img-thumbnail img-fluid">
			</div>
			<small id="imageHelp" class="text-danger"></small>
		</div>
		<div class="form-group form-check" id="visibility-container" data-default="{{ $testimonial->visibility }}">
			<input type="hidden" id="visibility" name="visibility" value="{{ $testimonial->visibility == 'private' ? 'private' : 'public' }}">
			<input type="checkbox" id="visibility-checkbox-edit" class="form-check-input visibility-checkbox" {{ $testimonial->visibility == 'public' ? 'checked' : null }}>
			<label for="visibility-checkbox-edit" class="form-check-label">Visibility: <span class="{{ $testimonial->visibility == 'private' ? 'bg-danger' : 'bg-success' }} text-white rounded px-1">{{ $testimonial->visibility == 'private' ? 'Private' : 'Public' }}</span></label>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
		<button type="submit" class="btn btn-success">Submit</button>
	</div>
</form>
</div>