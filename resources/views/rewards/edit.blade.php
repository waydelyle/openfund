@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">

    <form class="form-horizontal">
        <fieldset>
            <legend>Edit project</legend>
            <div class="form-group">
                <label for="inputProjectName" class="col-lg-2 control-label">Project Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputProjectName" placeholder="Project Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputProjectDescription" class="col-lg-2 control-label">Project Description</label>
                <div class="col-lg-10">
                    <textarea class="form-control" id="inputProjectDescription"
                              placeholder="Project Description" rows="4" cols="50"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputProjectFunding" class="col-lg-2 control-label">Project Funding</label>
                <div class="col-lg-10">
                    <input type="number" class="form-control" id="inputProjectFunding" placeholder="R">
                </div>
            </div>
            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-10">
                    <select class="form-control" id="select">
                        @foreach($projectCategories as $project)
                            <option><?= $project->label ?></option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button href="" type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>
<!-- /.container -->
@endsection
