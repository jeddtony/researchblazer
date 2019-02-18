@extends('layouts.projectapp')
@section('content')

    <div class="row p-4">
        @if(session('status'))
        <div class="col-md-4 offset-md-2">
            <div class="alert alert-success alert-dismissible fade show"
                 role="alert" >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{session('status')}}
            </div>
        </div>
        @endif
        <div class="col-md-5 offset-md-2">
            <h4>Create new project</h4>
            <form method="post" action="/project/create" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                           placeholder="Project Title" required>
                </div>
                <div class="form-group">
                <input type="file" name="project" accept="application/pdf,.doc,.docx"  required>
                </div>

                @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="inlineCheckbox{{$tag->id}}" value="{{$tag->id}}">
                    <label class="form-check-label" for="inlineCheckbox{{$tag->id}}">{{$tag->name}}</label>
                </div>
                @endforeach
                <div class="form-group p-4">
                <button type="submit" class="btn btn-primary"> Submit</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            @include('partials.tags')
        </div>
    </div>
    @endsection