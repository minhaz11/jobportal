@extends('layouts.frontend.frontend')

@section("title", "Profile")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="img-responsive w-100"
                    src="{{ asset('assets/uploads/profile/' . Auth::user()->profile->avatar) }}"
                    alt="{{ Auth::user()->name }}">

                <form action="{{ route('jobseeker.profile.image.update', Auth::user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-control row">
                        <div class="col-md-6">
                            <input name="avatar" class="form-control-file" type="file">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info btn-sm">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        User Profile / Applicants Info
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('jobseeker.profile.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name"
                                value="{{ old('name') ?? Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="text" id="email" readonly class="form-control" placeholder="Your email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="address" class="font-weight-bold">Address</label>
                            <input type="text" id="address" name="address" class="form-control"
                                placeholder="Enter address"
                                value="{{ old('address') ?? Auth::user()->profile->address }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="gender" class="font-weight-bold">Gender</label> <br>
                                <input type="radio" {{ (Auth::user()->profile->gender == 'female') ? 'checked':'' }}
                                    id="gender" name="gender" value="female"> Female
                                <input type="radio" {{ (Auth::user()->profile->gender == 'male') ? 'checked':'' }}
                                    name="gender" value="male"> Male
                                <input type="radio" {{ (Auth::user()->profile->gender == 'other') ? 'checked':'' }}
                                    name="gender" value="other"> Other
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="font-weight-bold">Date Of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control"
                                    placeholder="Enter date of birth"
                                    value="{{ old('dob') ?? Auth::user()->profile->dob }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="experience" class="font-weight-bold">Experience</label>
                            <input type="number" id="experience" name="experience" class="form-control"
                                placeholder="Enter experience year of number"
                                value="{{ old('experience') ?? Auth::user()->profile->experience }}">
                        </div>

                        <div class="form-group">
                            <label for="bio" class="font-weight-bold">Bio</label>
                            <input type="text" name="bio" id="bio" class="form-control" placeholder="Enter bio"
                                value="{{ old('bio') ?? Auth::user()->profile->bio }}">
                        </div>

                        <div class="form-group">
                            <label for="cv" class="font-weight-bold">Cover Letter</label>
                            <input type="text" id="cv" name="cv" class="form-control" placeholder="Write your cv"
                                value="{{ old('cv') ?? Auth::user()->profile->cover_letter }}">
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Resume</label>
                            <input type="text" name="resume" class="form-control" placeholder="Enter resume"
                                value="{{ old('bio') ?? Auth::user()->profile->resume }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection