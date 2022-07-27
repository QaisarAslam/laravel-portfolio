{{-- Add Service Modal --}}
<div class="modal fade add-modal" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="add-form" id="add-form" action="{{ route('services.store') }}" method="post">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Create Service</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
							<label for="name">Service Name</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Service Name">
							<small id="nameHelp" class="text-danger"></small>
					</div>
					<div class="form-group">
							<label for="description">Service Description</label>
							<input type="text" name="description" id="description" class="form-control" placeholder="Service Description">
							<small id="descriptionHelp" class="text-danger"></small>
					</div>
					<div class="form-group">
							<label for="image">Upload Image</label>
							<input type="file" name="image" id="image" class="form-control preview-img">
							<div class="preview image-preview preview-box" id="image-preview">
							</div>
							<small id="imageHelp" class="text-danger"></small>
					</div>
					<div class="form-group form-check" id="visibility-container" data-default="private">
						<input type="hidden" name="visibility" id="visibility" value="private">
						<input class="form-check-input visibility-checkbox" type="checkbox" id="visibility-checkbox">
						<label for="visibility-checkbox" class="form-check-label">Visibility: <span class="bg-danger text-white rounded px-1">Private</span></label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
