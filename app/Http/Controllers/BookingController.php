<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function store(BookingRequest $request)
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
        $id = Auth::id();
        return view('done',compact('id'));
    }

    public function update(BookingRequest $request, $booking_id)
    {
        $form = $request->all();
        unset($form['_token']);
        Booking::find($booking_id)->update($form);
        return redirect('/done');
    }

    public function delete($booking_id)
    { 
        Booking::find($booking_id)->delete();
        return back();
    }
}
