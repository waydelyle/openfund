@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">
    @section('scripts')
        <script src="{{ asset('js/project-display.js') }}"></script>
    @endsection

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $project->name }}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-14 project-container">

                <ul class="nav nav-pills">
                    <li id="overview" class="active"><a href="#">Overview</a></li>
                    <li id="about" ><a href="#">About</a></li>
                    <li id="rewards" ><a href="#">Rewards</a></li>
                    <li id="fund" ><a href="#">Fund this</a></li>
                </ul>
                <hr />
                <div class="overview">
                    <div class="thumbnail">

                        <img class="img-responsive" src="http://placehold.it/800x300" alt="{{ $project->name }}">

                    </div>
                </div>
                <div class="about">

                    <h4>{{ $project->description }}</h4>

                </div>
                <div class="rewards">
                    {!! Form::open(array('url' => $project->id . '/pay', 'method' => 'post', 'class' => 'form-horizontal')) !!}
                    {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'placeholder' =>  'R']) !!}
                    {!! Form::submit('Fund this', ['class' => 'btn btn-primary']) !!}
                </div>
                <hr />
                @if($percentFunded >= 100)
                    <h4 align="center">This project has been successfully funded.</h4>
                @else
                    <h4>Funding Progress of {{ $project->amount }} needed.</h4>
                @endif
                <div class="progress progress-striped active">
                    @if($percentFunded >= 100)
                        <div class="progress-bar progress-bar-success" style="width: {{ $percentFunded }}%"></div>
                    @else
                        <div class="progress-bar" style="width: {{ $percentFunded }}%"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->
@endsection
