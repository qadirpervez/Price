@extends('userMain')
@section('title')
  {{  $_GET['search']  }} relayted products
@endsection
@section('content')
  <div class="new-collections">
<div class="container">
  <p class="est animated wow zoomIn" data-wow-delay=".5s">Products in "{{ $_GET['search'] }}"</p>
  <div class="new-collections-grids">
    @foreach (array_chunk($products->getCollection()->all(), 2) as $row)
      <div class="col-md-3 new-collections-grid">
        @foreach ($row as $product)
          <div class="new-collections-grid1 animated wow slideInUp " data-wow-delay=".5s">
            <div class="new-collections-grid1-image">
              <a href="#" class="product-image"><img src="{{ $product->image_url }}" height="300px" class="img-responsive product-picture-custom" /></a>
              <div class="new-collections-grid1-image-pos">
                <a href="{{ route('front.single', $product->id) }}">Quick View</a>
              </div>
              <div class="new-collections-grid1-right">
              </div>
            </div>
            <h4><a href="{{ route('front.single', $product->id) }}">{{ $product->name }}</a></h4>
            <p>{!! $product->imp_description !!}</p>
            <div class="new-collections-grid1-left simpleCart_shelfItem">
              <p><span class="item_price">&#8377; {{ $product->minPrice($product->id) }}</span></p>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
    <div class="text-center">{{ $products->links() }}</div>
  </div>
</div>
</div>
@endsection
