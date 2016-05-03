@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Welcome, {{ Auth::user()->name }}</h4>
            <br/>
            {!! \App\Modules\FormModule::open('Profile') !!}
            {!! \App\Modules\FormModule::field('text', 'About you') !!}
            {!! \App\Modules\FormModule::field('text', 'something') !!}
            {!! \App\Modules\FormModule::close('save') !!}
        </div>
    </div>
@endsection