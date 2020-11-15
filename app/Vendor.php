<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Exam;
use App\Certification;

class Vendor extends Model
{
    protected $guarded = [];

    public function certification(){
        return $this->hasOne(Certification::class, 'vendor_id');
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function certifications(){
        return $this->hasMany(Certification::class);
    }
}
