@extends('live-projects.layout')

@section('admin-content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="my-3">
            <span class="text-primary">Issues</span>
            <span class="text-secondary"> / Live Projects / <span class="text-primary"> {{ $project->reference_number }}</span></span>
        </h4>
        <div>
            <a href="{{ route('issues.index') }}">< back to issues</a>
        </div>
    </div>
    <div class="card shadow-sm border">
        <div class="card-body">
            @include('live-projects.views.issues')
        </div>
    </div>
    @include('live-projects.modals.create-issue')
    @include('live-projects.modals.edit-issue')
    @include('live-projects.modals.filter-issue')
    @include('live-projects.modals.detail-issue')
    @include('live-projects.modals.variation-order')
@endsection
