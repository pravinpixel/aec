@extends('layouts.admin')
@section('admin-content')
    @include('flash::message')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar')
            
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12">
                        <div class="page-title-box mt-3">
                            <div class="page-title-right mt-0">
                                <ol class="breadcrumb align-items-center m-0">
                                    <li class="breadcrumb-item"><a href="{{ route("admin-dashboard") }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Change password​</li>
                                    <li class="breadcrumb- ms-2"> <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Change password</h4>
                        </div>
                    </div>
                </div>
            </div>    
            
            <section>
                {{-- MAIN CREATE BODY --}}
                    @livewire('employee.change-password')
                {{-- MAIN CREATE BODY --}}
            </section>
        </div>
    </div>
@endsection 