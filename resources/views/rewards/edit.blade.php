@extends('layouts.master')

@section('content')
        <!-- Page Content -->
<div class="container">

    <form class="form-horizontal">
        <fieldset>
            <legend>Edit campaign</legend>
            <div class="form-group">
                <label for="inputCampaignName" class="col-lg-2 control-label">Campaign Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputCampaignName" placeholder="Campaign Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCampaignDescription" class="col-lg-2 control-label">Campaign Description</label>
                <div class="col-lg-10">
                    <textarea class="form-control" id="inputCampaignDescription"
                              placeholder="Campaign Description" rows="4" cols="50"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputCampaignFunding" class="col-lg-2 control-label">Campaign Funding</label>
                <div class="col-lg-10">
                    <input type="number" class="form-control" id="inputCampaignFunding" placeholder="R">
                </div>
            </div>
            <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-10">
                    <select class="form-control" id="select">
                        @foreach($campaignCategories as $campaign)
                            <option><?= $campaign->label ?></option>
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
