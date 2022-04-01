@extends('layouts.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category Edit Page</h1>
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
                <h3 class="card-title">Edit Size</h3>
              </div>
              <form role="form" action="{{ route('sizes.update',$size->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Size</label>
                    <input type="text" class="form-control" name="size" placeholder="Enter Size Name" value="{{ $size->size }}">
                    @if ($errors->has('size'))
                        <span class="text-danger">{{ $errors->first('size') }}</span><br>
                    @endif
                    <button type="submit" class="btn btn-info mt-2 btn-sm"><i class="fa fa-save"></i> Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
@endsection