<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{

    #[Computed]
    public function categories(){
        return Category::limit(10)->get();
    }

    #[Computed]
    public function products(){
        return Product::inRandomOrder()->limit(10)->withAvg("reviews",column: "rating")->get();
    }

    #[Computed]
    public function bestSelling(){
        return Product::inRandomOrder()->limit(10)->withAvg("reviews",column: "rating")->get();
    }

    #[Computed]
    public function ourProducts(){
        return Product::inRandomOrder()->limit(10)->withAvg("reviews",column: "rating")->get();
    }

    #[Computed]
    public function discountProducts(){
        return Product::where( "discount",">",0)
        ->limit(10)
        ->withAvg("reviews","rating")
        ->withCount("reviews")
        ->get();
    }

    #[Title('Home')] 
    public function render()
    {
        return view('livewire.home',['title' => 'Home']);
    }
}
