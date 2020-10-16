<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerDataController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function create() {
        if(Gate::allows('create-job')) {
            $job = new Job();
            return view('employer.createJobForm',compact('job'));
        }
        return redirect(route('home'))->with('error','You cannot create a job with this account');


    }
}
