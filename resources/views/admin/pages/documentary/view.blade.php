     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page" >
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('admin.includes.page-navigater') 
            </div>                
            <div class="card border shadow-sm">
                <div class="card-header bg-light px-3">
                    <h3 class="card-title m-0 h4">{{ $contract->documentary_title }}<sup class="text-danger">*</sup></h3>
                </div>
                <div class="card-body p-3">
                    {!! $contract->documentary_content !!}
                </div>
                <div class="card-footer text-end">
                    <a href="{{  url()->previous()  }}" class="btn btn-light border">Go to Back</a>
                </div>
            </div>
        </div>
    </div> 
@endsection 