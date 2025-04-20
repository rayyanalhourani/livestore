<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryProducts extends Component
{
    public $products;
    public $category;
    public function mount(Category $category){
        $this->category = $category;
        $this->products = $category->products()
        ->withAvg("reviews","rating")
        ->withCount("reviews")
        ->get();;
    }
    public function render()
    {
        return view('livewire.category-products');
    }
}
