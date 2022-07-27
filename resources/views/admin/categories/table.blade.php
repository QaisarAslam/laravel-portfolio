<div class="table-responsive">
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
			@foreach ($categories as $category)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->slug }}</td>
					<td class="text-capitalize">
						<span class="badge badge-{{ $category->visibility }}">{{ $category->visibility }}</span>
					</td>
					<td>
						@if ($category->trashed())
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#force-delete-modal" data-url="{{ url('/admin/categories/force-delete/'.$category->id) }}" data-name="{{ $category->name }}">
									<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Force Delete">
										<i class="fa fa-cut" aria-hidden="true"></i>
									</a>
								</span>
							</li>
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#restore-modal" data-url="{{ url('/admin/categories/restore/'.$category->id) }}" data-name="{{ $category->name }}">
									<a class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Restore">
										<i class="fa fa-recycle" aria-hidden="true"></i>
									</a>
								</span>
							</li>
						@else
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#edit-modal" data-url="{{ url('/admin/categories/'.$category->id.'/edit') }}">
									<button class="btn btn-warning btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit">
										<i class="fa fa-edit" aria-hidden="true"></i>
									</button>
								</span>
							</li>
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#delete-modal" data-url="{{ url('/admin/categories/'.$category->id) }}" data-name="{{ $category->name }}">
									<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Delete">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</a>
								</span>
							</li>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>