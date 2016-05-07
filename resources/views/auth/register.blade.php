@extends('layouts.master')

@section('content')
    <!-- resources/views/auth/register.blade.php -->
    <div class="container">
        <div class="col-lg-10">
            <fieldset>
                {!! Form::open(array('url' => 'auth/register', 'method' => 'post', 'class' => 'form-horizontal')) !!}

                    @include('form.form-validation-errors', ['errors' => !empty($errors) ? $errors : 0])

                    <legend align="center">Register</legend>
                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

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

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::password('password_confirmation', old('password_confirmation'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group" align="center">
                            {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
                        </div>
                {!! Form::close() !!}
            </fieldset>
        </div>
    </div>
@endsection