<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestList;

class DashboardController extends Controller
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
        $guest = GuestList::oldest()->get(['invitation_code', 'guest_name', 'attendance_type', 'rsvp', 'number_of_attendance']);
        // dd($guest);
        return view('dashboard', ['guest' => $guest]);
    }
}
