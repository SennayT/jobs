<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [JobController::class,'index']);
Route::get('/jobs',[JobController::class,'showAll'])->name('all-jobs');
Route::get('/jobs/edit/{id}',[JobController::class,'editJob']);
Route::post('/jobs/edit',[JobController::class,'updateJob'])->name('update-job');
Route::get('/jobs/{id}',[JobController::class,'find']);
Route::get('/jobs/apply/{id}',[JobController::class,'apply']);
Route::post('/jobs/apply',[JobController::class,'store']);
Route::get('/jobs/{id}/applicants',[JobController::class,'findApplicants'])->middleware('auth');
Route::get('/create-job',[JobController::class,'create'])->name('create_job');
Route::post('/post-job',[JobController::class,'storeJob'])->name('post_job');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/jobs/create',[\App\Http\Controllers\EmployerDataController::class,'create'])->name('create-job');
Route::post('/save-job',[JobController::class,'store'])->name('save-job');


Route::get('/applicant/{id}',[ApplicantController::class,'find']);
Route::post('/delete/applicant/{id}',[ApplicantController::class,'delete']);

//Route::get('/applicant/{id}/details');
