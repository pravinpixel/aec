@extends('layouts.admin')
@section('admin-content')
    <div class="content-page">
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('admin.includes.page-navigater') 
            </div>    
            
            <section>
                {{-- MAIN CREATE BODY --}}
                    @livewire('employee.create.wizard')
                {{-- MAIN CREATE BODY --}}
            </section>
        </div>
    </div>
@endsection 