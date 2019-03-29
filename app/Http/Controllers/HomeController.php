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

        return view('home', compact('approvedProjects', 'unapprovedProjects'));
    }

    public function showAccount(){
        $accountName = Account::all('account_name', 'account_number', 'bank')->where('user_id', auth()->id());
//        dd($accountName);
        return view('userAccounts', compact('accountName'));
    }
    public function storeAccount(Request $request){

        $request->validate([
            'accountName' => ['required'],
            'accountNumber' => ['required', 'min:10', 'max:10'],
            'bank' => ['required'],
        ]);

        Account::create([
            'user_id' => auth()->id(),
            'account_name' => $request->accountName,
            'account_number' => $request->accountNumber,
            'bank' => $request->bank,
        ]);

        return redirect('/home')->with('status', 'Account details updated successfully');
    }
}
