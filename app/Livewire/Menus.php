<?php

namespace App\Livewire;

use Livewire\Component;

class Menus extends Component
{
    public $editPanel;
    public $categories;
    public function mount($categories){
        $this->categories = $categories;
        $this->editPanel=NULL;
        // $this->editPanel='menu';
    }
    public function render()
    {
        return view('livewire.menus');
    }
    public function PanelCategory(){
        $this->editPanel='category';
    }
    public function PanelMenu(){
        $this->editPanel='menu';
    }
    public function PanelExit(){
        $this->editPanel=NULL;
    }
    public function EditCategoryName($category_id,$name){
        $category = Category::find($category_id);
        $category->name = $name;
    }
    public function DeleteCategory($category_id){
        $category = Category::find($category_id);
        $category->delete();
    }
    public function EditMenuName($product_id,$name,$price){
        $product = Product::find($product_id);
        $product->name = $name;
        $product->price = $price;
    }
    public function DeleteMenu($product_id){
        $product = Product::find($product_id);
        $product->delete();
    }
}
