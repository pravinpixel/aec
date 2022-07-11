@extends('layouts.admin')

@section('admin-content')
   
    <div class="content-page" >
        <div class="content"  ng-controller="customerDetailController" >
          
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                <!-- end page title -->
      
                <div class="accordion" id="accordionPanelsStayOpenExample1">
                    <div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingOne">
                            <div class="accordion-button"  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                UnVerified Customers
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn">
                                </i>
                            </div>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                @include('admin.customer.inactive-table')
                            </div>
                        </div>
                    </div>
                  
                </div>

                <div class="accordion" id="accordionPanelsStayOpenExample2">
                    <div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingOne">
                            <div class="accordion-button"  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                Active Customers
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn">
                                </i>
                            </div>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                @include('admin.customer.active-table')
                            </div>
                        </div>
                    </div>
                  
                </div>

                <div class="accordion" id="accordionPanelsStayOpenExample3">
                    <div class="accordion-item mb-2 border rounded shadow-sm">
                        <h2 class="accordion-header m-0 position-relative" id="panelsStayOpen-headingOne">
                            <div class="accordion-button"  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThird" aria-expanded="true" aria-controls="panelsStayOpen-collapseThird">
                                Cancelled Customers
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                                <i
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThird" aria-expanded="true" aria-controls="panelsStayOpen-collapseThird"
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn">
                                </i>
                            </div>
                        </h2>
                        <div id="panelsStayOpen-collapseThird" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                @include('admin.customer.cancel-table')
                            </div>
                        </div>
                    </div>
                  
                </div>
            
            </div>
        </div>
    </div> 
@endsection

@push('custom-scripts')
    <script src="{{ asset("public/custom/js/ngControllers/admin/customer.js") }}"></script>  
@endpush