<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends MyModel
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
}
