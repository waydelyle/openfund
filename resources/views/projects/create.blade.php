@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div class="container">

    <form class="form-horizontal">
        <fieldset>
            <legend>Create a project</legend>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Project Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEmail" placeholder="Project Name">
                </div>
            </div>
            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-10">
                    <select class="form-control" id="select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>
<!-- /.container -->
@endsection
