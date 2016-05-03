@if(!empty($projects[0]))
    @foreach($projects as $project)
        <div class="col-md-4">

            <div class="thumbnail">
                <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                <div class="caption-full">
                    <h4 class="pull-right">{{ $project->amount }}</h4>
                    <h4><a href="/edit-project/{{ $project->id }}">{{ $project->name }}</a>
                    </h4>
                    <p>{{ $project->description }}</p>
                </div>
                <h4>Funding Progress</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar" style="width: 45%"></div>
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