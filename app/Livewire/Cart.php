<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class Cart extends Component
{
    public $items;
    public function mount(){
        $this->items=Auth::user()->cart->items()->with('product')->get();
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
