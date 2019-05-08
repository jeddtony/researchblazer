<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends MyModel
{
    //

    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
