<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::where('approved', 0)->get();
        return view('admin.home', compact('projects'));
    }

    public function show(Project $project){
        return view('admin.uploadChapters', compact('project'));
    }

}
