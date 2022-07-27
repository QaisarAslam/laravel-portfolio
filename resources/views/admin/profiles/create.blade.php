@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Create Profile
                <a href="{{ url('/admin/profiles') }}" class="d-block btn btn-primary btn-sm float-right">Return</a>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                    	@if($errors)
	                    	@foreach($errors->all() as $error => $errorr)
	                    		<span class="text-danger"> <b>{{ $error }}</b> => {{ $errorr }}</span><br />
	                    	@endforeach
                    	@endif
                        <form action="{{ route('profiles.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                        	@csrf
                        	<input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="first_name" class="ml-2">First Name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First Name">
                                    @if ($errors->has('first_name'))
                                    	<small class="text-danger ml-2">{{ $errors->first('first_name') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="last_name" class="ml-2">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Last Name">
                                    @if ($errors->has('last_name'))
                                    	<small class="text-danger ml-2">{{ $errors->first('last_name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="dob" class="ml-2">Date of Birth</label>
                                    <input type="text" name="dob" id="dob" value="{{ old('dob') }}" class="form-control" placeholder="Enter Date of Birth">
                                    @if ($errors->has('dob'))
                                    	<small class="text-danger ml-2">{{ $errors->first('dob') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="address" class="ml-2">Address</label>
                                    <input type="text" name="address" id="address" value="{{ old('address') }}"  class="form-control" placeholder="Enter Address">
                                    @if ($errors->has('address'))
                                    	<small class="text-danger ml-2">{{ $errors->first('address') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="country" class="ml-2">Country</label>
                                    <input type="text" name="country" id="country" value="{{ old('country') }}"  class="form-control" placeholder="Enter Country">
                                    @if ($errors->has('country'))
                                    	<small class="text-danger ml-2">{{ $errors->first('country') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="state" class="ml-2">State</label>
                                    <input type="text" name="state" id="state" value="{{ old('state') }}"  class="form-control" placeholder="Enter State">
                                    @if ($errors->has('state'))
                                    	<small class="text-danger ml-2">{{ $errors->first('state') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="city" class="ml-2">City</label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}"  class="form-control" placeholder="Enter City">
                                    @if ($errors->has('city'))
                                    	<small class="text-danger ml-2">{{ $errors->first('city') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="zipcode" class="ml-2">Zip Code</label>
                                    <input type="text" name="zipcode" id="zipcode" value="{{ old('zipcode') }}"  class="form-control" placeholder="Enter Zip Code">
                                    @if ($errors->has('zipcode'))
                                    	<small class="text-danger ml-2">{{ $errors->first('zipcode') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="mobile_primary" class="ml-2">Primary Mobile Number</label>
                                    <input type="text" name="mobile_primary" id="mobile_primary" value="{{ old('mobile_primary') }}"  class="form-control" placeholder="1234-1234567">
                                    @if ($errors->has('mobile_primary'))
                                    	<small class="text-danger ml-2">{{ $errors->first('mobile_primary') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="mobile_secondary" class="ml-2">Secondary Mobile Number</label>
                                    <input type="text" name="mobile_secondary" id="mobile_secondary" value="{{ old('mobile_secondary') }}"  class="form-control" placeholder="1234-1234567">
                                    @if ($errors->has('mobile_secondary'))
                                    	<small class="text-danger ml-2">{{ $errors->first('mobile_secondary') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="phone" class="ml-2">Landline Number</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"  class="form-control" placeholder="Enter Landline Number">
                                    @if ($errors->has('phone'))
                                    	<small class="text-danger ml-2">{{ $errors->first('phone') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="email_primary" class="ml-2">Email Primary</label>
                                    <input type="text" name="email_primary" id="email_primary" value="{{ old('email_primary') }}"  class="form-control" placeholder="Email Primary">
                                    @if ($errors->has('email_primary'))
                                    	<small class="text-danger ml-2">{{ $errors->first('email_primary') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="email_secondary" class="ml-2">Email Secondary</label>
                                    <input type="text" name="email_secondary" id="email_secondary" value="{{ old('email_secondary') }}"  class="form-control" placeholder="Email Secondary">
                                    @if ($errors->has('email_secondary'))
                                    	<small class="text-danger ml-2">{{ $errors->first('email_secondary') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="whatsapp" class="ml-2">Whatsapp</label>
                                    <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') }}"  class="form-control" placeholder="Enter Whatsapp">
                                    @if ($errors->has('whatsapp'))
                                    	<small class="text-danger ml-2">{{ $errors->first('whatsapp') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="facebook_profile" class="ml-2">Facebook</label>
                                    <input type="text" name="facebook_profile" id="facebook_profile" value="{{ old('facebook_profile') }}"  class="form-control" placeholder="Enter Facebook Profile">
                                    @if ($errors->has('facebook_profile'))
                                    	<small class="text-danger ml-2">{{ $errors->first('facebook_profile') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="twitter_profile" class="ml-2">Twitter</label>
                                    <input type="text" name="twitter_profile" id="twitter_profile" value="{{ old('twitter_profile') }}"  class="form-control" placeholder="Enter Twitter Profile">
                                    @if ($errors->has('twitter_profile'))
                                    	<small class="text-danger ml-2">{{ $errors->first('twitter_profile') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="linkedin_profile" class="ml-2">Linkedin</label>
                                    <input type="text" name="linkedin_profile" id="linkedin_profile" value="{{ old('linkedin_profile') }}"  class="form-control" placeholder="Enter Linkedin Profile">
                                    @if ($errors->has('linkedin_profile'))
                                    	<small class="text-danger ml-2">{{ $errors->first('linkedin_profile') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="website" class="ml-2">Website</label>
                                    <input type="text" name="website" id="website" value="{{ old('website') }}"  class="form-control" placeholder="Enter Website Url">
                                    @if ($errors->has('website'))
                                    	<small class="text-danger ml-2">{{ $errors->first('website') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="about" class="ml-2">About</label>
                                    <input type="text" name="about" id="about" value="{{ old('about') }}"  class="form-control" placeholder="Enter About">
                                    @if ($errors->has('about'))
                                    	<small class="text-danger ml-2">{{ $errors->first('about') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="gender" class="ml-2">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        {{-- <option selected disabled value="">Choose Gender</option> --}}
                                        <option name="gender" selected disabled id="gender" value="">Choose Gender</option>
                                        <option value="male" {{ old('gender')=='male' ? 'selected' : ''  }}>Male</option>
                                        <option value="female" {{ old('gender')=='female' ? 'selected' : ''  }}>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                    	<small class="text-danger ml-2">{{ $errors->first('gender') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="doc" class="ml-2">Upload Document</label>
                                    <input type="file" name="doc" id="doc" value="" class="form-control">
                                    @if ($errors->has('doc'))
                                    	<small class="text-danger ml-2">{{ $errors->first('doc') }}</small>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="avatar" class="ml-2">Upload Image</label>
                                    <input type="file" name="avatar" id="avatar" value="" class="form-control">
                                    @if ($errors->has('avatar'))
                                    	<small class="text-danger ml-2">{{ $errors->first('avatar') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-check mb-2">
						<input class="form-check-input" type="checkbox" id="visibility-checkbox" {{ old('visibility')=='public' ? 'checked' : '' }}>
						<label for="visibility-checkbox" class="form-check-label">Visibility: <span class="bg-success text-white rounded px-1">Private</span></label>
					</div>
					<input type="hidden" name="visibility" id="visibility">
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
	<script type="text/javascript" src="{{ asset('admin-assets/js/visibility.js') }}"></script>
@endsection
