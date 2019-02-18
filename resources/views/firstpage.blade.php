@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row home-image">
        <div class="col-md-12 big-top-margin">
            <div class="row py-4">

                <div class="col-md-6 offset-md-1">
                    <h1>Get Quality Tertiary institutions projects with ease</h1>

                </div>
            </div>
                {{--<div class="col-2 col-md-3"></div>--}}
                <div class="row py-4 top-margin">
                    <div class="col-6 col-md-6 offset-1">
                        <a href="/projects" class="btn btn-lg btn-success"><h4>Buy Projects </h4></a> &nbsp;
                        <a href="/projects/create" class="btn btn-lg btn-outline-secondary"><h4>Upload Projects </h4></a>
                    </div>
                </div>
            </div>
        </div>

    <div class="row style-text top-margin white-background">
        <div class="col-7 col-md-7 offset-3">
            <h3> <strong>Need a Project? </strong></h3>
            <p>It's easy, Simply select a project from the project category listed</p>
            <p>If you don't find a project that suites your need, simply post the project of your choice on our forums
                and we will get start working on it ASAP</p>
            <h3><strong>What's great about it?</strong></h3>
            <p><i class="fas fa-check"></i> If you want us to <strong> write </strong>for you, you only have to pay for work when it is completed and you're 100% satisfied</p>
            <p><i class="fas fa-check"></i> If want to <strong>buy </strong> You can select the chapters of the project you want to pay for, and pay for them</p>
            <p><i class="fas fa-check"></i> If you want to <strong>upload</strong> you will be paid promptly for every of your project being bought</p>
        </div>
    </div>
</div>
    @endsection