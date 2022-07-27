@extends('layouts.frontend')
@section('title', 'Project Details')
@section('content')
	{{-- Page Header --}}
	@include('frontend.components.page-header')
	{{-- main content --}}
	<div class="row" style="background: #fff;">
		<div class="col-md-8 p-5">
			<img src="{{ asset($project->featured_image) }}" class="img-thumbnail img-fluid d-block">
			@php
				$galleryImagesArray = explode(',', $project->gallery_images, );
			@endphp
			@foreach ($galleryImagesArray as $galleryImage)
				<img src="{{ asset($galleryImage) }}" class="img-thumbnail img-fluid d-block">
			@endforeach
		</div>
		<div class="col-md-4 p-5">
			Category: {{ $project->category->name }}
		</div>
	</div>
@endsection