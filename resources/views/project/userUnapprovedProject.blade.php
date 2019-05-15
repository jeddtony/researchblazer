@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-7 p-4 offset-md-1">
            <h3 class="center-text">Unapproved Projects</h3>

            @if(count($projects) > 0)
            @foreach($projects as $project)
                <h5> <a href="/projects/{{$project->id}}">{{$project->title}} </a></h5>

                    <span class="tag">{{$project->tag}}</span>

                <hr>
            @endforeach

            @else
                <h2>You don't have any project yet</h2>
            @endif

            {{--{{$projects->links()}}--}}
        </div>

        <!--- Tag Side Bar -->
        <div class="col-12 col-md-3">
            @include('partials.tags')
        </div>
    </div>
@endsection