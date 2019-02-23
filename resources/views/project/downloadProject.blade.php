@extends('layouts.projectapp')
@section('content')
    <div class="row">
        <div class="col-12 col-md-7 py offset-md-1">
            @if(session('status'))
                <div class="col-md-5 offset-md-1">
                    <div class="alert alert-success alert-dismissible fade show"
                         role="alert" >
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('status')}}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class=" col-12 col-md-12">
                    <h4 class="center-text">{{$project->title}}</h4>
                    <hr>
                    <h5>You are about to pay for this project. Please pay N3000 to this account and fill this form.
                    The complete project will be sent to your email. Please ensure that the name entered below
                        corresponds with the name of depositor</h5>

                    <br>
                    <br>
                    <form action="/projects/payment/project/{{$project->id}}" method="post">
                        @csrf
                        <div class="form-group" >
                            <label for="nameOfDepositor">Name of Depositor</label>
                            <input type="text" class="form-control" name="name" id="nameOfDepositor" aria-describedby="nameHelp" placeholder="Enter Name of Depositor">
                            <small id="nameHelp" class="form-text text-muted">Please make sure this corresponds with the name of depositor.</small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Email that the project will be sent to.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-12 col-md-12">
                    <h5 class="center-text">Download selected chapters</h5>
                </div>
                <div class="col-1 col-md-2">Chapter</div>
                <div class="col-5 col-md-5 center-text">Title</div>
                <div  class="col-3 col-md-3">Number of pages</div>
                <div class="col-3 col-md-2">Download </div>
            </div>

            @foreach($project->chapters as $chapter)
                <div class="row">
                    <div class="col-1 col-md-2">{{$chapter->chapter}}</div>
                    <div class="col-5 col-md-5 center-text">{{$chapter->title}}</div>
                    <div  class="col-3 col-md-3">{{$chapter->number_of_pages}}</div>
                    <div class="col-3 col-md-2"><a href="/projects/payment/chapter/{{$chapter->id}}" class="btn btn-primary">Download <i class="fas fa-download"></i></a> </div>
                </div>
            @endforeach

        </div>

        <div class="col-12 col-md-3">
            @include('partials.tags')
        </div>
    </div>
    @endsection