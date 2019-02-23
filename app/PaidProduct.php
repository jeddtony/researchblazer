<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaidProduct extends MyModel
{
    //

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function chapter(){
        return $this->belongsTo('App\Chapter');
    }
}
