
@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <h3>{!! $thread->subject !!}</h3>

        @foreach($thread->messages as $message)
            @if($message->user->id != Auth::user()->id)
                <div class="panel panel-success">
            @else
                <div class="panel panel-primary">
            @endif
                <div class="panel-heading">{!! $message->user->name !!}</div>
                <div class="panel-body">
                    <p>{!! $message->body !!}</p>
                    <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                </div>
            </div>
        @endforeach

        <h2>Add a new message</h2>
        {!! Form::open(['route' => ['update/', $thread->id], 'method' => 'PUT']) !!}
    <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>

    <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop