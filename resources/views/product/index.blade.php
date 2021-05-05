@extends('layouts.app')

@section('content')

 <div class="container">

    <div class="row">
      <div class="row">

        @foreach($products as $product)
  
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="/product/{{ $product->slug }}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="/product/{{ $product->slug }}">{{ $product->name }}</a>
              </h4>
              
              <h5>{{ $product->price }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              {{-- <td><a class="btn btn-primary" href="{{ route('product.show', ['id' => $product->id]) }}">Show</a></td> --}}
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>
        @endforeach
  
      </div>

      <!-- /.col-lg-3 -->

      {{-- <div class="col-lg-9">
        @foreach($products as $product)

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
          <div class="card-body">
            <a href="/product/{{ $product->slug }}">{{ $product->name }}</a>
            
            <h4>{{ $product->price }}</h4>
            <p class="card-text">{{ $product->description }}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>

        @endforeach
      </div> --}}

    </div>

  </div> 

@endsection