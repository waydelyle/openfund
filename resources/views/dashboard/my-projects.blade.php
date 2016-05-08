@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-10">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Project category</th>
                    {{--<th>Project status</th>--}}
                    <th>Funding needed</th>
                    <th>Funding received</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($projects))
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->category->label }}</td>
                            <td>{{ $project->projectStatus->label }}</td>
                            <td>Column content</td>
                        </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
    </div>
@endsection