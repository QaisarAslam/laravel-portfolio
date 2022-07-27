<div class="modal-content">
	<form class="edit-form" id="edit-form" action="{{ route('clients.update', $client->id) }}" method="post">
		@csrf
		@method("PUT")
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<input type="hidden" name="id" value="{{ $client->id }}">
			<div class="form-group">
					<label for="name">Client Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Client Name" value="{{ $client->name }}">
					<small id="nameHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
					<label for="location">Client Location</label>
					<input type="text" name="location" id="location" class="form-control" placeholder="Client Location" value="{{ $client->location }}">
					<small id="locationHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
					<label for="logo">Upload Logo</label>
					<input type="file" name="logo" id="logo" class="form-control preview-img">
					<div class="preview logo-preview preview-box">
						<img src="{{ asset($client->logo) }}" class="img-thumbnail img-fluid">
					</div>
					<small id="logoHelp" class="text-danger"></small>
			</div>
			<div class="form-group form-check" id="visibility-container" data-default="{{ $client->visibility }}">
				<input type="hidden" id="visibility" name="visibility" value="{{ $client->visibility == 'private' ? 'private' : 'public' }}">
				<input type="checkbox" id="visibility-checkbox-edit" class="form-check-input visibility-checkbox" {{ $client->visibility == 'public' ? 'checked' : null }}>
				<label for="visibility-checkbox-edit" class="form-check-label">Visibility: <span class="{{ $client->visibility == 'private' ? 'bg-danger' : 'bg-success' }} text-white rounded px-1">{{ $client->visibility == 'private' ? 'Private' : 'Public' }}</span></label>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>