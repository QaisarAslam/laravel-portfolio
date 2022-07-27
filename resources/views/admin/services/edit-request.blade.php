<div class="modal-content">
	<form class="edit-form" id="edit-form" action="{{ route('services.update', $service->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<input type='hidden' name='id' value='{{ $service->id }}'>
				<div class="form-group col-sm-12 col-md-12">
					<label for="name">Service Name</label>
					<input type="text" name="name" id="name" value="{{ $service->name }}" class="form-control" placeholder="Service Name">
					<small id="nameHelp" class="text-danger"></small>
				</div>
			</div>
			<div class="form-group">
				<label for="description">Service Description</label>
				<textarea name="description" id="description" class="form-control" rows="5">{{$service->description}}</textarea>
				<small id="description" class="text-danger"></small>
			</div>
			<div class="form-group">
				<label for="image">Upload Image</label>
				<input type="file" name="image" id="image" class="form-control preview-img">
				<div class="preview image-preview preview-box" id="image-preview">
					<img src="{{ asset($service->image) }}" alt="Image not found!" class="img-thumbnail img-fluid">
				</div>
				<small id="imageHelp" class="text-danger"></small>
			</div>
			<div class="form-group form-check" id="visibility-container" data-default="{{ $service->visibility }}">
				<input type="hidden" id="visibility" name="visibility" value="{{ $service->visibility == 'private' ? 'private' : 'public' }}">
				<input type="checkbox" id="visibility-checkbox-edit" class="form-check-input visibility-checkbox" {{ $service->visibility == 'public' ? 'checked' : null }}>
				<label for="visibility-checkbox-edit" class="form-check-label">Visibility: <span class="{{ $service->visibility == 'private' ? 'bg-danger' : 'bg-success' }} text-white rounded px-1">{{ $service->visibility == 'private' ? 'Private' : 'Public' }}</span></label>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>