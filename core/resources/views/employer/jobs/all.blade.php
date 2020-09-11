@extends('layouts.employer.app')

@section('title')
    all jobs
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>All Jobs</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">jobs</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Jobs</h3>
               <a href="{{route('admin.employer.trashed.all')}}" class="btn btn-danger btn-sm float-right"> trashed</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Position</th>
                        <th scope="col">Category</th>
                        <th scope="col">Type</th>
                        <th scope="col">Salary</th>
                      
                        <th scope="col">Total Applicants</th>
                        <th scope="col" style="width:10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                        <tr>
                        <td  class="text-primary">{{$job->title}}</td>
                        <td><h5 class="">{{$job->position}}</h5></td>
                        <td>{{$job->category->name}}</td>
                        <td>{{$job->type}}</td>
                        <td>{{$job->salary}}</td>
                     
                        <td><a href="">{{$job->users->count()}}</a></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('employer.job.edit',$job->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{route('employer.job.details',['id'=>$job->id])}}" class="btn btn-danger btn-sm"><i  class="fas fa-eye"></i></a>
                              </div>
                          </td>
                        </tr>
                           
                        @empty
                        <td  class="text-danger">No data</td>
                        @endforelse
                     
                    </tbody>
                  </table>
            </div>

            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{$jobs->links()}}
              </ul>
            </div>
        
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
      </div>
    </div>
</section>

@endsection