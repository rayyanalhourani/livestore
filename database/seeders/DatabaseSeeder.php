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
        User::factory(10)->create(["password" => bcrypt("123456"),]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            "password" => bcrypt("123456"),
            "role"=>"admin"
        ]);

        Product::factory(30)->create();
        Category::factory(20)->create();

        $products = Product::all();
        $categories = Category::all();

        foreach ($products as $product) {
            Review::factory(rand(10,20))->create([
                "product_id" => $product->id,
            ]);
            $randCatIds = collect($categories)->pluck('id')->random(3)->toArray();
            $product->categories()->attach($randCatIds);
        }
    }
}
