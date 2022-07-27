<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Slug</th>
			<th>Visibility</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Slug</th>
			<th>Visibility</th>
			<th>Actions</th>
		</tr>
	</tfoot>
	<tbody>
		@foreach ($tags as $tag)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $tag->name }}</td>
				<td>{{ $tag->slug }}</td>
				<td class="text-capitalize">
					<span class="badge badge-{{ $tag->visibility }}">{{ $tag->visibility }}</span>
				</td>
				<td>
					@if (!$tag->trashed())
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#edit-modal" data-url="{{ url('/admin/tags/'.$tag->id.'/edit') }}" data-id="{{ $tag->id }}">
								<button class="btn btn-primary btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit">
									<i class="fa fa-edit" aria-hidden="true"></i>
								</button>
							</span>
						</li>
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#delete-modal" data-url="{{ url('/admin/tags/'.$tag->id) }}" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}">
								<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>
							</span>
						</li>
					@else
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#force-delete-modal" data-url="{{ url('/admin/tags/force-delete/'.$tag->id) }}" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}">
								<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Force Delete">
									<i class="fa fa-cut" aria-hidden="true"></i>
								</a>
							</span>
						</li>
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#restore-modal" data-url="{{ url('/admin/tags/restore/'.$tag->id) }}" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}">
								<a class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Restore">
									<i class="fa fa-recycle" aria-hidden="true"></i>
								</a>
							</span>
						</li>
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>