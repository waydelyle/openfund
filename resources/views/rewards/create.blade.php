@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">

    <form class="form-horizontal" method="POST" action="/create-project">
            <legend><?= $heading ?></legend>

        {{ csrf_field() }}
          <div class="form-group">
                <label for="inputProjectName" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="inputProjectName" id="inputProjectName" placeholder="Project Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputProjectDescription" class="col-lg-2 control-label">Description</label>
                <div class="col-lg-10">
                    <textarea class="form-control" name="inputProjectDescription" id="inputProjectDescription"
                              placeholder="Project Description" rows="4" cols="50"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputProjectFunding" class="col-lg-2 control-label">Funding</label>
                <div class="col-lg-10">
                    <input type="number" class="form-control" name="inputProjectFunding" id="inputProjectFunding" placeholder="R">
                </div>
            </div>
            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-10">
                    <select class="form-control" name="inputCategorySelect" id="inputCategorySelect">
                        @foreach($projectCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
    </form>

</div>
<!-- /.container -->
@endsection
