<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function home()
    {
        $rooms = Room::all();
        return view('home', compact('rooms'));
    }

    public function show(Room $room)
    {
        $reviews = $room->bookings()->whereNotNull('review')->with('user')->get();
        return view('room', compact('room', 'reviews'));
    }

    public function index()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $rooms = Room::all();
        return view('admin_rooms', compact('rooms'));
    }

    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('room_create');
    }

    public function store(RoomRequest $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        Room::create($data);

        return redirect('/admin/rooms');
    }

    public function edit(Room $room)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('room_edit', compact('room'));
    }

    public function update(RoomRequest $request, Room $room)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        $room->update($data);

        return redirect('/admin/rooms');
    }

    public function destroy(Room $room)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $room->delete();

        return redirect('/admin/rooms');
    }
}
