<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {   
        $shops = Shop::all();

        $user = Auth::user();
        
        $id = Auth::id();
        $favorites = Favorite::where('user_id',$id)->get();
        $bookings = Booking::where('user_id',$id)->get();

        return view('mypage', ['shops' => $shops, 'favorites' => $favorites, 'bookings' => $bookings, 'user' => $user ,'id' => $id]);
    }
}
