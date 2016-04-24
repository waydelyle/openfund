@extends('layouts.master')

@section('content')
        <!-- resources/views/auth/login.blade.php -->
<div class="container">
    <div class="col-lg-10">
        <fieldset>
            <form class="form-horizontal" method="POST" action="/auth/login">
                {!! csrf_field() !!}

                <legend align="center">Log In</legend>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="password" name="password" id="password">
                    </div>
                </div>

                <div class="form-group" align="center">
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="right"
                            title="Log in to your account">Login
                    </button>
                </div>
            </form>
        </fieldset>
    </div>
</div>
@endsection
