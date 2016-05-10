@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @if(!empty($projects))
                @foreach($projects as $project)
                    <div class="col-md-4">
                        <h4><a href="/view-project/{{ $project->id }}">{{ $project->name }}</a></h4>
                        <a href="/{{ $project->category->slug }}/projects"><span class="label label-default">{{ $project->category->label }}</span></a>
                        {{--@if($percentFunded == 100)--}}
                        {{--<span class="label label-success">{{ $project->projectStatus->label }}</span>--}}
                        {{--@endif--}}
                        <div class="thumbnail">
                            <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                            <hr />
                            <p>{{ $project->description }}</p>
                            <a href="#"> Read More</a>
                            <?php $percentFunded = ProjectModule::percentFunded($project);?>
                            <hr />
                            @if($percentFunded >= 100)
                                <h6 align="center">This project has been successfully funded.</h6>
                            @else
                                <h6 align="center">Funding Progress of {{ $project->amount }} needed.</h6>
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
                                projects, <a href="/create">create one</a> and be the first!
                            </h4>

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection