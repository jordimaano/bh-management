<?php

namespace App\Http\Controllers;

use App\Models\Boarder;
use Illuminate\Http\Request;

class BoarderController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $boarder = Boarder::create([
            'user_id' => $request->boarder,
            'room_id' => $request->room,
        ]);
        return redirect()->back()->with('success', 'Applied successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Boarder $boarder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boarder $boarder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boarder $boarder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boarder $boarder)
    {
        //
    }
}
