@extends('layouts.master')
@section('scripts')
    <script src="{{ asset('js/steps.js') }}"></script>
    <script src="{{ asset('js/campaign-view.js') }}"></script>
@stop
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $campaign->name }}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-14 campaign-container">

                <ul class="nav nav-pills">
                    <li id="overview" class="active steps-navigation"><a href="#">Overview</a></li>
                    <li id="about" class="steps-navigation"><a href="#">About</a></li>
                    <li id="rewards" class="steps-navigation"><a href="#">Rewards</a></li>
                    <li id="fund" class="steps-navigation"><a href="#">Fund this</a></li>
                    <li id="message" class="steps-navigation"><a href="#">Message Creator</a></li>
                </ul>
                <hr />

                <div class="overview">
                    <div class="thumbnail">

                        <img class="img-responsive" src="http://placehold.it/800x300" alt="{{ $campaign->name }}">

                    </div>
                </div>

                <div class="about">

                    <h4>{{ $campaign->description }}</h4>

                </div>

                <div class="rewards">
                    <p>List of rewards</p>
                </div>

                <div class="fund">
                    {!! Form::open(array('url' => $campaign->id . '/pay', 'method' => 'post', 'class' => 'form-horizontal')) !!}
                    {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'placeholder' =>  'R']) !!}
                    {!! Form::submit('Fund this', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>

                <div class="message">
                    {!! Form::open(['route' => 'store/']) !!}
                    <div class="col-md-12">
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message', 'style' => 'resize: none']) !!}
                        </div>

                        <input type="hidden" name="recipients[]" value="{!!$campaign->user_id!!}">
                    <!-- Submit Form Input -->
                        <div class="form-group">
                            {!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <hr />
                @if($percentFunded >= 100)
                    <h4 align="center">This campaign has been successfully funded.</h4>
                @else
                    <h4>Funding Progress of {{ $campaign->amount }} needed.</h4>
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