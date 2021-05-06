<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function placeOrder(Request $request)
    {
        $authId = Auth::user()->id;
        $carts = Cart::where('user_id', $authId)->get();
        $orderQuery = Order::where('user_id', $authId)->orderBy('created_at', 'DESC')->first();

        $batch = 1;
        if($orderQuery)
        {
            $batch = $orderQuery->batch+1;
        }

        DB::transaction(function () use($carts, $request, $batch)  {
            foreach($carts as $cart)
        {
            $order = [
                'user_id' => $cart->user_id,
                'product_id' => $cart->product_id,
                'product_name' => $cart->productFK->name,
                'product_price' => $cart->productFK->price,
                'status' => 'paid',
                'batch' => $batch,
                'name' => $request['name'], 
                'email'  => $request['email'],
                'address'  => $request['address'],
                'country'  => $request['country'],
                'state'  => $request['state'],
                'postcode' => $request['postcode']
            ];

            Order::create($order);
            Cart::find($cart->id)->delete(); 
        }
            
        });
        
        return view('order.history')->with(compact('carts'));
    }

    public function checkout()
    {
        return view('order.checkout');
    }

    public function orderHistory()
    {
        $orderHistory = Order::get()->groupBy('batch');
        return view('order.history')->with(compact('orderHistory'));
    }
    
}
