@extends('layouts.adminapp')

@section('content')
    <div class="container-fluid">
        <div class="row py-4">
            <div class="col-md-3">
                @include('partials.adminSideBar')
            </div>

    <div class="col-md-9">
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
        <h4>
            Upload Chapters
        </h4>
            <h5>{{$project->title}}</h5>
        <div class="row" id="app">
            <div class="col-md-12">
                <div class="row" style="padding-top: 20px; padding-left: 15px">
                    <form action="/admin/approve/project/{{$project->id}}" method="POST" class="form-row" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="col-md-9">
                        <textarea class="form-control offset-md-1" placeholder="Abstract" name="abstract"></textarea>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <label class="form-group col-md-1 col-2" for="inlineFormInputName2">Chapter 1: </label>
                        <input type="text" name="title[]" class="form-control mb-2 mr-sm-2 col-md-7 col-7" id="inlineFormInputName2" placeholder="Title chapter one" required>
                        <input type="file" name="chapter[]" class="col-md-3 col-3" id="exampleFormControlFile1" required>

                        <label class="form-group col-md-1 col-2" for="inlineFormInputName2">Chapter 2: </label>
                        <input type="text" name="title[]" class="form-control mb-2 mr-sm-2 col-md-7 col-7" id="inlineFormInputName2" placeholder="Title chapter Two" required>
                        <input type="file" name="chapter[]" class="col-md-3 col-3" id="exampleFormControlFile1" required>

                        <label class="form-group col-md-1 col-2" for="inlineFormInputName2">Chapter 3: </label>
                        <input type="text" name="title[]" class="form-control mb-2 mr-sm-2 col-md-7 col-7" id="inlineFormInputName2" placeholder="Title chapter Three" required>
                        <input type="file" name="chapter[]" class="col-md-3 col-3" id="exampleFormControlFile1" required>

                        <label class="form-group col-md-1 col-2" for="inlineFormInputName2">Chapter 4: </label>
                        <input type="text" name="title[]" class="form-control mb-2 mr-sm-2 col-md-7 col-7" id="inlineFormInputName2" placeholder="Title chapter Four" required>
                        <input type="file" name="chapter[]" class="col-md-3 col-3" id="exampleFormControlFile1" required>

                        <label class="form-group col-md-1 col-2" for="inlineFormInputName2">Chapter 5: </label>
                        <input type="text" name="title[]" class="form-control mb-2 mr-sm-2 col-md-7 col-7" id="inlineFormInputName2" placeholder="Title chapter Five" required>
                        <input type="file" name="chapter[]" class="col-md-3 col-3" id="exampleFormControlFile1" required >

                        <div class="col-md-12">
                        <div id="addInput" class="row">

                        </div>
                        </div>
                        <span class=" col-md-7 col-7">
                            <button type="button" class="btn btn-secondary" @click="addForm()">Add Chapters</button> </span>
                        <input type="submit" class="form-control btn btn-primary col-2 col-md-1">
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    @endsection