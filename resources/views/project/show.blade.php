@extends('layouts.projectapp')
@section('content')

    <div class="row">
        <div class="col-12 col-md-7 py offset-md-1">
            <div class="row">
                <div class=" col-12 col-md-12">
            <h4 class="center-text">{{$project->title}}</h4>
            <hr>
            <h5>Abstract:</h5>
            <p>{{$project->abstract}}</p>
                    <br>
                    <br>
                </div>
                <h5 class="center-text">Download complete project <a href="payment/project/{{$project->id}}" class="btn btn-primary"> Download <i class="fas fa-download"></i></a> </h5>
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
                <div class="col-3 col-md-2"><a href="#" class="btn btn-primary">Download <i class="fas fa-download"></i></a> </div>
            </div>
                @endforeach

        </div>

        <div class="col-12 col-md-3">
            @include('partials.tags')
        </div>
    </div>
    @endsection