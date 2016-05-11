@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
        {!! CampaignModule::display(1) !!}
        </div>
    </div>
@endsection
