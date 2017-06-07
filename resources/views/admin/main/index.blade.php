@extends('adminMain')
@section('title')
    View Main Categories
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
    <div class="container0fluid">
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
            Dashboard <small>View Main categories</small>
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
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php $slNo = 1; ?>
              @foreach ($mains as $main)
                <tr>
                  <td>{{ $slNo++ }}</td>
                  <td>{{ $main->name }}</td>
                  <td><a href="{{ route('mainCategory.edit', $main->id) }}" class="btn btn-primary btn-block">Edit</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
@endsection
