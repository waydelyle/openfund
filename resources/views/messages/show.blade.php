
@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <h3>{!! $thread->subject !!}</h3>

        @foreach($thread->messages as $message)
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5>{!! $message->user->name !!}</h5>
                    <br/>
                    <p>{!! $message->body !!}</p>
                    <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                </div>
            </div>
        @endforeach

        <h2>Add a new message</h2>
        {{--{!! Form::open(['route' => ['message/update/' . $thread->id], 'method' => 'PUT']) !!}--}}
    <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>

    <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop