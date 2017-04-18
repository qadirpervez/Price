@extends('userMain')
@section('title')
  {{ $category->name }} all products
@endsection
@section('content')
  <div>
    <a href="{{ $category->sponsor_url }}" target="_blank"><img src="{{ $category->picture_url }}" class="img-responsive"></a>
  </div>
  <div class="container-fluid">
    @foreach (array_chunk($products->getCollection()->all(), 4) as $row)
      <div class="row">
        @foreach ($row as $product)
          <div class="col-md-3 unit-product">
            <a href="{{ route('front.single', $product->id)}}">
              <img src="{{ $product->image_url }}" class="img-responsive" alt="{{ $product->name }}">
            </a>
            <div class="product-title">
              <h4><a href="{{ route('front.single', $product->id)}}">{{ $product->name }}</a></h4>
            </div>
            <hr>
            <h3>{!! $product->minPrice($product->id) !!}</h3><hr>
            <div>
              {!! $product->imp_description !!}
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
    <div class="text-center">{{ $products->links() }}</div>
  </div>
@endsection
