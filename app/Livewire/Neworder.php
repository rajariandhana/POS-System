<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Neworder extends Component
{
    public $categories;
    public $items;
    public $subtotal;
    public function mount($categories){
        $this->categories=$categories;
        $this->items=[];
        $this->subtotal=0;
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
}
