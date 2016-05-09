<div class="container">
    <div class="row">
        <h4>Welcome, {{ Auth::user()->name }}</h4>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="text-center">{{ $heading }}</h5>
            </div>
            <ul class="nav navbar-left col-sm-2">
                <li><a href="/dashboard">My Projects</a></li>
                <li><a href="/dashboard/messages">Messages</a></li>
                <li><a href="/dashboard/notifications">Notifications</a></li>
            </ul>
            <div class="panel-body">
                @yield('content')
            </div>
        </div>
    </div>
</div>