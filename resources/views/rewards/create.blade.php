@extends('layouts.master')

@section('content')
        <!-- Page Content -->
<div class="container">

    <form class="form-horizontal" method="POST" action="/create-campaign">
        <legend><?= $heading ?></legend>

        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputCampaignName" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="inputCampaignName" id="inputCampaignName" placeholder="Campaign Name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCampaignDescription" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
                    <textarea class="form-control" name="inputCampaignDescription" id="inputCampaignDescription"
                              placeholder="Campaign Description" rows="4" cols="50"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputCampaignFunding" class="col-lg-2 control-label">Funding</label>
            <div class="col-lg-10">
                <input type="number" class="form-control" name="inputCampaignFunding" id="inputCampaignFunding" placeholder="R">
            </div>
        </div>
        <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Category</label>
            <div class="col-lg-10">
                <select class="form-control" name="inputCategorySelect" id="inputCategorySelect">
                    @foreach($campaignCategories as $category)
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
