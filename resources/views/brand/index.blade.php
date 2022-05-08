@extends('layouts.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Brand Create Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <a href="{{ route('brands.create') }}" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Add Brands</a>
                <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($brands)
                        @foreach($brands as $key=>$brand)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><img src="{{ asset('uploads/brands/'.$brand->photo) }}" width="50px"></td>
                                <td>{{ $brand->name ?? '' }}</td>
                                <td>
                                 <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> Edit</a>   
                                 <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="brand-delete-{{ $brand->id }}"><i class="fa fa-trash"></i> Delete</a>
                                 
                                 <form id="brand-delete-{{ $brand->id }}" action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")

                                 </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
              </div>
            </div>
          </div>
@endsection