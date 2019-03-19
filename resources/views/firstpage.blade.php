@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row home-image" >
        <div class="col-md-12 big-top-margin">
            <div class="row py-4">

                <div class="col-md-6 offset-md-1 top-margin">
                    <h1>Get well written tertiary institutions projects with ease</h1>

                </div>
            </div>
                {{--<div class="col-2 col-md-3"></div>--}}
                <div class="row py-4 ">
                    <div class="col-6 col-md-6 offset-1">
                        <a href="/projects" class="btn btn-lg btn-success"><h4>Buy Projects </h4></a> &nbsp;
                        <a href="/projects/create" class="btn btn-lg btn-outline-light"><h4>Upload Projects </h4></a>
                    </div>
                </div>
            </div>
        </div>

    <div class="row py-4 ">
        <div class="col-12 col-md-12 py-4">
            <h2 class="center-text"> What is Researchub</h2>
        </div>
        <div class="py-4 col-md-6 offset-md-3 big-text">
            <strong>For Uploaders: </strong>Have you written a wonderful project? Why not upload it here and earn from every single download of your project
        </div>
        <div class="py-1 col-md-6 offset-md-3 big-text">
            <strong>For Downloaders: </strong>We know the process of writing a project is hard, why not make it lighter by downloading
            a project of your choice. <em>Don't work hard work smart. </em>
        </div>
    </div>

    <div class="row greybackground">
        <div class="col-12 col-md-12 py-4">
            <h2 class="center-text"> Features</h2>
        </div >
        <div class="py-4 col-12 col-md-3 offset-md-2">
            <span style="padding-left: 40%"> <i class="fas fa-award fontawesome-icon"></i></span>
            <h5 class="center-text">Verified Contents</h5>
            <p>All our projects are proofread to eliminate plagiarism, and enforce accuracy.
                Your supervisor won't know it was downloaded.</p>
        </div>

        <div class="py-4 col-12 col-md-3 ">
            <span style="padding-left: 40%"> <i class="fas fa-search fontawesome-icon"></i></span>
            <h5 class="center-text">Transparency</h5>
            <p>For uploaders, you get a customized dashboard that allows you to have
                100% control of your uploads, and see your expected earnings.</p>
        </div>

        <div class="py-4 col-12 col-md-3 ">
            <span style="padding-left: 40%"> <i class="far fa-money-bill-alt fontawesome-icon"></i></span>
            <h5 class="center-text">Earn </h5>
            <p>Add your account details and earn from downloads.<br>
                This feature is optional, you may choose not to add your account details but you won't be rewarded.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 py-4">
            <h2 class="center-text">How it works</h2>
        </div >
    </div>
    <div class="p-4  d-flex flex-wrap">
        <div class="order-2 p-2 col-12 offset-md-2 col-md-4">
            <h5>Submit your project</h5>
            <p class="py-1">No obligation no frills, We will check for suitability and get back to you immediately. Please check your email regualarly.</p>
        </div>

        <div class="order-1 p-2 offset-4 offset-md-2" >
            <img src="{{ asset('img/upload-icon-2.png') }}" class="how-it-works-icon">
        </div>
    </div>

    <div class="p-4  d-flex flex-wrap">
        <div class="order-2 order-md-1 p-2 col-12 offset-md-2 col-md-4">
            <h5>Add your bank account</h5>
            <p class="py-1">Though this is optional, but it is highly recommended if your want to earn on this site.
                <strong>We wont share your data with anyone.</strong></p>
        </div>

        <div class="order-1 order-md-2 p-2 offset-4 offset-md-2" >
            <img src="{{ asset('img/fill-bank-account-2.png') }}" class="how-it-works-icon">
        </div>
    </div>

    <div class="p-4  d-flex flex-wrap">
        <div class="order-2 p-2 col-12 offset-md-2 col-md-4">
            <h5>Receive credit alerts</h5>
            <p class="py-1">You get paid each time your project is being downloaded.
                This will only be possible if you have filled your bank account details</p>
        </div>

        <div class="order-1 p-2 offset-4 offset-md-2" >
            <img src="{{ asset('img/wallet-cash.svg') }}" class="how-it-works-icon">
        </div>
    </div>
</div>
    @endsection