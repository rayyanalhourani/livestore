<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ProductModel;
use Livewire\Attributes\Computed;
use Livewire;

class Product extends Component
{
    public $product;
    public $quantity = 1;
    public $numberOfReviews;
    public $rating;

    public function mount($product)
    {
        $this->product = ProductModel::withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->with(["reviews.user"])
            ->where('id', $product)
            ->firstOrFail();
        $this->numberOfReviews=$this->product->reviews_count;
        $this->rating=$this->product->reviews_avg_rating;
    }

    public function addToCart()
    {
        $user = Auth::user();
        if (!$user) {
            $this->dispatchBrowserEvent('cart-error', ['message' => 'Please log in to add to cart']);
            return;
        }

        $cart = $user->cart()->firstOrCreate([]);

        $cartItem = $cart->items()->where('product_id', $this->product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $this->quantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
                'note' => null,
            ]);
        }
        $this->quantity=1;

        return;
    }

    #[Computed]
    public function relatedProducts(){
        return ProductModel::inRandomOrder()
        ->limit( 6)
        ->withAvg("reviews","rating")
        ->withCount("reviews")
        ->get();
    }

    public function render()
    {
        return view('livewire.product');
    }
}
