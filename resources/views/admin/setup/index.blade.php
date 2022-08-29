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
                            <ul class="nav nav-tabs nav-bordered mb-3">
                                <li class="nav-item"><a class="nav-link setup-active">Admin</a></li>
                                <li class="nav-item"><a class="nav-link">Customer</a></li>
                                <li class="nav-item"><a class="nav-link">Vendor</a></li>
                                <li class="nav-item"><a class="nav-link">Employee</a></li>
                                <li class="nav-item"><a class="nav-link">General</a></li>
                            </ul> <!-- end nav-->
                            <div class="tab-content">
                                <div class="row m-0">
                                    <div class="col-sm-2 ps-0 border-end">
                                        <div class="nav flex-column">
                                            <a class="nav-link setup-link-active" href="#">Roles & Permissions</a>
                                            <a class="nav-link text-secondary" href="#">Wood Estimation</a>
                                            <a class="nav-link text-secondary" href="#">Precast Estimation</a>
                                            <a class="nav-link text-secondary" href="#">Check Sheets</a>
                                            <a class="nav-link text-secondary" href="#">Check Sheet Setup</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
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