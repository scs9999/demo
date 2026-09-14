<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Requests\CommentRequest;
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
        $comments = $room->comments()->with('user')->latest()->get();
        return view('room', compact('room', 'reviews', 'comments'));
    }

    public function comment(CommentRequest $request, Room $room)
    {
        $room->comments()->create([
            'user_id' => auth()->id(),
            'text' => $request->validated('text'),
        ]);

        return back();
    }

    public function index()
    {
        $rooms = Room::all();
        return view('admin_rooms', compact('rooms'));
    }

    public function create()
    {
        return view('room_create');
    }

    public function store(RoomRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        Room::create($data);

        return redirect('/admin/rooms');
    }

    public function edit(Room $room)
    {
        return view('room_edit', compact('room'));
    }

    public function update(RoomRequest $request, Room $room)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        $room->update($data);

        return redirect('/admin/rooms');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect('/admin/rooms');
    }
}
