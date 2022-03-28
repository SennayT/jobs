<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ApplicantHistory;
use App\Models\Education;
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

    public function find($id) {

        $job = Job::findOrFail($id);

        return view('job.view',[
            'job' => $job
        ]);
    }

    public function apply($id) {

        return view('job.apply',[
            'id' => $id
        ]);
    }

    public function showAll() {
        $jobs = Job::paginate(10);
        return view('job.showAll',[
            'jobs' => $jobs
        ]);
    }

    public function editJob($id) {
        $job = Job::findOrFail($id);
        return view('job.edit',['job'=>$job,'user_id'=>\Auth::id()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'maximum_education' => 'required',
            "job_id" => 'required',
            "edu" => 'required',
            "train" => 'required',
            "work" => 'required',
        ]);




        $applicant = Applicant::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'maximum_education' => $validated['maximum_education'],
            "job_id" => $validated['job_id']
        ]);

        $id = $applicant->id;
        $educations = [];
        $trainings = [];
        $employment = [];

        foreach ($validated['edu'] as $item) {
            $edu = [];
            foreach ($item as $key => $value) {
                $edu[$key] = $value;
            }
            $edu['applicant_id'] = $id;
            $edu['type'] = 'education';
            array_push($educations, $edu);
        }

        foreach ($validated['train'] as $item) {
            $train = [];
            foreach ($item as $key => $value) {
                $train[$key] = $value;
            }
            $train['applicant_id'] = $id;
            $train['type'] = 'training';
            array_push($trainings, $train);
        }

        foreach ($validated['work'] as $item) {
            $work = [];
            foreach ($item as $key => $value) {
                $work[$key] = $value;
            }
            $work['applicant_id'] = $id;
            $work['type'] = 'work';
            array_push($employment, $work);
        }

       ApplicantHistory::insert($educations);
       ApplicantHistory::insert($trainings);
       ApplicantHistory::insert($employment);




//        $educations = [];
//        $id = $applicant->id;
//        foreach ($validated['exp'] as $item) {
//            $edu = [];
//            foreach ($item as $key => $value) {
//                $edu[$key] = $value;
//            }
//            $edu['applicant_id'] = $id;
//            array_push($educations,$edu);
//        }
//
//        Education::insert($educations);
//
//        return redirect('/');

        return back();
    }


    public function findApplicants($id) {
        $app = Job::findOrFail($id)->applicants->where('accepted',0);
       // $app = Applicant::where(['job_id',1]);
       return view('job.viewApplicants',['applicants'=>$app]);
    }

    public function create() {
        return view('job.add',['user_id'=>\Auth::id()]);
    }

    public function storeJob(Request $request) {
        $validated = $request->validate([
            'email' => 'required',
            'title' => 'required',
            'address' => 'required',
            'deadline' => 'required',
            'details' => 'required',
            'user_id' => 'required'
        ]);
        $job = Job::create($request->except('token'));
        return $job;
    }

    public function updateJob(Request $request) {
        $validated = $request->validate([
            'email' => 'required',
            'title' => 'required',
            'address' => 'required',
            'deadline' => 'required',
            'details' => 'required',
            'user_id' => 'required',
            'job_id' => 'required'
        ]);

        Job::findOrFail($validated['job_id']);
        Job::whereId($validated['job_id'])->update($request->except(['_token','job_id']));
        return redirect()->route('home');
    }



}
