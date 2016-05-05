@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">
{!! ProjectModule::display($projectId) !!}
</div>
<!-- /.container -->
@endsection
