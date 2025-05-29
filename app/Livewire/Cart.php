<?php

namespace App\Livewire;

use Auth;
use App\Models\Cart as CartModel;
use Livewire\Component;

class Cart extends Component
{
    public $items;
    public $quantities = [];

    public function mount()
    {
        $this->items = CartModel::getUserCart()->items()->with('product')->get();
        foreach ($this->items as $item) {
            $this->quantities[$item->id] = $item->quantity;
        }
    }

    public function updateCart()
    {
        foreach ($this->quantities as $itemId => $quantity) {
            CartModel::getUserCart()->items()->where('id', $itemId)->update([
                'quantity' => max(1, (int) $quantity),
            ]);
        }

        $this->mount(); // Refresh items
        session()->flash('message', 'Cart updated successfully!');
    }

    public function deleteProductFromCart($productId)
    {
        CartModel::getUserCart()->items()->where('product_id', $productId)->delete();
        $this->mount();
    }

    public function getSubtotal()
    {
        return $this->items->sum(function ($item) {
            $discount = $item->product->discount;
            $price = $item->product->price;
            $unitPrice = $price - ($price * $discount) / 100;
            $qty = $this->quantities[$item->id] ?? $item->quantity;
            return $unitPrice * $qty;
        });
    }

    public function render()
    {
        return view('livewire.cart');
    }
}

