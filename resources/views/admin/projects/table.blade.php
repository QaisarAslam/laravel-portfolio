<div class="table-responsive">
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Featured Image</th>
				<th>Visibility</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Featured Image</th>
				<th>Visibility</th>
				<th>Actions</th>
			</tr>
		</tfoot>
		<tbody>
			@foreach ($projects as $project)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $project->name }}</td>
					<td>
						<img src="{{ asset($project->featured_image) }}" class="img-fluid img-thumbnail" style="width: 100px; height: auto;"/>
					</td>
					<td class="text-capitalize">
						<span class="badge badge-{{ $project->visibility }}">{{ $project->visibility }}</span>
					</td>
					{{-- <td>
						@php
							$galleryImagesArray = explode(', ', $project->gallery_images);
							$totalGalleryImages = count($galleryImagesArray);
						@endphp
						{{ $totalGalleryImages }}
					</td> --}}
					<td>
						<!-- Call to action buttons -->
						<ul class="list-inline m-0">
							{{-- <li class="list-inline-item">
								<a href="#!" class="btn btn-success btn-sm rounded-0" data-placement="top" data-toggle="tooltip" title="Show">
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
							</li> --}}
							@if ($project->trashed())
								<li class="list-inline-item">
									<span data-toggle="modal" data-target="#force-delete-modal" data-url="{{ url('/admin/projects/force-delete/'.$project->id) }}" data-id="{{ $project->id }}" data-name="{{ $project->name }}">
										<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Force Delete">
											<i class="fa fa-cut" aria-hidden="true"></i>
										</a>
									</span>
								</li>
								<li class="list-inline-item">
									<span data-toggle="modal" data-target="#restore-modal" data-url="{{ url('/admin/projects/restore/'.$project->id) }}" data-id="{{ $project->id }}" data-name="{{ $project->name }}">
										<a class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Restore">
											<i class="fa fa-recycle" aria-hidden="true"></i>
										</a>
									</span>
								</li>
							@else
								<li class="list-inline-item">
									<span data-toggle="modal" data-target="#edit-modal" data-url="{{ url('/admin/projects/'.$project->id.'/edit') }}" data-id="{{ $project->id }}">
										<button class="btn btn-primary btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit">
											<i class="fa fa-edit" aria-hidden="true"></i>
										</button>
									</span>
								</li>
								<li class="list-inline-item">
									<span data-toggle="modal" data-target="#delete-modal" data-url="{{ url('/admin/projects/'.$project->id) }}" data-id="{{ $project->id }}" data-name="{{ $project->name }}">
										<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</a>
									</span>
								</li>
							@endif
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>