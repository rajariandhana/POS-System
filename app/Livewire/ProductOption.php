<?php

namespace App\Livewire;

use Livewire\Component;

class ProductOption extends Component
{
    public $categories;
    public function mount($categories){
        $this->categories = $categories;
    }
    public function render()
    {
        return view('livewire.product-option');
    }
    
}
