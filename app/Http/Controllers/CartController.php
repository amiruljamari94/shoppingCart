<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    // public function index()
    // {
    //     $cart = Auth::id;
    // }

    public function addToCart($productId)
    {
        // check jika produk sudah sedia ada dalam cart. jika ada, tambah 1 kuantiti. jika tiada, tambah baru
        $cartProducCheck = Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->first();
        if($cartProducCheck){
           $quantity  = $cartProducCheck->quantity+1;
           Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->update(['quantity' => $quantity]);
        }else{
            // Auth::user()->id; utk dptkan  utk dptkan id pengguna y dah log masuk
            $carts = [
                'user_id' => Auth::user()->id,
                'product_id' => $productId,
                'quantity' => '1'
            ];
            $cart = Cart::create($carts);
            $cart->save();
        }
        return redirect()->route('product.index');
        // return "OK";

        // $product = Product::where('id', $product)->firstOrFail();
        // return view('product.show')->with(compact('product'));

    }

    public function cartList()
    {
       $cartList = Cart::where('user_id', Auth::user()->id)->get();
        // dd($cartList);
        // return view('cart.store');
        // return "ok";
        return view('cart.index')->with(compact('cartList'));


    }

    public function updateCart($id, Request $request)
    {   
        $cartUpdate = Cart::where('user_id', Auth::user()->id)->where('id', $id )->update(['quantity'=> $request->quantity]);
        return back();


    }

    public function remove($id)
    {
        $rCart = Cart::findOrFail($id);
        // dd($rCart);
        $rCart->delete();
        return back();

        // return redirect()->route('cart.index');
    }


    // public function store(Request $request)
    // {
    //     \Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
    //     return redirect('cart')->with('success', 'Item was added to your cart!');
    // }

    // public function destroy($id)
    // {
    //     \Cart::remove($id);
    //     return redirect()->back()->with('success', 'Item has been removed!');
    // }

    //
}
