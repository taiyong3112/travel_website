<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin_index(){
        $booking = Booking::orderBy('id','ASC')->get();
        return view('admin.booking.index',compact('booking'));
    }
}
