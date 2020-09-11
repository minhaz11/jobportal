@extends('layouts.frontend.frontend')

@section("title", "Profile")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="img-responsive w-100" src="{{ asset('assets/frontend/images/person_1.jpg') }}"
                    alt="{{ Auth::user()->name }}">

                <form action="">
                    <input type="file">
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
                    <form action="">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                value="{{ old('name') ?? Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Email</label>
                            <input type="text" readonly class="form-control" placeholder="Your email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Address</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Gender</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Date Of Birth</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Experience</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Bio</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Cover Letter</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold">Resume</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection