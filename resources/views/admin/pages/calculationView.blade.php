
<?php $i=0 ?>
<?php $index=1 ?>

<div class="card ">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-around">
            <div  class="col me-2">
                <small for="" class="mb-2">Building Component</small>
                <select name="" class="form-select cl_country" id="ddlCountry">
                <option value="all">Select</option>    
                    @foreach($data['component'] as $buildingComponent)                 
                    <option value="{{ $buildingComponent->building_component_name }}"> {{ $buildingComponent->building_component_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col me-2">
                <small for="" class="mb-2">Building Type</small>
                <select name="" id="ddlAge" class="form-select cl_age">
                    <option value="all">Select</option>                    
                    @foreach($data['type'] as $type)            
                    <option value="{{ $type->building_type_name}}"> {{ $type->building_type_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="cols" >
                <small for="" class="mb-2" style="opacity:0">Building Type</small>
                <div>
                    <button class="btn btn-primary" onclick="reset_dropdown()">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table custom custom custom-table table-hover table-s" id="table11" >
            <thead>
                <tr>
                    <th style="padding: 0 5px !important"><small>S.No</small> </th>
                    <th style="padding: 0 5px !important"><small>Component</small> </th>
                    <th style="padding: 0 5px !important"><small>Type</small> </th>
                    <th style="padding: 0 5px !important"><small>Details Price</small> </th>
                    <!-- <th style="padding: 0 5px !important"><small>Details Sum</small> </th> -->
                    <th style="padding: 0 5px !important"><small>Statistics Price</small> </th>
                    <!-- <th style="padding: 0 5px !important"><small>Statistics Sum</small> </th> -->
                    <th style="padding: 0 5px !important"><small>CAD/CAM Price</small> </th>
                    <!-- <th style="padding: 0 5px !important"><small>CAD/CAM Sum</small> </th> -->
                    <th style="padding: 0 5px !important"><small>Logistics Price</small> </th>
                    <!-- <th style="padding: 0 5px !important"><small>Logistics Sum</small> </th> -->
                    <th style="padding: 0 5px !important"><small>Action</small> </th>
                </tr>
            </thead>
            <tbody> 
           
             
                @foreach($data['component'] as $buildingComponent)
                    @foreach($data['type'] as  $type) 
                        <tr class="needs-validations " name="cal_frm" >
                            <td>{{ $index++ }}</td>
                            <?php $i++; ?>
                            <td style="padding: 0 10px !important" class="text-left">
                                <small> {{ $buildingComponent['building_component_name'] }}   </small>
                            </td>
                            <td style="padding: 0 10px !important">
                                <small>  {{ $type['building_type_name'] }}   </small>
                            </td> 
                            <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" min="0" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->detail_price  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="detail_price"  class="cal_submit text-center" name="detail_price<?php echo $i ?>">
                            </td>
                            <!-- <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" min="0" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->detail_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="detail_sum"  class="cal_submit" name="detail_sum<?php echo $i ?>">
                            </td> -->
                            <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" min="0" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->statistic_price  ?? 0}}"  data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="statistic_price" class="cal_submit text-center" name="statistic_price<?php echo $i ?>">
                            </td>
                            <!-- <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" min="0" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->statistic_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="statistic_sum"  class="cal_submit" name="statistic_sum<?php echo $i ?>">
                            </td> -->
                            <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" min="0" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->cad_cam_price  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="cad_cam_price" class="cal_submit text-center" name="cad_cam_price<?php echo $i ?>" >
                            </td>
                            <!-- <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" min="0" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->cad_cam_sum ?? 0 }}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="cad_cam_sum"  class="cal_submit" name="cad_cam_sum<?php echo $i ?>">
                            </td> -->
                            <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" min="0" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->logistic_price ?? 0 }}"  data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="logistic_price" class="cal_submit text-center" name="logistic_price<?php echo $i ?>">
                            </td>
                            <!-- <td style="padding: 0 !important;">
                                <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->logistic_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="logistic_sum"  class="cal_submit" name="logistic_sum<?php echo $i ?>">
                            </td> -->
                            <td style="padding: 0 !important;">
                                @if($arr[$buildingComponent->id][$type->id]->id ??'')
                                    <a class="delete delete_data btn text-danger btn-outline-light border h-100 w-100 cal_delete" name="col_delete<?php echo $i ?>"  data-col_delete_id="{{ $arr[$buildingComponent->id][$type->id]->id ??''}}" >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @else 
                                @endif
                            </td>
                            <!-- <td style="padding: 0 !important">
                                <button class="cal_submit" data-bci="{{ $buildingComponent['id']}}" data-type="{{ $type['id']}}" >Submit</button>
                            </td> -->
                        </tr> 
                    @endforeach
                @endforeach 

            </tbody>
        </table>
    </div>
</div>
<style>
    .masterTab{
        color: #163269 !important;
        background-color: #d4e2ff !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $("#ddlCountry,#ddlAge").on("change", function () {
          
            var country = $('#ddlCountry').find("option:selected").val();
            var age = $('#ddlAge').find("option:selected").val();
           
            SearchData(country, age)
        });

       
    });
    function reset_dropdown()
        {
            
            $("#ddlCountry")[0].selectedIndex = 0;  
            $("#ddlAge")[0].selectedIndex = 0;  
            $('#table11 tbody tr').show();
    
        }
    function SearchData(selectComponent, selectType) {
      
        if (selectComponent.toUpperCase() == 'ALL' && selectType.toUpperCase() == 'ALL') {
            $('#table11 tbody tr').show();
        } else {
            $('#table11 tbody tr:has(td)').each(function () {
                var component = $.trim($(this).find('td:eq(1)').text());
                var type = $.trim($(this).find('td:eq(2)').text());
               
                if(selectType == '' && selectComponent == component){
                    $(this).show();
                } else if(selectComponent == '' && selectType == type ){
                    $(this).show();
                }else if (selectComponent.toUpperCase() != 'ALL' && selectType.toUpperCase() != 'ALL') {
                    if (component.toUpperCase() == selectComponent.toUpperCase() && type == selectType) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                } else if ($(this).find('td:eq(0)').text() != '' || $(this).find('td:eq(1)').text() != '') {
                    if (selectComponent != 'all') {
                        if (selectComponent.toUpperCase() == component.toUpperCase()) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                    if (selectType != 'all') {
                        if (selectType == type) {
                            $(this).show();
                        }
                        else {
                            $(this).hide();
                        }
                    }
                }
            });
        }
    }

    
</script>
