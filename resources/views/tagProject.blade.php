@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-7 p-4 offset-md-1">
            <h3 class="center-text">Showing Projects On {{$tag->name}}  </h3>

            @if(count($projects) > 0)
            @foreach($projects as $project)
                <h5> <a href="/projects/{{$project->id}}">{{$project->title}} </a></h5>
                    <span class="tag">{{$project->tag->name}}</span>


                <span class="username"> By: {{$project->user->name}}</span>
                <hr>
            @endforeach

            @else
                <i class="fas fa-cloud-upload-alt fa-10x big-top-margin" style="margin-left: 20%"></i>
                <h3>Ooops! Seems like no one has uploaded a project for {{$tag->name}}. Why not be the first</h3>
            {{--{{$projects->links()}}--}}
                <a href="/projects/create" class="btn btn-lg btn-outline-primary" style="margin-left: 20%"><h4>Upload Projects </h4></a>
                @endif

        </div>

        <!--- Tag Side Bar -->
        <div class="col-12 col-md-3">
            @include('partials.tags')
        </div>
    </div>
@endsection