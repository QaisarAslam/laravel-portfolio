{{-- Add Project Modal --}}
<div class="modal fade add-modal" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="add-form" id="add-form" action="{{ route('projects.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Project Name</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Project Name">
						<small id="nameHelp" class="text-danger"></small>
					</div>
					<div class="form-group">
						<label for="url">Project Url</label>
						<input type="text" name="url" id="url" class="form-control" placeholder="Project Url">
						<small id="urlHelp" class="text-danger"></small>
					</div>
					<div class="form-group">
						<label for="category_id">Select Category</label>
						<select name="category_id" id="category_id" class="form-control">
							<option value="">Select Category</option>
							@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
						<small id="category_idHelp" class="text-danger"></small>
					</div>
	                <div class="form-group">
	                	<label for="framework_id">Select Framework</label>
	                	<select name="framework_id" id="framework_id" class="form-control">
	                		<option value="">Select Framework</option>
	                		@foreach ($frameworks as $framework)
	                			<option value="{{$framework->id}}">{{$framework->name}}</option>
                			@endforeach
                		</select>
                		<small id="framework_idHelp" class="text-danger"></small>
                	</div>
                	<div class="form-group">
                		<label for="tags">Select Tags</label>
                		<select name="tags[]" id="tags" multiple="multiple" data-placeholder="Select Tag(s)" value="" class="form-control tags">
                			@foreach ($tags as $tag)
                				<option value="{{ $tag->id }}">{{ $tag->name }}</option>
                			@endforeach
                		</select>
                		<small id="tagsHelp" class="text-danger"></small>
                	</div>
                	<div class="form-group">
                		<label for="description">Project Description</label>
                		<input type="text" name="description" id="description" class="form-control" placeholder="Project Description">
                		<small id="descriptionHelp" class="text-danger"></small>
                	</div>
                	<div class="form-group">
                		<label for="featured_image">Upload Featured Image</label>
                		<input type="file" name="featured_image" id="featured_image" class="form-control preview-img">
                		<div class="preview preview-box" id="featured-image-preview">
                		</div>
                		<small id="featured_imageHelp" class="text-danger"></small>
                	</div>
                	<div class="form-group">
                		<label for="gallery_images">Upload Gallery Image</label>
                		<input type="file" name="gallery_images[]" id="gallery_images" multiple class="form-control preview-img">
                		{{-- <input type="file" id="gallery_images" name="gallery_images[]" multiple value="{{ old('gallery_images') }}" class="form-control"> --}}
                		<div class="preview preview-box" id="gallery-images-preview">
                		</div>
                		<small id="gallery_imagesHelp" class="text-danger"></small>
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
