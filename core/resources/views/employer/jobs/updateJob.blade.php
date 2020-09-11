@extends('layouts.employer.app')
@section('title')
   update job
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">Add a new job</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">update job</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
     <div class="container-fluid">
<div class="card card-primary">

    <div class="card-header">
      <h3 class="card-title">Update job</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
<form role="form"  method="POST" action="{{route('employer.job.update',$job->id)}}" enctype="multipart/form-data"> @csrf
      <div class="card-body">
          <div class="row">
              <div class="col-md-7 pr-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter title" required value="{{$job->title}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                  <textarea  name="description" class="form-control textarea" id="textarea" placeholder="Description">{{$job->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Roles</label>
                  <textarea  name="roles" class="form-control textarea" id="exampleInputPassword1" placeholder="Roles">{{$job->roles}}</textarea>
                  </div>
                 
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <select class="form-control" name="category" id="">
                      <option value="">--select category--</option>
                      @foreach ($categories as $item)
                  <option value="{{$item->id}}" {{$job->category_id ==$item->id?'selected':''}}>{{$item->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Position</label>
                    <input type="text" class="form-control" name="position" id="exampleInputEmail1" placeholder="Position" required value="{{$job->position}}">
                  </div>
              </div>
              <div class="col-md-5">
                
                  <label for="exampleInputEmail1">Salary</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="salary" required  value="{{$job->salary}}">
                    <div class="input-group-append">
                      <span class="input-group-text">$</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="address" required value="{{$job->address}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Job type</label>
                    <select class="form-control" name="type" id="" required>
                        <option value="">--select ajob type--</option>
                        <option value="fulltime" {{$job->type=='fulltime'??'selected'}}>Full time</option>
                        <option value="parttime" {{$job->type=='parttime'??'selected'}}>Part time</option>
                    </select>
                  </div>
               
                 
                 <div class="form-group">
                    <label for="exampleInputEmail1">Deadline</label>
                 <input type="date" name="deadline" class="form-control float-right" id="reservation" required value="{{$job->deadline}}">
                 </div>
        
                <div class="form-group mt-2">
                  <label for="exampleInputFile">Cover image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="cover">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                   
                  </div>
                </div>

                <div class="bootstrap-switch-container" style="width: 135px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 45px;">ON</span><span class="bootstrap-switch-label" style="width: 45px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 45px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="" name="publish"></div>
              </div>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
      </div>
    </form>
  </div>
     </div>

  @endsection
