<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        Booking::create([
            'shop_id' => $request->shop_id,
            'user_id' => Auth::id(),
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'number' => $request->number,
        ]);
        return redirect('/done');
    }
    
    public function done()
    {
        return view('done');
    }

    public function delete(Request $request, $booking_id)
    { 
        Booking::find($booking_id)->delete();
        
        return back();
    }
}
