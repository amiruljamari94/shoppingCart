@extends('layouts.app')

@section('content')
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
          
        </div>
      </div>
      @endforeach

    </div>

  </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
