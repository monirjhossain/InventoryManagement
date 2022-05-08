@extends('layouts.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Create Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Product List</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Product</h3>
              </div>
              <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">

                    <label for="exampleInputName">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Product Name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span><br>
                    @endif
                    {{-- <label for="exampleInputName">User Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Category Name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span><br>
                    @endif --}}

                    <label for="exampleInputName">Categories</label>
                   <select name="category_id" id="category" class="form-control">
                          @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                    </select>
                    
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span><br>
                    @endif

                    <label for="exampleInputName">Brands</label>
                     <select name="brand_id" class="form-control">
                          @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                         @endforeach
                    </select>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span><br>
                    @endif

                    <label for="exampleInputName">SKU</label>
                    <input type="text" class="form-control" name="sku" placeholder="Enter SKU Name">
                    @if ($errors->has('sku'))
                        <span class="text-danger">{{ $errors->first('sku') }}</span><br>
                    @endif

                    <label for="exampleInputName">Pruduct Image</label>
                    <input type="file" class="form-control" name="image">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span><br>
                    @endif

                    <label for="exampleInputName">Cost Price</label>
                    <input type="text" class="form-control" name="cost_price" placeholder="Enter Cost Price">
                    @if ($errors->has('cost_price'))
                        <span class="text-danger">{{ $errors->first('cost_price') }}</span><br>
                    @endif

                    <label for="exampleInputName">Retail Price</label>
                    <input type="text" class="form-control" name="retail_price" placeholder="Enter Retail Price">
                    @if ($errors->has('retail_price'))
                        <span class="text-danger">{{ $errors->first('retail_price') }}</span><br>
                    @endif

                    <label for="exampleInputName">Date</label>
                    <input type="date" class="form-control" name="year" placeholder="Enter Date">
                    @if ($errors->has('year'))
                        <span class="text-danger">{{ $errors->first('year') }}</span><br>
                    @endif

                    <label for="exampleInputName">Product Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter Category Name"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span><br>
                    @endif

                    {{-- <label for="exampleInputName">Status</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Category Name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span><br>
                    @endif --}}
                    <button type="submit" class="btn btn-info mt-2 btn-sm"><i class="fa fa-save"></i> Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
@endsection