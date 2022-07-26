@extends('layouts.cost-estimate')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content">
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('cost-estimate.includes.page-navigater')

                <!-- end page title -->
                  <!-- Start Content-->
                <div class="container-fluid ">
    
                    <div class="content container-fluid">
                        <div class="main"> 
                            <div class="row">
                                <div class="col-xl-12  ">
                                    <div class="row m-0">
                                        @include('cost-estimate.table')
                                    </div>
                                    <!--end card-->
                                </div> <!-- end col -->
    
                            </div> 
                        </div>
                        <!-- container --> 
                    </div> 
                    
                </div> 
            <!-- container -->
         
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
<script src="{{ asset('public/assets/js/pages/cost-estimate/dashboard.js') }}"></script>
@endpush