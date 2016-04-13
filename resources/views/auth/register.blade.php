@extends('layouts.master')

@section('content')
        <!-- resources/views/auth/register.blade.php -->
<div class="container">
    <div class="col-lg-10">
        <form class="form-horizontal" method="POST" action="/auth/register">
            {!! csrf_field() !!}
            <fieldset>
                <legend align="center">Register</legend>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="col-lg-2 control-label">Confirm Password</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="right"
                            title="Submit your information">Register
                    </button>
                </div>
            </fieldset>

        </form>
    </div>
</div>
@endsection