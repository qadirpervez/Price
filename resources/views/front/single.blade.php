@extends('userMain')
@section('title')
  {{ $product->name }}
@endsection
@section('content')
  <div class="container-fluid row">
    <div class="single-product-intro col-md-8 col-md-offset-2">
      <div class="row">
        <div class="col-md-3">
          <div class="custom-product">
            <img src="{{ $product->image_url }}" class="img-responsive">
          </div>
        </div>
        <div class="col-md-9">
          <div class="product-short-desc">
            <h3>{{ $product->name }}</h3>
            <h5>Best Price: {{ $product->minPrice($product->id) }}</h5>
            <div>
              {!! $product->imp_description !!}
            </div>
            <div>
              {!! $product->description !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <table class="table table-responsive table-custom">
        @foreach($product->sellers as $seller)
          <tr class="row">
            <td class="col-md-3"><img src="{{ $seller->sellerData->picture_url }}" class="img-responsive seller-img"></td>
            <td class="col-md-3"><h3>&#8377; {{ $seller->price }}</h3></td>
            <td class="col-md-3"><a class="btn btn-primary" href="{{ $seller->product_url }}">Go To Store &nbsp; ></a></td>
          </tr>
        @endforeach
     </table>
   </div>
@endsection
