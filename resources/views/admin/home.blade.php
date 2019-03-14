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
                        <td>
                            <a href="projects/download/project/{{$project->id}}" class="btn btn-primary">Download</a> &nbsp;
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Approve
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="admin/approve/project/{{$project->id}}">With chapters</a>
                                <a class="dropdown-item" href="admin/approve/project/{{$project->id}}/without-chapter">Without chapters</a>
                            </div>

                            {{--<a href="admin/approve/project/{{$project->id}}" class="btn btn-success">Approve with chapters</a>--}}
                            </td>
                        <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$project->id}}">Delete</a> </td>
                        <td>{{$project->created_at->diffForHumans()}}</td>
                    </tr>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   Are you sure you want to delete project: {{$project->title}}
                                </div>
                                <div class="modal-footer">
                                    <a href="/admin/project/softdelete/{{$project->id}}" class="btn btn-secondary" >Temporarily</a>
                                    <a href="/admin/project/delete/{{$project->id}}" type="button" class="btn btn-danger">Permanently</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
