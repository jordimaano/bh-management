<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bh.bh_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //to validate request
        $request->validate([
            'name' => 'required|string|max:50',
            'location' => 'required|string|max:255',
            'photo' => 'required|mimes:jpeg,png,jpg,webp|file|max:2048',
        ]);
        $photo = '';
        if ($request->photo) {
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/photos'), $photo);
        }
        $bh = BoardingHouse::create([
            'name' => $request->name,
            'owner_id' => auth()->user()->id,
            'location' => $request->location,
            'photo' => $photo,
        ]);
        if ($bh) {
            return redirect()->route('home')->with('success', 'Boarding House created successfully!');
        } else {
            return redirect()->route('home')->with('error', 'Failed to create Boarding House');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardingHouse $boardingHouse)
    {
        $rooms = Room::where('boarding_house_id', $boardingHouse->id)->get();
        return view('bh.bh_show', compact('boardingHouse', 'rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardingHouse $boardingHouse)
    {
        return view('bh.bh_edit', compact('boardingHouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardingHouse $boardingHouse)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'location' => 'required|string|max:255',
            'photo' => 'required|mimes:jpeg,png,jpg,webp|file|max:2048',
        ]);
        $photo = '';
        if ($request->photo) {
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/photos'), $photo);
        }
        $bh = BoardingHouse::create([
            'name' => $request->name,
            'owner_id' => auth()->user()->id,
            'location' => $request->location,
            'photo' => $photo,
        ]);
        if ($bh) {
            return redirect()->route('home')->with('success', 'Boarding House edited successfully!');
        } else {
            return redirect()->route('home')->with('error', 'Failed to edit Boarding House');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardingHouse $boardingHouse)
    {
        //
    }
}
