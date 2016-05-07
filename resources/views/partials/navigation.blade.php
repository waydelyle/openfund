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
                {!! ProjectModule::renderNavigationDropDown() !!}
                <li><a href="/create">Create Your Own</a></li>
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Messages <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Inbox</a>
                        <span class="badge">3</span></li>
                        <li><a href="#">Send Message</a></li>
                    </ul>
                </li>
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
                    <li><a href="home">Home</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation -->