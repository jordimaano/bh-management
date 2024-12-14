<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'owner') {

            $boardingHouses = BoardingHouse::where('owner_id', auth()->user()->id)->get();
            return view('owner_home', compact('boardingHouses'));
        } else {
            return redirect()->route('rooms.index');
        }
    }
}
