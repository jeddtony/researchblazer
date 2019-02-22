<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    //
    protected $fillable = [
        'title', 'user_id', 'approved', 'number_of_pages', 'link_to_storage', 'number_of_pages',
        'tag_id', 'project_id', 'number_of_downloads', 'chapter',
    ];
}
