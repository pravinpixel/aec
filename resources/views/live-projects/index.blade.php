@extends('live-projects.layout')
@php
    $projectClosure = count(getProjectId(session()->get('current_project')->id)->projectClosure);
@endphp
@section('admin-content')
    <h4 class="my-3 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a class="btn btn-light border me-2 rounded-pill" href="{{ route('live-projects') }}">
                <i class="fa fa-chevron-left"></i> Live projects
            </a>
            <span class="text-primary">{{ session()->get('current_project')->reference_number }}</span>
            <span class="text-secondary">{{ session()->get('current_project')->project_name }}</span>
        </div>
        @if ($projectClosure > 0)
            <span class="bg-success btn-sm rounded-pill border border-dark ">
                <i class="bi bi-patch-check-fill fs-4 me-1"></i> <span class="fw-bold">Project Completed</span> 
            </span>
        @endif
    </h4>
    <div class="card border mb-3 ">
        <div class="card-header bg-light">
            <nav class="wizard-nav">
                @foreach ($wizard_menus[AuthUser()] as $menu)
                    <a href="{{ route('live-project.menus-index', ['menu_type' => $menu['slug'], 'id' => session()->get('current_project')->id]) }}"
                        class="position-relative wizard-tab {{ request()->route()->menu_type === $menu['slug'] ? 'active' : '' }}">
                        {!! getModuleMenuMessagesCount(
                            'project',
                            session()->get('current_project')->id,
                            strtoupper(str_replace(' ', '_', $menu['slug'])),
                            'element',
                        ) !!}
                        {{-- {{ strtoupper(str_replace('-','_',$menu['slug'])) }} --}}
                        <div class="wizard-tab-icon">
                            {!! $menu['icon'] !!}
                        </div>
                        <small>{{ $menu['name'] }}</small>
                    </a>
                @endforeach
            </nav>
        </div>
        @foreach ($wizard_menus[AuthUser()] as $key => $menu)
            @if (request()->route()->menu_type === $menu['slug'])
                <form
                    action="{{ route('live-project.menus-store', ['menu_type' => $menu['slug'], 'id' => session()->get('current_project')->id]) }}"
                    enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        @include('live-projects.views.' . $menu['view'])
                    </div>
                    <div class="card-footer px-2 d-flex align-items-center justify-content-between">
                        @if ($key - 1 !== -1)
                            <a href="{{ route('live-project.menus-index', ['menu_type' => $wizard_menus[AuthUser()][$key - 1]['slug'], 'id' => session()->get('current_project')->id]) }}"
                                class="btn btn-sm btn-light border rounded-pill">
                                <i class="bi bi-chevron-left"></i>
                                Prev
                            </a>
                        @else
                            <div></div>
                        @endif
                        @if (count($wizard_menus[AuthUser()]) > $key + 1)
                            <input type="hidden" name="menu_type"
                                value="{{ $wizard_menus[AuthUser()][$key + 1]['slug'] }}">
                            <button type="submit" class="btn btn-sm btn-primary rounded-pill">
                                Next <i class="bi bi-chevron-right"></i>
                            </button>
                        @endif
                        @if ($key + 1 === count($wizard_menus[AuthUser()]) && $projectClosure == 0)
                            <button type="submit" class="btn btn-info rounded-pill">
                                <i class="bi bi-patch-check-fill fs-4 me-1"></i> Proceed to complete
                            </button>
                        @endif
                        @if ($key + 1 === count($wizard_menus[AuthUser()]) && $projectClosure > 0)
                            <button type="button" class="btn btn-success rounded-pill">
                                <i class="bi bi-patch-check-fill fs-4 me-1"></i> Project Completed
                            </button>
                        @endif
                    </div>
                </form>
            @endif
        @endforeach
    </div>
    @if (request()->route()->menu_type == 'task-list')
        <form onsubmit="event.preventDefault()" id="live-project-sub-tasks-model-form">
            <div id="live-project-sub-tasks-model" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-full-width modal-dialog-scrollable">
                    <div class="custom modal-content" id="live-project-sub-tasks-model-content">
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
                    </div>
                </div>
            </div>
        </form>
    @endif
    @if (request()->route()->menu_type == 'issues')
        @include('live-projects.modals.create-issue')
        @include('live-projects.modals.edit-issue')
        @include('live-projects.modals.filter-issue')
        @include('live-projects.modals.detail-issue')
        @include('live-projects.modals.variation-order')
    @endif
    @if (request()->route()->menu_type == 'variation-orders')
        {{-- @include('live-projects.modals.detail-variation-order') --}}
        @include('live-projects.modals.variation-order')
    @endif
@endsection
