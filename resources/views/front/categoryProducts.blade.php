@extends('userMain')
@section('title')
  {{ $category->name }} all products
@endsection
@section('content')
  <div class="row">
    <div class="col-md-3">
      <div class="text-center">
        <p class="filter-form-text btn btn-default" id="filter-form-text">Sort By</p>
      </div>
      <div class="container-fluid filter-form-div" >
        <?php $prices = Input::has('prices') ? Input::get('prices') : []; ?>
      <form class="form" id="filter-form-div" method="get" action="{{ URL::current() }}">
        {{ csrf_field() }}
        <h4 class="padding-equally">Price</h4>
        <div class="prices-desc-filter">
          <div class="form-group">
            <input type="checkbox" name="prices[]" value="1" {{ in_array(1, $prices) ? 'checked' : '' }}> <span class="sort-by-box"> &#8377; 0 - &#8377; 1,999</span>
          </div>
          <div class="form-group">
            <input type="checkbox" name="prices[]" value="2" {{ in_array(2, $prices) ? 'checked' : '' }}> <span class="sort-by-box"> &#8377; 2000 - &#8377; 4,999</span>
          </div>
          <div class="form-group">
            <input type="checkbox" name="prices[]" value="3" {{ in_array(3, $prices) ? 'checked' : '' }}> <span class="sort-by-box"> &#8377; 5,000 - &#8377; 6,999</span>
          </div>
          <div class="form-group">
            <input type="checkbox" name="prices[]" value="4" {{ in_array(4, $prices) ? 'checked' : '' }}> <span class="sort-by-box">  &#8377; 7,000 - &#8377; 8,999</span>
          </div>
          <div class="form-group">
            <input type="checkbox" name="prices[]" value="5" {{ in_array(5, $prices) ? 'checked' : '' }}> <span class="sort-by-box">  &#8377; 9,000 - &#8377; 14,999</span> <span class="sort-by-box">
          </div>
          <div class="form-group">
            <input type="checkbox" name="prices[]" value="6" {{ in_array(6, $prices) ? 'checked' : '' }}> <span class="sort-by-box">  &#8377; 15,000 &amp; above</span>
          </div>
        </div>
        <?php $brands_url = Input::has('brands') ? Input::get('brands') : []; ?>
        <h4 class="padding-equally">Brands</h4>
        <div class="brands-desc-filter">
            @foreach ($brands as $brand)
              <div class="form-group">
                <input type="checkbox" name="brands[]" value="{{ $brand->id }}" {{ in_array($brand->id, $brands_url) ? 'checked' : '' }}> <span class="sort-by-box"> {{ $brand->brand }}</span>
              </div>

            @endforeach
        </div>
        <div class="form-group ">
          <button class="btn btn-primary margin-equally" type="submit">Apply</button>
        </div>
      </form>
    </div>
    </div>
    <div class="col-md-9">
      <div class="new-collections">
    <div class="container-fluid">
      <h3 class="animated wow zoomIn" data-wow-delay=".5s">{{ $category->name }}</h3>
      <p class="est animated wow zoomIn" data-wow-delay=".5s">Explore some products from this category</p>
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
    </div>
  </div>
@endsection
@section('script')
  <script>
  $(window).resize(function() {

  if ($(this).width() < 993) {

    $('#filter-form-div').hide();

  } else {

    $('.filter-form-div').show();

    }

});
  $(document).ready(function(){
    $('#filter-form-text').click(function() {
      $('#filter-form-div').toggle();
    });
  });
</script>
@endsection
