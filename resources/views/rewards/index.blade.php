@extends('layouts.master')

@section('content')
        <!-- Page Content -->
<div class="container">

    <div class="row">
        @if(!empty($campaigns))
            @foreach($campaigns as $campaign)
                <div class="col-md-4">

                    <div class="thumbnail">
                        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                        <div class="caption-full">
                            <h4 class="pull-right">{{ $campaign->amount }}</h4>
                            <h4><a href="/edit-campaign/{{ $campaign->id }}">{{ $campaign->name }}</a>
                            </h4>
                            <p>{{ $campaign->description }}</p>
                        </div>
                        <h4>Funding Progress</h4>
                        <div class="progress progress-striped active">
                            <div class="progress-bar" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>
<!-- /.container -->
@endsection
