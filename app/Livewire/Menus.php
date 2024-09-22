<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
class Menus extends Component
{
    public $editPanel;
    public $categories;
    public $id;
    // #[Validate('required|string|min:1|max:64')]
    public $category_name;
    // #[Validate('required|string|min:1|max:64')]
    public $product_name;
    // #[Validate('required|integer|min:0|max:1000000')]
    public $product_price;
    public function mount($categories){
        $this->categories = $categories;
        $this->editPanel=NULL;
        $this->id = NULL;
        $this->category_name=NULL;
        $this->product_name=NULL;
        $this->product_price=NULL;
        // $this->editPanel='menu';
    }

    public function render()
    {
        return view('livewire.menus');
    }
    public function PanelCategory($id){
        $this->id=$id;
        $this->editPanel='category';
        $this->category_name = Category::find($this->id)->name;
    }
    public function PanelMenu($id){
        $this->id=$id;
        $this->editPanel='menu';
        $this->product_name = Product::find($this->id);
        $this->product_price = $this->product_name->price;
        $this->product_name = $this->product_name->name;

    }
    public function PanelExit(){
        $this->editPanel=NULL;
        $this->id = NULL;
        $this->category_name=NULL;
        $this->product_name=NULL;
        $this->product_price=NULL;
        $this->categories = Category::all();
    }
    public function EditCategory(){
        $rules = [
            'category_name' => 'required|string|min:1|max:64',
        ];
        $this->validate($rules);
        $category = Category::find($this->id);
        $category->name = $this->category_name;
        $category->save();
        $this->PanelExit();
    }

    public function EditMenu(){
        $rules = [
            'product_name' => 'required|string|min:1|max:64',
            'product_price'=>'required|integer|min:0|max:1000000',
        ];
        $this->validate($rules);
        $product = Product::find($this->id);
        $product->name = $this->product_name;
        $product->price = $this->product_price;
        $product->save();
        $this->PanelExit();
    }

    public function DeleteCategory(){
        $category = Category::find($this->id);
        $category->delete();
        $this->PanelExit();
    }

    public function DeleteMenu(){
        $product = Product::find($this->id);
        $product->delete();
        $this->PanelExit();
    }
}
