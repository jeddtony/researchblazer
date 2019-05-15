@extends('layouts.app')

@section('content')
<div class="container">



    <div class="row big-top-margin">
        @if(session('status'))
            <div class="col-md-8 offset-md-2">
                <div class="alert alert-success alert-dismissible fade show"
                     role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session('status')}}
                </div>
            </div>
        @endif


            <div class="col-md-12 col-12">
        @include('layouts.errors')

        </div>
        <div class="col-12 col-md-3 ">
            <div class="card">
                <div class="card-header" style="background-color: #1f6fb2; color: white">
                    Approved Projects
                </div>
                <div class="card-body">
                    <h4>{{$approvedProjects}}</h4>
                    <a href="/projects/approved" class="btn btn-outline-primary">View all</a>
                </div>
            </div>
        </div>

    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-header">
                Unapproved Projects
            </div>
            <div class="card-body">
                <h4>{{$unapprovedProjects}}</h4>
                <a href="/projects/unapproved" class="btn btn-outline-primary">View all</a>
            </div>
        </div>
    </div>

        <div class="col-12 col-md-3 ">
            <div class="card">
                <div class="card-header" style="background-color: #20c997; color: white">
                    Projects downloaded
                </div>
                <div class="card-body">
                    <h4>0</h4>
                    <a href="#" class="btn btn-outline-primary">View all</a>
                </div>
            </div>
        </div>
    </div>

            <div class="row big-top-margin">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bank Details</h5>
                            <p class="card-text"><strong>Account Name:</strong>
                                {{ $account? $account->account_name : 'Please fill this' }}<br>
                            <strong>Account Number: </strong>  {{ $account? $account->account_number : 'Please fill this' }} <br>
                                <strong>Bank: </strong> {{ $account? $account->bank : 'Please fill this' }}
                            </p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Payments</h5>
                            <p class="card-text">
                                <strong>Next Payday:</strong>
                                <br>
                                <strong>Amount Expected: </strong>

                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>


    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Account Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('userAccount') }}">
                <div class="modal-body">

                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Account Name</label>

                            <div class="col-md-6">
                                <input id="accountName" type="text" class="form-control"
                                       name="accountName" required autofocus>

                                @if ($errors->has('accountName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('accountName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Account Number</label>

                            <div class="col-md-6">
                                <input id="accountNumber" type="number" class="form-control"
                                       value="" name="accountNumber" required>

                                @if ($errors->has('accountNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('accountNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                                    <select name="bank" class="custom-select">
                                        <option selected>Select your bank</option>
                                        <option value="FirstBank">First Bank</option>
                                        <option value="GTBank">Guaranty Trust Bank</option>
                                        <option value="ZenithBank">Zenith Bank</option>
                                        <option value="AccessBank">Access Bank</option>
                                        <option value="UBA">UBA</option>
                                        <option value="Fidelity">Fidelity</option>
                                        <option value="FCMB">FCMB</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
