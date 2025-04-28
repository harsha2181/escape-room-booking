<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())->orderBy('date', 'asc')->get();

        return view('dashboard.index', compact('bookings'));
    }
}
