@extends('layouts.frontend')
@section('title', 'Index')
@section('content')
	{{-- Hero --}}
	@include('frontend.components.hero')
	{{-- Services --}}
	@include('frontend.components.services')
	{{-- Skills --}}
	@include('frontend.components.skills')
	{{-- Projects --}}
	@include('frontend.components.projects')
	{{-- Services --}}
	@include('frontend.components.achievements')
	{{-- Testimonials --}}
	@include('frontend.components.testimonials')
	{{-- Testimonials --}}
	@include('frontend.components.clients')
@endsection
@section('script')
	@if(session('error'))
	<script>
		alert('{{session('error')}}');
	</script>
	@endif
@endsection
