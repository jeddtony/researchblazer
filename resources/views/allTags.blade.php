@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-7 p-4 offset-md-1">
            <h3 class="center-text">Showing All Categories</h3>

            @foreach($tags as $tag)
                <h5> <a href="/tags/{{$tag->name}}">{{$tag->name}} </a></h5>
                 <hr>
            @endforeach

            {{--{{$projects->links()}}--}}
        </div>

        <!--- Tag Side Bar -->
        <div class="col-12 col-md-3 py-4">
            @include('partials.tags')
        </div>
    </div>
@endsection