@extends('live-projects.layout')

@section('admin-content')
    <h4 class="my-3">
        <span class="text-primary">Issues</span>
        <span class="text-secondary"> / Live Projects</span>
    </h4>
    <div class="card shadow-sm border">
        <div class="card-body">
            @include('live-projects.views.issues')
        </div>
    </div>
    @include('live-projects.modals.create-issue')
    @include('live-projects.modals.filter-issue')
    @include('live-projects.modals.detail-issue')
    @include('live-projects.modals.variation-order')
@endsection