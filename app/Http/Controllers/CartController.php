<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function all(){
        $user = User::where('token', '!=', null)->first();
        $cart = Cart::all()->where('user_id', $user->id);
        return response()->json([
            'message' => 'Моя корзина',
            'content' => CartResource::collection($cart) 
        ]);
    }
    public function store(Request $request, $id){
        $user = User::where('token', '!=', null)->first();
        $cart = Cart::create([
            'user_id' => $user->id,
            'product_id' => $id
        ]);
        return response()->json([
            'message' => 'Товар добавлен в корзину',
            'id' => $cart->id,
        ]);
    }
    public function destroy($id){
        $cart = Cart::find($id);
        $cart->delete();
        return response()->json([
            'message' => 'Товар удален из корзину',
        ]);
    }
}
