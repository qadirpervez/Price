@extends('adminMain')
@section('title')
   All Products in {{ $_GET['search'] }}
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Dashboard <small>All Products in "{{ $_GET['search'] }}"</small>
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
