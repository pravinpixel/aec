<?php $i=0  ?>


<table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Component</th>
                                                    <th>Type</th>
                                                    <!-- <th>Sqm</th>
                                                    <th>Complexity</th> -->
                                                    <th>Details Price</th>
                                                    <th>Details Sum</th>
                                                    <th>Statistics Price</th>
                                                    <th>Statistics Sum</th>
                                                    <th>CAD/CAM Price</th>
                                                    <th>CAD/CAM Sum</th>
                                                    <th>Logistics Price</th>
                                                    <th>Logistics Sum</th>
                                                    <!-- <th class="text-center">Actions</th> -->
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                               
                                                    
                                                @foreach($data['component'] as $buildingComponent)
                                                    @foreach($data['type'] as $type)
                                                    <form class="needs-validations" name="cal_frm" >
                                                        <tr>
                                                            <?php $i++; ?>
                                                            <td class="align-items-center">
                                                                <span>{{ $buildingComponent['building_component_name'] }}</span>
                                                            </td>
                                                            <td class="align-items-center">
                                                                <span>{{ $type['type_name'] }}</span>
                                                            </td>
                                                            
                                                            <!-- <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->sqm ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="sqm" class="form-control cal_submit"  name="sqm<?php echo $i ?>" >
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input  type="number" value="{{ $arr[$buildingComponent->id][$type->id]->complexity ?? 0
                                                                 }}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="complexity" class="form-control cal_submit"  name="complexity<?php echo $i ?>">
                                                            </td> -->
                                                            <td class="align-items-center">
                                                                <input  type="number" value="{{ $arr[$buildingComponent->id][$type->id]->detail_price  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="detail_price"  class="form-control cal_submit" name="detail_price<?php echo $i ?>">
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->detail_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="detail_sum"  class="form-control cal_submit" name="detail_sum<?php echo $i ?>">
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->statistic_price  ?? 0}}"  data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="statistic_price" class="form-control cal_submit" name="statistic_price<?php echo $i ?>">
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->statistic_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="statistic_sum"  class="form-control cal_submit" name="statistic_sum<?php echo $i ?>">
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->cad_cam_price  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="cad_cam_price" class="form-control cal_submit" name="cad_cam_price<?php echo $i ?>" >
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->cad_cam_sum ?? 0 }}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="cad_cam_sum"  class="form-control cal_submit" name="cad_cam_sum<?php echo $i ?>">
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->logistic_price ?? 0 }}"  data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="logistic_price" class="form-control cal_submit" name="logistic_price<?php echo $i ?>">
                                                            </td>
                                                            <td class="align-items-center">
                                                                <input type="number" value="{{ $arr[$buildingComponent->id][$type->id]->logistic_sum  ?? 0}}" data-component_id="{{$buildingComponent->id}}" data-type_id="{{$type->id}}" data-field_name="logistic_sum"  class="form-control cal_submit" name="logistic_sum<?php echo $i ?>">
                                                            </td>
                                                            
                                                            <!-- <td class="align-items-center">
                                                                <button class="cal_submit" data-bci="{{ $buildingComponent['id']}}" data-type="{{ $type['id']}}" >Submit</button>
                                                            </td> -->
                                                        </tr>
                                                    </form>
                                                    @endforeach
                                                @endforeach
                                                    
                                                    <!-- <td class="text-center" >
                                                        <div class="btn-group">
                                                            <button class="shadow btn btn-sm mx-2 btn-outline-primary l rounded-pill" ng-click="toggleEdit('edit', master.id)"><i class="fa fa-edit"></i></button>
                                                            <button class="shadow btn btn-sm btn-outline-secondary rounded-pill  " ng-click="confirmMasterDelete(master.id)"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td> -->
                                               
                                                
                                            </tbody>



