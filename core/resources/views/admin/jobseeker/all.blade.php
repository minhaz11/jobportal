@extends('layouts.admin.app')

@section('title')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>All Jobseekers</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">jobseekers</li>
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
              <h3 class="card-title">Jobseekers</h3>
            <a href="{{route('admin.jobseeker.trashed.all')}}" class="btn btn-danger btn-sm float-right">Trashed Users</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Joined at</th>
                        <th scope="col" style="width:15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                        <td  class="text-primary">{{$user->name}}</td>
                        <td><h5 class="">{{$user->email}}</h5></td>
                        <td>{{\Carbon\Carbon::parse($user->created_at)->format('d M Y')}}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="a" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{route('admin.jobseeker.disable',['id'=>$user->id])}}" class="btn btn-danger btn-sm"><i  class="fas fa-trash-alt"></i></a>
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
                {{$users->links()}}
              </ul>
            </div>
        
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
      </div>
    </div>
</section>
</div>
@endsection