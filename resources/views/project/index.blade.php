@extends('layouts.projectapp')
@section('content')
    <div class="row">
        <div class="col-12 col-md-7 p-4 offset-md-1">
            <h3 class="center-text">Projects </h3>
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Popular')" id="defaultOpen">Popular</button>
                <button class="tablinks" onclick="openCity(event, 'Latest')">Latest</button>

            </div>

            <div id="Popular" class="tabcontent">
                <h4 class="center-text">Popular</h4>
                @foreach($populars as $popular)
                    <h5> <a href="/projects/{{$popular->id}}">{{$popular->title}} </a></h5>
                {{--@foreach($popular->tags as $tag)--}}
                    {{--<span class="tag">{{$tag->name}}</span>--}}
                    {{--@endforeach--}}

                <span class="username"> By: {{$popular->user->name}}</span>
                    <hr>
                    @endforeach
            </div>

            <div id="Latest" class="tabcontent">
                <h3 class="center-text">Latest</h3>
                @foreach($latests as $latest)
                    <h5> <a href="/projects/{{$latest->id}}"> {{$latest->title}} </a></h5>
                    {{--@foreach($latest->tags as $tag)--}}
                        {{--<span class="tag">{{$tag->name}}</span>--}}
                    {{--@endforeach--}}

                    <span class="username"> By: {{$latest->user->name}}</span>
                    <hr>
                @endforeach
            </div>

            <h5><a href="projects/popular" id="popularLink">View all popular projects</a>
            <a href="projects/latest" id="latestLink">View all latest projects</a> </h5>
        </div>

        <!--- Tag Side Bar -->
<div class="col-12 col-md-3">
       @include('partials.tags')
</div>
    </div>
    @endsection