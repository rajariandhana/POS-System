<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $items;
    public function mount(){
        $this->items = [
            '1','2'
        ];
        // $this->item = $item;
    }
    public function Increment($pid){
        foreach($this->items as $item){
            if($pid == $item->id){
                $item->value += 1;
            }
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
