{{-- Edit Category Modal --}}
<div class="modal fade edit-modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="edit-request-data">
		</div>
	</div>
</div>

{{-- Delete Category Modal --}}
<div class="modal fade delete-modal" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" method="POST" class="delete-form" id="delete-form">
				@csrf
				@method('DELETE')
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					{{-- Are you sure? You want to delete <span class="text-danger">{{ $category->name }}</span><br /> --}}
					Are you sure? You want to delete <span class="text-danger"></span><br />
					You won't be able to revert this!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">No, Cancel</button>
					<button type="submit" class="btn btn-success delete_student_btn">Yes, Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>

{{-- Restore Delete Category Modal --}}
<div class="modal fade restore-modal" id="restore-modal" tabindex="-1" role="dialog" aria-labelledby="restoreModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" method="POST" class="restore-form" id="restore-form">
				@csrf
				@method('PUT')
				<div class="modal-header">
					<h5 class="modal-title" id="restoreModalLabel">Confirmation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					{{-- Are you sure? You want to delete <span class="text-danger">{{ $category->name }}</span><br /> --}}
					Are you sure? You want to restore <span class="text-danger"></span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-danger">Yes</button>
				</div>
			</form>
		</div>
	</div>
</div>

{{-- Force Delete Category Modal --}}
<div class="modal fade force-delete-modal" id="force-delete-modal" tabindex="-1" role="dialog" aria-labelledby="forceDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" method="POST" class="force-delete-form" id="force-delete-form">
				@csrf
				@method('DELETE')
				<div class="modal-header">
					<h5 class="modal-title" id="forceDeleteModalLabel">Confirmation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					{{-- Are you sure? You want to delete <span class="text-danger">{{ $category->name }}</span><br /> --}}
					Are you sure? You want to delete <span class="text-danger"></span><br />
					You won't be able to revert this!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-danger">Yes</button>
				</div>
			</form>
		</div>
	</div>
</div>