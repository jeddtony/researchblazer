<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index (Tag $tag){
       $tags = Tag::all();
//       dd($projects);
       return view('allTags', compact('tags'));
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

    public function show(Tag $tag){
        $projects = $tag->projects;
//       dd($projects);
        return view('tagProject', compact('projects', 'tag'));
    }
}
