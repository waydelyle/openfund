@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
        {!! \App\Modules\ProjectModule::display(1) !!}
        </div>
    </div>
@endsection
