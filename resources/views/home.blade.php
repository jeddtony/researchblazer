@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row big-top-margin">
        <div class="col-12 col-md-3 ">
            <div class="card">
                <div class="card-header" style="background-color: #1f6fb2; color: white">
                    Approved Projects
                </div>
                <div class="card-body">
                    <h4>{{$approvedProjects}}</h4>
                    <a href="#" class="btn btn-outline-primary">View all</a>
                </div>
            </div>
        </div>

    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-header">
                Unapproved Projects
            </div>
            <div class="card-body">
                <h4>{{$unapprovedProjects}}</h4>
                <a href="#" class="btn btn-outline-primary">View all</a>
            </div>
        </div>
    </div>

        <div class="col-12 col-md-3 ">
            <div class="card">
                <div class="card-header" style="background-color: #20c997; color: white">
                    Projects downloaded
                </div>
                <div class="card-body">
                    <h4>55</h4>
                    <a href="#" class="btn btn-outline-primary">View all</a>
                </div>
            </div>
        </div>
</div>

</div>
@endsection
