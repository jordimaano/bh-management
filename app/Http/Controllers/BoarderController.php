<?php

namespace App\Http\Controllers;

use App\Models\Boarder;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class BoarderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function acceptOrDecline(Request $request)
    {
        $message = "";
        //1 = accept
        //0 = decline
        if ($request->decision == 1) {
            $boarder = Boarder::where('id', $request->boarder)->first();
            $boarder->is_confirmed = 1;
            $boarder->save();
            $message = "Request accepted!";
        } else {
            $boarder = Boarder::where('id', $request->boarder)->first();
            $boarder->delete();
            $message = "Request declined!";
        }
        return redirect()->back()->with("success", $message);
    }
    public function boarderProfile(Boarder $boarder)
    {
        return view('boarders.boarder_profile', compact('boarder'));
    }
    public function saveAsPDF(Request $request)
    {
        // dd($request->all());
        Browsershot::url($request->url)->noSandbox()->save('example.pdf');
    }
    // an image will be saved

    public function saveToPDF(Request $request) {}
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
