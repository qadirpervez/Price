@extends('adminMain')
@section('title')
    Delete a Category
@endsection
@section('messages')
  @if(count($errors) > 0)
    <div class="container-fluid">
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
            Dashboard <small>Delete A category</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
          </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="well">
            <dl class="dl-horizontal">
              <dt>Category Name:</dt>
              <dd>{{ $category->name }}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Created At:</dt>
              <dd>{{ date('M j, Y h:ia', strtotime($category->created_at)) }}</dd>
            </dl>
          </div>
          <a href="{{ route('category.index') }}" class="btn btn-default">Cancel</a>
          {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE']) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger pull-right']) !!}
          {!! Form::close() !!}
        </div>
      </div>
  </div>
@endsection
