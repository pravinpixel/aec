@extends('live-projects.layout')

@section('admin-content')
    <h4 class="my-3">
        <span class="text-primary">{{ session()->get('current_project')->reference_number }}</span>
        <span class="text-secondary">{{ session()->get('current_project')->project_name }}</span>
    </h4>
    <div class="card border mb-3 ">
        <div class="card-header bg-light">
            <nav class="wizard-nav">
                @foreach ($wizard_menus as $menu)
                    <a href="{{ route('live-project.menus-index', ['menu_type' => $menu['slug'], 'id' => session()->get('current_project')->id]) }}"
                        class="wizard-tab {{ request()->route()->menu_type === $menu['slug'] ? 'active' : '' }}">
                        <div class="wizard-tab-icon">
                            {!! $menu['icon'] !!}
                        </div>
                        <small>{{ $menu['name'] }}</small>
                    </a>
                @endforeach
            </nav>
        </div>
        @foreach ($wizard_menus as $key => $menu)
            @if (request()->route()->menu_type === $menu['slug'])
                <form
                    action="{{ route('live-project.menus-store', ['menu_type' => $menu['slug'], 'id' => session()->get('current_project')->id]) }}"
                    method="post">
                    @csrf
                    <div class="card-body">
                        @include('live-projects.views.' . $menu['view'])
                    </div>
                    <div class="card-footer px-2 d-flex align-items-center justify-content-between">
                        @if ($key - 1 !== -1)
                            <a href="{{ route('live-project.menus-index', ['menu_type' => $wizard_menus[$key - 1]['slug'], 'id' => session()->get('current_project')->id]) }}"
                                class="btn btn-sm btn-light border rounded-pill">
                                <i class="bi bi-chevron-left"></i>
                                Prev
                            </a>
                        @else
                            <div></div>
                        @endif
                        @if (count($wizard_menus) > $key + 1)
                            <input type="hidden" name="menu_type" value="{{ $wizard_menus[$key + 1]['slug'] }}">
                            <button type="submit" class="btn btn-sm btn-primary rounded-pill">
                                Next <i class="bi bi-chevron-right"></i>
                            </button>
                        @endif
                        @if ($key + 1 === count($wizard_menus))
                            <button type="submit"
                                href="{{ route('live-project.menus-index', ['menu_type' => $wizard_menus[$key]['slug'], 'id' => session()->get('current_project')->id]) }}"
                                class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-upload"></i> Submit
                            </button>
                        @endif
                    </div>
                </form>
            @endif
        @endforeach
    </div>
    <form onsubmit="event.preventDefault()" id="live-project-sub-tasks-model-form">
        <div id="live-project-sub-tasks-model" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full-width modal-dialog-scrollable">
                <div class="modal-content" id="live-project-sub-tasks-model-content">
                    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
                </div>
            </div>
        </div>
    </form>
@endsection