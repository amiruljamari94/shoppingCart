{{-- @extends('layouts.user')

@section('content')

<div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">



        <div class="row">

            @foreach($products as $product)

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                    </h4>
                    <h5>{{ $product->price }}9</h5>
                    <p class="card-text">{{ $product->description }}</p>
                  </div>
                <form action="{{ route('carts.add-to-cart', $product->id)}}" method="get">
                      <button class="btn btn-primary" mb-2 >Add to Cart</button>
                  </form>
                </div>
              </div>

            @endforeach




        </div>
        <!-- /.row -->
   
@endsection
 --}}
