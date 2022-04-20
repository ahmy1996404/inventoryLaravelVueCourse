<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddToCart(Request $request , $id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        $check = DB::table('pos')->where('product_id', $id)->first();
        if($check){
            DB::table('pos')->where('product_id', $id)->increment('product_quantity');
        }else{
            $data = array();
            $data['product_id'] = $id;
            $data['product_name'] = $product->product_name;
            $data['product_quantity'] = 1;
            $data['product_price'] = $product->selling_price;
            $data['sub_total'] = $product->selling_price;
            DB::table('pos')->insert($data);
        }

    }
    public function CartProduct()
    {
        $cart = DB::table('pos')->get();
        return response()->json($cart);
    }
    public function removeCart($id)
    {
         DB::table('pos')->where('id',$id)->delete();
         return response('done');
    }
}
