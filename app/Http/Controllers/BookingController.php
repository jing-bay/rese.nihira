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
            'number' => $request->booking_number,
        ]);

        return redirect('/done');
    }
    
    public function done()
    {
        $id = Auth::id();
        return view('done',['id' => $id]);
    }

    public function delete($booking_id)
    { 
        Booking::find($booking_id)->delete();
        
        return back();
    }
}
