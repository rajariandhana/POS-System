<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
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
            $product = Product::findOrFail($data['product_id']);
            $order->orderProducts()->create([
                // 'order_id' => $order->id,
                'product_id'=>$product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'qty'      => $data['qty']
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ]);
        }
        return "SUCCESS";
    }
    public function showOrderProducts($order_id)
    {
        $order = Order::with('orderProducts')->findOrFail($order_id);
        // dd($order);
        return view('order-products', compact('order'));
    }
}
