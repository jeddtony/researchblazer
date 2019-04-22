@extends('layouts.uploadapp')
@section('content')

    <div class="row p-4">
        @if(session('status'))
        <div class="col-md-4 offset-md-2">
            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{session('status')}}
            </div>
        </div>
        @endif
        <div class="col-md-5 offset-md-2" id="root">
            <h4>Create new project</h4>
            <form method="post" action="/projects/create" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" v-model="title" id="title" class="form-control"  name="title"
                           placeholder="Project Title" required>
                </div>
                <div class="form-group">
                <input type="file" name="project" id="project" accept="application/pdf,.doc,.docx" ref="myFile"  v-on:change="project" required>
                </div>

                @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tags[]" id="inlineCheckbox{{$tag->id}}" value="{{$tag->id}}">
                    <label class="form-check-label" for="inlineCheckbox{{$tag->id}}">{{$tag->name}}</label>
                </div>
                @endforeach
                <div class="form-group p-4">
                    <button type="submit"  class="btn btn-primary"> Submit</button>
                    {{--<button type="button" v-on:click="uploadFile" class="btn btn-primary"> Submit</button>--}}
                </div>
            </form>



            <h4>For your project to be approved it must meet the following criteria</h4>
            <p>
                <ul>
                    <li>It has an abstract</li>
                <li>All the chapters are complete, no missing pages or chapters</li>
                <li>All necessary diagrams are included</li>
                <li>The reference pages must be included</li>
                <li>You can remove the following pages Acknowledgement, Dedication, Approval Page and the likes</li>
            </ul>
            </p>
        </div>

        <div class="col-md-4">
            @include('partials.tags')
        </div>
    </div>
    @endsection