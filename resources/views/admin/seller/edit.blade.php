@extends('adminMain')
@section('title')
  Edit a Seller
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
            Dashboard <small>Edit A Seller</small>
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
          {!! Form::model($seller, ['route' => ['sellerData.update', $seller->id], 'id' => 'form', 'method' => 'PUT']) !!}
            {!! Form::label('name', 'Seller Name:', ['class' => 'form-spacing-top']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Seller Name...', 'data-parsley-required' => '', 'maxlength' => '255']) !!}

            {!! Form::label('picture_url', 'Seller Picture URL:', ['class' => 'form-spacing-top']) !!}
            {!! Form::text('picture_url', null, ['class' => 'form-control', 'placeholder' => 'Seller Picture URL...', 'data-parsley-required' => '', 'data-parsley-type' => 'url']) !!}

            {!! Form::submit('Save Changes', ['class' => 'btn btn-success pull-right form-spacing-top']) !!}
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
