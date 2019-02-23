<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Mail\ProjectApproved;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        //

        for ($counter = 0; $counter < count($request->title); $counter++){
            $chapterFile = $request->chapter[$counter];
            $filename = 'project-'.$project->id.'-chapter-'.($counter + 1).'-'.time().'.'.$chapterFile->getClientOriginalExtension();
            $path = $chapterFile->storeAs('Chapter', $filename);

            Chapter::create([
                'project_id' => $project->id,
                'chapter' => $counter + 1,
                'title' => $request->title[$counter],
                'link_to_storage' => $path,
            ]);
    }
        $project->approved = 1;
        $project->abstract = $request->abstract;
        $project->save();
        Mail::to($project->user)->send(new ProjectApproved($project));
        return redirect('/admin/')->with('status', 'Chapters stored successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        //
    }

    public function payment(Chapter $chapter){
        return view('project.downloadChapter', compact('chapter'));
    }
}
