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
        $latests = Project::where('approved', 1)->latest()->limit(10)->get();
        $populars = Project::where('approved', 1)->orderBy('number_of_downloads', 'desc')->limit(10)->get();
        return view('project.index', compact('latests', 'populars'));
    }

    public function indexPopular(){
        $projects = Project::where('approved', 1)->orderBy('number_of_downloads', 'desc')->paginate(10);
        return view('project.popularProject', compact('projects'));
    }

    public function indexLatest(){
        $projects = Project::where('approved', 1)->latest()->paginate(10);
        return view('project.latestProject', compact('projects'));
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
//        $path = $projectFile->storeAs('project', $filename);

        $path = $projectFile->store('project', 's3');

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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('admin.uploadProject', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $project->title = $request->title;
        $project->abstract = $request->abstract;
        $project->approved = 1;
        $project->save();

        return redirect()->route('admin.dashboard') ->with('status', 'Project approved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->forceDelete();
        return redirect('/admin')->with('status', 'Project deleted Permanently');
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function softDelete(Project $project){
//        dd('In the soft Delete ');
        $project->delete();
        return redirect('/admin')->with('status', 'Project deleted temporarily');
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

    public function payment(Project $project){
        return view('project.downloadProject', compact('project'));
    }
}
