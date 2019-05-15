@extends('layouts.projectapp')
@section('content')
    <div class="row">
        <div class="col-12 col-md-7 p-4 offset-md-1">
            <h3 class="center-text">Showing Projects On  </h3>

            @foreach($projects as $project)
                <h5> <a href="/projects/{{$project->id}}">{{$project->title}} </a></h5>
                <span class="username"> By: {{$project->user->name}}</span>
                <hr>
            @endforeach

            {{$projects->links()}}
        </div>

        <!--- Tag Side Bar -->
        <div class="col-12 col-md-3 ">
            @include('partials.tags')
        </div>

@endsection