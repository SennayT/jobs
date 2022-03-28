<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function find($id) {
        $applicant = Applicant::findOrFail($id);
        $exp = $applicant->history;
        $edu = [];
        $train = [];
        $work = [];
        foreach ($exp as $e) {
            if($e->type==='education') {
                array_push($edu,$e);
            }

            else if($e->type==='training') {
                array_push($train,$e);
            }

            else if($e->type==='work') {
                array_push($work,$e);
            }

        }

        return view('applicant.view',[
            'applicant'=>$applicant,
            'training' => $train,
            'education' => $edu,
            'work' => $work
        ]);
    }

    public function delete($id) {
        Applicant::destroy($id);
        return redirect()->route('home');
    }

    public function accept($id){
        $applicant = Applicant::findOrFail($id);
        $applicant->accepted = 1;
        $applicant->save();
        return redirect()->route('home');
    }
}
