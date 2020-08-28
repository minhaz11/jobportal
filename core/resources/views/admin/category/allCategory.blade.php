@extends('layouts.admin.app')

@section('title')
    
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>All Categories</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
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
              <h3 class="card-title">Categories</h3>
              <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"       data-target="#add"><i class="fas fa-plus"></i> Add new</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Category name</th>
                        <th scope="col">Jobs</th>
                        <th scope="col" style="width:15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                        <td  class="text-primary">{{$category->name}}</td>
                        <td><h5 class="">{{$category->jobs->count()}}</h5></td>
                          <td class="ml-5">
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"       data-target="#edit-{{$category->id}}"><i class="fas fa-edit"></i></button>
                                <a href="a" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{route('admin.category.details',['id'=>$category->id])}}" class="btn btn-success btn-sm" title="details"><i class="fas fa-eye"></i></a>
                              </div>
                          </td>
                        </tr>
                            @include('admin.category.editModal')
                        @empty
                        <td  class="text-danger">No data</td>
                        @endforelse
                     
                    </tbody>
                  </table>
            </div>

            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{$categories->links()}}
              </ul>
            </div>
            @include('admin.category.addModal')
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
      </div>
    </div>
</section>
</div>
@endsection