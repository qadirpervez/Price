@extends('adminMain')
@section('title')
    {{ $product->name }}
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
          Dashboard <small>Product Details</small>
          </h1>
          <ol class="breadcrumb">
              <li class="active">
                  <i class="fa fa-dashboard"></i> Dashboard
              </li>
          </ol>
        </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <img src="{{ $product->image_url }}" class="img-responsive">
      </div>
      <div class="col-md-8">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                  {{ $product->name }} <hr><small>In {{ $product->category->name }}->{{ $product->subCategory->name }}</small>
                </h2>
                <div class="breadcrumb row">
                    <div class="col-md-7 margin-top-time-edit">
                        <i class="fa  fa-clock-o"></i> Listed: {{ $product->created_at->diffForHumans() }}, Last Updated: {{ $product->updated_at->diffForHumans() }}
                    </div>
                    <div class="col-md-5">
                      <div class="pull-right row">
                        <div class="col-md-3 text-center">
                          <a href="{{ route('product.edit', $product->id) }}" class="btn btn-default btn-sm"><span class="fa fa-pencil"></span> Edit</a>
                        </div>
                        <div class="col-md-4">
                          {!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id], 'onsubmit' => 'ConfirmDelete()']) !!}
                          {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                          {!! Form::close() !!}
                        </div>
                        <div class="col-md-5">
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSellerForm">
                          <i class="fa fa-plus"></i>  Add a Seller
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="addSellerForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h3 class="modal-title" id="exampleModalLabel"><small>Add a Seller</small></h3>
                                    </div>
                                    <div class="col-md-6 pull-right">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-body">
                                  {!! Form::open(['route' => 'seller.store', 'id' => 'form']) !!}

                                  <div class="form-group">
                                    {!! Form::hidden('product_id', $product->id, ['class' => 'form-control']) !!}
                                  </div>

                                  <div class="form-group">
                                    {!! Form::label('name', 'Seller Name:') !!}
                                    <select class="form-control" name="seller_data_id">

                                      @foreach ($sellerdatas as $sellerData)
                                        <option value="{{ $sellerData->id }}">{{ $sellerData->name }}</option>
                                      @endforeach

                                    </select>
                                  </div>

                                  <div class="form-group">
                                    {!! Form::label('product_url', 'Affiliate Link:') !!}
                                    {!! Form::text('product_url', null, ['class' => 'form-control', 'placeholder' => 'Affiliate Link...', 'data-parsley-required' => '', 'data-parsley-type' => 'url']) !!}
                                  </div>

                                  <div class="form-group">
                                    {!! Form::label('price', 'Price:') !!}
                                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price...', 'data-parsley-required' => '', 'data-parsley-type' => 'integer']) !!}
                                  </div>

                                  <div class="form-group pull-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    {!! Form::submit('Add Seller', ['class' => 'btn btn-primary']) !!}
                                  </div><div class="clearfix"></div>
                                  {!! Form::close() !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-12 row">
                  <div class="col-md-4 text-center">
                    <h3><small>Main Description:</small></h3>
                  </div>
                  <div class="col-md-8">
                    <p class="description-margin-top">{!! $product->imp_description !!}</p>
                  </div>
                </div>
                <div class="col-md-12 row">
                  <p class="description-margin-top">{!! $product->description !!}</p>
                </div>
              </div>
          </div>
      </div>
    </div><hr>
    <div class="container-fluid">
      <h2 class="text-center"><small>List Of Sellers</small></h2><hr>
      <table class="table table-responsive table-bordered table-hover">
        <thead>
          <tr>
            <td>Seller Name</td>
            <td>Seller's Price</td>
            <td>Affiliate URL</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($product->sellers as $seller)
            <tr>
              <td><img src="{{ $seller->sellerData->picture_url }}" class="img-responsive"></td>
              <td>{{ $seller->price }}</td>
              <td><a href="{{ $seller->product_url }}" class="btn btn-primary btn-block" target="_blank">Seller Page<a></td>
              <td>
                <button class="btn btn-default btn-block" data-toggle="modal" data-target="#editSeller{{ $seller->id }}">
                <i class="fa fa-pencil"></i>  Edit Seller
                </button>

              </td>
              <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['seller.destroy', $seller->id], 'onsubmit' => 'ConfirmDelete()']) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
            <div class="modal fade" id="editSeller{{ $seller->id }}" tabindex="-1" role="dialog"
              aria-labelledby="myModalLabel{{ $seller->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <div class="row">
                      <div class="col-md-6">
                        <h3 class="modal-title" id="myModalLabel{{ $seller->id }}"><small>Edit this Seller</small></h3>
                      </div>
                      <div class="col-md-6 pull-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Body -->
                  <div class="modal-body">
                    {!! Form::model($seller, ['route' => ['seller.update', $seller->id], 'method' => 'PUT']) !!}

                    <div class="form-group">
                      {!! Form::hidden('product_id', $product->id, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('name', 'Seller Name:') !!}
                      <select class="form-control" name="seller_data_id">

                        @foreach ($sellerdatas as $sellerData)
                          <option value="{{ $sellerData->id }}" {{ ($sellerData->id == $seller->seller_data) ? 'selected=selected' : '' }}>{{ $sellerData->name }}</option>
                        @endforeach

                      </select>
                    </div>

                    <div class="form-group">
                      {!! Form::label('product_url', 'Affiliate Link:') !!}
                      {!! Form::text('product_url', null, ['class' => 'form-control', 'placeholder' => 'Affiliate Link...']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('price', 'Price:') !!}
                      {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price...']) !!}
                    </div>

                    <div class="form-group pull-right">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
                    </div><div class="clearfix"></div>
                    {!! Form::close() !!}
                    <script>
                    $('#form{{ $seller->id }}').parsley();
                    </script>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
@section('script')
  <script src="{{ URL::asset('js/parsley.min.js') }}"></script>
  <script>
    $('#form').parsley();
    function ConfirmDelete()
    {
    var x = confirm("Are you sure you want to delete?");
    if (x)
      return true;
    else
      return false;
    }
  </script>
@endsection
