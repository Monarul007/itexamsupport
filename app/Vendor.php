<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    public function certification(){
        return $this->hasOne(Certification::class, 'vendor_id');
    }
}
