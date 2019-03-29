@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-7 p-4 offset-md-1">
            <h3 class="center-text">Approved Projects</h3>

            @if(count($projects) > 0)
            @foreach($projects as $project)
                <h5> <a href="/projects/{{$project->id}}">{{$project->title}} </a></h5>
                @foreach($project->tags as $tag)
                    <span class="tag">{{$tag->name}}</span>
                @endforeach
                <hr>
            @endforeach

            @else
                <h2>You don't have any approved project</h2>
            @endif
            {{--{{$projects->links()}}--}}
        </div>

        <!--- Tag Side Bar -->
        <div class="col-12 col-md-3">
            @include('partials.tags')
        </div>
    </div>
@endsection