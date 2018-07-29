<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        if ($user->role == "Faculty") {
            return \Redirect::route('home_faculty');

        }elseif ($user->role == "STD")
        {
            return \Redirect::route('view_event');

        }elseif ($user->role == "Admin")
        {
            return \Redirect::route('admin_home');

        }
    }
    
     public function getDownload()
    {
    
     $file= public_path("/images/time_table/timetable.csv");

        $headers = [
            'Content-Type' => 'application/csv',
        ];

        return response()->download($file, 'timetable.csv', $headers);

    }
}
