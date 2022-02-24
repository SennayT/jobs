<?php

namespace App\Http\Controllers;

use App\Models\Job;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $jobs = Job::paginate(10);

//        if($user->type==='employer') {
//            return view('employer.index',compact('user'));
//        }
//
//        else{
//            return view('home',[
//                'user'=>$user
//            ]);
//        }

        return view('home',[
            'user' => $user,
            'jobs' => $jobs
        ]);
    }
}
