@extends('layouts.admin')

@section('admin-content')



    <div class="content-page">
        <div class="content">

            @include('admin.layouts.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.layouts.page-navigater')

                {{-- <!-- {{ route('admin.costEstimationSingleForm') }} --> --}}
            
                <form action="" id="costEstimationSingleForm" class="card shadow-lg" method="POST" >
                   {{ csrf_field() }}
                   <?php  if(isset($arr['detail'])){ ?>
                    <input type="hidden" name="key" value="{{  $arr['detail']['id'] }}">
                  
                <?php } ?>
                   
                    <div class="card-header pb-2 p-3 text-center border-0">
                        <h4 class="header-title">Admin Cost Estimation</h4>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table shadow-sm border m-0 table-bordered "  id="costEstimateDetailTable">
                            <thead class="bg-light">
                                <tr>
                                    <th>Estimate Date</th>
                                    <th>Estimate Title</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php  if(isset($arr['detail'])){ ?>
                                    <td> <input type="date" class="form-control enquiry_date" name="enquiry_date" id="enquiry_date" value="{{ $arr['detail']['date'] }}" > </td>
                                    <?php }else { ?>
                                        <td> <input type="date" class="form-control enquiry_date" name="enquiry_date"  id="enquiry_date" value="" > </td>
                                   <?php  } ?>

                                   <?php  if(isset($arr['detail'])){ ?>
                                    <td><input type="text" class="form-control contact" name="contact" id="contact" value="{{ $arr['detail']['contact'] }}"></td>
                                    <?php }else { ?>
                                        <td><input type="text" class="form-control contact" name="contact" id="contact" value=""></td>
                                        <?php  } ?>
                                   
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
        
                        <div class="row m-0 mt-3 table-rer" >
                            <table class="table table-bordered border" id="costEstimateTable">
                                <thead>
                                    <tr class="bg-light">
                                        <td colspan="14" class="text-center">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-5">
                                                    <h4 class="body_heading">Engineering Estimation</h4>
                                                </div>
                                                <div class="col-md-3">
                                                
                                                    <!-- <button type="button" class="btn btn-primary add_row_cal" id="add_btn">Add Row</input> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="font-weight-bold ">
                                        <th>Component</th>
                                        <th>Type</th>
                                        <th>Sq.M</th>
                                        <th>Complexity</th>
                                        <th colspan="2">Details</th>
                                        <th colspan="2">Statistics</th>
                                        <th colspan="2">CAD/CAM</th>
                                        <th colspan="2">Logistics</th>
                                        <th colspan="2">Total Cost</th>
                                    </tr>
                                    <tr class="bg-light border" >
                                        <th colspan="4"></th>
                                        <th ><small>Price/m²</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/m²</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/m²</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/m²</small></th>
                                        <th ><small>Sum</small></th> 
                                        <th ><small>Price/m²</small></th>
                                        <th ><small>Sum</small></th> 
                                    </tr>
                                </thead>
                                <tbody id="add_estimate">
                                    <?php  if(isset($arr['calculation'])){  ?>
                                    
                                    <?php  $count_data = count($arr['calculation']);   ?>
                                    <input type="hidden" name="count_data" id="count_data" value="<?php echo $count_data ?>" >
                                    <?php  $i=0; ?>  
                                  
                                    <?php  foreach($arr['calculation'] as $key=>$test){ ?>
                                     
                                      <?php ++$i; ?>      
                                        <input type="hidden" name="addmore[<?php echo $i ?>][test]" value="{{ $test['id'] }}" >
                                    <tr>
                                        <!-- <td class="bg-light border" width="7%">Exterior</td> -->
                                       
                                        <td >
                                            <select class="form-control select2" name="addmore[<?php echo $i ?>][component]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="External"   <?php echo $test['Component'] == "External" ?   "selected" : '' ;?> >External</option>
                                                    <option value="Internal" <?php echo $test['Component'] == "Internal" ?   "selected" : '' ;?> >Internal</option>
                                                    <option value="Ground Floor" <?php echo $test['Component'] == "Ground Floor" ?   "selected" : '' ;?> >Ground Floor</option>
                                                    
                                                    <!-- <option value="Partition" <?php echo $test['Component'] == "Partition" ?   "selected" : '' ;?>>Partition</option>
                                                    <option value="Ceiling" <?php echo $test['Component'] == "Ceiling" ?   "selected" : '' ;?>>Ceiling</option> -->
                                                    <option value="Roof" <?php echo $test['Component'] == "Roof" ?   "selected" : '' ;?>>Roof</option>
                                                    <option value="Loadbearing" <?php echo $test['Component'] == "Loadbearing" ?   "selected" : '' ;?>>Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td >
                                            <select class="form-control select2" name="addmore[<?php echo $i ?>][type]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="Panel" <?php echo $test['type'] == "Panel" ?   "selected" : '' ;?> >Panel</option>
                                                    <option value="Precut" <?php echo $test['type'] == "Precut" ?   "selected" : '' ;?>>Precut</option>
                                                    <option value="Structural precut" <?php echo $test['type'] == "Structural precut" ?   "selected" : '' ;?>>Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][sqm]"  value="{{ $test['sqm'] }}" class="form-control"></td>
                                        <td   ><input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][complexity]" value="{{ $test['complexity'] }}" class="form-control"></td>
                                        <td  width="7%">
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][detail_price]" value="{{ $test['detail_price'] }}" class="form-control detail_price">
                                            </div>
                                        </td>
                                        <td width="7%">
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][detail_sum]" value="{{ $test['detail_sum'] }}" class="form-control detail_sum">
                                            </div>
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][statistic_price]" value="{{ $test['statistic_price'] }}" class="form-control statistic_price">
                                            </div>
                                            
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][statistic_sum]" value="{{ $test['statistic_sum'] }}" class="form-control statistic_sum">
                                            </div>
                                            
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][cad_cam_price]" value="{{ $test['cad_cam_price'] }}" class="form-control cad_cam_price">
                                            </div>
                                            
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][cad_cam_sum]" value="{{ $test['cad_cam_sum'] }}" class="form-control cad_cam_sum">
                                            </div>
                                            
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][logistic_price]" value="{{ $test['logistic_price'] }}" class="form-control logistic_price">
                                            </div>
                                            
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][logistic_sum]" value="{{ $test['logistic_sum'] }}" class="form-control logistic_sum">
                                            </div>
                                            
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][total_price]" value="{{ $test['total_price'] }}" class="form-control total_price">
                                            </div>
                                        </td>
                                        <td width="7%" >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][total_sum]" value="{{ $test['total_sum'] }}" class="form-control total_sum">
                                            </div>
                                            
                                        </td>
                                       
                                    </tr>
                               
                                    <?php  } ?>
                                    <?php } else {  ?>
                                    <?php  $count_data = 0;   ?>
                                    <input type="hidden" name="count_data" id="count_data" value="<?php echo $count_data ?>" >
                                <tr>
                                        <!-- <td class="bg-light border" width="7%">Exterior</td> -->
                                       
                                        <td >
                                            <select class="form-control select2 validateArray" name="addmore[0][component]" id=addmore_s" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="External"  >External</option>
                                                    <option value="Internal">Internal</option>
                                                    <option value="Ground Floor" >Ground Floor</option>
                                                    <!-- <option value="Ceiling">Ceiling</option> -->
                                                    <option value="Roof" >Roof</option>
                                                    <option value="Loadbearing" >Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td >
                                            <select class="form-control select2"   required name="addmore[0][type]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="Panel" >Panel</option>
                                                    <option value="Precut">Precut</option>
                                                    <option value="Structural precut" >Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][sqm]" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][complexity]" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_price]" value="" class="form-control detail_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_sum]" value="" class="form-control detail_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_price]" value="" class="form-control statistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_sum]" value="" class="form-control statistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_price]" value="" class="form-control cad_cam_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_sum]" value="" class="form-control cad_cam_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_price]" value="" class="form-control logistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_sum]" value="" class="form-control logistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_price]" value="" class="form-control total_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_sum]" value="" class="form-control total_sum"></td>
                                       
                                </tr>


                                    <?php  } ?>
                                </tbody>
                                <tfoot id="footerform" >
                                    <tr>
                                        
                                        <td>
                                            
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0"><span class="text-secondary" ><span  id="detail_price_id">{{ $arr['detail_price'] }}<span> </span>    <span id="detail_price_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0"><span class="text-secondary"></span>    <span id="detail_price_id"></span> </p>
                                            <?php } ?>
                                        </td>
                                        <td  >
                                            <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0"><span class="text-secondary" >
                                                    <!-- Detail Sum : -->
                                                     <span  id="detail_sum_id">{{ $arr['detail_add'] }}<span> </span>    <span id="detail_sum_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0"><span class="text-secondary">
                                                    <!-- Detail Sum : -->
                                                </span>    <span id="detail_sum_id"></span> </p>
                                                <?php } ?>
                                        </td>
                                        <td >
                                            <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0"><span class="text-secondary"><span  id="statistic_price_id" >  {{ $arr['statistic_price'] }} </span> </span>    <span id="statistic_price_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_price_id"></span> </p>
                                                <?php } ?>  
                                        </td>

                                        <td >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"> <span  id="statistic_sum_id" >  {{ $arr['statistic_sum'] }} </span> </span>    <span id="statistic_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_sum_id"></span> </p>
                                            <?php } ?>  
                                        </td>

                                        <td >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"> <span  id="cad_cam_price_id" >  {{ $arr['cad_cam_price'] }} </span> </span>    <span id="cad_cam_price_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_price_id"></span> </p>
                                            <?php } ?>  
                                        </td>

                                        <td >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span id="cad_cam_sum_id"> {{ $arr['cad_cam_sum'] }}</span> </span>    <span id="cad_cam_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_sum_id"></span> </p>
                                            <?php } ?>
                                        </td>

                                        <td >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span  id="logistic_price_id" >  {{ $arr['logistic_price'] }} </span> </span>    <span id="logistic_price_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_price_id"></span> </p>
                                            <?php } ?>
                                        </td>

                                        <td  >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span id="logistic_sum_id"> {{ $arr['logistic_sum'] }} </span> </span>    <span id="logistic_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_sum_id"></span> </p>
                                            <?php } ?>
                                        </td>

                                        <td  >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"> <span  id="total_price_id" >  {{ $arr['total_price'] }} </span> </span>    <span id="total_price_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="total_price_id"></span> </p>
                                            <?php } ?> 
                                        </td>

                                        <td >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span id="total_sum_id"> {{ $arr['total_sum'] }}</span></span>    <span id="total_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="total_sum_id"></span> </p>
                                            <?php } ?>
                                        </td>
                                       
                                    </tr>
                                </tfoot>
                            </table>
                                                       
                        </div>
                    </div>


    

                    <div class="card-footer">
                        
                        <div class="float-end py-3">
                        <button type="button" class="btn btn-outline-primary add_row_cal" id="add_btn">Add Row</button>
                        
                            <button class="btn btn-outline-primary" type="reset" class="cancel_btn" id="cancel_btn" ><i class="fa fa-ban"> Cancel</i></button>
                                <?php if(isset($arr['calculation'])){ ?>
                            <button class="btn btn-primary" type="submit" id="update_btn"><i class="uil-sync"> Update Estimate</i></button>
                            <?php } else { ?>
                                <button class="btn btn-primary" type="submit" id="generate_btn">Generate Estimate</button>
                            <?php } ?>
                        </div>
                    </div>

                </form>    
                <br>  
                
                <br>
                <br>   
                <hr> 
                <div class="card-header pb-2 p-3 text-center border-0">
                        <h4 class="header-title">Estimation List</h4>
                    </div>
                <table id="estimate-datatable" class="table bordered-table estimate-datatable" style="width:100%">
                    <thead>
                        <tr class="text-left">
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>         
            </div> <!-- container -->
        </div> <!-- content -->
    </div>  

   
  
    <style>
        
        .form-control {
            padding-right: 0px !important
        }
        .btn-group {
            position: relative;
        }
        .kr {
          position: absolute !important;   
            left:0
        }
        .btn-group .form-control {
            padding-left:30px !important;
            text-align:right  !important
        }
         .body_heading{
            color: #8a90ff ;
         }
         label.error {
             color: red !important;
         }
    </style>
      
    
    


