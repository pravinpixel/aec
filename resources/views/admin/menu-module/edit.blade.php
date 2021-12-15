@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')

                <!-- end page title --> 

                <div class="card">
                    <div class="card-body pt-2">
                        {!! Form::model($result, ['route' => ['menu-module.update', $result->id], 'method' => 'PUT', 'id' => 'menu-module-create']) !!}
                            @include('admin.menu-module.field')
                        {!! Form::close() !!}
                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->
    </div> 


@endsection

@push('custom-styles')
   
@endpush

@push('custom-scripts')

@endpush