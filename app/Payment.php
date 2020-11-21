<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function cliente() {
        return $this->belongsToMany('App\Customer');
    }
}
