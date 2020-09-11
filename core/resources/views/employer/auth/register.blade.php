{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employer.register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.frontend.frontend')

@section('title')
    Employer register
@endsection

@section('content')
<div class="row justify-content-center">

 <div class="col-md-12 col-lg-8 mb-2">     
        <h2 class="text-center mt-3">Employer Register</h2>
    <form action="{{route('employer.registered')}}" method="POST" class="p-3 bg-white" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-lg-6 col-md-6"> 
                <div class="row form-group">
               <div class="col-md-12 mb-2 mb-md-0">
                 <label class="font-weight-bold" for="fullname">Company Name</label>
               <input type="text" id="fullname" name="cname" class="form-control" placeholder="company name" required value="{{old('cname')}}">
               </div>
             </div>
       
             <div class="row form-group mb-2">
               <div class="col-md-12 mb-3 mb-md-0">
                 <label class="font-weight-bold" for="fullname">Username</label>
                 <input type="text" name="username"  class="form-control" placeholder="username" required value="{{old('username')}}">
               </div>
             </div>
             <div class="row form-group mb-2">
               <div class="col-md-12 mb-3 mb-md-0">
                 <label class="font-weight-bold" for="fullname">email</label>
                 <input type="email" name="email"  class="form-control" placeholder="email" required value="{{old('email')}}">
               </div>
             </div>
             <div class="row form-group mb-2">
               <div class="col-md-12 mb-3 mb-md-0">
                 <label class="font-weight-bold" for="fullname">address</label>
                 <input type="text" name="address"  class="form-control" placeholder="address" required value="{{old('address')}}">
               </div>
             </div>
             <div class="row form-group mb-2">
               <div class="col-md-12 mb-3 mb-md-0">
                 <label class="font-weight-bold" for="fullname">Phone</label>
                 <input type="text" name="phone"  class="form-control" placeholder="phone" required value="{{old('phone')}}">
               </div>
             </div>
             <div class="row form-group mb-2">
               <div class="col-md-12 mb-3 mb-md-0">
                 <label class="font-weight-bold" for="fullname">Website</label>
                 <input type="text" name="website"  class="form-control" placeholder="website" required value="{{old('website')}}">
               </div>
             </div>
             <div class="row form-group mb-2">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Password</label>
                  <input type="password" name="password"  class="form-control" placeholder="password" required >
                </div>
              </div>
              <div class="row form-group mb-2">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Confirm Password</label>
                  <input type="password" name="password_confirmation"  class="form-control" placeholder="confirm password" required >
                </div>
              </div>
             
           </div>


            <div class="col-lg-6 col-md-6">
                <div class="row form-group mb-2">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="fullname">Slogan</label>
                      <input type="text" name="slogan"  class="form-control" placeholder="slogan" required value="{{old('slogan')}}">
                    </div>
                  </div>
                 <div class="row form-group mb-2">
                   <div class="col-md-12 mb-3 mb-md-0">
                     <label class="font-weight-bold" for="fullname">Description</label>
                     <textarea  name="description"  class="form-control ckeditor" placeholder= "company description" required >{{old('description')}}</textarea>
                   </div>
                 </div>
               
                 <div class="row form-group mb-4">
                   <div class="col-md-12 mb-3 mb-md-0">
                     <label class="font-weight-bold" for="fullname">Logo</label>
                     <input type="file" name="logo"  class="form-control"  required >
                   </div>
                 </div>
                 <div class="row form-group mb-5">
                   <div class="col-md-12 mb-3 mb-md-0">
                     <label class="font-weight-bold" for="fullname">Cover photo</label>
                     <input type="file" name="cover"  class="form-control"  required >
                   </div>
                 </div>
            </div>
            
         </div>
    
          <div class="row form-group mt-4">
            <div class="col-md-12">
              <input type="submit" value="Register" class="btn btn-primary  py-2 px-5 w-100">
            </div>
          </div>
    
    
        </form>
      </div>
</div>

@endsection