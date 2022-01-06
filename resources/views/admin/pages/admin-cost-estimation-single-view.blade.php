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
                    <input type="hidden" name="key" id="key" value="{{  $arr['detail']['id'] }}">
                  
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
                                        <td> <input type="date" class="form-control enquiry_date" name="enquiry_date"  id="enquiry_date" value="<?php echo date('Y-m-d'); ?>" > </td>
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
                                        <th >Component</th>
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
                                        <th colspan="3" ></th>
                                        <th ><input type="number" maxlength="6" class="form-control complexity_field" value="" name="complexity_val" id="complexity_val" ></th>
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
                                        <td  width="380px"> 
                                            <select class="form-select select2" name="addmore[<?php echo $i ?>][component]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1"   <?php echo $test['Component'] == "1" ?   "selected" : '' ;?> >External</option>
                                                    <option value="2" <?php echo $test['Component'] == "2" ?   "selected" : '' ;?> >Internal</option>
                                                    <option value="3" <?php echo $test['Component'] == "3" ?   "selected" : '' ;?> >Ground Floor</option>
                                                    
                                                    <!-- <option value="Partition" <?php echo $test['Component'] == "Partition" ?   "selected" : '' ;?>>Partition</option>
                                                    <option value="Ceiling" <?php echo $test['Component'] == "Ceiling" ?   "selected" : '' ;?>>Ceiling</option> -->
                                                    <option value="4" <?php echo $test['Component'] == "4" ?   "selected" : '' ;?>>Roof</option>
                                                    <option value="5" <?php echo $test['Component'] == "5" ?   "selected" : '' ;?>>Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select2" name="addmore[<?php echo $i ?>][type]" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1" <?php echo $test['type'] == "1" ?   "selected" : '' ;?> >Panel</option>
                                                    <option value="2" <?php echo $test['type'] == "2" ?   "selected" : '' ;?>>Precut</option>
                                                    <option value="3" <?php echo $test['type'] == "3" ?   "selected" : '' ;?>>Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][sqm]"  value="{{ $test['sqm'] }}" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][complexity]" value="{{ $test['complexity'] }}" class="form-control"></td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][detail_price]" value="{{ $test['detail_price'] }}" class="form-control detail_price">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][detail_sum]" value="{{ $test['detail_sum'] }}" class="form-control detail_sum">
                                            </div>
                                        </td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][statistic_price]" value="{{ $test['statistic_price'] }}" class="form-control statistic_price">
                                            </div>
                                            
                                        </td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][statistic_sum]" value="{{ $test['statistic_sum'] }}" class="form-control statistic_sum">
                                            </div>
                                            
                                        </td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][cad_cam_price]" value="{{ $test['cad_cam_price'] }}" class="form-control cad_cam_price">
                                            </div>
                                            
                                        </td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][cad_cam_sum]" value="{{ $test['cad_cam_sum'] }}" class="form-control cad_cam_sum">
                                            </div>
                                            
                                        </td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][logistic_price]" value="{{ $test['logistic_price'] }}" class="form-control logistic_price">
                                            </div>
                                            
                                        </td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][logistic_sum]" value="{{ $test['logistic_sum'] }}" class="form-control logistic_sum">
                                            </div>
                                            
                                        </td>
                                        <td >
                                            <div class="btn-group border">
                                                <div class="btn  btn-sm kr">kr</div>
                                                <input  type="number" maxlength="6" name="addmore[<?php echo $i ?>][total_price]" value="{{ $test['total_price'] }}" class="form-control total_price">
                                            </div>
                                        </td>
                                        <td >
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
                                        <td width="180px">
                                            <select class="form-select addmore_component" data-select-id="0" name="addmore[0][component]" required >
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1" >External</option>
                                                    <option value="2">Internal</option>
                                                    <option value="3" >Ground Floor</option>
                                                    <option value="4" >Roof</option>
                                                    <option value="5" >Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  width="180px">
                                            <select class="form-select  addmore_type" required data-select-id="0" name="addmore[0][type]" >
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1" >Panel</option>
                                                    <option value="2">Precut</option>
                                                    <option value="3" >Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][sqm]" id="sqm__0" value="" class="form-control" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][complexity]" id="complexity__0" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_price]" data-detail-price_id="0" id="detail_price__0" value="0" class="form-control detail_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_sum]" data-detail-sum_id="0" id="detail_sum__0" value="0" class="form-control detail_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_price]" data-statistic-price_id="0" id="statistic_price__0" value="0" class="form-control statistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_sum]" data-statistic-sum_id="0" id="statistic_sum__0" value="0" class="form-control statistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_price]" data-cad_cam-price_id="0" id="cad_cam_price__0" value="0" class="form-control cad_cam_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_sum]" data-cad_cam-sum_id="0" id="cad_cam_sum__0" value="0" class="form-control cad_cam_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_price]" data-logistic-price_id="0" id="logistic_price__0" value="0" class="form-control logistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_sum]" data-logistic-sum_id="0" id="logistic_sum__0" value="0" class="form-control logistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_price]" data-total-price_id="0" id="total_price__0" value="0" class="form-control total_price" readonly ></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_sum]" data-total-sum_id="0" id="total_sum__0" value="0" class="form-control total_sum" readonly > </td>
                                    </tr>
                                <?php  } ?>
                                </tbody>
                                <tfoot id="footerform" >
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0"><span class="text-secondary" ><span  id="detail_price_id">{{ $arr['detail_price'] }}<span> </span>    <span id="detail_price_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0"><span class="text-secondary"></span>    <span id="detail_price_id">0</span> </p>
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
                                                </span>    <span id="detail_sum_id">0</span> </p>
                                                <?php } ?>
                                        </td>
                                        <td >
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0"><span class="text-secondary"><span  id="statistic_price_id" >  {{ $arr['statistic_price'] }} </span> </span>    <span id="statistic_price_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_price_id">0</span> </p>
                                                <?php } ?>  
                                        </td>

                                        <td>
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"> <span  id="statistic_sum_id" >  {{ $arr['statistic_sum'] }} </span> </span>    <span id="statistic_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_sum_id">0</span> </p>
                                            <?php } ?>  
                                        </td>

                                        <td>
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"> <span  id="cad_cam_price_id" >  {{ $arr['cad_cam_price'] }} </span> </span>    <span id="cad_cam_price_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_price_id">0</span> </p>
                                            <?php } ?>  
                                        </td>

                                        <td>
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span id="cad_cam_sum_id"> {{ $arr['cad_cam_sum'] }}</span> </span>    <span id="cad_cam_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_sum_id">0</span> </p>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span  id="logistic_price_id" >  {{ $arr['logistic_price'] }} </span> </span>    <span id="logistic_price_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_price_id">0</span> </p>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span id="logistic_sum_id"> {{ $arr['logistic_sum'] }} </span> </span>    <span id="logistic_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_sum_id">0</span> </p>
                                            <?php } ?>
                                        </td>

                                        <td  >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"> <span  id="total_price_id" >  {{ $arr['total_price'] }} </span> </span>    <span id="total_price_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="total_price_id">0</span> </p>
                                            <?php } ?> 
                                        </td>

                                        <td >
                                            <?php if(isset($arr['calculation'])){ ?>
                                            <p class="m-0"><span class="text-secondary"><span id="total_sum_id"> {{ $arr['total_sum'] }}</span></span>    <span id="total_sum_edit_id"></span> </p>
                                            <?php } else { ?>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="total_sum_id">0</span> </p>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <input type="hidden" value="" id="complexity_total" name="complexity_total">
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
@endsection

@push('custom-styles')
<link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<style>
    .form-control.error {
        border: 1px solid red !important;
    }
    .form-select.error {
        border: 1px solid red !important;
    }
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
                display: none !important;
            }
    .table td {
        padding: 0 !important;
    }
           
