@extends("layouts.admin")
@section("title", "Testimonials")
@section("content")
    <div class="container-fluid">
        <div class="card shadow mb-4">
			@include("admin.components.flash-messages")
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h5 class="m-0 font-weight-bold d-inline-block"><i class="fas fa-bookmark"></i> Testimonials</h5>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal">
					<i class="fas fa-plus"></i> Add Testimonial
				</button>
			</div>
			<div class="card-body" id="record-table">
				@include("admin.testimonials.table")
			</div>
		</div>
    </div>
    @include('admin.testimonials.modals')
@endsection
