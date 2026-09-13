<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Booking;
use App\Models\Room;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings;
        return view('bookings', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('booking_create', compact('rooms'));
    }

    public function store(BookingRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Booking::create($data);

        return redirect('/bookings');
    }

    public function review(ReviewRequest $request, Booking $booking)
    {
        $booking->update(['review' => $request->validated('review')]);
        return back();
    }
}
