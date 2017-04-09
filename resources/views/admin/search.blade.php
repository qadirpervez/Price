@extends('adminMain')
@section('title')
   All Products in {{ $_GET['search'] }}
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Dashboard <small>All Products in "{{ $_GET['search'] }}"</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
          </div>
      </div>
      @foreach (array_chunk($products->getCollection()->all(), 3) as $row)
        <div class="row">
          @foreach ($row as $product)
            <article class="col-md-4">
				<h3 class="text-center">{{ $product->name }}</h3>
              <img src="{{ $product->image_url }}" class="img-responsive" alt="{{ $product->name }}">
              <div class=" text-center">
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View</a>
              </div>
            </article>
          @endforeach
        </div>
      @endforeach
      <div class="text-center">{{ $products->links() }}</div>
  </div>
@endsection
