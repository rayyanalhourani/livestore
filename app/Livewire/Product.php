<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
use Livewire\Component;

class Product extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = ProductModel::find($product)->withAvg("reviews", "rating")->get();
    }

    public function render()
    {
        return view('livewire.product');
    }
}
