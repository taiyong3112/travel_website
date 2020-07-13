<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\Rating;
use App\Models\Package;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function logout(){
        Auth::guard('cus')->logout();
        return redirect()->route('index');
    }

    public function login(){
        return view('pages.account'); 
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homepage()
    {
        Auth::guard('cus')->attempt(['email'=> 'tson@gmail.com','password'=> '123456789']); 
        return view('index');
    }

    public function destination($slug)
    {
        $des = Destination::where('slug',$slug)->first();
        $tour = Tour::where('slug',$slug)->first();
        if ($des) {
            return view('pages.tourlist',compact('des'));
        }
        else if ($tour)
        {
            $rating = Rating::all();    
            return view('pages.tourdetail',compact('tour','rating'));
        }
    }
}
