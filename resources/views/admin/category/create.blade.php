@extends('adminMain')
@section('title')
    Create Category
@endsection
@section('stylesheet')
  <link href="{{ URL::asset('css/parsley.css') }}" rel="stylesheet">
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
            Dashboard <small>Create new category</small>
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
          {!! Form::open(['route' => 'category.store', 'id' => 'form']) !!}
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name of the category...', 'data-parsley-required' => '', 'maxlength' => '255']) !!}

            {!! Form::label('picture_url', 'Url OF banner') !!}
            {!! Form::text('picture_url', null, ['class' => 'form-control', 'placeholder' => 'URL of the banner...', 'data-parsley-required' => '', 'data-parsley-type' => 'url', 'maxlength' => '255']) !!}

            {!! Form::label('sponsor_url', 'Sponsor url:') !!}
            {!! Form::text('sponsor_url', null, ['class' => 'form-control', 'placeholder' => 'Sponspor URL...', 'data-parsley-required' => '', 'data-parsley-type' => 'url', 'maxlength' => '255']) !!}

            {!! Form::label('main_category_id', 'Main Category:') !!}
            <select name="main_category_id" class="form-control">
              @foreach ($mains as $main)
                <option value="{{ $main->id }}">{{ $main->name }}</option>
              @endforeach
            </select>

            {!! Form::submit('Create', ['class' => 'btn btn-success pull-right form-spacing-top']) !!}
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
