@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-10">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Name</th>
                <th>Campaign category</th>
                <th>Funding needed</th>
                <th>Funding received</th>
                <th>Campaign status</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($campaigns))
                @foreach($campaigns as $campaign)
                    <tr>
                        @if($campaign->campaignStatus->id == \App\CampaignStatus::PENDING_ID)
                            <td><a href="/edit-campaign/{{ $campaign->id }}">{{ $campaign->name }}</a></td>
                        @else
                            <td><a href="/view-campaign/{{ $campaign->id }}">{{ $campaign->name }}</a></td>
                        @endif
                        <td>{{ $campaign->category->label }}</td>
                        <td>{{ $campaign->amount }}</td>
                        <td>{{ $campaign->amount }}</td>
                        <td>{{ $campaign->campaignStatus->label }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection