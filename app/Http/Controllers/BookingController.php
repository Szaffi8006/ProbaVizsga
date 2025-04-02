<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function getBookings() {

        $bookings = Booking::all();

        return response()->json($bookings, 200);
    }    
}
