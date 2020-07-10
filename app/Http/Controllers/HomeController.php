<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\Package;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         return view('home');
        $top_tour = Tour::limit(6)->orderBy('id','DESC')->get();   
        return view('home',compact('top_tour'));
    }

    public function homepage()
    {
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
                
            return view('pages.tourdetail',compact('tour'));
        }
    }
}
