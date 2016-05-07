@extends('layouts.master')

@section('scripts')
    <script src="{{ asset('js/project-edit.js') }}"></script>
@stop

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $name }}</h3>
            </div>
            <div class="panel-body">
            <div class="col-md-14 project-container">
                <ul class="nav nav-pills">
                    <li id="basic" class="active"><a href="#">Basic information</a></li>
                    <li id="page" ><a href="#">Page setup</a></li>
                    <li id="rewards" ><a href="#">Add rewards</a></li>
                    <li id="fund" ><a href="#">Fund this</a></li>
                </ul>
                <hr />

                    <div class="basic">
                        <fieldset>
                            {!! Form::open(array('url' => 'create', 'method' => 'post', 'class' => 'form-horizontal')) !!}
                            <legend>{{ $heading }}</legend>

                            @include('form.form-validation-errors', ['errors' => !empty($errors) ? $errors : 0])

                            <div class="form-group">
                                {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::text('name', $name, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Short description', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::textarea('description', $description, ['size' => '2x2', 'class' => 'form-control', 'maxlength' => 140]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('amount', 'Funding needed', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::number('amount', $amount, ['class' => 'form-control', 'placeholder' =>  'R']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('project_category_id', 'Category', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::select('project_category_id', $projectCategories, $projectCategoryId, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                    </div>
                    <div class="page">

                    </div>
                    <div class="rewards">

                    </div>

            </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::reset('Reset all', ['class' => 'btn btn-default']) !!}
                        {!! Form::submit('Submit for review', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                </fieldset>
        </div>
    </div>
    <!-- /.container -->
@endsection
