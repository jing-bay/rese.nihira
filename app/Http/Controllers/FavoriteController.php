<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'delete']);
    }

    public function store($shop_id)
    {
        Favorite::create([
            'shop_id' => $shop_id,
            'user_id' => Auth::id(),
        ]);
        
        session()->flash('success', 'You Liked the Reply.');
        return redirect()->back();
    }

    public function delete($shop_id)
    {
        $favorite = Favorite::where('shop_id', $shop_id)->where('user_id', Auth::id())->first();
        $favorite->delete();

        session()->flash('success', 'You Unliked the Reply.');

        return redirect()->back();
    }

}
