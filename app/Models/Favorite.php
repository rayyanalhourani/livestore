<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public static function getUserFavorites(){
        if (Auth::check()){
            return Auth::user()->favoriteProducts();
        } else {
            $sessionId = session()->getId();
            return Favorite::where("session_id", "=", $sessionId)->get();
        }
    }
}
