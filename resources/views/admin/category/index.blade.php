@extends('adminMain')
@section('title')
    View All Category
@endsection
@section('messages')
  @if (Session::has('success'))
    <div class="container-fluid">
      <div class="alert alert-success">
        <strong>Success:</strong> {{ Session::get('success') }}
      </div>
    </div>
  @endif
  @if(count($errors) > 0)
    <div class="container">
      <div class="alert alert-danger">
        <strong>Errors:</strong>
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      </div>
    </div>
  @endif
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Dashboard <small>View All category</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
          </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <table class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <td>Sl No.</td>
                <td>Name</td>
                <td>View All Products</td>
                <td>Action</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php $slNo = 1; ?>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $slNo++ }}</td>
                  <td>{{ $category->name }}</td>
                  <td><a href="{{ route('category.products', $category->id) }}" class="btn btn-primary btn-block">View All</a></td>
                  <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-block">Edit</a></td>
                  <td><a href="{{ route('category.show', $category->id) }}" class="btn btn-danger btn-block">Delete</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
@endsection
