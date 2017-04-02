@extends('adminMain')
@section('title')
    Edit Product
@endsection
@section('stylesheet')
  <link href="{{ URL::asset('css/parsley.css') }}" rel="stylesheet">
@endsection
@section('messages')
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
            Dashboard <small>Edit a Product</small>
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
          {!! Form::model($product, ['route' => ['product.update', $product->id], 'id' => 'form', 'method' => 'PUT']) !!}

            {!! Form::label('name', 'Product Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name of the Product...', 'data-parsley-required' => '', 'maxlength' => '255']) !!}

            {!! Form::label('description', 'Product Description:', ['class' => 'form-spacing-top']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description of the product...', 'data-parsley-required' => '', 'rows' => '4']) !!}

            {!! Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) !!}
            <select class="form-control" name="category_id">

              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ ($category->id == $product->category_id) ? 'selected=selected' : '' }}>{{ $category->name }}</option>
              @endforeach

            </select>

            {!! Form::label('image_url', 'Picture\'s URL:', ['class' => 'form-spacing-top']) !!}
            {!! Form::text('image_url', null, ['class' => 'form-control', 'placeholder' => 'Link of the picture...', 'data-parsley-required' => '', 'data-parsley-type' => 'url']) !!}

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
