<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index (Tag $tag = null){
       $projects = $tag->projects();
       return view('tagPage', compact('projects'));
    }
    //
    public function create(){
        return view('admin.createTag');
    }

    public function store(Request $request){

        for ($counter = 0; $counter < count($request->name); $counter++){
            Tag::create([
                'name' => $request->name[$counter],
            ]);
        }
        return redirect('/admin/tags/create')->with('status', 'Tags created successfully');

    }
}
