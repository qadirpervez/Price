@extends('userMain')
@section('title')
  {{ $product->name }}
@endsection
@section('content')
  <div class="container-fluid">
    <div class="single-product-intro">
      <div class="row">
        <div class="col-md-3">
          <img src="{{ $product->image_url }}" class="img-responsive">
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
      <table class="product-table">
        @foreach($product->sellers as $seller)
          <tr class="row">
            <td class="col-md-3"><img src="{{ $seller->sellerData->picture_url }}"></td>
            <td class=" col-md-3 tick"><img src="img/tick-1.png" class="tick-align">7-14 Days delivery <br/>
              <img src="img/tick-1.png" >EMI: Available </td>
            <td class="col-md-3"><h3>35,499</h3></td>
            <td class="col-md-3"><a class="btn-primary" href="{{ $seller->product_url }}">Go To Store &nbsp; ></a></td>
          </tr>
        @endforeach
     </table>
   </div>
@endsection