@endsection

@push('custom-styles')
<link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('custom-scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.4.3/angular-datatables.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $( document ).ready(function() {
 
            $("#costEstimationSingleForm").validate({
                


                rules: {
                    'enquiry_date': {
                        required: true,
                        maxlength: 50
                    },
                    'contact': {
                        required: true,
                        maxlength: 50
                    },
                    'addmore[0][component]': {
                        required: true,
                    },
                    'addmore[0][complexity]': {
                        required: true,
                    },
                    'addmore[0][type]': {
                        required: true,
                    },
                    'addmore[0][sqm]': {
                        required: true,                        
                    },
                    'addmore[0][detail_price]': {
                        required: true,                        
                    },
                    'addmore[0][detail_sum]': {
                        required: true,                        
                    },
                    'addmore[0][statistic_price]': {
                        required: true,                        
                    },
                    'addmore[0][statistic_sum]': {
                        required: true,                        
                    },
                    'addmore[0][cad_cam_price]': {
                        required: true,                        
                    },
                    'addmore[0][cad_cam_sum]': {
                        required: true,                        
                    },
                    'addmore[0][logistic_price]': {
                        required: true,                        
                    },
                    'addmore[0][logistic_sum]': {
                        required: true,                        
                    },
                    'addmore[0][total_price]': {
                        required: true,                        
                    },
                    'addmore[0][total_sum]': {
                        required: true,                        
                    },

                   
                    

                     

                },
                messages: {

                    'enquiry_date': {
                        required: "Please enter Date",
                    },
                    'contact': {
                        required: "Please enter Title",
                    },
                    'addmore[0][component]': {
                        required: "Please enter value",
                    },
                    'addmore[0][type]': {
                        required: "Please enter value",
                    },
                    'addmore[0][complexity]': {
                        required: "Please enter value",
                    },
                    'addmore[0][sqm]': {
                        required: "Please enter value",
                    },
                    'addmore[0][complexity]': {
                        required: "Please enter value",
                    },
                    'addmore[0][detail_price]': {
                        required: "Please enter value",
                    },
                    'addmore[0][detail_sum]': {
                        required: "Please enter sum",
                    },
                    'addmore[0][statistic_price]': {
                        required: "Please enter value",
                    },
                    'addmore[0][statistic_sum]': {
                        required: "Please enter sum",
                    },
                    'addmore[0][cad_cam_price]': {
                        required: "Please enter value",
                    },
                    'addmore[0][cad_cam_sum]': {
                        required: "Please enter sum",
                    },
                    'addmore[0][logistic_price]': {
                        required: "Please enter value",
                    },
                    'addmore[0][logistic_sum]': {
                        required: "Please enter sum",
                    },
                    'addmore[0][total_price]': {
                        required: "Please value",
                    },
                    'addmore[0][total_sum]': {
                        required: "Please enter sum",
                    },
                    
                    
                    

                },
            
            
        });
    }); 


        
    </script>
    <script>
        let editCount = 0;
        //    $(document).ready(function() {
        //         $('#example').DataTable();
        //     } );

        $( '#costEstimationSingleForm' ).on( 'submit', function(e) {
            e.preventDefault();
            if(!$("#costEstimationSingleForm").valid()){

                 return false;

            }
                $('#costEstimationSingleForm').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.costEstimationSingleForm') }}",
                    data: $(this).serialize(), 
                    success: function( msg ) {
                    
                        $('#estimate-datatable').DataTable().clear().draw();
                        $("#costEstimateTable > tbody").html('');
                        $("#footerform").html('');
                        $("#enquiry_date").val('');
                        $("#contact").val('');
                        $('#generate_btn').html('Generate Estimate');
                        $("#costEstimateTable > tbody").html(`
                            
                            <tr>
                                      
                                       
                                        <td >
                                            <select class="form-control select2" name="addmore[0][component]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="External"  >External</option>
                                                    <option value="Internal">Internal</option>
                                                    <option value="Ground Floor" >Ground Floor</option>
                                                    <!-- <option value="Ceiling">Ceiling</option> -->
                                                    <option value="Roof" >Roof</option>
                                                    <option value="Loadbearing" >Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td >
                                            <select class="form-control select2" name="addmore[0][type]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="Panel" >Panel</option>
                                                    <option value="Precut">Precut</option>
                                                    <option value="Structural precut" >Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][sqm]" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][complexity]" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_price]" value="" class="form-control detail_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_sum]" value="" class="form-control detail_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_price]" value="" class="form-control statistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_sum]" value="" class="form-control statistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_price]" value="" class="form-control cad_cam_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_sum]" value="" class="form-control cad_cam_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_price]" value="" class="form-control logistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_sum]" value="" class="form-control logistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_price]" value="" class="form-control total_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_sum]" value="" class="form-control total_sum"></td>
                                       
                                </tr>
            
            `);
            // window.location = "{{ route('cost-estimation-single-view') }}";
            
                }
                        //    alert( JSON.stringify(msg));
                    
                });

        });

      
                $(document).on('click','.edit_data',function (e) {
                    $("#costEstimateTable > tbody").html('');
                    $("#costEstimateDetailTable > tbody").html('');
                    $('#generate_btn').html(`<i class="uil-sync" > Update Estimation</i>`);
                    let estimateId = $(this).data('cost-estimate-id');
                    // alert(estimateId)
                    // console.log();
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.costEstimationEdit') }}",
                    data: {id:estimateId}, 
                    success: function( msg ) {
                        editCount = msg.data.calculation.length;
                        console.log(editCount);
                        $("#costEstimateTable > tbody").append(`
                         <input type="hidden" name="count_data" id="_count_data_" value="${msg.data.calculation.length}" >
                         `);
                        for(i=0;i<msg.data.calculation.length;i++){
                            let detail = msg.data.calculation[i];let selected = 'selected';
                            console.log(detail);
                                $("#costEstimateTable > tbody").append(`
                                    
                                    <tr>
                                    <input type="hidden" name="addmore[${i}][test]" value=" ${detail.id }" >
                                            
                                                <td >
                                                <select class="form-control select2" name="addmore[${i}][component]" data-toggle="select2">
                                                        <option value="">Select</option>
                                                        <optgroup label="Layer Types">
                                                            <option value="External" ${detail.Component == 'External' ? selected : ''}  >External</option>
                                                            <option value="Internal" ${detail.Component == 'Internal' ? selected : ''}  >Internal</option>
                                                            <option value="Ground Floor" ${detail.Component == 'Ground Floor' ? selected : ''} >Ground Floor</option>
                                                        
                                                            <option value="Roof" ${detail.Component == 'Roof' ? selected : ''} >Roof</option>
                                                            <option value="Loadbearing" <${detail.Component == 'Roof' ? selected : ''} >Loadbearing</option>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td >
                                                <select class="form-control select2" name="addmore[${i}][type]" data-toggle="select2">
                                                        <option value="">Select</option>
                                                        <optgroup label="Layer Types">
                                                            <option value="Panel" ${detail.type == "Panel" ?   "selected" : '' } >Panel</option>
                                                            <option value="Precut" ${detail.type == "Precut" ?   "selected" : '' }>Precut</option>
                                                            <option value="Structural precut" ${detail.type == "Structural precut" ?   "selected" : '' }>Structural precut</option>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][sqm]" value="${detail.sqm}" class="form-control"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][complexity]" value="${detail.complexity}" class="form-control"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][detail_price]" value="${detail.detail_price}" class="form-control detail_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][detail_sum]" value="${detail.detail_sum}" class="form-control detail_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][statistic_price]" value="${detail.statistic_price}" class="form-control statistic_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][statistic_sum]" value="${detail.statistic_sum}" class="form-control statistic_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][cad_cam_price]" value="${detail.cad_cam_price}" class="form-control cad_cam_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][cad_cam_sum]" value="${detail.cad_cam_sum}" class="form-control cad_cam_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][logistic_price]" value="${detail.logistic_price}" class="form-control logistic_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][logistic_sum]" value="${detail.logistic_sum}" class="form-control logistic_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][total_price]" value="${detail.total_price}" class="form-control total_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][total_sum]" value="${detail.total_sum}" class="form-control total_sum"></td>
                                            
                                        </tr>
                    
                            `);
                        }
                        
                        $("#costEstimateDetailTable > tbody").html(`
                        <tr>
                             <td> <input type="date" class="form-control enquiry_date" name="enquiry_date"  id="enquiry_date" value="${msg.data.detail.date}" > </td>
                        
                        <td><input type="text" class="form-control contact" name="contact" id="contact" value="${msg.data.detail.contact}"></td>
                        <input type="hidden" name="key" value="${msg.data.detail.id}">
                        </tr>
                        
                        `);
                        $("#costEstimateTable > tfoot").html(`
                            <tr>
                                <td>
                                   
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="detail_price_id">${msg.data.detail_price}</span> </p>          
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="detail_sum_id">${msg.data.detail_add} </span></p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_price_id">${msg.data.statistic_price}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_sum_id">${msg.data.statistic_sum} </span></p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_price_id">${msg.data.cad_cam_price}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_sum_id">${msg.data.cad_cam_sum}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_price_id">${msg.data.logistic_price}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_sum_id">${msg.data.logistic_sum}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="total_price_id">${msg.data.total_price}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="total_sum_id">${msg.data.total_sum} </span></p>
                                </td>
                            </tr>

                        `);
                        

                     
                    }
                    });
                });



                $("#cancel_btn").click(function (e) {

                   
                    $("#costEstimationSingleForm").validate().resetForm();
                    $("#costEstimateTable > tbody").html('');
                        // $("#footerform").html('');
                        // $("#costEstimateTable > tfoot").remove();
                        // $('#costEstimateTable > tfoot').empty();
                        // $('#costEstimateTable tbody > tr').remove();


                        $(".enquiry_date").val('');
                        $(".contact").val('');
                        $("#enquiry_date").val('');
                        $("#contact").val('');
                        $("#detail_price_id").text('');
                        $("#detail_sum_id").text('');
                        $("#statistic_price_id").text('');
                        $("#statistic_sum_id").text('');
                        $("#cad_cam_price_id").text('');
                        $("#cad_cam_sum_id").text('');
                        $("#logistic_price_id").text('');
                        $("#logistic_sum_id").text('');
                        $("#total_price_id").text('');
                        $("#total_sum_id").text('');

                        
                    // $("#costEstimateTable").html('');
                    $("#costEstimateTable > tbody").html(`
                            
                            <tr>
                                      
                                       
                                        <td >
                                            <select class="form-control select2" name="addmore[0][component]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="External"  >External</option>
                                                    <option value="Internal">Internal</option>
                                                    <option value="Ground Floor" >Ground Floor</option>
                                                    <!-- <option value="Ceiling">Ceiling</option> -->
                                                    <option value="Roof" >Roof</option>
                                                    <option value="Loadbearing" >Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td >
                                            <select class="form-control select2" name="addmore[0][type]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="Panel" >Panel</option>
                                                    <option value="Precut">Precut</option>
                                                    <option value="Structural precut" >Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][sqm]" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][complexity]" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_price]" value="" class="form-control detail_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_sum]" value="" class="form-control detail_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_price]" value="" class="form-control statistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_sum]" value="" class="form-control statistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_price]" value="" class="form-control cad_cam_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_sum]" value="" class="form-control cad_cam_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_price]" value="" class="form-control logistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_sum]" value="" class="form-control logistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_price]" value="" class="form-control total_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_sum]" value="" class="form-control total_sum"></td>
                                       
                                </tr>
            
                                `);
                                $("#costEstimateDetailTable > tbody").html(`
                        <tr>
                             <td> <input type="date" class="form-control enquiry_date" name="enquiry_date"  id="enquiry_date" value="" > </td>
                        
                        <td><input type="text" class="form-control contact" name="contact" id="contact" value=""></td>
                        
                        </tr>
                        
                        `);
// var table = $('#costEstimateTable').DataTable(); 
// table.fnFilterClear();


 
                  
                })
 
                $(document).on('click','.delete_data',function (e) {
                   
                    let estimateId = $(this).data('cost-estimate-id');
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.costEstimationDelete') }}",
                    data: {id:estimateId},  
                    success: function( msg ) {
                        // alert(JSON.stringify(msg))
                        $('#estimate-datatable').DataTable().clear().draw();
                       
                    }
                    });

                });

                var table = $('#estimate-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.estimate.list') }}",
                    columns: [
                        {data: 'contact', name: 'contact'},
                        {data: 'date', name: 'date'},
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: true, 
                            searchable: true
                        },
                    ]
                });
                
 

            //////////////// add row event ///////////////
            $(document).ready(function(){
              
              
             
             
                $("#add_btn").click(function (e) {
                    var i = editCount + 1;
                    editCount += 1;
                $("#add_estimate").append('<tr><td><select class="form-control select2" name="addmore['+i+'][component]" data-toggle="select2"><option>Select</option><optgroup label="Layer Types"><option value="External">External</option><option value="Internal">Internal</option><option value="Ground Floor">Ground Floor</option><option value="Roof">Roof</option><option value="Loadbearing">Loadbearing</option></optgroup></select></td><td ><select class="form-control select2" name="addmore['+i+'][type]" data-toggle="select2"><option>Select</option><optgroup label="Layer Types"><option value="Panel">Panel</option><option value="Precut">Precut</option><option value="Structural precut">Structural precut</option></optgroup></select></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][sqm]" class="form-control"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][complexity]" class="form-control"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][detail_price]" class="form-control detail_price detail_price_id"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][detail_sum]" class="form-control detail_sum detail_sum_id"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][statistic_price]" class="form-control statistic_price"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][statistic_sum]" class="form-control statistic_sum"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][cad_cam_price]" class="form-control cad_cam_price"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][cad_cam_sum]" class="form-control cad_cam_sum"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][logistic_price]" class="form-control logistic_price"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][logistic_sum]" class="form-control logistic_sum"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][total_price]" class="form-control total_price"></td><td  ><input  type="number" maxlength="6" name="addmore['+i+'][total_sum]" class="form-control total_sum"></td><td><button  class="delete btn btn-danger"><i class="fa fa-trash"></i></button></td></tr> '); });

                $(document).on("click", ".delete", function (e) {
                    // editCount += 1;
                    e.preventDefault();
                $(this).closest('tr').remove();

                }); 
                function sum(arr) {
                    return arr.reduce(function (a, b) {
                        return a + b;
                    }, 0);
                    }
                var detail_sum = 0;
            
               
               
               
                
            });
             $(document).on('keyup','.detail_sum',function(){
                    console.log('clicked');
                    
                    var detail_edit_val = $('#detail_sum_edit').html();
                    // alert(detail_edit_val)
                        var elements = document.querySelectorAll('.detail_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let detail_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            detail_sum +=  Number(values[i]);
                            }
                            $('#detail_sum_id').html('');
                            $('#detail_sum_id').html(detail_sum);
                        console.log(detail_sum);
                });  

            $(document).on('keyup','.detail_price',function(){
                    console.log('clicked');
                    
                    var detail_edit_val = $('#detail_price_edit').html();
                    // alert(detail_edit_val)
                        var elements = document.querySelectorAll('.detail_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let detail_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            detail_price +=  Number(values[i]);
                            }
                            $('#detail_price_id').html('');
                            $('#detail_price_id').html(detail_price);
                        console.log(detail_price);
                });

                
            $(document).on('keyup','.statistic_sum',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.statistic_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let statistic_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            statistic_sum +=  Number(values[i]);
                            }
                            $('#statistic_sum_id').html(statistic_sum);
                        console.log(statistic_sum);
                }); 

                 $(document).on('keyup','.statistic_price',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.statistic_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let statistic_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            statistic_price +=  Number(values[i]);
                            }
                            $('#statistic_price_id').html(statistic_price);
                        console.log(statistic_price);
                });  
                

                $(document).on('keyup','.cad_cam_sum',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.cad_cam_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let cad_cam_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            cad_cam_sum +=  Number(values[i]);
                            }
                            $('#cad_cam_sum_id').html(cad_cam_sum);
                        console.log(cad_cam_sum);
                }); 


                $(document).on('keyup','.cad_cam_price',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.cad_cam_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let cad_cam_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            cad_cam_price +=  Number(values[i]);
                            }
                            $('#cad_cam_price_id').html(cad_cam_price);
                        console.log(cad_cam_price);
                }); 


                $(document).on('keyup','.logistic_sum',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.logistic_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let logistic_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            logistic_sum +=  Number(values[i]);
                            }
                            $('#logistic_sum_id').html(logistic_sum);
                        console.log(logistic_sum);
                });  

                $(document).on('keyup','.logistic_price',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.logistic_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let logistic_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            logistic_price +=  Number(values[i]);
                            }
                            $('#logistic_price_id').html(logistic_price);
                        console.log(logistic_price);
                });  

                $(document).on('keyup','.total_price',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.total_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let total_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            total_price +=  Number(values[i]);
                            }
                            $('#total_price_id').html(total_price);
                        console.log(total_price);
                }); 

                
                $(document).on('keyup','.total_sum',function(){
                    console.log('clicked');
                        var elements = document.querySelectorAll('.total_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        console.log(values);
                        
                        let total_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            total_sum +=  Number(values[i]);
                            }
                            $('#total_sum_id').html(total_sum);
                        console.log(total_sum);
                }); 

               
            
    </script>
 
       
@endpush
