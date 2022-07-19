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
        $user = Auth::user();
        
        $id = Auth::id();
        $favorites = Favorite::where('user_id', $id)->get();
        $today = date("Y-m-d");
        $bookings = Booking::where('user_id', $id)->where('booking_date', '>=', $today)->orderBy('id','asc')->get();
        $evaluations = Booking::where('user_id', $id)->where('booking_date', '<', $today)->orderBy('id','asc')->get();

        return view('mypage', ['favorites' => $favorites, 'bookings' => $bookings, 'user' => $user ,'id' => $id, 'evaluations' => $evaluations]);
    }
}
