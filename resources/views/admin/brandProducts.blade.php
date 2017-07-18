@extends('adminMain')
@section('title')
  {{ $brand->brand }} All Products
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Dashboard <small>All Products by {{ $brand->brand }}</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
          </div>
      </div>
      @include('partials._products')
  </div>
@endsection
