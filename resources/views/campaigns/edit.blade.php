@extends('layouts.master')

@section('scripts')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    {{--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}
    {{--<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>--}}
    <script src="{{ asset('js/steps.js') }}"></script>
    <script src="{{ asset('js/campaign-edit.js') }}"></script>
    @stop

    @section('content')
            <!-- Page Content -->
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $name }}</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-14 campaign-container">
                    <ul class="nav nav-pills">
                        <li id="basic-information" class="active"><a href="#">Basic information</a></li>
                        <li id="page-setup" ><a href="#">Page setup</a></li>
                        <li id="rewards" ><a href="#">Add rewards</a></li>
                    </ul>
                    <hr />
                    <div class="basic-information">
                        <fieldset>
                            {!! Form::open(array('url' => 'update-campaign/' . $campaignId, 'method' => 'post', 'id' => 'campaign-edit-form', 'class' => 'form-horizontal')) !!}
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
                                {!! Form::label('campaign_category_id', 'Category', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::select('campaign_category_id', $campaignCategories, $campaignCategoryId, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="page-setup">
                        <form>
                        <textarea name="editor1" id="editor1" rows="20" cols="100">

                        </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </form>
                    </div>
                    <div class="rewards">

                    </div>

                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Back', ['id' => 'backButton', 'class' => 'btn btn-primary']) !!}
                        {!! Form::submit('Next', ['id' => 'nextButton', 'class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                </fieldset>
            </div>
        </div>
        <!-- /.container -->
@endsection
