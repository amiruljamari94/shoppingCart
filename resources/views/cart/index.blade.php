@extends('layouts.app')

@section('content')


        <h1 class="jumbotron-heading">CART</h1>
@php
  $subTotal = 0.00;  
  $shippingFee = 6.90;
@endphp

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($cartList as $cList)
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>{{ $cList->productFK->name }}<br/><b>Price</b>: {{ $cList->productFK->price }}</td>
                            <td>In stock</td>
                            <td><form action="{{ route('cart.update', $cList->id ) }}" method="post">
                                @csrf
                                <input class="form-control" name="quantity" type="text"  value="{{ $cList->quantity }}" /><button class="btn btn-sm btn-light"><i class="fas fa-sync"></i></button></form></td>
                            {{-- <td class="text-right">{{ $cList->quantity }}</td> --}}
                            <td class="text-right">{{ number_format($cList->productFK->price *  $cList->quantity, 2) }}</td>
                            <td class="text-right">
                                <form action="{{ route('cart.remove', $cList->id) }}" method="get">
                                    <button  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                
                        </tr>
                            @php
                            $subTotal+= $cList->productFK->price *  $cList->quantity;
                            @endphp
                        @endforeach
                        
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">Rm {{ number_format($subTotal, 2)}} </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">Rm {{ number_format($shippingFee, 2) }} </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>Rm {{ number_format($subTotal + $shippingFee, 2)}}</strong></td>
                        </tr>

                    </tbody>
                </table>
                
            </div>
            
        </div>

        

        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                    <form action="{{ route('checkout') }}" method="get">
                        <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </form>  
                </div>

            </div>
        </div>
    </div>
</div>

@endsection