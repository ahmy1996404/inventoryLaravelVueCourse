<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function GetProduct($id)
    {
       $product = DB::table('products')->where('category_id', $id)->get();
       return response()->json($product);
    }
    public function orderDone(Request $request)
    {
        $validation = $request->validate([
            'customer_id' => 'required',
            'payby' => 'required',

        ]);
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['qty'] = $request->qty;
        $data['sub_total'] = $request->subtotal;
        $data['payby'] = $request->payby;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['order_date'] = date('d/m/Y');
        $data['order_month'] = date('F');
        $data['order_year'] = date('Y');

        $order_id = DB::table('orders')->insertGetId($data);

        $contents = DB::table('pos')->get();

        $orderData = array();

        foreach ($contents as $content) {
            $orderData['product_id']= $content->product_id;
            $orderData['product_quantity']= $content->product_quantity;
            $orderData['product_price']= $content->product_price;
            $orderData['sub_total']= $content->sub_total;
            $orderData['order_id']= $order_id;

            DB::table('order_details')->insert($orderData);
            DB::table('products')->where('id',$content->product_id)->update(['product_quantity'=> DB::raw('product_quantity -'.$content->product_quantity)]);
        }
        DB::table('pos')->delete();
        return response('Done');
    }
}
