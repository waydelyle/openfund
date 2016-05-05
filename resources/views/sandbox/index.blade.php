@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
        {!! ProjectModule::display(1) !!}
        </div>
    </div>
@endsection
