<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

    public function index(){

    }

    public function create(){

    }

    public function show(){
//        $accountName = Account::all('account_name', 'account_number', 'bank')->where('user_id', auth()->id());
        $account = Account::where('user_id', auth()->id())->first();
//        dd($accountName);
        return view('userAccounts', compact('account'));
    }
    public function store(Request $request){

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
