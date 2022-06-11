<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {   
        $user_id = Auth::id();
        $bookings = Booking::where('user_id', $user_id);
        $favorites = Favorite::where('user_id', $user_id);
        return view('mypage', ['bookings' => $bookings, 'favorites' => $favorites]);
    }
}
