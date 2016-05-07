@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <fieldset>
        {!! Form::open(array('url' => 'create', 'method' => 'post', 'class' => 'form-horizontal')) !!}
                <legend>{{ $heading }}</legend>

                @include('form.form-validation-errors', ['errors' => !empty($errors) ? $errors : 0])

              <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' =>  'Project Name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Short description', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::textarea('description', old('description'), ['size' => '2x2', 'class' => 'form-control', 'maxlength' => 140]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('amount', 'Funding needed', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'placeholder' =>  'R']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('project_category_id', 'Category', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::select('project_category_id', $projectCategories, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </fieldset>
    </div>
    <!-- /.container -->
@endsection
