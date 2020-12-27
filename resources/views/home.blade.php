@extends('layout')
@section('title')
Campaigns
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-3 text-right">
            <a href="{{ route('campaign.create') }}" class="btn btn btn-outline-primary rounded-0">Create Campaign</a>
        </div>
        <div class="col-md-12" id="campaign-list"></div>
    </div>
@endsection
