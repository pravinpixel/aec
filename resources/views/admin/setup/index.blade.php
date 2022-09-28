@extends('layouts.admin')

@section('admin-content')
    <div class="content-page" >
        <div>
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                        <div class="page-title-box mt-3">
                            <div class="page-title-right mt-0">
                                <ol class="breadcrumb align-items-center m-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active"> Setup</li>
                                    <li class="breadcrumb- ms-2">
                                        <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i> 
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Setup</h4>
                        </div>
                    </div>
                </div>
              
                <section>
                    <div class="card border shadow-sm">
                        <div class="card-body p-2">
                            <ul class="nav nav-tabs nav-bordered mb-2">
                                <li class="nav-item"><a href="{{ route('setup.roles') }}" class="nav-link {{ Route::is(['setup.roles','setup.permissions','setup.wood-estimation','setup.wood-estimation-cost-preset','setup.precast-estimation','setup.precast-estimation-cost-preset','setup.check-list','setup.check-sheet'])  ? 'setup-active' : '' }}">Admin</a></li>
                                <li class="nav-item"><a href="{{ route('setup.project-type') }}" class="nav-link {{ Route::is(['setup.project-type','setup.service','setup.building-type','setup.building-component','setup.construction-type','setup.delivery-type','setup.document-type'])  ? 'setup-active' : '' }}">Customer</a></li>
                                <li class="nav-item"><a class="nav-link">Vendor</a></li>
                                <li class="nav-item"><a class="nav-link">Employee</a></li>
                                <li class="nav-item"><a class="nav-link">General</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="row m-0">
                                    <div class="col-sm-2 p-0 border-end bg-light">
                                        <div class="nav flex-column">
                                            @if ( Route::is(['setup.roles','setup.permissions','setup.wood-estimation','setup.wood-estimation-cost-preset','setup.precast-estimation','setup.precast-estimation-cost-preset','setup.check-list','setup.check-sheet','setup.ifc-file-icon','setup.ifc-file-icon.create']))
                                                <a class="nav-link text-secondary {{ Route::is(['setup.roles','setup.permissions'])  ? 'setup-link-active' : '' }}" href="{{ route('setup.roles') }}">Roles & Permissions</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.wood-estimation','setup.wood-estimation-cost-preset'])  ? 'setup-link-active' : '' }}" href="{{ route('setup.wood-estimation') }}">Wood Estimation</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.precast-estimation','setup.precast-estimation-cost-preset'])  ? 'setup-link-active' : '' }}" href="{{ route('setup.precast-estimation') }}">Precast Estimation</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.check-list'])  ? 'setup-link-active' : '' }}" href="{{ route('setup.check-list') }}">Check Sheets</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.check-sheet'])  ? 'setup-link-active' : '' }}" href="{{ route('setup.check-sheet') }}">Check Sheet Setup</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.ifc-file-icon','setup.ifc-file-icon.create'])  ? 'setup-link-active' : '' }}" href="{{ route('setup.ifc-file-icon') }}">IFC Files Icons</a>
                                            @endif
                                            @if ( Route::is(['setup.project-type','setup.service','setup.building-type','setup.building-component','setup.construction-type','setup.delivery-type','setup.document-type']))
                                                <a class="nav-link text-secondary {{ Route::is(['setup.project-type'])  ? 'setup-link-active' : '' }}" href="{{ route('setup.project-type') }}">Project Type</a> 
                                                <a class="nav-link text-secondary {{ Route::is(['setup.service'])  ? 'setup-link-active' : '' }}"  href="{{ route('setup.service') }}">Service</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.building-type'])  ? 'setup-link-active' : '' }}"  href="{{ route('setup.building-type') }}">Building Type</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.building-component'])  ? 'setup-link-active' : '' }}"  href="{{ route('setup.building-component') }}">Building Component</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.construction-type'])  ? 'setup-link-active' : '' }}"  href="{{ route('setup.construction-type') }}">Construction Type</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.delivery-type'])  ? 'setup-link-active' : '' }}"  href="{{ route('setup.delivery-type') }}">Delivery Type</a>
                                                <a class="nav-link text-secondary {{ Route::is(['setup.document-type'])  ? 'setup-link-active' : '' }}"  href="{{ route('setup.document-type') }}">Upload Document</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-10 ps-3">
                                        @yield('setup-content')
                                    </div> <!-- end col-->
                                </div>
                            </div> <!-- end tab-content-->
                        </div> <!-- end card-body -->
                    </div>
                </section>
            </div>
        </div>
    </div> 
@endsection  
@push('custom-styles')
    <style> .swal2-actions { margin: 0 25px 0 0 !important; justify-content: end !important }</style>
@endpush
@push('custom-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush