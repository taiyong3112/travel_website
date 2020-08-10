<?php

namespace App\Http\Controllers;

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

    public function __construct(){
        $this->middleware('cus');
    }
    public function success(){
        return view('pages.bookingsuccess');
    }
    public function submit_form($id, Request $req){
        $c_id = Auth::guard('cus')->user()->id;
        if(Booking::create([
            'customer_id' => $c_id,
            'tour_id' => $id,
            'status' => $req->status,
            'start_date' => Carbon::parse($req->start_date),
            'adult_number' => $req->adult_number,
            'children_number' => $req->children_number,
            'total_price' => $req->total_price,
            'note' => $req->note,
            'hotel_status' => $req->hotel_status
        ])){
            return redirect()->route('booking.success')->with('status-success', 'Đặt tour thành công');
        }else{
            return redirect()->back()->with('status-error', 'Đặt tour không thành công');
        }
    }
    
    public function admin_index(){
        $booking = Booking::orderBy('id','ASC')->get();
        return view('admin.booking.index',compact('booking'));
    }
}
