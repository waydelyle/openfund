@section('scripts')
    <script src="{{ asset('js/project-display.js') }}"></script>
@stop

<div class="col-md-14 project-container">

    <h1>{{ $project->name }}</h1>
     <ul class="nav nav-pills">
         <li id="overview" class="active"><a href="#">Overview</a></li>
         <li id="about" ><a href="#">About</a></li>
         <li id="rewards" ><a href="#">Rewards</a></li>
         <li id="fund" ><a href="#">Fund this</a></li>
     </ul>
    <hr />
    <div class="overview">
        <div class="thumbnail">

            <img class="img-responsive" src="http://placehold.it/800x300" alt="{{ $project->name }}">

        </div>
    </div>
    <div class="about">

        <h4>{{ $project->description }}</h4>

    </div>
    <div class="rewards">

    </div>
    <hr />

    <h4>Funding Progress of {{ $project->amount }} needed.</h4>
    <div class="progress progress-striped active">
        {{--{{ //todo wayde render different bars depending on percentage funded. }}--}}
        <div class="progress-bar" style="width: {{ $percentFunded }}%"></div>
    </div>
</div>