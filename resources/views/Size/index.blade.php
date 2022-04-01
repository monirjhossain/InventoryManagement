@extends('layouts.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Size Create Page</h1>
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
                <a href="{{ route('sizes.create') }}" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Add Size</a>
                <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Size</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($sizes)
                        @foreach($sizes as $key=>$size)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $size->size ?? '' }}</td>
                                <td>
                                 <a href="{{ route('sizes.edit', $size->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> Edit</a>   
                                 <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" data-form-id="size-delete-{{ $size->id }}"><i class="fa fa-trash"></i> Delete</a>
                                 
                                 <form id="size-delete-{{ $size->id }}" action="{{ route('sizes.destroy', $size->id) }}" method="POST">
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