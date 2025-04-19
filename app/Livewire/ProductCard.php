<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductCard extends Component
{
    public $product;
 
    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
