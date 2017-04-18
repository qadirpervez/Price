@foreach (array_chunk($products->getCollection()->all(), 4) as $row)
  <div class="row">
    @foreach ($row as $product)
      <div class="col-md-3 unit-product">
        <a href="{{ route('product.show', $product->id)}}">
          <img src="{{ $product->image_url }}" class="img-responsive" alt="{{ $product->name }}">
        </a>
        <div class="product-title">
          <h4><a href="{{ route('product.show', $product->id)}}">{{ $product->name }}</a></h4>
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
