@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid">
    	<p>@include('admin.components.flash-messages')</p>
        <h1 class="h3 mb-4 text-gray-800">Profile
            <a href="{{ url('admin/profiles/create') }}" class="d-block btn btn-primary btn-sm float-right">Create Profile</a>
        </h1>
    </div>
    <div class="col-xl-12 col-lg-12">
        You didn't set your profile till yet !
    </div>
@endsection
