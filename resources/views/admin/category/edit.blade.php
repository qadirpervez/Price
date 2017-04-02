@extends('adminMain')
@section('title')
    Edit Category
@endsection
@section('stylesheet')
  <link href="{{ URL::asset('css/parsley.css') }}" rel="stylesheet">
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
            Dashboard <small>Edit this category</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
          </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          {!! Form::model($category, ['route' => ['category.update', $category->id], 'id' => 'form', 'method' => 'PUT' ]) !!}
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name of the category...', 'data-parsley-required' => '', 'maxlength' => '255']) !!}
            <a href="{{ route('category.index') }}" class="btn btn-default form-spacing-top">Cancel</a>
            {!! Form::submit('Update', ['class' => 'btn btn-success pull-right form-spacing-top']) !!}
          {!! Form::close() !!}
        </div>
      </div>
  </div>
@endsection
@section('script')
  <script src="{{ URL::asset('js/parsley.min.js') }}"></script>
  <script type="text/javascript">
  $('#form').parsley();
  </script>
@endsection
