@extends('userMain')
@section('title')
  Home
@endsection
@section('content')
  <div>
    @foreach ($asidecategories as $category)
        <a href="{{ $category->sponsor_url }}" target="_blank"><img src="{{ $category->picture_url }}" class="img-responsive"></a>
        @break;
    @endforeach
  </div>
  <h3>Hot Categories</h3>
  <div class="sp_highlighted_header_blue smartphone">
    @foreach ($asidecategories as $category)
        <h3>{{ $category->name }}</h3>
          <div class="row">
            @foreach ($category->homeCategoryProducts($category->id) as $product)
              <div class="col-md-2 text-center">
                <a href="{{ route('front.single', $product->id) }}"><img src="{{ $product->image_url }}"></a>
                <p><a href="{{ route('front.single', $product->id) }}">{{ $product->name }}</a></p>
              </div>
            @endforeach
          </div>
    @endforeach
  </div>
@endsection
