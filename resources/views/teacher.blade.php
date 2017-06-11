@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has("status"))
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p class="alert alert-danger">{{ Session::get("status") }}</p>
        </div>
    </div>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    jij bent een leraar!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection