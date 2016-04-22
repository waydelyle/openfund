@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Welcome, {{ $user->name }}</h4>
            <div class="col-md-4">
                <div class="thumbnail">
                    <div class="caption-full">
                        <h4><a href="/projects">View your projects</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <div class="caption-full">
                        <h4><a href="/create">Create a new project</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection