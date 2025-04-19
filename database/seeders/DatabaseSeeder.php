<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Image;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            "email"=>"admin@example.com",
            "role" => "admin",
        ]);

        Product::factory(10)->create();
        Category::factory(10)->create();

        $products = Product::all();
        $categories = Category::all();

        foreach ($products as $product) {
            Review::factory(rand(10,20))->create([
                "product_id" => $product->id,
            ]);
            Image::factory(3)->create([
                "product_id" => $product->id,
            ]);
            $randCatIds = collect($categories)->pluck('id')->random(3)->toArray();
            $product->categories()->attach($randCatIds);
        }

        $users = User::all();
        foreach ($users as $user) {
            $cart = Cart::factory()->create([
                'user_id' => $user->id,
            ]);

            CartItem::factory(10)->create(["cart_id"=> $cart->id]);
        }
    }
}