</style>
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
 
            calculation_total()
            var i=0;
            var comp_val = false;
            var type_val = false;
            var row_id = false;

            $(document).on('change','.addmore_component',function(){
                    comp_val = $(this).val();
                    // alert(comp_val)
                    var row_id = $(this).data('select-id');
                    // alert(row_id)
                    masterCalculation(comp_val,type_val,row_id)
                   
                 });

       
                $(document).on('change','.addmore_type',function(){
                   type_val = $(this).val();
                   var row_id = $(this).data('select-id');
                    masterCalculation(comp_val,type_val,row_id)
                 });
                 $('#add_btn').on('click',function(){
                    calculation_total()
                     ++i;
                     comp_val = false; type_val = false;row_id=false;
                    // alert(i)
                 });
                 function masterCalculation(comp_val,type_val,row_id)
                 {
                    
                    if(comp_val && type_val){
                      
                        $.ajax({
                        type: "GET",
                        url: "{{ route('admin.masterCalculation') }}",
                        data: {
                            component_id:comp_val,
                            type_id:type_val
                            }, 
                            success: function(msg) {
                            // alert(JSON.stringify(msg.data))
                                $('#estimate-datatable').DataTable().clear().draw();
                                // alert(row_id)
                                $(`#sqm__${row_id}`).val(msg.data.sqm);
                                $(`#complexity__${row_id}`).val(msg.data.complexity);
                                $(`#detail_price__${row_id}`).val(msg.data.detail_price);
                                $(`#detail_sum__${row_id}`).val(msg.data.detail_sum);
                                $(`#statistic_price__${row_id}`).val(msg.data.statistic_price);
                                $(`#statistic_sum__${row_id}`).val(msg.data.statistic_sum);
                                $(`#cad_cam_price__${row_id}`).val(msg.data.cad_cam_price);
                                $(`#cad_cam_sum__${row_id}`).val(msg.data.cad_cam_sum);
                                $(`#logistic_price__${row_id}`).val(msg.data.logistic_price);
                                $(`#logistic_sum__${row_id}`).val(msg.data.logistic_sum);
                                $(`#total_price__${row_id}`).val(msg.data['total_price']);
                                $(`#total_sum__${row_id}`).val(msg.data['total_sum']);
                                $("input.error").removeClass("error");
                                comp_val = false; type_val = false;row_id=false;
                                detail_change_price()
                                detail_change_sum()
                                statistic_change_price()
                                statistic_change_sum()
                                cad_cam_change_price()
                                cad_cam_change_sum()
                                logistic_change_price()
                                logistic_change_sum()
                                total_change_price()
                                total_change_sum()
                                total_price_val()
                                total_sum_val()
                                calculation_total()
                            }
    
                        });
                    }
                        

                 }
            
    }); 

                function detail_change_price(){
                    var detail_edit_val = $('#detail_price_edit').html();
                    // alert(detail_edit_val)
                        var elements = document.querySelectorAll('.detail_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                        let detail_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            detail_price +=  Number(values[i]);
                            }
                            $('#detail_price_id').html('');
                            $('#detail_price_id').html(detail_price);
                        console.log(detail_price);
                }
                function detail_change_sum(){
                    var detail_edit_val = $('#detail_sum_edit').html();
                    // alert(detail_edit_val)
                        var elements = document.querySelectorAll('.detail_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        
                        let detail_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            detail_sum +=  Number(values[i]);
                            }
                            $('#detail_sum_id').html('');
                            $('#detail_sum_id').html(detail_sum);
                        console.log(detail_sum);
                }
                function statistic_change_price()
                {
                    var elements = document.querySelectorAll('.statistic_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        
                        let statistic_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            statistic_price +=  Number(values[i]);
                            }
                            $('#statistic_price_id').html(statistic_price);
                }
                function statistic_change_sum()
                {
                    var elements = document.querySelectorAll('.statistic_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        
                        let statistic_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            statistic_sum +=  Number(values[i]);
                            }
                            $('#statistic_sum_id').html(statistic_sum);
                }
                function cad_cam_change_price()
                {
                    var elements = document.querySelectorAll('.cad_cam_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        
                        let cad_cam_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            cad_cam_price +=  Number(values[i]);
                            }
                            $('#cad_cam_price_id').html(cad_cam_price);
                        
                }
                function cad_cam_change_sum()
                {
                    var elements = document.querySelectorAll('.cad_cam_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        
                        let cad_cam_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            cad_cam_sum +=  Number(values[i]);
                            }
                            $('#cad_cam_sum_id').html(cad_cam_sum);
                }
                function logistic_change_price()
                {
                    var elements = document.querySelectorAll('.logistic_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        
                        let logistic_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            logistic_price +=  Number(values[i]);
                            }
                            $('#logistic_price_id').html(logistic_price);
                }
                function logistic_change_sum()
                {
                    var elements = document.querySelectorAll('.logistic_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        
                        let logistic_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            logistic_sum +=  Number(values[i]);
                            }
                            $('#logistic_sum_id').html(logistic_sum);
                }
                function total_change_price()
                {
                    var elements = document.querySelectorAll('.total_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                        // console.log(values);
                        let total_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            total_price +=  Number(values[i]);
                            }
                            $('#total_price_id').html(total_price);
                        
                            
                }
                function total_change_sum()
                {
                    var elements = document.querySelectorAll('.total_sum');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                        // console.log(values);
                        let total_sum = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(i)
                            total_sum +=  Number(values[i]);
                            }
                            $('#total_sum_id').html(total_sum);
                }


        
    </script>
    <script>
        let editCount = 0;
        let rowCount = 0;
        //    $(document).ready(function() {
        //         $('#example').DataTable();
        //     } );


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
                            
                            'complexity_val': {
                                required: true,
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
                        // messages: {

                        //     'enquiry_date': {
                        //         required: "Please enter Date",
                        //     },
                        //     'contact': {
                        //         required: "Please enter Title",
                        //     },
                        //     'addmore[0][component]': {
                        //         required: "Please enter value1",
                        //     },
                        //     'addmore[0][type]': {
                        //         required: "Please enter value1",
                        //     },
                        //     'addmore[0][complexity]': {
                        //         required: "Please enter value",
                        //     },
                        //     'addmore[0][sqm]': {
                        //         required: "Please enter value",
                        //     },
                        //     'addmore[0][complexity]': {
                        //         required: "Please enter value",
                        //     },
                        //     'addmore[0][detail_price]': {
                        //         required: "Please enter value",
                        //     },
                        //     'addmore[0][detail_sum]': {
                        //         required: "Please enter sum",
                        //     },
                        //     'addmore[0][statistic_price]': {
                        //         required: "Please enter value",
                        //     },
                        //     'addmore[0][statistic_sum]': {
                        //         required: "Please enter sum",
                        //     },
                        //     'addmore[0][cad_cam_price]': {
                        //         required: "Please enter value",
                        //     },
                        //     'addmore[0][cad_cam_sum]': {
                        //         required: "Please enter sum",
                        //     },
                        //     'addmore[0][logistic_price]': {
                        //         required: "Please enter value",
                        //     },
                        //     'addmore[0][logistic_sum]': {
                        //         required: "Please enter sum",
                        //     },
                        //     'addmore[0][total_price]': {
                        //         required: "Please value",
                        //     },
                        //     'addmore[0][total_sum]': {
                        //         required: "Please enter sum",
                        //     },
                            
                            
                            

                        // },
                    
                    
                }); 
        });

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
                        Message('success', msg.msg);
                        $("#costEstimateTable > tbody").html('');
                        $("#footerform").html('');
                        $("#key").val('');
                        $("#enquiry_date").val('<?php echo date('Y-m-d'); ?>');
                        $("#contact").val('');
                        $("#complexity_val").val('');
                        $('#generate_btn').html('Generate Estimate');

                        
                        $("#costEstimateTable > tbody").html(`
                            
                        <tr>
                                        <td width="180px">
                                            <select class="form-select addmore_component select2" data-select-id="0" name="addmore[0][component]" required  data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1"  >External</option>
                                                    <option value="2">Internal</option>
                                                    <option value="3" >Ground Floor</option>
                                                    <option value="4" >Roof</option>
                                                    <option value="5" >Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  width="180px">
                                            <select class="form-select select2 addmore_type" required data-select-id="0" name="addmore[0][type]"  data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1" >Panel</option>
                                                    <option value="2">Precut</option>
                                                    <option value="3" >Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][sqm]" id="sqm__0" value="" class="form-control" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][complexity]" id="complexity__0" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_price]" data-detail-price_id="0" id="detail_price__0" value="0" class="form-control detail_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_sum]" data-detail-sum_id="0" id="detail_sum__0" value="0" class="form-control detail_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_price]" data-statistic-price_id="0" id="statistic_price__0" value="0" class="form-control statistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_sum]" data-statistic-sum_id="0" id="statistic_sum__0" value="0" class="form-control statistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_price]" data-cad_cam-price_id="0" id="cad_cam_price__0" value="0" class="form-control cad_cam_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_sum]" data-cad_cam-sum_id="0" id="cad_cam_sum__0" value="0" class="form-control cad_cam_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_price]" data-logistic-price_id="0" id="logistic_price__0" value="0" class="form-control logistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_sum]" data-logistic-sum_id="0" id="logistic_sum__0" value="0" class="form-control logistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_price]" data-total-price_id="0" id="total_price__0" value="0" class="form-control total_price" readonly></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_sum]" data-total-sum_id="0" id="total_sum__0" value="0" class="form-control total_sum" readonly></td>
                        </tr>
            
            `);

            $("#costEstimateTable > tfoot").html(`
            <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            
                                                <p class="m-0"><span class="text-secondary"></span>    <span id="detail_price_id">0</span> </p>
                                        
                                        </td>
                                        <td >
                                                <p class="m-0"><span class="text-secondary"></span>    <span id="detail_sum_id">0</span> </p>
                                        </td>
                                        <td >
                                                <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_price_id">0</span> </p>
            
                                        </td>

                                        <td>
                                           
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="statistic_sum_id">0</span> </p>
                                           
                                        </td>

                                        <td>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_price_id">0</span> </p>
                                           
                                        </td>

                                        <td>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="cad_cam_sum_id">0</span> </p>

                                        </td>

                                        <td>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_price_id">0</span> </p>

                                        </td>

                                        <td>
                                            <p class="m-0"><span class="text-secondary"></span>    <span id="logistic_sum_id">0</span> </p>

                                        </td>

                                        <td  >

                                            <p class="m-0"><span class="text-secondary"></span>    <span id="total_price_id">0</span> </p>

                                        </td>

                                        <td >

                                            <p class="m-0"><span class="text-secondary"></span>    <span id="total_sum_id">0</span> </p>
                                  
                                        </td>
                                        <td>
                                            <input type="hidden" value="" id="complexity_total" name="complexity_total">
                                        </td>
                                       
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
                    
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.costEstimationEdit') }}",
                    data: {id:estimateId}, 
                    success: function( msg ) {
                        calculation_total()
                        editCount = msg.data.calculation.length;
                        console.log(editCount);
                        $("#costEstimateTable > tbody").append(`
                         <input type="hidden" name="count_data" id="_count_data_" value="${msg.data.calculation.length}" >
                         `);
                        //  alert(msg.data.complexity_val)
                        //  $("#costEstimateTable > thead").append(`
                        //  <input type="number" maxlength="6" class="form-control complexity_field" value="${msg.data.detail.complexity_val}" name="complexity_val" id="complexity_val" >
                        //  `);
                         $('#complexity_val').val(`${msg.data.detail.complexity_val}`);
                        for(i=0;i<msg.data.calculation.length;i++){
                            // alert(JSON.stringify(msg.data.detail.complexity_val))
                            let detail = msg.data.calculation[i];let selected = 'selected';
                           
                            console.log(detail);
                                $("#costEstimateTable > tbody").append(`
                                    
                                    <tr>
                                    <input type="hidden" name="addmore[${i}][test]" value=" ${detail.id }" >
                                            
                                                <td >
                                                <select class="form-select select2 addmore_component" data-select-id="0" name="addmore[${i}][component]" data-toggle="select2">
                                                        <option value="">Select</option>
                                                        <optgroup label="Layer Types">
                                                            <option value="1" ${detail.Component == '1' ? selected : ''}  >External</option>
                                                            <option value="2" ${detail.Component == '2' ? selected : ''}  >Internal</option>
                                                            <option value="3" ${detail.Component == '3' ? selected : ''} >Ground Floor</option>
                                                        
                                                            <option value="4" ${detail.Component == '4' ? selected : ''} >Roof</option>
                                                            <option value="5" ${detail.Component == '5' ? selected : ''} >Loadbearing</option>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td >
                                                <select class="form-control select2 addmore_type" data-select-id="0" name="addmore[${i}][type]" data-toggle="select2">
                                                        <option value="">Select</option>
                                                        <optgroup label="Layer Types">
                                                            <option value="1" ${detail.type == "1" ?   "selected" : '' } >Panel</option>
                                                            <option value="2" ${detail.type == "2" ?   "selected" : '' }>Precut</option>
                                                            <option value="3" ${detail.type == "3" ?   "selected" : '' }>Structural precut</option>
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][sqm]"  value="${detail.sqm}" id="sqm__${i}" class="form-control"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][complexity]" value="${detail.complexity}" id="complexity__${i}" class="form-control"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][detail_price]" data-detail-price_id="${i}" value="${detail.detail_price}" id="detail_price__${i}" class="form-control detail_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][detail_sum]" data-detail-sum_id="${i}" value="${detail.detail_sum}" id="detail_sum__${i}" class="form-control detail_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][statistic_price]" data-statistic-price_id="${i}" value="${detail.statistic_price}" id="statistic_price__${i}" class="form-control statistic_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][statistic_sum]" data-statistic-sum_id="${i}" value="${detail.statistic_sum}" id="statistic_sum__${i}" class="form-control statistic_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][cad_cam_price]" data-cad_cam-price_id="${i}" value="${detail.cad_cam_price}" id="cad_cam_price__${i}" class="form-control cad_cam_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][cad_cam_sum]" data-cad_cam-sum_id="${i}" value="${detail.cad_cam_sum}" id="cad_cam_sum__${i}" class="form-control cad_cam_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][logistic_price]" data-logistic-price_id="${i}" value="${detail.logistic_price}" id="logistic_price__${i}" class="form-control logistic_price"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][logistic_sum]" data-logistic-sum_id="${i}" value="${detail.logistic_sum}" id="logistic_sum__${i}" class="form-control logistic_sum"></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][total_price]" data-total-price_id="${i}" value="${detail.total_price}" id="total_price__${i}" class="form-control total_price" readonly></td>
                                                <td  ><input  type="number" maxlength="6" name="addmore[${i}][total_sum]" data-total-sum_id="${i}" value="${detail.total_sum}" id="total_sum__${i}" class="form-control total_sum" readonly></td>
                                            
                                        </tr>
                    
                            `);
                        }
                        
                        $("#costEstimateDetailTable > tbody").html(`
                        <tr>
                             <td> <input type="date" class="form-control enquiry_date" name="enquiry_date"  id="enquiry_date" value="${msg.data.detail.date}" > </td>
                        <td><input type="text" class="form-control contact" name="contact" id="contact" value="${msg.data.detail.contact}"></td>
                        <input type="hidden" name="key" id="key" value="${msg.data.detail.id}">
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
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="total_price_id">${msg.data.detail.complexity_total}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span id="total_sum_id">${msg.data.total_sum} </span></p>
                                </td>
                                <td>
                                            <input type="hidden" value="${msg.data.detail.complexity_total}" id="complexity_total" name="complexity_total">
                                        </td>
                            </tr>

                        `);
                        

                     
                    }
                    });
                });



                $("#cancel_btn").click(function (e) {
                    alert()
                    comp_val = false; type_val = false;row_id=false;
                    $("#costEstimationSingleForm").validate().resetForm();
                    $('#generate_btn').html(`Generate Estimate`);
                    $("#costEstimateTable > tbody").html('');
                    // $("#costEstimateTable > tbody").val('');
                        $("#contact").removeAttr('value');
                        // $("#contact").val('');
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
                        $("#enquiry_date").val('<?php echo date('Y-m-d'); ?>');
                     
                    $("#costEstimateTable > tbody").html(`
                            
                    <tr>
                                        <td width="180px">
                                            <select class="form-select addmore_component select2" data-select-id="0" name="addmore[0][component]" required  data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1" >External</option>
                                                    <option value="2">Internal</option>
                                                    <option value="3" >Ground Floor</option>
                                                    <option value="4" >Roof</option>
                                                    <option value="5" >Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  width="180px">
                                            <select class="form-select select2 addmore_type" required data-select-id="0" name="addmore[0][type]"  data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1" >Panel</option>
                                                    <option value="2">Precut</option>
                                                    <option value="3" >Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][sqm]" id="sqm__0" value="" class="form-control" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][complexity]" id="complexity__0" value="" class="form-control"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_price]" data-detail-price_id="0" id="detail_price__0" value="0" class="form-control detail_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][detail_sum]" data-detail-sum_id="0" id="detail_sum__0" value="0" class="form-control detail_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_price]" data-statistic-price_id="0" id="statistic_price__0" value="0" class="form-control statistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][statistic_sum]" data-statistic-sum_id="0" id="statistic_sum__0" value="0" class="form-control statistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_price]" data-cad_cam-price_id="0" id="cad_cam_price__0" value="0" class="form-control cad_cam_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][cad_cam_sum]" data-cad_cam-sum_id="0" id="cad_cam_sum__0" value="0" class="form-control cad_cam_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_price]" data-logistic-price_id="0" id="logistic_price__0" value="0" class="form-control logistic_price"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][logistic_sum]" data-logistic-sum_id="0" id="logistic_sum__0" value="0" class="form-control logistic_sum"></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_price]" data-total-price_id="0" id="total_price__0" value="0" class="form-control total_price" readonly ></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[0][total_sum]" data-total-sum_id="0" id="total_sum__0" value="0" class="form-control total_sum" readonly > </td>
                                    </tr>
                        
                        `);
                        
// var table = $('#costEstimateTable').DataTable(); 
// table.fnFilterClear();
                })
 
                $(document).on('click','.delete_data',function (e) {
                    let estimateId = $(this).data('cost-estimate-id');
					swal({
						title: "Are you sure?",
						text: "Once deleted, you will not be able to recover this Data!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					}).then((willDelete) => {
                        // alert(willDelete)
						if (willDelete) {
							$.ajax({
                                type: "GET",
                        url: "{{ route('admin.costEstimationDelete') }}",
                        data: {id:estimateId},                         
							}).then(function (response) {
								 
								// getData($http, API_URL);
                                $('#estimate-datatable').DataTable().clear().draw();
                              
                                if(response.data.status == false) {
                                    
                                    Message('warning',response.data.msg);
                                    // angular.element(document.querySelector("#loader")).addClass("d-none"); 

                                }
                                
                                if(response.data.status == true) {
                                   
                                    Message('success', response.data.msg);
                                }  
                                
                                    
							}, function (error) {
								console.log(error);
                                Message('warning',response.data.msg);
								console.log('Unable to delete');
							});

						} else {
                            $('#estimate-datatable').DataTable().clear().draw();
							swal("Your Data is safe!");
						}
                        // $('#estimate-datatable').DataTable().clear().draw();
 
					});
                });


            //     $(document).on('click','.delete_data',function (e) {
                   
            //        let estimateId = $(this).data('cost-estimate-id');
            //        $.ajax({
            //        type: "GET",
            //        url: "{{ route('admin.costEstimationDelete') }}",
            //        data: {id:estimateId},  
            //        success: function( msg ) {
            //            Message('success', msg.msg);
            //            $('#estimate-datatable').DataTable().clear().draw();
                      
            //        }
            //        });

            //    });

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
                 calculation_total()
                    
                    var i = editCount + 1;
                    editCount += 1;
                $("#add_estimate").append(`
                                        <tr>
                                        <td width="180px">
                                            <select class="form-select select2 validateArray addmore_component" data-select-id="${i}" name="addmore[${i}][component]" required data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1"  >External</option>
                                                    <option value="2">Internal</option>
                                                    <option value="3" >Ground Floor</option>
                                                    <option value="4" >Roof</option>
                                                    <option value="5" >Loadbearing</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  width="180px">
                                            <select class="form-select select2 addmore_type"   required name="addmore[${i}][type]" data-select-id="${i}" data-toggle="select2">
                                                <option value="">Select</option>
                                                <optgroup label="Layer Types">
                                                    <option value="1" >Panel</option>
                                                    <option value="2">Precut</option>
                                                    <option value="3" >Structural precut</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][sqm]" id="sqm__${i}" value="" class="form-control" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][complexity]" id="complexity__${i}" value="" class="form-control" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][detail_price]"  data-detail-price_id=${i} id="detail_price__${i}" value="0" class="form-control detail_price" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][detail_sum]" data-detail-sum_id=${i} id="detail_sum__${i}" value="0" class="form-control detail_sum" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][statistic_price]" data-statistic-price_id=${i} id="statistic_price__${i}" value="0" class="form-control statistic_price" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][statistic_sum]" data-statistic-sum_id=${i} id="statistic_sum__${i}" value="0" class="form-control statistic_sum" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][cad_cam_price]" data-cad_cam-price_id=${i} id="cad_cam_price__${i}" value="0" class="form-control cad_cam_price" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][cad_cam_sum]" data-cad_cam-sum_id=${i} id="cad_cam_sum__${i}" value="0" class="form-control cad_cam_sum" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][logistic_price]" data-logistic-price_id=${i} id="logistic_price__${i}" value="0" class="form-control logistic_price" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][logistic_sum]" data-logistic-sum_id=${i} id="logistic_sum__${i}" value="0" class="form-control logistic_sum" required></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][total_price]" data-total-price_id=${i} id="total_price__${i}" value="0" class="form-control total_price" readonly></td>
                                        <td  ><input  type="number" maxlength="6" name="addmore[${i}][total_sum]" data-total-sum_id=${i} id="total_sum__${i}" value="0" class="form-control total_sum" readonly></td>
                                       
                                        <td><button  class="delete btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                       </tr> `); });

                $(document).on("click", ".delete", function (e) {
                    // alert()
                    // editCount += 1;
                    calculation_total()
                    e.preventDefault();
                $(this).closest('tr').remove();
                                detail_change_price()
                                detail_change_sum()
                                statistic_change_price()
                                statistic_change_sum()
                                cad_cam_change_price()
                                cad_cam_change_sum()
                                logistic_change_price()
                                logistic_change_sum()
                                total_change_price()
                                total_change_sum()
                                calculation_total()

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

            $(document).on('keyup change','.detail_price',function(){
                // alert()
                // alert(editCount)
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
                            // total_price_val()
                            var row_total = parseInt($(`#detail_price__${editCount}`).val()) + parseInt($(`#statistic_price__${editCount}`).val()) + parseInt($(`#cad_cam_price__${editCount}`).val()) + parseInt($(`#logistic_price__${editCount}`).val());
                            $(`#total_price__${editCount}`).html(row_total)
                        console.log(detail_price);   
                });
                function total_price_val()
                    {
                        var total_cost_price = parseInt($('#detail_price_id').html()) + parseInt($('#statistic_price_id').html()) + parseInt($('#cad_cam_price_id').html()) + parseInt($('#logistic_price_id').html());
                        $('#total_price_id').html(total_cost_price); 
                        calculation_total()
                    }

                function total_sum_val()
                    {
                        var total_cost_sum = parseInt($('#detail_sum_id').html()) + parseInt($('#statistic_sum_id').html()) + parseInt($('#cad_cam_sum_id').html()) + parseInt($('#logistic_sum_id').html());
                        $('#total_sum_id').html(total_cost_sum);
                        calculation_total()
                    }
                function calculation_total()
                {
                   var cal = $('#complexity_val').val();
                   var total_sum_id = $('#total_sum_id').html();
                   if(cal)
                   {
                    var ss = (parseInt(total_sum_id))/(parseInt(cal));
                    // alert(ss)
                    $('#total_price_id').html(ss)
                    $('#complexity_total').val(ss);
                   }
                }


                 
                $(document).on('keyup change','.complexity_field',function(){
                    //(editCount)
                    //  alert(editCount)
                    var cal = $('#complexity_val').val();
                   var total_sum_id = $('#total_sum_id').html();
                   if(cal)
                   {
                    var ss = (parseInt(total_sum_id))/(parseInt(cal));
                    // alert(ss)
                    $('#total_price_id').html(ss)
                    $('#complexity_total').val(ss);

                   }

                });
                $(document).on('keyup change','.detail_price',function(){
               
                     var row_id = $(this).data('detail-price_id');
                    //  alert(row_id)
                   var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
                   $(`#total_price__${row_id}`).val(row_total_price)
                   total_price_val()

                });
                $(document).on('keyup change','.statistic_price',function(){
                    // alert(editCount)
                    var row_id = $(this).data('statistic-price_id');
                    //  alert(row_id)
                   var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
                   $(`#total_price__${row_id}`).val(row_total_price)
                   total_price_val()
                   
                    // alert(row_total)

                });
                $(document).on('keyup change','.cad_cam_price',function(){
                    // alert(editCount)
                    var row_id = $(this).data('cad_cam-price_id');
                    //  alert(row_id)
                   var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
                   $(`#total_price__${row_id}`).val(row_total_price)
                    // alert(row_total)
                    total_price_val()
                });
                $(document).on('keyup change','.logistic_price',function(){
                    // alert(editCount)
                    var row_id = $(this).data('logistic-price_id');
                    //  alert(row_id)
                   var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
                   $(`#total_price__${row_id}`).val(row_total_price)
                    // alert(row_total)
                    total_price_val()
                });


                $(document).on('keyup change','.detail_sum',function(){

                    var row_id = $(this).data('detail-sum_id');
                   var row_total_sum = parseInt($(`#detail_sum__${row_id}`).val()) + parseInt($(`#statistic_sum__${row_id}`).val()) + parseInt($(`#cad_cam_sum__${row_id}`).val()) + parseInt($(`#logistic_sum__${row_id}`).val());
                   $(`#total_sum__${row_id}`).val(row_total_sum)
                   total_sum_val()
                    // alert(row_total)
                });
                $(document).on('keyup change','.statistic_sum',function(){
                    var row_id = $(this).data('statistic-sum_id');
                   var row_total_sum = parseInt($(`#detail_sum__${row_id}`).val()) + parseInt($(`#statistic_sum__${row_id}`).val()) + parseInt($(`#cad_cam_sum__${row_id}`).val()) + parseInt($(`#logistic_sum__${row_id}`).val());
                   $(`#total_sum__${row_id}`).val(row_total_sum)
                   total_sum_val()
                });
                $(document).on('keyup change','.cad_cam_sum',function(){
                    // alert(editCount)
                    var row_id = $(this).data('cad_cam-sum_id');
                   var row_total_sum = parseInt($(`#detail_sum__${row_id}`).val()) + parseInt($(`#statistic_sum__${row_id}`).val()) + parseInt($(`#cad_cam_sum__${row_id}`).val()) + parseInt($(`#logistic_sum__${row_id}`).val());
                   $(`#total_sum__${row_id}`).val(row_total_sum)
                    // alert(row_total)
                    total_sum_val()
                });
                $(document).on('keyup change','.logistic_sum',function(){
                    // alert(editCount)
                    var row_id = $(this).data('logistic-sum_id');
                   var row_total_sum = parseInt($(`#detail_sum__${row_id}`).val()) + parseInt($(`#statistic_sum__${row_id}`).val()) + parseInt($(`#cad_cam_sum__${row_id}`).val()) + parseInt($(`#logistic_sum__${row_id}`).val());
                   $(`#total_sum__${row_id}`).val(row_total_sum)
                    // alert(row_total)
                    total_sum_val()
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

                Message = function (type, head) {
            $.toast({
                heading: head,
                icon: type,
                showHideTransition: 'plain', 
                allowToastClose: true,
                hideAfter: 5000,
                stack: 10, 
                position: 'bootom-left',
                textAlign: 'left', 
                loader: true, 
                loaderBg: '#252525',                
            });
        }
            
    </script>
 
       
@endpush
