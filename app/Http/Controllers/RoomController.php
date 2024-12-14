<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::withCount(['boarders as vacancies' => function ($query) {
            $query->whereNotNull('room_id');
        }])->get()->map(function ($room) {
            $room->vacancies = $room->capacity - ($room->vacancies ?? 0);
            return $room;
        });

        return view('rooms.rooms_all', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($boardingHouse)
    {
        return view('rooms.rooms_create', compact('boardingHouse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //to validate request
        $request->validate([
            'name' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
            'photo' => 'required|mimes:jpeg,png,jpg,webp|file|max:2048',
            'rent_price' => 'required|numeric|min:1',
            'bhId' => 'required|integer',
        ]);
        $photo = '';
        if ($request->photo) {
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/photos'), $photo);
        }
        $room = Room::create([
            'name' => $request->name,
            'boarding_house_id' => $request->bhId,
            'capacity' => $request->capacity,
            'rent_price' => $request->rent_price,
            'photo' => $photo,
        ]);
        if ($room) {
            return redirect()->route('boarding-houses.show', $request->bhId)->with('success', 'Room created successfully!');
        } else {
            return redirect()->route('home')->with('error', 'Failed to create Room');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('rooms.room', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
