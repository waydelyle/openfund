<!-- Navigation -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ env('SITE_NAME') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                {!! CampaignModule::renderNavigationDropDown() !!}
                <li><a href="/create">Create Your Own</a></li>
                @if(Auth::check())
                    <li><a href="/dashboard">Dashboard</a></li>
                @endif
            </ul>
            {!! Form::open(array('url' => 'search', 'method' => 'post', 'class' => 'navbar-form navbar-right')) !!}
            <div class="form-group">
                {!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' =>  'Search']) !!}

            </div>
            {!! Form::submit(' &#9654; ', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::check())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li><a href="/">Home</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation -->