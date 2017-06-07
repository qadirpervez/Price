@extends('adminMain')
@section('title')
    Edit Main Category
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
            Dashboard <small>Edit Main Category</small>
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
        {!! Form::model($maincategory, ['route' => ['mainCategory.update', $maincategory->id], 'id' => 'form', 'method' => 'PUT']) !!}

          {!! Form::label('name', 'Main Category Name:') !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name of the Product...']) !!}

          {!! Form::label('sponsor_pic1_url', 'Picture 1 URL:') !!}
          {!! Form::text('sponsor_pic1_url', null, ['class' => 'form-control', 'placeholder' => 'URL of the picture to show in navigation...']) !!}

          {!! Form::label('sponsor_pic2_url', 'Picture 2 URL:') !!}
          {!! Form::text('sponsor_pic2_url', null, ['class' => 'form-control', 'placeholder' => 'URL of the picture to show in navigation...']) !!}

          {!! Form::label('sponsor_pic3_url', 'Picture 3 URL:') !!}
          {!! Form::text('sponsor_pic3_url', null, ['class' => 'form-control', 'placeholder' => 'URL of the picture to show in navigation...']) !!}

          {!! Form::label('sponsor1_url', 'URL to redirect 1st picture:') !!}
          {!! Form::text('sponsor1_url', null, ['class' => 'form-control', 'placeholder' => 'URL of the page to redirect after clicking on the picture...']) !!}

          {!! Form::label('sponsor2_url', 'URL to redirect 2nd picture:') !!}
          {!! Form::text('sponsor2_url', null, ['class' => 'form-control', 'placeholder' => 'URL of the page to redirect after clicking on the picture...']) !!}

          {!! Form::label('sponsor3_url', 'URL to redirect 3rd picture:') !!}
          {!! Form::text('sponsor3_url', null, ['class' => 'form-control', 'placeholder' => 'URL of the page to redirect after clicking on the picture...']) !!}



          {!! Form::submit('Save Changes', ['class' => 'btn btn-success pull-right form-spacing-top']) !!}

        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
