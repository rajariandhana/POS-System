<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;

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
        $request->session()->flash('success', 'ORDER CREATED');
        // $request->session()->flash('failure', 'SOMETHING WENT WRONG');
        return redirect()->route('neworder'); 
    }
    public function ExitStatus(Request $request){
        $request->session()->forget('success');
        $request->session()->forget('failure');
    }
}
