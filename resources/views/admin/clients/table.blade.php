<div class="table-responsive">
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Location</th>
				<th>Visibility</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Location</th>
				<th>Visibility</th>
				<th>Actions</th>
			</tr>
		</tfoot>
		<tbody>
			@foreach ($clients as $client)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $client->name }}</td>
					<td>{{ $client->location }}</td>
					<td class="text-capitalize">
						<span class="badge badge-{{ $client->visibility }}">{{ $client->visibility }}</span>
					</td>
					<td>
						@if ($client->trashed())
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#force-delete-modal" data-url="{{ url('/admin/clients/force-delete/'.$client->id) }}" data-id="{{ $client->id }}" data-name="{{ $client->name }}">
									<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Force Delete">
										<i class="fa fa-cut" aria-hidden="true"></i>
									</a>
								</span>
							</li>
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#restore-modal" data-url="{{ url('/admin/clients/restore/'.$client->id) }}" data-id="{{ $client->id }}" data-name="{{ $client->name }}">
									<a class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Restore">
										<i class="fa fa-recycle" aria-hidden="true"></i>
									</a>
								</span>
							</li>
						@else
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#edit-modal" data-url="{{ url('/admin/clients/'.$client->id.'/edit') }}">
									<button class="btn btn-primary btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit">
										<i class="fa fa-edit" aria-hidden="true"></i>
									</button>
								</span>
							</li>
							<li class="list-inline-item">
								<span data-toggle="modal" data-target="#delete-modal" data-url="{{ url('/admin/clients/'.$client->id) }}" data-id="{{ $client->id }}" data-name="{{ $client->name }}">
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