@extends('layouts.dashboard')

@section('content')
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('error_message') !!}
        </div>
    @endif
    @if($threads->count() > 0)
        @foreach($threads as $thread)
            <div class="container">
                <div class="col-md-10 pull-right">
                    @if($thread->isUnread($currentUserId))
                        <div class="panel panel-warning">
                    @else
                        <div class="panel panel-primary">
                    @endif
                            <div class="panel-heading">
                                <h4 class="panel-title">{!! link_to('message/show/' . $thread->id, $thread->subject) . ' - ' . $thread->participantsString(Auth::id())!!}</h4>
                            </div>
                            <div class="panel-body">
                                <p>{!! substr($thread->latestMessage->body, 0, 50) . '...' !!}</p>
                            </div>
                        </div>
                </div>
            </div>
        @endforeach
    @else
        <p>Sorry, no threads.</p>
    @endif
@endsection