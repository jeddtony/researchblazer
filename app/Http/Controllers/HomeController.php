<?php

namespace App\Http\Controllers;

use App\Account;
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
        $account = Account::where('user_id', auth()->id())->first();

        return view('home', compact('approvedProjects', 'unapprovedProjects', 'account'));
    }


    public function showUnapprovedProject(){
        $matchThis = ['user_id'=> auth()->id(), 'approved' => 0];
        $projects = Project::where($matchThis)->get();
        return view('project.userUnapprovedProject', compact('projects'));
    }

    public function showApprovedProject(){
        $matchThis = ['user_id'=> auth()->id(), 'approved' => 1];
        $projects = Project::where($matchThis)->get();
        return view('project.approvedProject', compact('projects'));
    }
}
