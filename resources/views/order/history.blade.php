@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h1>Order History</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Batch</th>
            <th scope="col">Delivery Address</th>
            <th scope="col">order Status</th>      
        </tr>


        </thead>
        <tbody>
            @foreach($orderHistory as $orHistory)
            <tr>
                <td>{{ $orHistory->batch }}</td>
                <td>{{ $orHistory->address }}</td>
                <td>{{ $orHistory->status }}</td>
            </tr>
                
            @endforeach

        </tbody>
    </table>

</div>

  @endsection