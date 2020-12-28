@extends('layout')
@section('title')
    Create Campaign
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <h4 class="mb-4">Edit Campaign</h4>
            <div data-campaignid="{{ $campaignId }}" id="edit-campaign"></div>
        </div>
    </div>
@endsection
