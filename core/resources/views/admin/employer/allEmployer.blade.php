@extends('layouts.admin.app')

@section('title')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>All Employer</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">employers</li>
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
              <h3 class="card-title">Employers</h3>
               <a href="{{route('admin.employer.trashed.all')}}" class="btn btn-danger btn-sm float-right"> trashed</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Address</th>
                        <th scope="col" style="width:15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($employers as $employer)
                        <tr>
                        <td  class="text-primary">{{$employer->company_name}}</td>
                        <td><h5 class="">{{$employer->email}}</h5></td>
                        <td>{{$employer->website}}</td>
                        <td>{{$employer->address}}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{route('admin.employer.disable',['id'=>$employer->id])}}" class="btn btn-danger btn-sm"><i  class="fas fa-trash-alt"></i></a>
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
                {{$employers->links()}}
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