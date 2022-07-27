@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Create Profile
                <a href="{{ url('/') }}" class="d-block btn btn-primary btn-sm float-right">Return</a>
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('profiles.create') }}" method="POST" accept-charset="utf-8"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">Date of Birth</label>
                                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Enter Date of Birth">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="Enter State">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Zip Code</label>
                                    <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter Zip Code">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">Mobile Primary</label>
                                    <input type="text" name="mobile_primary" id="mobile_primary" class="form-control" placeholder="Enter Mobile">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Mobile Secondary</label>
                                    <input type="text" name="mobile_secondary" id="mobile_secondary" class="form-control" placeholder="Enter Mobile">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">Landline Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Landline Number">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Email Primary</label>
                                    <input type="text" name="email_primary" id="email_primary" class="form-control" placeholder="Email Primary">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">Email Secondary</label>
                                    <input type="text" name="email_secondary" id="email_secondary" class="form-control" placeholder="Email Secondary">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Whatsapp</label>
                                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Enter Whatsapp">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">Facebook</label>
                                    <input type="text" name="facebook_profile" id="facebook_profile" class="form-control" placeholder="Enter Facebook Profile">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Twitter</label>
                                    <input type="text" name="twitter_profile" id="twitter_profile" class="form-control" placeholder="Enter Twitter Profile">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">Linkedin</label>
                                    <input type="text" name="linkedin_profile" id="linkedin_profile" class="form-control" placeholder="Enter Linkedin Profile">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Website</label>
                                    <input type="text" name="website" id="website" class="form-control" placeholder="Enter Website Url">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="title" class="ml-2">About</label>
                                    <input type="text" name="about" id="about" class="form-control" placeholder="Enter About">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="url" class="ml-2">Visibility</label>
                                    <input type="text" name="website" id="website" class="form-control" placeholder="Enter Website Url">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="fileImage" class="ml-2">Upload Image</label>
                                    <input type="file" name="fileImage" id="fileImage" value="" class="form-control">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="fileImage" class="ml-2">Upload Document</label>
                                    <input type="file" name="fileImage" id="fileImage" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="gender" class="ml-2">Select Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option selected disabled>Choose Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" name="private" id="private" class="form-check-input" value="">
                                <label for="active" class="form-check-label">Visibility</label>
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
