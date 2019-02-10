<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends MyModel
{
    //
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
