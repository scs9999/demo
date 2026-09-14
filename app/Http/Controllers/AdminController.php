<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings = Booking::with('user')->get();
        return view('admin_dashboard', compact('bookings'));
    }

    public function status(StatusRequest $request, Booking $booking)
    {
        $booking->update(['status' => $request->validated('status')]);
        return back();
    }
}
