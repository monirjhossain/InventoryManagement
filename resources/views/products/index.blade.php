@extends('layouts.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products Page</h1>
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
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Add Product</a>

                  <example-component></example-component> 

                <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Image</th>
                        <th>C.Price</th>
                        <th>R.Price</th>
                        <th>Year</th>
                        <th>Dsc</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products)
                        @foreach($products as $key=>$product)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td><img src="{{ asset('uploads/products/'.$product->image) }}" width="50px"></td>
                                <td>{{ $product->cost_price }}</td>
                                <td>{{ $product->retail_price }}</td>
                                <td>{{ $product->year }}</td>
                                <td>{{ str_limit($product->description, $limit = 20) }}</td>
                                {{-- <td>{{ $product->status }}</td> --}}
                                <td>
                                 <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> Edit</a>   
                                 <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="product-delete-{{ $product->id }}"><i class="fa fa-trash"></i> Delete</a>
                                 
                                 <form id="product-delete-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
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