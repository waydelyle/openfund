@extends('layouts.master')

@section('content')
    <!-- resources/views/auth/login.blade.php -->
    <div class="container">
        <div class="col-lg-10">
            <fieldset>
                {!! Form::open(array('url' => 'auth/login', 'method' => 'post', 'class' => 'form-horizontal')) !!}

                    @include('form.form-validation-errors', ['errors' => !empty($errors) ? $errors : 0])

                    <legend align="center">Log In</legend>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::password('password', old('password'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" align="center">
                        <input type="checkbox" name="remember"> Remember Me
                    </div>

                    <div class="form-group" align="center">
                        {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </fieldset>
        </div>
    </div>
@endsection
