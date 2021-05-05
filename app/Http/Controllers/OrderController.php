<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{

    public function placeOrder(OrderRequest $request)
    {
        $authId = Auth::user()->id;
        $carts = Cart::where('user_id', $authId)->get();
        $orderQuery = Order::where('user_id', $authId)->orderBy('created_at', 'DESC')->first();

        if($orderQuery)
        {
            $batch = $orderQuery->batch+1;
        }


        foreach($carts as $cart)
        {
            $order = [
                'user_id' => $request($cart->user_id),
                'product_id' => $request($cart->product_id),
                'product_name' => $request($cart->productFK->name),
                'product_price' => $request($cart->productFK->price),
                'status' => $request($cart->productFK->status),
                'name' => $request('name'), 
                'email'  => $request('email'),
                'address'  => $request('address'),
                'country'  => $request('country'),
                'state'  => $request('name'),
                'postcode' => $request('name')
            ];

            Order::create($order);
            Cart::find($cart->id)->delete(); 

        }
        
        return view('order.checkout')->with(compact('carts', 'order'));
    }

    public function checkout()
    {
        return view('order.checkout');
    }

    public function orderHistory()
    {
        return view('order.history');
    }
    
}
