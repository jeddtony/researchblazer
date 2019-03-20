<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('home');
        $matchApproved = ['user_id' => auth()->id(), 'approved'=> 1];
        $matchUnapproved = ['user_id' => auth()->id(), 'approved' => 0];
        $approvedProjects = count(Project::where($matchApproved)->get());
        $unapprovedProjects = count( Project::where($matchUnapproved)->get());

        return view('home', compact('approvedProjects', 'unapprovedProjects'));
    }
}
