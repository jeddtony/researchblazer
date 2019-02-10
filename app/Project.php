<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends MyModel
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function chapters(){
        return $this->hasMany('App\Chapters');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
