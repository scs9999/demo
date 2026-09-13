<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $bookings = Booking::with('user')->get();
        return view('admin_dashboard', compact('bookings'));
    }

    public function status(StatusRequest $request, Booking $booking)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $booking->update(['status' => $request->validated('status')]);
        return back();
    }
}
