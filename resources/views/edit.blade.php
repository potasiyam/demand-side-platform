@extends('layout')
@section('title')
    Create Campaign
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <h4 class="mb-4">Edit Campaign</h4>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Start Date</label>
                    <input type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">End Date</label>
                    <input type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Budget</label>
                    <input type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Daily Budget</label>
                    <input type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Creatives</label>
                    <div class="row mb-3">
                        <div class="col-11">
                            <input type="file" class="form-control" required>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-sm rounded-0 btn-outline-danger">Remove</button>
                        </div>
                    </div>
                    <input type="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary rounded-0 mt-2">Submit</button>
            </form>
        </div>
    </div>
@endsection
