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

                <h4>Unapproved Projects</h4>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" colspan="2">Topic</th>
                        <th scope="col">Action</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $counter = 0;
                    ?>
                    @foreach($projects as $project)
                    <tr>
                        <th scope="row">{{++$counter}}</th>
                        <td>{{$project->user->name}}</td>
                        <td colspan="2">{{$project->title}}</td>
                        <td><a href="projects/download/project/{{$project->id}}" class="btn btn-primary">Download</a> &nbsp;
                            <a href="admin/approve/project/{{$project->id}}" class="btn btn-success">Approve</a> </td>
                        <td><a href="#" class="btn btn-danger">Delete</a> </td>
                        <td>{{$project->created_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
