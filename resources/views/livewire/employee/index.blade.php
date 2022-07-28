@extends('layouts.admin')
@section('admin-content')
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
                                    <li class="breadcrumb-item active">Employees Details​​</li>
                                    <li class="breadcrumb- ms-2"> <i type="button" onclick="goBack()" class="mdi mdi-backspace text-danger fa-2x"></i></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Employees Details​​</h4>
                        </div>
                    </div>
                </div>
            </div>    
            
            <section>
                {{-- MAIN CREATE BODY --}}
                <div class="mb-3 text-end">
                    <a href="{{ route('create.employee') }}" class="btn btn-primary">
                        <i class="mdi mdi-briefcase-plus me-1"></i> 
                        Register New Employee​
                    </a>
                </div>
                <div class="card">  
                    <div class="card-body"> 
                        @livewire('employee.datatable') 
                    </div> 
                </div> 
                {{-- MAIN CREATE BODY --}}
            </section>
        </div>
    </div>
   
@endsection 