<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    //
    public function index() {
        $jobs = Job::paginate(10);
        return view('welcome',['jobs'=>$jobs]);
    }
}
