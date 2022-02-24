<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function experiences() {
        return $this->hasMany(Experience::class);
    }

    public function history(){
        return $this->hasMany(ApplicantHistory::class);
    }
}
