@extends('layouts.admin')

@section('admin-content')



    <div class="content-page">
        <div class="content">

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater')

                {{-- <!-- {{ route('admin.costEstimationSingleForm') }} --> --}}
            
                <form action="" id="costEstimationSingleForm"   method="POST" >
                  @csrf
                    <?php  if(isset($arr['detail'])){ ?>
                        <input type="hidden" name="key" id="key" value="{{  $arr['detail']['id'] }}">
                    <?php } ?>
                    {{-- <div class="card shadow-lg">
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
                                    <th class="bg-white"> <input type="date" class="form-control enquiry_date" name="enquiry_date" id="enquiry_date" value="{{ $arr['detail']['date'] }}" > </th>
                                    <?php }else { ?>
                                        <th class="bg-white"> <input type="date" class="form-control enquiry_date" name="enquiry_date"  id="enquiry_date" value="<?php echo date('Y-m-d'); ?>" > </th>
                                    <?php  } ?>

                                    <?php  if(isset($arr['detail'])){ ?>
                                    <th class="bg-white"><input type="text" class="form-control contact" name="contact" id="contact" value="{{ $arr['detail']['contact'] }}"></th>
                                    <?php }else { ?>
                                    <th class="bg-white"><input type="text" class="form-control contact" placeholder="Type here.." name="contact" id="contact" value=""></th>
                                    <?php  } ?>
                                       
                                    </tr>
                                </tbody>
                            </table>
    
                        </div>  
                    </div> --}}
                   
                    <div class="card shadow">
                        
                        <div class="card-body   table-rer" >
                          
                            <div class="row mx-0 mb-2">
                                <div class="col">
                                    <div class="mb-2 row align-items-center">
                                        <label for="" class="text-primary col-3 p-0 ">Estimate Date </label>
                                        <div class="col-9">
                                            <?php  if(isset($arr['detail'])){ ?>
                                            <input type="date" class="form-control form-control-sm enquiry_date" name="enquiry_date" id="enquiry_date" value="{{ $arr['detail']['date'] }}" >
                                            <?php }else { ?>
                                            <input type="date" class="form-control form-control-sm enquiry_date" name="enquiry_date"  id="enquiry_date" value="<?php echo date('Y-m-d'); ?>" >
                                            <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <label for="" class="text-primary p-0 col-3 ">Estimate Title</label>
                                        <div class="col-9">
                                            <?php  if(isset($arr['detail'])){ ?>
                                            <input type="text" class="form-control form-control-sm contact" name="contact" id="contact" value="{{ $arr['detail']['contact'] }}">
                                            <?php }else { ?>
                                            <input type="text" class="form-control form-control-sm contact" placeholder="Type here.." name="contact" id="contact" value="">
                                            <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="table-responsives p-0">
                                <table class="cost-estimate-table table table-bordered border"  id="costEstimateTable">
                                    <thead>
                                        <tr  style="background: #0D2E67 !important">
                                            <td colspan="16" class="text-center"><h5 class="m-0 py-1 text-white">Engineering Estimation</h5></td>
                                        </tr>
                                        <tr class="font-weight-bold ">
                                            <th rowspan="2" class="text-center " style="background: #1d336b !important">
                                                <span class="mb-1 font-12">Component</span>
                                                <button class="btn-sm btn font-12 btn-info shadow-0 w-100 py-0 add_row_cal"  id="add_btn"><i class="fa fa-plus"></i> Add </button>
                                            </th>
                                            <th rowspan="2" class="text-center font-12" style="background: #1d336b !important;with:300px  !important">Type</th>
                                            <th rowspan="2" class="text-center font-12" style="background: #1d336b !important" >Sq.M</th>
                                            <th class="text-center font-12" style="background: #1d336b !important" >1 to 2</th>
                                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">Details</th>
                                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">Statistics</th>
                                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">CAD/CAM</th>
                                            <th colspan="2" class="font-12 text-center" style="background: #0071A8 !important">Logistics</th>
                                            <th colspan="2" class="font-12 text-center" style="background: #1d336b !important">Total Cost</th>
                                            <td rowspan="2" class="font-12 text-center text-white" style="background: #1d336b !important"><b>Action</b></td>
                                        </tr>
                                        <tr class="bg-light-primary border" >
                                            <th class="text-center font-12" style="background: #1d336b !important" >Complexity</th> 
                                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                                            <th class="text-center" style="background: #046b9e !important"><small>Nok/M<sup>2</sup></small></th>
                                            <th class="text-center" style="background: #0571a7 !important"><small>Sum</small></th> 
                                            <th class="text-center" style="background: #1d336b !important"><small>Nok/M<sup>2</sup></small></th>
                                            <th class="text-center" style="background: #1d336b !important"><small>Sum</small></th>  
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="add_estimate">
                    
                                            <tr>
                                                <td width="180px">
                                                    <select class="form-select addmore_component" data-select-id="0" name="addmore[0][component]" id="addmore[0][component]" required style="min-width: 100px !important">
                                                        <option value="">Select</option>
                                                            @foreach($data['component'] as $val)
                                                            <option value="{{ $val['id'] }}" >{{ $val['building_component_name'] }}</option>
                                                            @endforeach
                                                    </select>
                                                </td>
                                                <td  width="180px">
                                                    <select class="form-select  addmore_type" required data-select-id="0" name="addmore[0][type]" id="addmore[0][type]" style="min-width: 100px !important">
                                                        <option value="">Select</option>
                                                        @foreach($data['type'] as $val)
                                                            <option value="{{ $val['id'] }}" >{{ $val['building_type_name'] }}</option>
                                                            @endforeach
                                                    </select>
                                                </td>
                                                <td  ><input  type="number"  name="addmore[0][sqm]" min="1" data-sqm_id="0" id="sqm__0" value="1" class="my-control sqm_val" required></td>
                                                <td  ><input  type="number"  name="addmore[0][complexity]" step="0.1" min="1" max="2" data-complexity_id="0" id="complexity__0" value="1" class="my-control complexity_val"></td>
                                                <td  ><input  type="number"  name="addmore[0][detail_price]" min="0" data-detail-price_id="0" id="detail_price__0" value="0" class="my-control detail_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][detail_sum]" min="0" data-detail-sum_id="0" id="detail_sum__0" value="0" class="my-control detail_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][statistic_price]" min="0" data-statistic-price_id="0" id="statistic_price__0" value="0" class="my-control statistic_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][statistic_sum]" min="0" data-statistic-sum_id="0" id="statistic_sum__0" value="0" class="my-control statistic_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][cad_cam_price]" min="0" data-cad_cam-price_id="0" id="cad_cam_price__0" value="0" class="my-control cad_cam_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][cad_cam_sum]" min="0" data-cad_cam-sum_id="0" id="cad_cam_sum__0" value="0" class="my-control cad_cam_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][logistic_price]" min="0" data-logistic-price_id="0" id="logistic_price__0" value="0" class="my-control logistic_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][logistic_sum]" min="0" data-logistic-sum_id="0" id="logistic_sum__0" value="0" class="my-control logistic_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][total_price]" min="0" data-total-price_id="0" id="total_price__0" value="0" class="my-control total_price" readonly ></td>
                                                <td  ><input  type="number"  name="addmore[0][total_sum]" min="0" data-total-sum_id="0" id="total_sum__0" value="0" class="my-control total_sum" readonly > </td>
                                                <td style="text-align:center !important" class="delete_row_btn" data-delete_row_id="0"><span > <i style="cursor:pointer;font-size:18px" class="fa fa-trash-alt shadow-sm btn text-danger"></i> </span></td>
                                            </tr> 
                                    </tbody>
                                    <tfoot id="footerform" >
                                        <tr class="text-white " style="background: #0D2E67"> 
                                            <td colspan="2" class="text-center">
                                                <b>Total</b>
                                            </td>
                                            <td>
                                            <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="sqm_total_id">1</span> </p>
                                            </td>
                                            <td>
                                            <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="complexity_total_id">1</span> </p>
                                            </td>
                                            <td  id="detail_price_id">
                                                <?php if(isset($arr['calculation'])){ ?>
                                                     {{ $arr['detail_price'] }} 
                                                        <?php } else { ?>
                                                        0
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0 p-0"><span class="text-secondary" >
                                                    <!-- Detail Sum : -->
                                                        <span  id="detail_sum_id">{{ $arr['detail_add'] }}<span> </span>    <span id="detail_sum_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0 p-0"><span class="text-secondary">
                                                    <!-- Detail Sum : -->
                                                </span> <span id="detail_sum_id">0</span> </p>
                                                <?php } ?>
                                            </td>
                                            <td >
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"><span  id="statistic_price_id" >  {{ $arr['statistic_price'] }} </span> </span>    <span id="statistic_price_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="statistic_price_id">0</span> </p>
                                                    <?php } ?>  
                                            </td>
        
                                            <td>
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0 p-0"><span class="text-secondary"> <span  id="statistic_sum_id" >  {{ $arr['statistic_sum'] }} </span> </span>    <span id="statistic_sum_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="statistic_sum_id">0</span> </p>
                                                <?php } ?>  
                                            </td>
        
                                            <td>
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0 p-0"><span class="text-secondary"> <span  id="cad_cam_price_id" >  {{ $arr['cad_cam_price'] }} </span> </span>    <span id="cad_cam_price_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="cad_cam_price_id">0</span> </p>
                                                <?php } ?>  
                                            </td>
        
                                            <td>
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0 p-0"><span class="text-secondary"><span id="cad_cam_sum_id"> {{ $arr['cad_cam_sum'] }}</span> </span>    <span id="cad_cam_sum_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="cad_cam_sum_id">0</span> </p>
                                                <?php } ?>
                                            </td>
        
                                            <td>
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0 p-0"><span class="text-secondary"><span  id="logistic_price_id" >  {{ $arr['logistic_price'] }} </span> </span>    <span id="logistic_price_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="logistic_price_id">0</span> </p>
                                                <?php } ?>
                                            </td>
        
                                            <td>
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0 p-0"><span class="text-secondary"><span id="logistic_sum_id"> {{ $arr['logistic_sum'] }} </span> </span>    <span id="logistic_sum_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="logistic_sum_id">0</span> </p>
                                                <?php } ?>
                                            </td>
        
                                            <td >
                                                <?php if(isset($arr['calculation'])){ ?>
                                                <p class="m-0 p-0"><span class="text-secondary"> <span  id="total_price_id" >  {{ $arr['total_price'] }} </span> </span>    <span id="total_price_edit_id"></span> </p>
                                                <?php } else { ?>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="total_price_id">0</span> </p>
                                                <?php } ?> 
                                            </td>
        
                                            <td >
                                                <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"><span id="total_sum_id"> {{ $arr['total_sum'] }}</span></span>    <span id="total_sum_edit_id"></span> </p>
                                                <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="total_sum_id">0</span> </p>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <input type="hidden" value="" id="complexity_total" name="complexity_total">
                                            </td> 
                                        </tr> 
                                    </tfoot>
                                    
                                </table>
                            </div>


                            {{--
                                <div class="table-responsive">
                                    <table class="table m-0 table-bordered border shadow-sm" id="costEstimateTable">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th colspan="15" class="text-center bg-light text-secondary">
                                                Engineering Estimation 
                                                </th> 
                                            </tr>
                                            <tr class="font-weight-bold ">
                                                <th  >Component</th>
                                                <th >Type</th>
                                                <th >Sq.M</th>
                                                <th >Complexity</th>
                                                <th colspan="2" style="background: #205dcf !important">Details</th>
                                                <th colspan="2" style="background: #45B9D2 !important">Statistics</th>
                                                <th colspan="2" style="background: #205dcf !important">CAD/CAM</th>
                                                <th colspan="2" style="background: #45B9D2 !important">Logistics</th>
                                                <th colspan="2"  style="background: #205dcf !important">Total Cost</th>
                                                <th>
                                                    actions
                                                </th>
                                            </tr>
                                            <tr class="bg-light border" >
                                                <th colspan="3"  ></th>
                                                <th >
                                                    <!-- <input type="number" maxlength="6" class="form-control form-control-sm complexity_field" value="" placeholder="00 00" name="complexity_val" id="complexity_val" > -->
                                            <   /th>
                                                <th style="background: #205dcf !important"><small>Price/m²</small></th>
                                                <th style="background: #205dcf !important"><small>Sum</small></th> 
                                                <th style="background: #45B9D2 !important"><small>Price/m²</small></th>
                                                <th style="background: #45B9D2 !important"><small>Sum</small></th> 
                                                <th style="background: #205dcf !important"><small>Price/m²</small></th>
                                                <th style="background: #205dcf !important"><small>Sum</small></th> 
                                                <th style="background: #45B9D2 !important"><small>Price/m²</small></th>
                                                <th style="background: #45B9D2 !important"><small>Sum</small></th> 
                                                <th  style="background: #205dcf !important"><small>Price/m²</small></th>
                                                <th  style="background: #205dcf !important"><small>Sum</small></th> 
                                                <th class="text-center">
                                                    <button type="button" class="add_row_cal shadow-sm btn btn-sm btn-light rounded-pill" id="add_btn">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </th>
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
                                                    <td  ><input  type="number"  name="addmore[<?php echo $i ?>][sqm]"  value="{{ $test['sqm'] }}" class="form-control"></td>
                                                    <td  ><input  type="number"  name="addmore[<?php echo $i ?>][complexity]" value="{{ $test['complexity'] }}" class="form-control"></td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][detail_price]" value="{{ $test['detail_price'] }}" class="form-control detail_price">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][detail_sum]" value="{{ $test['detail_sum'] }}" class="form-control detail_sum">
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][statistic_price]" value="{{ $test['statistic_price'] }}" class="form-control statistic_price">
                                                        </div>
                                                        
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][statistic_sum]" value="{{ $test['statistic_sum'] }}" class="form-control statistic_sum">
                                                        </div>
                                                        
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][cad_cam_price]" value="{{ $test['cad_cam_price'] }}" class="form-control cad_cam_price">
                                                        </div>
                                                        
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][cad_cam_sum]" value="{{ $test['cad_cam_sum'] }}" class="form-control cad_cam_sum">
                                                        </div>
                                                        
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][logistic_price]" value="{{ $test['logistic_price'] }}" class="form-control logistic_price">
                                                        </div>
                                                        
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][logistic_sum]" value="{{ $test['logistic_sum'] }}" class="form-control logistic_sum">
                                                        </div>
                                                        
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][total_price]" value="{{ $test['total_price'] }}" class="form-control total_price">
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="btn-group border">
                                                            <div class="btn  btn-sm kr">kr</div>
                                                            <input  type="number"  name="addmore[<?php echo $i ?>][total_sum]" value="{{ $test['total_sum'] }}" class="form-control total_sum">
                                                        </div>
                                                        
                                                    </td>
                                                    
                                                </tr>
                                        
                                            <?php  } ?>
                                            <?php } else {  ?>
                                            <?php  $count_data = 0;   ?>
                                            <input type="hidden" name="count_data" id="count_data" value="<?php echo $count_data ?>" >
                                            <tr>
                                                <td width="180px">
                                                    <select class="form-select addmore_component" data-select-id="0" name="addmore[0][component]" required style="min-width: 100px !important">
                                                        <option value="">Select</option>
                                                        <optgroup label="Layer Types">
                                                            @foreach($data['component'] as $val)
                                                            <option value="{{ $val['id'] }}" >{{ $val['building_component_name'] }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td  width="180px">
                                                    <select class="form-select  addmore_type" required data-select-id="0" name="addmore[0][type]" style="min-width: 100px !important">
                                                        <option value="">Select</option>
                                                        <optgroup label="Layer Types">
                                                        @foreach($data['type'] as $val)
                                                            <option value="{{ $val['id'] }}" >{{ $val['building_type_name'] }}</option>
                                                            
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td  ><input  type="number"  name="addmore[0][sqm]" min="1" data-sqm_id="0" id="sqm__0" value="1" class="form-control sqm_val" required></td>
                                                <td  ><input  type="number"  name="addmore[0][complexity]"  step="0.1" min="1" max="2" data-complexity_id="0" id="complexity__0" value="1" class="form-control complexity_val"></td>
                                                <td  ><input  type="number"  name="addmore[0][detail_price]"  min="0"  data-detail-price_id="0" id="detail_price__0" value="0" class="form-control detail_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][detail_sum]"   min="0" data-detail-sum_id="0" id="detail_sum__0" value="0" class="form-control detail_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][statistic_price]"  min="0"  data-statistic-price_id="0" id="statistic_price__0" value="0" class="form-control statistic_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][statistic_sum]"   min="0" data-statistic-sum_id="0" id="statistic_sum__0" value="0" class="form-control statistic_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][cad_cam_price]"  min="0"  data-cad_cam-price_id="0" id="cad_cam_price__0" value="0" class="form-control cad_cam_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][cad_cam_sum]"  min="0"  data-cad_cam-sum_id="0" id="cad_cam_sum__0" value="0" class="form-control cad_cam_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][logistic_price]"  min="0"  data-logistic-price_id="0" id="logistic_price__0" value="0" class="form-control logistic_price"></td>
                                                <td  ><input  type="number"  name="addmore[0][logistic_sum]"  min="0"  data-logistic-sum_id="0" id="logistic_sum__0" value="0" class="form-control logistic_sum"></td>
                                                <td  ><input  type="number"  name="addmore[0][total_price]"  min="0"  data-total-price_id="0" id="total_price__0" value="0" class="form-control total_price" readonly ></td>
                                                <td  ><input  type="number"  name="addmore[0][total_sum]"  min="0"  data-total-sum_id="0" id="total_sum__0" value="0" class="form-control total_sum" readonly > </td>
                                            </tr>
                                        <?php  } ?>
                                        </tbody>
                                        <tfoot id="footerform" >
                                            <tr>
                                                <td colspan="2">
                                                    <h5 class="text-primary text-center">Totals</h5>
                                                </td>
                                                <td>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="sqm_total_id">1</span> </p>
                                                </td>
                                                <td>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="complexity_total_id">1</span> </p>
                                                </td>
                                                <td>
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                        <p class="m-0 p-0"><span class="text-secondary" ><span  id="detail_price_id">{{ $arr['detail_price'] }}<span> </span>    <span id="detail_price_edit_id"></span> </p>
                                                        <?php } else { ?>
                                                        <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="detail_price_id">0</span> </p>
                                                    <?php } ?>
                                                </td>
                                                <td  >
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                        <p class="m-0 p-0"><span class="text-secondary" >
                                                            <!-- Detail Sum : -->
                                                                <span  id="detail_sum_id">{{ $arr['detail_add'] }}<span> </span>    <span id="detail_sum_edit_id"></span> </p>
                                                        <?php } else { ?>
                                                        <p class="m-0 p-0"><span class="text-secondary">
                                                            <!-- Detail Sum : -->
                                                        </span>    <span id="detail_sum_id">0</span> </p>
                                                        <?php } ?>
                                                </td>
                                                <td >
                                                        <?php if(isset($arr['calculation'])){ ?>
                                                        <p class="m-0 p-0"><span class="text-secondary"><span  id="statistic_price_id" >  {{ $arr['statistic_price'] }} </span> </span>    <span id="statistic_price_edit_id"></span> </p>
                                                        <?php } else { ?>
                                                        <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="statistic_price_id">0</span> </p>
                                                        <?php } ?>  
                                                </td>
            
                                                <td>
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"> <span  id="statistic_sum_id" >  {{ $arr['statistic_sum'] }} </span> </span>    <span id="statistic_sum_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="statistic_sum_id">0</span> </p>
                                                    <?php } ?>  
                                                </td>
            
                                                <td>
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"> <span  id="cad_cam_price_id" >  {{ $arr['cad_cam_price'] }} </span> </span>    <span id="cad_cam_price_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="cad_cam_price_id">0</span> </p>
                                                    <?php } ?>  
                                                </td>
            
                                                <td>
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"><span id="cad_cam_sum_id"> {{ $arr['cad_cam_sum'] }}</span> </span>    <span id="cad_cam_sum_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="cad_cam_sum_id">0</span> </p>
                                                    <?php } ?>
                                                </td>
            
                                                <td>
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"><span  id="logistic_price_id" >  {{ $arr['logistic_price'] }} </span> </span>    <span id="logistic_price_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="logistic_price_id">0</span> </p>
                                                    <?php } ?>
                                                </td>
            
                                                <td>
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"><span id="logistic_sum_id"> {{ $arr['logistic_sum'] }} </span> </span>    <span id="logistic_sum_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="logistic_sum_id">0</span> </p>
                                                    <?php } ?>
                                                </td>
            
                                                <td  >
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"> <span  id="total_price_id" >  {{ $arr['total_price'] }} </span> </span>    <span id="total_price_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="total_price_id">0</span> </p>
                                                    <?php } ?> 
                                                </td>
            
                                                <td >
                                                    <?php if(isset($arr['calculation'])){ ?>
                                                        <p class="m-0 p-0"><span class="text-secondary"><span id="total_sum_id"> {{ $arr['total_sum'] }}</span></span>    <span id="total_sum_edit_id"></span> </p>
                                                    <?php } else { ?>
                                                        <p class="m-0 p-0"><span class="text-secondary"></span>    <span id="total_sum_id">0</span> </p>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" value="" id="complexity_total" name="complexity_total">
                                                </td> 
                                            </tr>
                                        </tfoot>
                                    </table> 
                                </div>   
                            --}}
                            
                            <div class="text-end">
                                <div class="btn-group mt-3">
                                    <div><button class="btn btn-light btn-sm me-2" type="reset" class="cancel_btn" id="cancel_btn" ><i class="fa fa-ban"> </i> Cancel</button></div>
                                        <?php if(isset($arr['calculation'])){ ?>
                                        <div><button class="btn btn-primary btn-sm me-2" type="submit" id="update_btn"><i class="uil-sync"> Update Estimate</i></button></div>
                                    <?php } else { ?>
                                        <div><button class="btn btn-primary btn-sm" type="submit" id="generate_btn"> <i class="fa fa-sync"></i> Generate</button></div>
                                    <?php } ?> 
                                </div>
                            </div> 
                        </div>
                    </div>  
                </form>    
                <div class="card">
                    <div class="card-header pb-2 p-3 text-center border-0">
                        <h4 class="header-title">Estimation List</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-7 mx-auto border p-3 shadow">
                            <table id="estimate-datatable" class="table bordered-table estimate-datatable" style="width:100%">
                                <thead>
                                    <tr class="text-left">
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

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
    tfoot {
        text-align: right !important;
        font-size:  12px !important;
    }
    .form-control.error {
        border-bottom: 1px solid #fd5454 !important;

    }
    .form-select.error {
        border-bottom: 1px solid #fd5454 !important;
    }
    .form-control {
        padding-right: 0px !important;
        border-radius: 0px !important
    }
    .form-select {
        border-radius: 0px !important
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
  
    #complexity_val {
        border: 0 !important;
        border-bottom: 3px solid white !important;
        border-radius: 0 !important;
        background: none !important;
        color: white !important;
        font: bold 20px/20px !important
    } 
    #complexity_val::placeholder {
        color: white !important;
    }
    #estimate-datatable .even td{
        text-align: left !important;
        padding:0 10px !important
    }
    #estimate-datatable .odd td{
        text-align: left !important;
        padding:0 10px !important
    }

    
    .table tbody tr td {
        padding: 2px !important
    }
    .font-12 {
        font-size: 12px !important;
    }
    small {
        font-weight: lighter !important

    } 
    .my-control {
        border-radius: 0 !important;
        display: flex !important;
        justify-content: center ;
        align-content: center ;
        width: 100%;
        height: 100%;
        margin: 0 !important;
        border: 1px !important;
        outline: 0 !important;
        text-align: right !important;
        font-size: 12px !important;
    }
    .form-select {
       padding: 2px 2px 2px 10px !important;
       /* border:0px !important; */
       min-width: 100px !important;
       background-size: 9px 14px !important;
       font-size: 12px !important;
       cursor: pointer;

    }
    .form-select option {
        appearance: none !important;
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
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function delete_TableData(e)
        {

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
                        url: "{{ route('admin.deleteTableData') }}",
                        data: {
                            
                            id:e
                        
                        },                         
							}).then(function (response) {
								 
								// getData($http, API_URL);
                                $(".Clicked").trigger("click")
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
            // // alert(e)
            // $.ajax({
            //             type: "GET",
            //             url: "{{ route('admin.deleteRowData') }}",
            //             data: {
            //                 id:e
            //                 }, 
            //                 success: function(msg) {
            //                 // alert(JSON.stringify(msg))
            //                 Message('warning',response.data.msg);
            //                 $('#estimate-datatable').DataTable().clear().draw();
            //                     // total_sum_val()
            //                     // calculation_total()
            //                     // sqm_total()
            //                 }
    
            //             });
        }
        function editComponent(rowId)
                    {
                        var compoId = $('#componentId_'+rowId).val();
                        var typeId = $('#typeId_'+rowId).val();
                           
                            masterCalculation(compoId,typeId,rowId)
                    }
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
                                   
                                    // $(`#sqm__${row_id}`).val(msg.data.sqm);
                                    // $(`#complexity__${row_id}`).val(msg.data.complexity);
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
                                    // sqm_total()
                                    $('.complexity_val').keyup();
                                }
        
                            });
                        }
                            

                    }
            $( document ).ready(function() {
    
                calculation_total()
                var i=0;
                var comp_val = false;
                var type_val = false;
                var row_id = false;

                $(document).on('change','.addmore_component',function(){

                    // if(type_val == false)
                    // {
                    //     var data_type = $(this).data('select-type-val');
                    // }
                    // alert(data_type)
                   console.log( $(this).data('select-type-val'))
                   comp_val = $(this).val();
                   
                    //    alert(comp_val)
                        //    if(data_type)
                        //    {
                        //     type_val =  data_type;
                        //    }
                  
                        
                    var row_id = $(this).data('select-id');
                    // alert(row_id)
                    masterCalculation(comp_val,type_val,row_id)
                    
                    });

        
                    $(document).on('change','.addmore_type',function(){
                        // if(comp_val == false)
                        //     {
                        //         var data_compnent = $(this).data('select-component-val');
                        //     }
                        //     alert(data_compnent)
                        // var data_compnent = $(this).data('select-component-val');
                       
                        type_val = $(this).val();
                        // alert(type_val)
                       
                        // if(data_compnent)
                        // {
                        //     comp_val =  data_compnent;
                        // }
                   
                        var row_id = $(this).data('select-id');


                        masterCalculation(comp_val,type_val,row_id)
                    });
                    
                    $('#add_btn').on('click',function(){
                        // calculation_total()
                        sqm_total()
                        complexity_total()
                        // $('.complexity_val ').keyup();
                        ++i;
                        comp_val = false; type_val = false;row_id=false;
                        // alert(i)
                    });
                    
                
            }); 

                function sqm_total(e){
                    // alert(e)
                    var sqm_val = $('#sqm_total_id').html();
                    
                        var elements = document.querySelectorAll('.sqm_val');
                        // console.log(elements)
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                        // console.log(values.length)
                        // console.log(values.length +1);
                        let sum_val = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(values[i])
                            sum_val +=  Number(values[i]);
                            }
                            if(e)
                            {
                                sum_val-=1;
                            }
                            sum_val+=1;
                            $('#sqm_total_id').html('');
                        
                            $('#sqm_total_id').html(sum_val);
                        console.log(sum_val);
                }
                function complexity_total(e){
                    // alert(e)
                    var sqm_val = $('#complexity_total_id').html();
                    
                        var elements = document.querySelectorAll('.complexity_val');
                        console.log(elements)
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                        // console.log(values.length)
                        // console.log(values.length +1);
                        let complexity_val = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(values[i])
                            complexity_val +=  Number(values[i]);
                            }
                            if(e)
                            {
                                complexity_val-=1;
                            }
                            complexity_val+=1;
                            $('#complexity_total_id').html('');
                        
                            $('#complexity_total_id').html(parseFloat(complexity_val).toFixed(2));
                        console.log(complexity_val);
                }
                function detail_change_price(){
                    //old code/////
                    var detail_edit_val = $('#detail_price_edit').html();
                   
                        var elements = document.querySelectorAll('.detail_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                        let detail_price = 0;
                        for (let i = 0; i < values.length; i++) {
                            
                            detail_price +=  Number(values[i]);
                            }
                           
                            $('#detail_price_id').html('');
                            $('#detail_price_id').html(detail_price);
                            // alert(detail_price)
                        console.log(detail_price);
                         //old code/////
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
                                max: 2,
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
                    // alert(JSON.stringify(msg))
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
                            
                        <tr  class="text-white ">
                            <td width="180px">
                                <select class="form-select addmore_component select2" data-select-id="0" name="addmore[0][component]" required  data-toggle="select2">
                                    <option value="">Select</option>
                                            @foreach($data['component'] as $val)
                                            <option value="{{ $val['id'] }}" >{{ $val['building_component_name'] }}</option>
                                            @endforeach
                                </select>
                            </td>
                            <td  width="180px">
                                <select class="form-select select2 addmore_type" required data-select-id="0" name="addmore[0][type]"  data-toggle="select2">
                                    <option value="">Select</option>
                                            @foreach($data['type'] as $val)
                                            <option value="{{ $val['id'] }}" >{{ $val['building_type_name'] }}</option>
                                            @endforeach
                                </select>
                            </td>
                            <td  ><input  type="number"  name="addmore[0][sqm]" data-sqm_id="0" min="1" id="sqm__0" value="1" class="my-control sqm_val" required></td>
                                <td  ><input  type="number"  name="addmore[0][complexity]"  step="0.1" min="1" max="2" data-complexity_id="0" id="complexity__0" value="1" class="my-control complexity_val"></td>
                                <td  ><input  type="number"  name="addmore[0][detail_price]" min="0" data-detail-price_id="0" id="detail_price__0" value="0" class="my-control detail_price"></td>
                                <td  ><input  type="number"  name="addmore[0][detail_sum]" min="0" data-detail-sum_id="0" id="detail_sum__0" value="0" class="my-control detail_sum"></td>
                                <td  ><input  type="number"  name="addmore[0][statistic_price]" min="0" data-statistic-price_id="0" id="statistic_price__0" value="0" class="my-control statistic_price"></td>
                                <td  ><input  type="number"  name="addmore[0][statistic_sum]" min="0" data-statistic-sum_id="0" id="statistic_sum__0" value="0" class="my-control statistic_sum"></td>
                                <td  ><input  type="number"  name="addmore[0][cad_cam_price]" min="0" data-cad_cam-price_id="0" id="cad_cam_price__0" value="0" class="my-control cad_cam_price"></td>
                                <td  ><input  type="number"  name="addmore[0][cad_cam_sum]" min="0" data-cad_cam-sum_id="0" id="cad_cam_sum__0" value="0" class="my-control cad_cam_sum"></td>
                                <td  ><input  type="number"  name="addmore[0][logistic_price]" min="0" data-logistic-price_id="0" id="logistic_price__0" value="0" class="my-control logistic_price"></td>
                                <td  ><input  type="number"  name="addmore[0][logistic_sum]" min="0" data-logistic-sum_id="0" id="logistic_sum__0" value="0" class="my-control logistic_sum"></td>
                                <td  ><input  type="number"  name="addmore[0][total_price]" min="0" data-total-price_id="0" id="total_price__0" value="0" class="my-control total_price" readonly ></td>
                                <td  ><input  type="number"  name="addmore[0][total_sum]" min="0" data-total-sum_id="0" id="total_sum__0" value="0" class="my-control total_sum" readonly > 
                                <td style="text-align:center !important" class="delete_row_btn" data-delete_row_id="0"><span > <i style="cursor:pointer;font-size:18px" class="fa fa-trash-alt shadow-sm btn text-danger"></i> </span></td>
                            </td>
                        </tr>
            
                    `);

            $("#costEstimateTable > tfoot").html(`
            <tr  style="background: #0D2E67 !important">
            <td class="text-white">Total</td>
                                <td></td>
                                                
                                                <td>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="sqm_total_id">1</span> </p>
                                                </td>
                                                <td>
                                                <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="complexity_total_id">1</span> </p>
                                                </td>
                                                <td>
                                                    
                                                        <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="detail_price_id">0</span> </p>
                                                   
                                                </td>
                                                <td  >
                                                    
                                                        <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="detail_sum_id">0</span> </p> 
                                                </td>
                                                <td >
                                                      
                                                        <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="statistic_price_id">0</span> </p>
                                                     
                                                </td>
            
                                                <td>
                                                    
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="statistic_sum_id">0</span> </p>
                                                   
                                                </td>
            
                                                <td>
                                                   
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="cad_cam_price_id">0</span> </p>
                                                  
                                                </td>
            
                                                <td>
                                                   
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="cad_cam_sum_id">0</span> </p>
                                                  
                                                </td>
            
                                                <td>
                                                   
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="logistic_price_id">0</span> </p>
                                                    
                                                </td>
            
                                                <td>
                                                   
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="logistic_sum_id">0</span> </p>
                                                 
                                                </td>
            
                                                <td  >
                                                    
                                                    <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="total_price_id">0</span> </p>
                                                    
                                                </td>
            
                                                <td >
                                                   
                                                        <p class="m-0 p-0"><span class="text-secondary"></span>    <span class="text-white" id="total_sum_id">0</span> </p>
                                                   
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
                    // $("#costEstimateDetailTable > tbody").html('');
                    $('#generate_btn').html(`<i class="uil-sync" > Update Estimation</i>`);
                    let estimateId = $(this).data('cost-estimate-id');
                    
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.costEstimationEdit') }}",
                    data: {id:estimateId}, 
                    success: function( msg ) {
                        // alert(JSON.stringify(msg))
                        $("#enquiry_date").val(msg.data.detail.date);
                        $("#contact").val(msg.data.detail.contact);
                        
                               
                        editCount = msg.data.calculation.length;
                        console.log(editCount);
                        $("#costEstimateTable > tbody").append(`
                         <input type="hidden" name="count_data" id="_count_data_" value="${msg.data.calculation.length}" >
                         <input type="hidden" name="key" id="key" value="${msg.data.detail.id}">
                         `);
                        //  alert(msg.data.complexity_val)
                        //  $("#costEstimateTable > thead").append(`
                        //  <input type="number" maxlength="6" class="form-control complexity_field" value="${msg.data.detail.complexity_val}" name="complexity_val" id="complexity_val" >
                        //  `);
                         $('#complexity_val').val(`${msg.data.detail.complexity_val}`);
                        for(var i=0; i<msg.data.calculation.length; i++){
                            // alert(JSON.stringify(msg.data.detail.complexity_val))
                           
                            let detail = msg.data.calculation[i];let selected = 'selected';
                           
                            console.log(detail);
                                $("#costEstimateTable > tbody").append(`
                                    
                                    <tr >
                                    <input type="hidden" name="addmore[${i}][test]" value=" ${detail.id }" >
                                   
                                                <td width="180px">
                                                <select class="form-select select2" onchange="editComponent(${i})" id="componentId_${i}" data-select-id="${i}" data-select-type-val="${detail.type}"  name="addmore[${i}][component]">
                                                        <option value="">Select</option>
                                                        
                                                            @foreach($data['component'] as $val)
                                                            <option value="{{ $val['id'] }}" ${detail.Component == "{{ $val['id'] }}" ? selected : ''} >{{ $val['building_component_name'] }}</option>
                                                            @endforeach
                                                
                                                    </select>
                                                </td>
                                                <td width="180px" >
                                                <select class="form-select select2"  onchange="editComponent(${i})" id="typeId_${i}" data-select-id="${i}"  data-select-component-val="${detail.Component}" name="addmore[${i}][type]">
                                                        <option value="">Select</option>
                                                       
                                                            
                                                            @foreach($data['type'] as $val)
                                                            <option value="{{ $val['id'] }}" ${detail.type == "{{ $val['id'] }}" ?   "selected" : '' } >{{ $val['building_type_name'] }}</option>
                                                            @endforeach
                                                    
                                                    </select>
                                                </td>
                                                <td  ><input  type="number"  name="addmore[${i}][sqm]" data-sqm_id=${i} min="1" value="${detail.sqm}" id="sqm__${i}" class="my-control sqm_val"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][complexity]" data-complexity_id=${i}  step="0.1" min="1" max="2" value="${detail.complexity}" id="complexity__${i}" class="my-control complexity_val"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][detail_price]" min="0" data-detail-price_id="${i}" value="${detail.detail_price}" id="detail_price__${i}" class="my-control detail_price"></td>
                                                <td  ><input  type="number" name="addmore[${i}][detail_sum]" min="0"  data-detail-sum_id="${i}" value="${detail.detail_sum}" id="detail_sum__${i}" class="my-control detail_sum"></td>
                                                <td  ><input  type="number" name="addmore[${i}][statistic_price]" min="0"  data-statistic-price_id="${i}" value="${detail.statistic_price}" id="statistic_price__${i}" class="my-control statistic_price"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][statistic_sum]" min="0"  data-statistic-sum_id="${i}" value="${detail.statistic_sum}" id="statistic_sum__${i}" class="my-control statistic_sum"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][cad_cam_price]" min="0"  data-cad_cam-price_id="${i}" value="${detail.cad_cam_price}" id="cad_cam_price__${i}" class="my-control cad_cam_price"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][cad_cam_sum]" min="0"  data-cad_cam-sum_id="${i}" value="${detail.cad_cam_sum}" id="cad_cam_sum__${i}" class="my-control cad_cam_sum"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][logistic_price]" min="0"  data-logistic-price_id="${i}" value="${detail.logistic_price}" id="logistic_price__${i}" class="my-control logistic_price"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][logistic_sum]" min="0"  data-logistic-sum_id="${i}" value="${detail.logistic_sum}" id="logistic_sum__${i}" class="my-control logistic_sum"></td>
                                                <td  ><input  type="number"  name="addmore[${i}][total_price]"  min="0" data-total-price_id="${i}" value="${detail.total_price}" id="total_price__${i}" class="my-control total_price" readonly></td>
                                                <td  ><input  type="number"  name="addmore[${i}][total_sum]" min="0"  data-total-sum_id="${i}" value="${detail.total_sum}" id="total_sum__${i}" class="my-control total_sum" readonly></td>
                                                <td style="text-align:center !important" class="delete" data-delete-row_id="${detail.id}"><span > <i style="cursor:pointer;font-size:18px" class="fa fa-trash-alt shadow-sm btn text-danger"></i> </span></td>
                                          
                                            
                                        </tr>
                    
                            `);
                        }
                        
                        // $("#costEstimateDetailTable > tbody").html(`
                        // <tr>
                        //      <td> <input type="date" class="form-control enquiry_date" name="enquiry_date"  id="enquiry_date" value="${msg.data.detail.date}" > </td>
                        // <td><input type="text" class="form-control contact" name="contact" id="contact" value="${msg.data.detail.contact}"></td>
                        // <input type="hidden" name="key" id="key" value="${msg.data.detail.id}">
                        // </tr>
                        // `);
                        $("#costEstimateTable > tfoot").html(`
                            <tr  style="background: #0D2E67 !important">
                                <td class="text-white">Total</td>
                                <td></td>
                                <td>
                                <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="sqm_total_id">${msg.data.sqm_total}</span> </p>  
                                </td>
                                <td>
                                <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="complexity_total_id">${msg.data.complexity_sum}</span> </p>  
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="detail_price_id">${parseFloat(msg.data.detail_price).toFixed(2)}</span> </p>          
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="detail_sum_id">${msg.data.detail_add} </span></p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="statistic_price_id">${msg.data.statistic_price}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="statistic_sum_id">${msg.data.statistic_sum} </span></p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="cad_cam_price_id">${msg.data.cad_cam_price}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="cad_cam_sum_id">${msg.data.cad_cam_sum}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="logistic_price_id">${msg.data.logistic_price}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="logistic_sum_id">${msg.data.logistic_sum}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="total_price_id">${msg.data.detail.complexity_total}</span> </p>
                                </td>
                                <td>
                                    <p class="m-0"><span class="text-secondary"></span>    <span class="text-white" id="total_sum_id">${msg.data.total_sum} </span></p>
                                </td>
                                <td>
                                            <input type="hidden" value="${msg.data.detail.complexity_total}" id="complexity_total" name="complexity_total">
                                        </td>
                            </tr>

                        `);
                        // $('.detail_sum').keyup();
                        //     $('.cad_cam_sum').keyup();
                                $('.complexity_val').keyup();
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
                });



                $("#cancel_btn").click(function (e) {
                
                    comp_val = false; type_val = false;row_id=false;
                    $("#costEstimationSingleForm").validate().resetForm();
                    $('#generate_btn').html(`<i class="fa fa-sync"></i> Generate`);
                    $("#costEstimateTable > tbody").html('');
                    $("#costEstimateTable > tbody").val('');
                        $("#contact").removeAttr('value');
                        // $("#contact").val('');
                      
                        // sqm_total_id
                        $("#sqm_total_id").text(1);
                        $("#complexity_total_id").text(1);
                        
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
                        $(".enquiry_date").val("<?php echo date('Y-m-d'); ?>");
                       
                    $("#costEstimateTable > tbody").html(`
                            
                    <tr>
                                        <td width="180px">
                                            <select class="form-select addmore_component select2" data-select-id="0" name="addmore[0][component]" required  data-toggle="select2">
                                                <option value="">Select</option>
                                                    @foreach($data['component'] as $val)
                                                    <option value="{{ $val['id'] }}" >{{ $val['building_component_name'] }}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td  width="180px">
                                            <select class="form-select select2 addmore_type" required data-select-id="0" name="addmore[0][type]"  data-toggle="select2">
                                                <option value="">Select</option>
                                                 
                                                    @foreach($data['type'] as $val)
                                                    <option value="{{ $val['id'] }}" >{{ $val['building_type_name'] }}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td  ><input  type="number"  name="addmore[0][sqm]" min="1" data-sqm_id="0" id="sqm__0" value="1" class="my-control sqm_val" required></td>
                                        <td  ><input  type="number" name="addmore[0][complexity]" data-complexity_id="0"  step="0.1" min="1" max="2" id="complexity__0" value="1" class="my-control complexity_val"></td>
                                        <td  ><input  type="number"  name="addmore[0][detail_price]" min="0"  data-detail-price_id="0" id="detail_price__0" value="0" class="my-control detail_price"></td>
                                        <td  ><input  type="number"  name="addmore[0][detail_sum]" min="0"  data-detail-sum_id="0" id="detail_sum__0" value="0" class="my-control detail_sum"></td>
                                        <td  ><input  type="number"  name="addmore[0][statistic_price]" min="0" data-statistic-price_id="0" id="statistic_price__0" value="0" class="my-control statistic_price"></td>
                                        <td  ><input  type="number"  name="addmore[0][statistic_sum]" min="0"  data-statistic-sum_id="0" id="statistic_sum__0" value="0" class="my-control statistic_sum"></td>
                                        <td  ><input  type="number"  name="addmore[0][cad_cam_price]" min="0"  data-cad_cam-price_id="0" id="cad_cam_price__0" value="0" class="my-control cad_cam_price"></td>
                                        <td  ><input  type="number"  name="addmore[0][cad_cam_sum]"  min="0" data-cad_cam-sum_id="0" id="cad_cam_sum__0" value="0" class="my-control cad_cam_sum"></td>
                                        <td  ><input  type="number"  name="addmore[0][logistic_price]" min="0"  data-logistic-price_id="0" id="logistic_price__0" value="0" class="my-control logistic_price"></td>
                                        <td  ><input  type="number"  name="addmore[0][logistic_sum]" min="0"  data-logistic-sum_id="0" id="logistic_sum__0" value="0" class="my-control logistic_sum"></td>
                                        <td  ><input  type="number"  name="addmore[0][total_price]" min="0"  data-total-price_id="0" id="total_price__0" value="0" class="my-control total_price" readonly ></td>
                                        <td  ><input  type="number"  name="addmore[0][total_sum]" min="0"  data-total-sum_id="0" id="total_sum__0" value="0" class="my-control total_sum" readonly > </td>
                                        <td style="text-align:center !important" class="delete_row_btn" data-delete_row_id="0"><span > <i style="cursor:pointer;font-size:18px" class="fa fa-trash-alt shadow-sm btn text-danger"></i> </span></td>
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
                    // alert()
                 calculation_total()
                 sqm_total()
                 complexity_total()
                //  sqm_total()
                //  $('.complexity_val ').keyup();
                    var i = editCount + 1;
                    editCount += 1;
                $("#add_estimate").append(`
                                        <tr>
                                        <td width="180px">
                                            <select class="form-select select2 validateArray addmore_component" data-select-id="${i}" name="addmore[${i}][component]" id="addmore[${i}][component]" required data-toggle="select2">
                                                <option value="">Select</option>
                                                @foreach($data['component'] as $val)
                                                        <option value="{{ $val['id'] }}" >{{ $val['building_component_name'] }}</option>
                                                        @endforeach
                                            </select>
                                        </td>
                                        <td  width="180px">
                                            <select class="form-select select2 addmore_type"   required name="addmore[${i}][type]" id="addmore[${i}][type]" data-select-id="${i}" data-toggle="select2">
                                                <option value="">Select</option>
                                                @foreach($data['type'] as $val)
                                                        <option value="{{ $val['id'] }}" >{{ $val['building_type_name'] }}</option>
                                                        @endforeach
                                            </select>
                                        </td>
                                        <td  ><input  type="number" name="addmore[${i}][sqm]" min="1" data-sqm_id=${i} id="sqm__${i}" value="1" class="my-control sqm_val" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][complexity]" data-complexity_id=${i} id="complexity__${i}"  step="0.1" min="1" max="2" value="1" class="my-control complexity_val"  required></td>
                                        <td  ><input  type="number" name="addmore[${i}][detail_price]" min="0"  data-detail-price_id=${i} id="detail_price__${i}" value="0" class="my-control detail_price" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][detail_sum]" min="0" data-detail-sum_id=${i} id="detail_sum__${i}" value="0" class="my-control detail_sum" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][statistic_price]" min="0" data-statistic-price_id=${i} id="statistic_price__${i}" value="0" class="my-control statistic_price" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][statistic_sum]" min="0" data-statistic-sum_id=${i} id="statistic_sum__${i}" value="0" class="my-control statistic_sum" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][cad_cam_price]" min="0" data-cad_cam-price_id=${i} id="cad_cam_price__${i}" value="0" class="my-control cad_cam_price" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][cad_cam_sum]" min="0" data-cad_cam-sum_id=${i} id="cad_cam_sum__${i}" value="0" class="my-control cad_cam_sum" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][logistic_price]" min="0" data-logistic-price_id=${i} id="logistic_price__${i}" value="0" class="my-control logistic_price" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][logistic_sum]" min="0" data-logistic-sum_id=${i} id="logistic_sum__${i}" value="0" class="my-control logistic_sum" required></td>
                                        <td  ><input  type="number" name="addmore[${i}][total_price]" min="0" data-total-price_id=${i} id="total_price__${i}" value="0" class="my-control total_price" readonly></td>
                                        <td  ><input  type="number" name="addmore[${i}][total_sum]" min="0" data-total-sum_id=${i} id="total_sum__${i}" value="0" class="my-control total_sum" readonly></td>
                                       
                                        <td style="text-align:center !important" class="delete_row_btn" data-delete_row_id=${i}> <i style="cursor:pointer;font-size:18px" class="fa fa-trash-alt shadow-sm btn text-danger"></i> </td>
                                       </tr> `); });

//                     ********* Edit Cost Estimation row deleted Function *******
                $(document).on("click", ".delete", function (e) {

                        var row_del = $(this).data('delete-row_id');
                            swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this Data!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            }).then((willDelete) => {
						if (willDelete) {
                      
                                e.preventDefault();
                                $(this).closest('tr').remove();
                                sqm_total(1)
                                complexity_total(1)
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
							$.ajax({
                                type: "GET",
                                url: "{{ route('admin.deleteRowData') }}",
                                data: {
                                    id:row_del
                                },                         
							}).then(function (response) {
                             
                              
                                total_function_row()
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
                                // calculation_total()
                                // e.preventDefault();
                                // $(this).closest('tr').remove();
                                // sqm_total(1)
                                // complexity_total(1)
                                // detail_change_price()
                                // detail_change_sum()
                                // statistic_change_price()
                                // statistic_change_sum()
                                // cad_cam_change_price()
                                // cad_cam_change_sum()
                                // logistic_change_price()
                                // logistic_change_sum()
                                // total_change_price()
                                // total_change_sum()
                                // calculation_total()
                         

                }); 

                function total_function_row()
                {
                    
                    var elements = document.querySelectorAll('.detail_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        if(values.length == 0)
                        {
                            $( "#add_btn" ).trigger( "click" );
                                sqm_total(1)
                                complexity_total(1)
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
                        }
                        
                }
                function total_zero_row(e)
                {
            
                    
                       
                        if(e == 0)
                        {
                            $( "#add_btn" ).trigger( "click" );
                                sqm_total(1)
                                complexity_total(1)
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
                        }
                        
                }

 //                     ********* Add Cost Estimation row deleted Function *******
                $(document).on("click", ".delete_row_btn", function (e) {
                  var elements = document.querySelectorAll('.detail_price');
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                     
                        if(values.length != 1)
                        {
                            calculation_total()
                                e.preventDefault();
                                $(this).closest('tr').remove();
                                sqm_total(1)
                                complexity_total(1)
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
                        }
                               

                });
                function sum(arr) {
                    return arr.reduce(function (a, b) {
                        return a + b;
                    }, 0);
                    }
                var detail_sum = 0;
            
               

               
 
                
            });
             $(document).on('keyup','.detail_sum',function(){
                //  alert()
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
                       
                    console.log('clicked');

                    var row_id = $(this).data('detail-price_id');

                    var detail_edit_val = $('#detail_price_edit').html();
                    // alert(editCount)
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
                          
                        
                       
                        
                        var price_val = parseInt($(`#detail_price__${row_id}`).val());
                        var a = parseFloat($(`#complexity__${row_id}`).val());
                             var b = parseFloat($(`#sqm__${row_id}`).val());
                             var c = ( a * b * price_val);

                             $(`#detail_sum__${row_id}`).val(parseFloat(c).toFixed(2));


                            var row_total = parseInt($(`#detail_price__${editCount}`).val()) + parseInt($(`#statistic_price__${editCount}`).val()) + parseInt($(`#cad_cam_price__${editCount}`).val()) + parseInt($(`#logistic_price__${editCount}`).val());
                            $(`#total_price__${editCount}`).html(row_total)
                        console.log(detail_price);
                        $('.detail_sum').keyup();
                            calculation_total()

                    });
                function total_price_val()
                    {
                        var total_cost_price = parseInt($('#detail_price_id').html()) + parseInt($('#statistic_price_id').html()) + parseInt($('#cad_cam_price_id').html()) + parseInt($('#logistic_price_id').html());
                        $('#total_price_id').html(total_cost_price); 
                        calculation_total()

                        // var sum_total = $('#detail_sum_id').html();
                        // var sqm_total = $('#sqm_total_id').html();
                        
                       
                        // // alert(typeof (parseInt(sum_total)))
                        // var total_price = parseInt(sum_total) / parseInt(sqm_total);

                        // alert(total_price)
                        // $('#detail_price_id').html(total_price);

                        // var statistic_total = $('#statistic_sum_id').html();
                        // var statistic_sqm_total = $('#sqm_total_id').html();
                     
                        // // alert(typeof (parseInt(sum_total)))
                        // var total_stat = parseInt(statistic_total) / parseInt(statistic_sqm_total);

                        // alert(total_stat)
                        // $('#statistic_price_id').html(total_stat);


                    }


                function total_sum_val()
                    {
                        var total_cost_sum = parseInt($('#detail_sum_id').html()) + parseInt($('#statistic_sum_id').html()) + parseInt($('#cad_cam_sum_id').html()) + parseInt($('#logistic_sum_id').html());
                        $('#total_sum_id').html(total_cost_sum);
                        calculation_total()
                    }
                function calculation_total()
                {
                    var cal = $('#sqm_total_id').html();
                //    alert(cal)
                   var total_sum_id = $('#total_sum_id').html();
                //    alert(total_sum_id)
                   if(cal)
                   {
                    var ss = (parseInt(total_sum_id))/(parseInt(cal));
                    // alert(ss)
                    $('#total_price_id').html(parseFloat(ss).toFixed(2))
                    $('#complexity_total').val(ss);
                    // console.log("ss"+ss)
                   }

                   var detail_total = $('#detail_sum_id').html();
                        var detail_sqm_total = $('#sqm_total_id').html();
                        
                       
                        // alert(typeof (parseInt(sum_total)))
                        var detail_total_price = parseInt(detail_total) / parseInt(detail_sqm_total);

                        // alert(total_price)
                        $('#detail_price_id').html(parseFloat(detail_total_price).toFixed(2));

                        var statistic_total = $('#statistic_sum_id').html();
                        var statistic_sqm_total = $('#sqm_total_id').html();
                     
                        // alert(typeof (parseInt(sum_total)))
                        var total_stat = parseInt(statistic_total) / parseInt(statistic_sqm_total);

                        // alert(total_stat)
                        $('#statistic_price_id').html(parseFloat(total_stat).toFixed(2));


                        var cad_total = $('#cad_cam_sum_id').html();
                        var cad_sqm_total = $('#sqm_total_id').html();

                        var cad_stat = parseInt(cad_total) / parseInt(cad_sqm_total);
                        $('#cad_cam_price_id').html(parseFloat(cad_stat).toFixed(2));


                        var log_total = $('#logistic_sum_id').html();
                        var log_sqm_total = $('#sqm_total_id').html();
    
                        var log_stat = parseInt(log_total) / parseInt(log_sqm_total);

                        $('#logistic_price_id').html(parseFloat(log_stat).toFixed(2));

                        
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
        //         $(document).on('keyup change','.sqm_val',function(){
        //        alert()
        //        var row_id = $(this).data('data-sqm_id');
        //       //  alert(row_id)
        //      var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
        //      $(`#total_price__${row_id}`).val(row_total_price)
        //      total_price_val()

        //   });
        
                $(document).on('keyup change','.detail_price',function(){
            //    alert()
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
                    var statistic_val = parseInt($(`#statistic_price__${row_id}`).val());
                           
                    var a1 = parseFloat($(`#complexity__${row_id}`).val());
                             var b1= parseFloat($(`#sqm__${row_id}`).val());
                             var c1 = ( a1 * b1 * statistic_val);
                            $(`#statistic_sum__${row_id}`).val(parseFloat(c1).toFixed(2));




                   var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
                   $(`#total_price__${row_id}`).val(row_total_price)
                   $('.detail_sum').keyup();
                    $('.cad_cam_sum').keyup();
                    $('.logistic_sum').keyup();
                   statistic_change_sum()
                //    total_price_val()
                   calculation_total()
                    // alert(row_total)

                });
                $(document).on('keyup change','.cad_cam_price',function(){
                    // alert(editCount)
                    var row_id = $(this).data('cad_cam-price_id');

                    var cad_val = parseInt($(`#cad_cam_price__${row_id}`).val());
                           
                    var a2 = parseFloat($(`#complexity__${row_id}`).val());

                    var b2 = parseFloat($(`#sqm__${row_id}`).val());
                    var c2 = ( a2 * b2 * cad_val);
                    $(`#cad_cam_sum__${row_id}`).val(parseFloat(c2).toFixed(2));
                    //  alert(row_id)
                   var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
                   $(`#total_price__${row_id}`).val(row_total_price)
                    // alert(row_total)
                    
                    $('.detail_sum').keyup();
                    $('.cad_cam_sum').keyup();
                    cad_cam_change_price()
                    total_price_val()
                    calculation_total()
                    
                });
                $(document).on('keyup change','.logistic_price',function(){
                    // alert(editCount)
                    var row_id = $(this).data('logistic-price_id');

                       var logistic_val = parseInt($(`#logistic_price__${row_id}`).val());

                          // var logistic_multiple .= logistic_val * complexity_val * sqm_val1 ;
                        var a3 = parseFloat($(`#complexity__${row_id}`).val());
                        var b3 = parseFloat($(`#sqm__${row_id}`).val());    
                        var c3 = (b3 * logistic_val);
                        $(`#logistic_sum__${row_id}`).val(parseFloat(c3).toFixed(2));
                    //  alert(c3)
                   var row_total_price = parseInt($(`#detail_price__${row_id}`).val()) + parseInt($(`#statistic_price__${row_id}`).val()) + parseInt($(`#cad_cam_price__${row_id}`).val()) + parseInt($(`#logistic_price__${row_id}`).val());
                   $(`#total_price__${row_id}`).val(row_total_price)
                    // alert(row_total)
                   
                    $('.logistic_sum').keyup();
                    logistic_change_price()
                    total_price_val()
                    calculation_total()
                });


                $(document).on('keyup change','.detail_sum',function(){
                    // alert()
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
                
                $(document).on('keyup','.sqm_val',function(){
                    // console.log('clicked');
                    var row_id = $(this).data('sqm_id');
                        var val = $(this).val();
                        // alert(val)
                        $(`#sqm__${row_id}`).attr('value', Number(val));
                        // $('#sqm__${row_id}').val(val);
                        // $(`#sqm__${row_id}`).attr('value', val);
                        var elements = document.querySelectorAll('.sqm_val');
                        // alert(elements)
                        
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        // alert(values)
                        let sqm_val = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(values[i])
                            sqm_val +=  Number(values[i]);
                            }
                            // sqm_val +=1;
                           
                            $('#sqm_total_id').html(sqm_val);
                        // var price_val = parseInt($(`#detail_price__${editCount}`).val());
                        // var complexity_val = parseInt($(`#complexity__${editCount}`).val());
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());
                           
                        // var statistic_val = parseInt($(`#statistic_price__${editCount}`).val());
                        // var complexity_val = parseInt($(`#complexity__${editCount}`).val());
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());

                        // var cad_val = parseInt($(`#cad_cam_price__${editCount}`).val());
                        // var complexity_val = parseInt($(`#complexity__${editCount}`).val());
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());


                        // var logistic_val = parseInt($(`#logistic_price__${editCount}`).val());
                        // var complexity_val = parseInt($(`#complexity__${editCount}`).val());
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());

                        //     var multiple = price_val * complexity_val * sqm_val1 ;
                        //     $(`#detail_sum__${editCount}`).val(multiple);

                        //     var statistic_multiple = statistic_val * complexity_val * sqm_val1 ;
                        //     $(`#statistic_sum__${editCount}`).val(statistic_multiple);

                        //     var cad_multiple = cad_val * complexity_val * sqm_val1 ;
                        //     $(`#cad_cam_sum__${editCount}`).val(cad_multiple);

                        //     var logistic_multiple = logistic_val * complexity_val * sqm_val1 ;
                        //     $(`#logistic_sum__${editCount}`).val(logistic_multiple);
                        var price_val = parseInt($(`#detail_price__${row_id}`).val());
                        
                        var statistic_val = parseInt($(`#statistic_price__${row_id}`).val());
                       
                        var cad_val = parseInt($(`#cad_cam_price__${row_id}`).val());
                      
                        var logistic_val = parseInt($(`#logistic_price__${row_id}`).val());
                        
                             var a = parseFloat($(`#complexity__${row_id}`).val());
                             var b = parseFloat($(`#sqm__${row_id}`).val());
                             var c = ( a * b * price_val);
                            //  alert(c)
                            $(`#detail_sum__${row_id}`).val(parseFloat(c).toFixed(2));
                          
                            // var statistic_multiple = statistic_val * complexity_val * sqm_val1 ;
                            var a1 = parseFloat($(`#complexity__${row_id}`).val());
                             var b1= parseFloat($(`#sqm__${row_id}`).val());
                             var c1 = ( a1 * b1 * statistic_val);
                            $(`#statistic_sum__${row_id}`).val(parseFloat(c1).toFixed(2));

                            var a2 = parseFloat($(`#complexity__${row_id}`).val());
                             var b2 = parseFloat($(`#sqm__${row_id}`).val());
                             var c2 = ( a2 * b2 * cad_val);
                            // var cad_multiple = cad_val * complexity_val * sqm_val1 ;
                            $(`#cad_cam_sum__${row_id}`).val(parseFloat(c2).toFixed(2));

                            // var logistic_multiple .= logistic_val * complexity_val * sqm_val1 ;
                            var a3 = parseFloat($(`#complexity__${row_id}`).val());
                             var b3 = parseFloat($(`#sqm__${row_id}`).val());
                             
                             var c3 = (b3 * logistic_val);
                            $(`#logistic_sum__${row_id}`).val(parseFloat(c3).toFixed(2));
                            // $('#').
                            $('.detail_sum').keyup();
                            $('.cad_cam_sum').keyup();
                            $('.logistic_sum').keyup();
                            
                            $('.complexity_val').keyup();
                            calculation_total()
                            statistic_change_sum()
                            logistic_change_sum()
                        console.log(sqm_val);
                });
                $(document).on('keyup','.complexity_val',function(){
                    // console.log('clicked');
                    // alert()
                    var row_id = $(this).data('complexity_id');
                        var val = $(this).val();
                        $(`#complexity__${row_id}`).attr('value', Number(val));
                        // $('#sqm__${row_id}').val(val);
                        // $(`#sqm__${row_id}`).attr('value', val);
                        var elements = document.querySelectorAll('.complexity_val');
                        // alert(elements)
                        
                        var values = [].map.call(elements, function(e) {
                        return e.value;
                        });
                    
                        // console.log(values);
                        // alert(values)
                        let sqm_val = 0;
                        for (let i = 0; i < values.length; i++) {
                            // alert(values[i])
                            sqm_val +=  Number(values[i]);
                            }
                            // sqm_val +=1;
                           
                        $('#complexity_total_id').html(parseFloat(sqm_val).toFixed(2));
                        console.log(sqm_val);

                    //                     var floatSum = 0;
                    // $(".complexity_val").each(function(){
                    //     floatSum += +$(this).val();
                    // });
                        
                        var price_val = parseInt($(`#detail_price__${row_id}`).val());
                        // var complexity_val = $(`#complexity__${editCount}`).val();
                        // // alert(typeof((complexity_val)))
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());

                        var statistic_val = parseInt($(`#statistic_price__${row_id}`).val());
                        // var complexity_val = parseInt($(`#complexity__${editCount}`).val());
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());

                        var cad_val = parseInt($(`#cad_cam_price__${row_id}`).val());
                        // var complexity_val = parseInt($(`#complexity__${editCount}`).val());
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());
                           
                        var logistic_val = parseInt($(`#logistic_price__${row_id}`).val());
                        // var complexity_val = parseInt($(`#complexity__${editCount}`).val());
                        // var sqm_val1 = parseInt($(`#sqm__${editCount}`).val());
                        // alert(parseFloat(price_val))
                       
                        // alert(parseFloat(sqm_val1))
                        var detail_multiple;
                        // alert(parseFloat(complexity_val))
                            //  detail_multiple = parseFloat(complexity_val) * 2 ;
                            // alert(row_id)
                             var a = parseFloat($(`#complexity__${row_id}`).val());
                             var b = parseFloat($(`#sqm__${row_id}`).val());
                             var c = ( a * b * price_val);
                            //  alert(a)
                            $(`#detail_sum__${row_id}`).val(parseFloat(c).toFixed(2));
                          
                            // var statistic_multiple = statistic_val * complexity_val * sqm_val1 ;
                            var a1 = parseFloat($(`#complexity__${row_id}`).val());
                             var b1= parseFloat($(`#sqm__${row_id}`).val());
                             var c1 = ( a1 * b1 * statistic_val);
                            $(`#statistic_sum__${row_id}`).val(parseFloat(c1).toFixed(2));

                            var a2 = parseFloat($(`#complexity__${row_id}`).val());
                             var b2 = parseFloat($(`#sqm__${row_id}`).val());
                             var c2 = ( a2 * b2 * cad_val);
                            // var cad_multiple = cad_val * complexity_val * sqm_val1 ;
                            $(`#cad_cam_sum__${row_id}`).val(parseFloat(c2).toFixed(2));

                            // var logistic_multiple .= logistic_val * complexity_val * sqm_val1 ;
                            var a3 = parseFloat($(`#complexity__${row_id}`).val());
                             var b3 = parseFloat($(`#sqm__${row_id}`).val());
                             
                             var c3 = (b3 * logistic_val);
                            $(`#logistic_sum__${row_id}`).val(parseFloat(c3).toFixed(2));
                            // alert(a3)
                            // alert(b3)
                            // alert(c3)
                            // $('#').
                            $('.detail_sum').keyup();
                            $('.cad_cam_sum').keyup();
                            $('.logistic_sum').keyup();
                            statistic_change_sum()
                            cad_cam_change_sum()
                            logistic_change_sum()
                            total_change_sum()
                            calculation_total()
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
