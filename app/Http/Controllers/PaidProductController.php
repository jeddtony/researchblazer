<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\PaidProduct;
use App\Project;
use Illuminate\Http\Request;

class PaidProductController extends Controller
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
    public function storeProject(Project $project, Request $request)
    {
        //
        PaidProduct::create([
         'name' => $request->name,
            'email' => $request->email,
            'project_id' => $project->id,
        ]);

        return redirect('/projects/payment/project/'.$project->id)->with('status', 'Request submitted successfully');
    }


    public function storeChapter(Chapter $chapter, Request $request){
        PaidProduct::create([
            'name' => $request->name,
            'email' => $request->email,
            'chapter_id' => $chapter->id,
        ]);

        return redirect('/projects/payment/chapter/'.$chapter->id)->with('status', 'Request submitted successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\PaidProduct  $paidProduct
     * @return \Illuminate\Http\Response
     */
    public function show(PaidProduct $paidProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaidProduct  $paidProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(PaidProduct $paidProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaidProduct  $paidProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaidProduct $paidProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaidProduct  $paidProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaidProduct $paidProduct)
    {
        //
    }
}
