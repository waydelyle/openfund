@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            {!! ProjectModule::listProjects(9, null, Auth::user()->id) !!}
        </div>

    </div>
    <!-- /.container -->
@endsection
