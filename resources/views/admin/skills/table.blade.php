<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>#</th>
			<th>Logo</th>
			<th>Name</th>
			<th>Percentage</th>
			<th>Visibility</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Logo</th>
			<th>Name</th>
			<th>Percentage</th>
			<th>Visibility</th>
			<th>Actions</th>
		</tr>
	</tfoot>
	<tbody>
		@foreach ($skills as $skill)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td><img src="{{ asset($skill->logo) }}" class="img-thumbnail rounded" style='height:50px;' /></td>
				<td>{{ $skill->name }}</td>
				{{-- <td>{{ $skill->percentage }} %</td> --}}
				<td>
					<div class="progress">
						<div class="progress-bar bg-success progress-bar-striped" role="progressbar"
						  aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $skill->percentage }}%">
							{{ $skill->percentage }}%
						</div>
					</div>
				</td>
				<td class="text-capitalize">
					<span class="badge badge-{{ $skill->visibility }}">{{ $skill->visibility }}</span>
				</td>
				<td>
					@if ($skill->trashed())
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#force-delete-modal" data-url="{{ url('/admin/skills/force-delete/'.$skill->id) }}" data-id="{{ $skill->id }}" data-id="{{ $skill->id }}" data-name="{{ $skill->name }}">
								<a class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Force Delete">
									<i class="fa fa-cut" aria-hidden="true"></i>
								</a>
							</span>
						</li>
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#restore-modal" data-url="{{ url('/admin/skills/restore/'.$skill->id) }}" data-id="{{ $skill->id }}" data-id="{{ $skill->id }}" data-name="{{ $skill->name }}">
								<a class="btn btn-success btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Restore">
									<i class="fa fa-recycle" aria-hidden="true"></i>
								</a>
							</span>
						</li>
					@else
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#edit-modal" data-url="{{ url('/admin/skills/'.$skill->id.'/edit') }}" data-id="{{ $skill->id }}" data-id="{{ $skill->id }}">
								<button class="btn btn-primary btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Edit">
									<i class="fa fa-edit" aria-hidden="true"></i>
								</button>
							</span>
						</li>
						<li class="list-inline-item">
							<span data-toggle="modal" data-target="#delete-modal" data-url="{{ url('/admin/skills/'.$skill->id) }}" data-id="{{ $skill->id }}" data-id="{{ $skill->id }}" data-name="{{ $skill->name }}">
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