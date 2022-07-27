<div class="modal-content">
	<form id="edit-form" class="edit-form" action="{{ route('projects.update', $project->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<input type="hidden" name="id" value={{ $project->id }}>
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label for="name">Project Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Project Name" value="{{ $project->name }}">
				<small id="nameHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
				<label for="url">Project Url</label>
				<input type="text" name="url" id="url" class="form-control" placeholder="Project Url" value="{{ $project->url }}">
				<small id="urlHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
				<label for="category_id">Select Category</label>
				<select name="category_id" id="category_id" class="form-control">
					<option value="">Select Category</option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}" @if ($category->id === $project->category_id) selected @endif>{{ $category->name }}</option>
					@endforeach
				</select>
				<small id="category_idHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
				<label for="framework_id">Select Framework</label>
				<select name="framework_id" id="framework_id" class="form-control">
					<option value="">Select Framework</option>
					@foreach ($frameworks as $framework)
						<option value="{{ $framework->id }}" @if ($framework->id === $project->framework_id) selected @endif>{{ $framework->name }}</option>
					@endforeach
				</select>
				<small id="framework_idHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
				<label for="tags">Select Tags</label>
				<select name="tags[]" id="tags" multiple class="form-control tags">
					@forelse ($tags as $tag)
						<option
							@if ($project->tags->contains($tag->id))
							selected
							@endif
							value="{{ $tag->id }}"> {{ $tag->name }}
						</option>
					@empty
					@endforelse
					<small id="tagsHelp" class="text-danger"></small>
				</select>
		</div>
			<div class="form-group">
				<label for="description">Project Description</label>
				<input type="text" name="description" id="description" class="form-control" placeholder="Project Description" value="{{ $project->description }}">
				<small id="descriptionHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
				<label for="featured_image">Upload Featured Image</label>
				<input type="file" name="featured_image" id="featured_image" class="form-control preview-img" value="{{ $project->featured_image ?? ''}}">
				<div id="featured-image-preview" class="preview preview-box">
					<img src="{{ asset($project->featured_image) }}" class="img-thumbnail img-fluid" alt="Image not found">
				</div>
				<small id="featured_imageHelp" class="text-danger"></small>
			</div>
			<div class="form-group">
				<label for="gallery_images">Upload Gallery Images</label>
				<input type="file" name="gallery_images[]" id="gallery_images" multiple class="form-control preview-img">
				{{-- <input type="file" id="gallery_images" name="gallery_images[]" multiple value="{{ old('gallery_images') }}" class="form-control"> --}}
				<div id="gallery-images-preview" class="preview preview-box">
					@php
					$galleryImagesArray = explode(',', $project->gallery_images);
					@endphp
					@foreach ($galleryImagesArray as $galleryImage)
					<img src="{{ asset($galleryImage) }}" class="img-thumbnail img-fluid" alt="Image not found">
					@endforeach
				</div>
				<small id="gallery_imagesHelp" class="text-danger"></small>
			</div>
			<div class="form-group form-check" id="visibility-container" data-default="{{ $project->visibility }}">
				<input type="hidden" id="visibility" name="visibility" value="{{ $project->visibility == 'private' ? 'private' : 'public' }}">
				<input type="checkbox" id="visibility-checkbox-edit" class="form-check-input visibility-checkbox" {{ $project->visibility == 'public' ? 'checked' : null }}>
				<label for="visibility-checkbox-edit" class="form-check-label">Visibility: <span class="{{ $project->visibility == 'private' ? 'bg-danger' : 'bg-success' }} text-white rounded px-1">{{ $project->visibility == 'private' ? 'Private' : 'Public' }}</span></label>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="reset" class="btn btn-warning btn-reset" id="btn-reset">Reset</button>
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>
