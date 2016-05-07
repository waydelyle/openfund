@extends('layouts.master')

@section('content')
    @include('projects.listProjects', ['projects' => $projects])
@endsection
