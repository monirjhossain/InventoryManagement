@extends('layouts.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Brand Edit Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <form role="form" action="{{ route('brands.update',$brand->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Brand Name</label>
                    <input type="text" class="form-control mb-2" name="name" placeholder="Enter Category Name" value="{{ $brand->name }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <input type="file" class="form-control mb-2" name="photo">
                    @if ($errors->has('photo'))
                        <span class="text-danger">{{ $errors->first('photo') }}</span><br>
                    @endif
                    <img src="{{ asset('uploads/brands/'.$brand->photo) }}" width="100px" class="mt-2"><br>
                    <button type="submit" class="btn btn-info mt-2 btn-sm"><i class="fa fa-save"></i> Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
@endsection