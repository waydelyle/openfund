@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-10">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Project category</th>
                    <th>Funding needed</th>
                    <th>Funding received</th>
                    <th>Project status</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($projects))
                    @foreach($projects as $project)
                        <tr>
                            @if($project->projectStatus->id == 1)
                                <td><a href="/edit-project/{{ $project->id }}">{{ $project->name }}</a></td>
                            @else
                                <td><a href="/view-project/{{ $project->id }}">{{ $project->name }}</a></td>
                            @endif
                            <td>{{ $project->category->label }}</td>
                            <td>{{ $project->amount }}</td>
                            <td>{{ $project->amount }}</td>
                            <td>{{ $project->projectStatus->label }}</td>
                        </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
    </div>
@endsection