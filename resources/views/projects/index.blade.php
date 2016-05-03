@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            {{
            \App\Modules\ProjectModule::listProjects()
            }}
        </div>

    </div>
    <!-- /.container -->
@endsection
