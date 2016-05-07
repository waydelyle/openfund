@extends('layouts.master')

@section('content')
        <!-- Page Content -->
    <div class="container">
        <div class="row">
            {!! ProjectModule::listProjects(10, $projectCategorySlug) !!}
        </div>
    </div>
        <!-- /.container -->
@endsection
