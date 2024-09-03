<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;

class NewOrder extends Component
{
    public $categories;
    public $items;
    public $subtotal;
    public $status;
    public function mount($categories){
        $this->categories=$categories;
        $this->items=[];
        $this->subtotal=0;
        $this->status=NULL;
        // $this->status='PAYMENT';
    }
    public function render()
    {
        return view('livewire.new-order');
    }

    public function ChangeQty($pid,$value){
        $product = Product::find($pid);
        if(array_key_exists($pid, $this->items)) {
            $this->items[$pid]['qty']+=$value;
            if($this->items[$pid]['qty'] <= 0){
                unset($this->items[$product->id]);
                $this->UpdateSubtotal();
                return;
            }
            else if($this->items[$pid]['qty'] > 10){
                $this->items[$pid]['qty']=10;
            }
        }
        else {
            $this->items[$pid]['name']=$product->name;
            $this->items[$pid]=[
                'id'=>$pid,
                'name'=>$product->name,
                'qty'=>1
            ];
        }

        $this->items[$pid]['price'] = $product->price * $this->items[$pid]['qty'];
        $this->UpdateSubtotal();
    }

    public function UpdateSubtotal(){
        $this->subtotal=0;
        foreach($this->items as $item){
            $this->subtotal+=$item['price'];
        }
    }
    public function EmptyCart(){
        $this->subtotal=0;
        $this->items = [];
    }
    public function Next(){
        if($this->subtotal<=0) return;
        $this->status='PAYMENT';
    }
    public function Cancel(){
        $this->status=NULL;
    }
    public function Confirmed(Request $request){
        //
        $orderData = $this->GenerateOrderData();
        $productData = $this->GenerateProductData();
        $oc = new OrderController;
        $res = $oc->CreateOrder($orderData,$productData);
        if($res=="SUCCESS"){
            $request->session()->flash('SUCCESS', 'ORDER CREATED');
        }
        else{
            $request->session()->flash('FAILURE', 'SOMETHING WENT WRONG');
        }
        return redirect()->route('neworder'); 
    }
    public function ExitStatus(Request $request){
        $request->session()->forget('success');
        $request->session()->forget('failure');
    }


    private function GenerateOrderData(){
        $this->UpdateSubtotal();
        $orderData = [
            'cost'=>$this->subtotal
            // 'employee_id'=>
        ];
        return $orderData;
    }
    private function GenerateProductData(){
        $productData = [];
        foreach($this->items as $item){
            $product = Product::find($item['id']);
            $productData[]=[
                'product_id'=>$product->id,
                'qty'=>(int)$item['qty'],
                'price'=>$product->price,
            ];
        }
        return $productData;
    }
}
/*
1. A B C E
2. 
a 0 (isolated)
b 3
c 5
d 3
e 3
f 4
g 1
3. 
4. yes, idk
*/