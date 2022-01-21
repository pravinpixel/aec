<?php $i=0 ?>


<table class="table table-hover table-striped table-s">
    <thead>
        <tr>
            <th style="padding: 0 5px !important"><small>Component</small> </th>
            <th style="padding: 0 5px !important"><small>Type</small> </th>
            <th style="padding: 0 5px !important"><small>Details Price</small> </th>
            <th style="padding: 0 5px !important"><small>Details Sum</small> </th>
            <th style="padding: 0 5px !important"><small>Statistics Price</small> </th>
            <th style="padding: 0 5px !important"><small>Statistics Sum</small> </th>
            <th style="padding: 0 5px !important"><small>CAD/CAM Price</small> </th>
            <th style="padding: 0 5px !important"><small>CAD/CAM Sum</small> </th>
            <th style="padding: 0 5px !important"><small>Logistics Price</small> </th>
            <th style="padding: 0 5px !important"><small>Logistics Sum</small> </th>
        </tr>
    </thead>
    <tbody> 
        @foreach($data['component'] as $buildingComponent)
            @foreach($data['type'] as $type)
               
                    <tr class="needs-validations " name="cal_frm" >
                        <?php $i++; ?>
                        <td style="padding: 0 10px !important">
                            <small>{{ $buildingComponent['building_component_name'] }}</small>
                        </td>
                        <td style="padding: 0 10px !important">
                            <small>{{ $type['type_name'] }}</small>
                        </td> 
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->detail_price  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="detail_price"  class="cal_submit" name="detail_price<?php echo $i ?>">
                        </td>
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->detail_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="detail_sum"  class="cal_submit" name="detail_sum<?php echo $i ?>">
                        </td>
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->statistic_price  ?? 0}}"  data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="statistic_price" class="cal_submit" name="statistic_price<?php echo $i ?>">
                        </td>
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->statistic_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="statistic_sum"  class="cal_submit" name="statistic_sum<?php echo $i ?>">
                        </td>
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->cad_cam_price  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="cad_cam_price" class="cal_submit" name="cad_cam_price<?php echo $i ?>" >
                        </td>
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->cad_cam_sum ?? 0 }}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="cad_cam_sum"  class="cal_submit" name="cad_cam_sum<?php echo $i ?>">
                        </td>
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->logistic_price ?? 0 }}"  data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="logistic_price" class="cal_submit" name="logistic_price<?php echo $i ?>">
                        </td>
                        <td style="padding: 0 !important;">
                            <input style="width: 100%; border:0;background:none;text-align:right;font-size:12px" type="number" value="{{ $arr[$buildingComponent->id][$type->id]->logistic_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="logistic_sum"  class="cal_submit" name="logistic_sum<?php echo $i ?>">
                        </td>
                        
                        <!-- <td style="padding: 0 !important">
                            <button class="cal_submit" data-bci="{{ $buildingComponent['id']}}" data-type="{{ $type['id']}}" >Submit</button>
                        </td> -->
                    </tr>
               
            @endforeach
        @endforeach 

    </tbody>
</table>