@extends('layouts.app')


{{-- <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->
      
      <div class="col-lg-9">
        
        @foreach($product as $p)
        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
          <div class="card-body">
            <h3 class="card-title">{{ $p->name }}</h3>
            <h4>{{ $p->price }}</h4>
            <p class="card-text">{{ $p->description }}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>
        @foreach
        <!-- /.card -->

        
        <!-- /.card -->
        

      </div>
      @endforeach
      <!-- /.col-lg-9 -->

    </div>

  </div> --}}

  @section('content')
  

  <div class="container">
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card mt-4">
      <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">

      {{-- @foreach($product as $p) --}}
        <div class="card-body">
          <h3 class="card-title">{{ $product->name }}</h3>
          <h4>{{ $product->price }}</h4>
          <p class="card-text">{{ $product->description }}</p>
          <form action="{{ route('cart.add', $product->id) }}" method="get">
          
            {{-- @csrf --}}
            {{-- <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}"> --}}
            <button class="btn btn-primary">Add to Cart</button>

          </form>
        </div>

      {{-- @endforeach --}}
    </div>
  </div>
</div>

@endsection