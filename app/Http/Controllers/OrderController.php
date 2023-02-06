<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all(){
        $user = User::where('token', '!=', null)->first();
        $order = Order::all()->where('user_id', $user->id);
        return response()->json([
            'message' => 'Ваши заказы',
            'content' => $order
        ]);
    }
    public function store(){
        $user = User::where('token', '!=', null)->first();

        $carts = Cart::all()->where('user_id', $user->id);
        $arr = [];
        $fullPrice = 0;
        foreach($carts as $cart){
            $arr[] = $cart->product_id;
            $obj = Product::find($cart->product_id);
            $fullPrice += $obj->price;
        }
        $order = Order::create([
            'order_price' => $fullPrice,
            'user_id' => $user->id,
            'products' => json_encode($arr)
        ]);
        foreach($carts as $cart){
            $cart->delete();
        }
        return response()->json([
            'message' => 'Заказ оформлен',
            'order_id' => $order->id
        ]);
    }
}
