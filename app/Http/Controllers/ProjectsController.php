<?php

namespace App\Http\Controllers;

use App\Project;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Project::all();
        $latests = Project::latest()->limit(10)->get();
        $populars = Project::orderBy('number_of_downloads', 'desc')->limit(10)->get();
//        dd($all);
//        dd($latests);
        return view('project.index', compact('latests', 'populars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        return view('project.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => ['required', 'min:10', 'max:50'],
            'project' => 'required|file|mimes:pdf,doc,docx'
        ]);

        $projectFile = $request->file('project');
        $filename = ''.auth()->id().'-'.time().'.'.$projectFile->getClientOriginalExtension();
        $path = $projectFile->storeAs('project', $filename);

        $projectId = Project::create([
            'user_id' => Auth::user()->id,
            'title'  => $request['title'],
            'link_to_storage' => $path,
            'approved' => 0,
        ]);

        if($request->tags){
            foreach ($request->tags as $tag) {
                $realTag = Tag::where('name', $tag)->first();
                $projectId->tags()->attach($realTag);
            }
        }
        return redirect('/projects/create')->with('status', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $projects)
    {
        //
    }

    public function download(Project $project){
//        return Storage::get($project->link_to_storage);
        $file = storage_path().'/app/'.$project->link_to_storage;
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
//       return Response::download(storage_path().'/app/'.$project->link_to_storage);
        return response()->download($file, $project->title.'.pdf', $headers);
    }
}
