<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('orders',[
            'orders'=>Order::get()
        ]);
    }
    public function CreateOrder($orderData, $productData){
        $order = new Order($orderData);
        $order->id = (string)Str::uuid();
        $order->save();

        foreach($productData as $data){
            $order->products()->attach($data['product_id'],[
                'price'=>$data['price'],
                'qty'=>$data['qty'],
            ]);
        }
        return "SUCCESS";
    }
    public function showOrderProducts($order_id)
    {
        $order = Order::with('products')->findOrFail($order_id);
        // dd($order);
        return view('order-products', compact('order'));
    }
}
