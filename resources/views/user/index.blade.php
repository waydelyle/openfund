@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Welcome, {{ $user->name }}</h4>
            <br/>
            <div class="col-md-4">
                <div class="thumbnail">
                    <div class="caption-full" align="center">
                        <h4><a href="/projects">View Your Projects</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail" align="center">
                    <div class="caption-full">
                        <h4><a href="/create">Create A New Project</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail" align="center">
                    <div class="caption-full">
                        <h4><a href="#">Edit Your Profile</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection