@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">

    <fieldset>
    <form class="form-horizontal" method="POST" action="/create">
            <legend>{{ $heading }}?></legend>
            {{ csrf_field() }}
          <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Project Name">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-lg-2 control-label">Description</label>
                <div class="col-lg-10">
                    <textarea class="form-control" name="description" id="description"
                              placeholder="Project Description" rows="4" cols="50"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="amount" class="col-lg-2 control-label">Funding</label>
                <div class="col-lg-10">
                    <input type="number" class="form-control" name="amount" id="amount" placeholder="R">
                </div>
            </div>
            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-10">
                    <select class="form-control" name="project_category_id" id="project_category_id">
                        @foreach($projectCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
    </form>
    </fieldset>
</div>
<!-- /.container -->
@endsection
