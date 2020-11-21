<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    
    public function payments() {
        return $this->belongsToMany('App\Payment');
    }
}
