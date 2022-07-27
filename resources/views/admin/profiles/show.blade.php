@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
		<div class="container-fluid">
			<h1 class="h3 mb-4 text-gray-800">View Profile
				<a href="{{ route('profiles.edit', $profile->id) }}" class="d-block btn btn-primary btn-sm float-right">Edit</a>
				<a href="javascript:void()" role="button" class="d-block btn btn-danger btn-sm float-right mr-2 btn-delete">Delete</a>
			</h1>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-8">
				<div class="card shadow mb-4">
					<div class="card-body">
						@include('admin.components.flash-messages')
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="first_name" class="ml-2">First Name</label>
									<input disabled type="text" name="first_name" id="first_name" class="form-control" value="{{ $profile->first_name }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="last_name" class="ml-2">Last Name</label>
									<input disabled type="text" name="last_name" id="last_name" class="form-control" value="{{ $profile->last_name }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="dob" class="ml-2">Date of Birth</label>
									<input disabled type="text" name="dob" id="dob" class="form-control" value="{{ $profile->dob }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="address" class="ml-2">Address</label>
									<input disabled type="text" name="address" id="address" class="form-control" value="{{ $profile->address }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="country" class="ml-2">Country</label>
									<input disabled type="text" name="country" id="country" class="form-control" value="{{ $profile->country }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="state" class="ml-2">State</label>
									<input disabled type="text" name="state" id="state" class="form-control" value="{{ $profile->state }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="city" class="ml-2">City</label>
									<input disabled type="text" name="city" id="city" class="form-control" value="{{ $profile->city }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="zipcode" class="ml-2">Zip Code</label>
									<input disabled type="text" name="zipcode" id="zipcode" class="form-control" value="{{ $profile->zipcode }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="mobile_primary" class="ml-2">Primary Mobile Number</label>
									<input disabled type="text" name="mobile_primary" id="mobile_primary" class="form-control" value="{{ $profile->mobile_primary }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="mobile_secondary" class="ml-2">Secondary Mobile Number</label>
									<input disabled type="text" name="mobile_secondary" id="mobile_secondary" class="form-control" value="{{ $profile->mobile_secondary }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="phone" class="ml-2">Landline Number</label>
									<input disabled type="text" name="phone" id="phone" class="form-control" value="{{ $profile->phone }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="email_primary" class="ml-2">Email Primary</label>
									<input disabled type="text" name="email_primary" id="email_primary" class="form-control" value="{{ $profile->email_primary }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="email_secondary" class="ml-2">Email Secondary</label>
									<input disabled type="text" name="email_secondary" id="email_secondary" class="form-control" value="{{ $profile->email_secondary }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="whatsapp" class="ml-2">Whatsapp</label>
									<input disabled type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ $profile->whatsapp }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="facebook_profile" class="ml-2">Facebook</label>
									<input disabled type="text" name="facebook_profile" id="facebook_profile" class="form-control" value="{{ $profile->facebook_profile }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="twitter_profile" class="ml-2">Twitter</label>
									<input disabled type="text" name="twitter_profile" id="twitter_profile" class="form-control" value="{{ $profile->twitter_profile }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="linkedin_profile" class="ml-2">Linkedin</label>
									<input disabled type="text" name="linkedin_profile" id="linkedin_profile" class="form-control" value="{{ $profile->linkedin_profile }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="website" class="ml-2">Website</label>
									<input disabled type="text" name="website" id="website" class="form-control" value="{{ $profile->website }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="about" class="ml-2">About</label>
									<input disabled type="text" name="about" id="about" class="form-control" value="{{ $profile->about }}">
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="gender" class="ml-2">Gender</label>
									<input disabled type="text" name="about" id="about" class="form-control" value="{{ $profile->gender }}">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-6">
									<label for="doc" class="ml-2">Upload Document</label>
									<input disabled type="file" name="doc" id="doc" value="" class="form-control">
									@if ($profile->doc != null)
										<div id="show-doc">
											<a href="{{ asset($profile->doc) }}" target="_blank" title="Click to view"> Click here to view</a>
										</div>
									@endif
								</div>

								<div class="form-group col-sm-12 col-md-6">
									<label for="avatar" class="ml-2">Upload Image</label>
									<input disabled type="file" name="avatar" id="avatar" value="" class="form-control">
									@if ($profile->avatar != null)
										<div id="show-avatar">
											<a href="{{ asset($profile->avatar) }}" target="_blank" title="Click to view">
												<img src="{{ asset($profile->avatar) }}" width="50" height="auto" /></a>
										</div>
									@endif
								</div>
							</div>
							<div class="form-check mb-2">
								<label for="visibility" class="form-check-label">Visibility : {{ $profile->visibility }}</label>
								<form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" accept-charset="utf-8" class="delete-form">
									@csrf
									@method('DELETE')
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('script')
	<script>
		$('.btn-delete').click(function () {
			$('form.delete-form').submit();
		});
	</script>
@endsection