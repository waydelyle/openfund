@extends('layouts.master')

@section('content')
        <!-- Page Content -->
<div class="container">
    <div class="row">
        @if(!empty($campaigns))
            @foreach($campaigns as $campaign)
                <div class="col-md-4">
                    <h4><a href="/view-campaign/{{ $campaign->id }}">{{ $campaign->name }}</a></h4>
                    <a href="/{{ $campaign->category->slug }}/campaigns"><span class="label label-default">{{ $campaign->category->label }}</span></a>
                    {{--@if($percentFunded == 100)--}}
                    {{--<span class="label label-success">{{ $campaign->campaignStatus->label }}</span>--}}
                    {{--@endif--}}
                    <div class="thumbnail">
                        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                        <hr />
                        <p>{{ $campaign->description }}</p>
                        <a href="#"> Read More</a>
                        <?php $percentFunded = CampaignModule::percentFunded($campaign);?>
                        <hr />
                        @if($percentFunded >= 100)
                            <h6 align="center">This campaign has been successfully funded.</h6>
                        @else
                            <h6 align="center">Funding Progress of {{ $campaign->amount }} needed.</h6>
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
            @endforeach
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h4>
                            There are currently no active
                            @if(!empty($category)) {{ $category->name }} @endif
                            campaigns, <a href="/create">create one</a> and be the first!
                        </h4>

                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection