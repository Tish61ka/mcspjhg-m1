<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(){
        return response()->json([
            'content' => Product::all()
        ]);
    }
    public function store(ProductRequest $request){
        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Новый товар создан',
            'product_id' => $product->id,
        ]);
    }
    public function update(ProductEditRequest $request, $id){
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json([
            'message' => 'Товар обновлен'
        ]);
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'message' => 'Товар удален'
        ]);
    }
}
