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
                    Create Tags
                </h4>
                {{--<h5>{{$project->title}}</h5>--}}
                <div class="row" id="app">
                    <div class="col-md-12">
                        <div class="row" style="padding-top: 20px; padding-left: 15px">
                            <div class="col-12 col-md-12">
                                <form action="{{route('createTag')}}" method="POST" >
                                    @csrf
                                    <label>Name:</label>
                                    <input type="text" name="name[]" class="form-control mb-2 mr-sm-2 col-md-8 col-12" required>

                                    <label>Name:</label>
                                    <input type="text" name="name[]" class="form-control mb-2 mr-sm-2 col-md-8 col-12" required>

                                    <label>Name:</label>
                                    <input type="text" name="name[]" class="form-control mb-2 mr-sm-2 col-md-8 col-12" required>

                                    <label>Name:</label>
                                    <input type="text" name="name[]" class="form-control mb-2 mr-sm-2 col-md-8 col-12" required>

                                    <label>Name:</label>
                                    <input type="text" name="name[]" class="form-control mb-2 mr-sm-2 col-md-8 col-12" required>

                                    <div class="py-4">
                                        <input type="submit" class=" btn btn-primary col-2 col-md-1">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection