<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends MyModel
{
    use SoftDeletes;
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function chapters(){
        return $this->hasMany('App\Chapter');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
