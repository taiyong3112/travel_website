<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function dashboard(){
		return view('admin.dashboard');
	}
    public function error(){
        $code = request()->code;
        $errors = config('error.'.$code);
        return view('admin.error',$errors);
    }
}
