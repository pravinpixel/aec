<div id="employee-detail-view-model" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-right" style="width:100% !important">
        <div class="p-3 shadow-sm">
            <h3>Employee Name : <b class="text-primary"> @{{ employeeDetail.user_name }} </b></h3>
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
        </div>
        <div class="modal-content h-100 p-4" style="overflow: auto">
            <div class="card mt-3">
                <div class="card-body p-2">
                    <table class="custom table table-bordered m-0">
                        <tr>
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th>Job Role</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>@{{ employeeDetail.employee_id }}</td>
                            <td>@{{ employeeDetail.user_name }} </td>
                            <td>@{{ employeeDetail.job_role }}</td>
                            <td>@{{ employeeDetail.number }}</td>
                            <td>@{{ employeeDetail.email }} </td>
                            <td>   <img src="{{ asset('/public/image/') }}/@{{employeeDetail.image}}" alt="no image" width="60px"></td>
                        </tr>
                    </table>
                </div>
            </div> 
            
            <div class="summary-group py-3 accordion rounded-0" id="summaryGroup">
                    <div class="accordion-item m-0">
                        <h2 class="accordion-header m-0" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Platform Access
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row mx-0 container ">
                                <div class="col-12 text-center">
                                    <h4 class="f-20 m-0 p-3">Plat Information</h4>
                                </div>
                                <div class="col-md-6 mx-auto p-3">
                                    <table class="table custom m-0  table-bordered">
                                        <tbody>
                                                <tr class="border">
                                                    <th  class=" ">Share Point
                                                    </th><td  class="bg-white">
                                                    <span  ng-if="enqData.share_access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                    <span  ng-if="enqData.share_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                    </td>
                                                </tr> 
                                                <tr class="border">
                                                    <th  class=" ">BIM
                                                    </th><td  class="bg-white">
                                                    <span  ng-if="enqData.bim_access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                    <span  ng-if="enqData.bim_access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                    </td>
                                                </tr> 
                                                <tr class="border">
                                                    <th  class=" ">24*7
                                                    </th><td  class="bg-white">
                                                    <span  ng-if="enqData.access=='1'" class="text-success" > <i class="fa fa-2x fa-check-circle"></i></span>
                                                    <span  ng-if="enqData.access=='0'"  class="text-danger"> <i class="fa fa-2x fa-times-circle"></i></span>
                                                    </td>
                                                </tr> 
                                                
                                                
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Client Listing
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row mx-0 container ">
                                    <div class="col-12 text-center">
                                        <h4 class="f-20 m-0 p-3">Client Listing</h4>
                                    </div>
                                    <div class="col-md-6 p-3 mx-auto">
                                        <table class="table custom m-0   table-bordered">
                                            <tbody>
                                                <tr class="border">
                                                    <th class="bg-primary text-white">S.no</th>
                                                    <th class="bg-primary text-white">Services</th>
                                                </tr> 
                                            <tr class="border">
                                                <td class=" ">1
                                                </td><td class="bg-white">CAD / CAM Modelling</td>
                                            </tr>  
                                            <tr class="border">
                                                <td class=" ">2
                                                </td><td class="bg-white">Approval Drawings</td>
                                            </tr>  
                                        </tbody></table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                {{-- ProjectInfo --}}
                    <fieldset class="accordion-item">
                        <div class="accordion-header custom m-0 position-relative" id="ProjectInfo_header">
                            <div class="accordion-button " data-bs-toggle="collapse" data-bs-target="#ProjectInfo" aria-expanded="true" aria-controls="ProjectInfo">
                                Folder Access
                            </div>
                            <div class="icon m-0 position-absolute rounded-pills btnj" style="right: 10px;top:30%; z-index:111 !important">
                                <i data-bs-toggle="collapse" 
                                    href="#ProjectInfo" 
                                    aria-expanded="false" 
                                    aria-controls="ProjectInfo" 
                                    class="accordion-button custom-accordion-button bg-primary text-white toggle-btn ">
                                </i>
                            </div>
                        </div>
                        <div id="ProjectInfo" class="accordion-collapse collapse show" aria-labelledby="ProjectInfo_header" >
                            <div class="accordion-body">  
                               
                            <table datatable="ng" dt-options="vm.dtOptions" class="table custom table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Folder Name</th>
                                        <th>Active</th>
                                        
                                    </tr>
                                </thead>
                         
                                <tbody>
                                    
                                    <tr ng-repeat="(index,employee) in sharePointFolder">
                                        
                                        <td class="align-items-center">@{{ employee.folder_name }}</td>

                                        <td>
                                            <div>
                                            
                                                <input type="checkbox" id="switch__@{{ index }}" ng-disabled="true"  ng-checked="employee.is_active == 1"  ng-model="employee.is_active" data-switch="success"/>
                                                <label for="switch__@{{index}}" data-on-label="On"  data-off-label="Off"></label>
                                            </div>          
                                        </td>                    
                                    </tr>
                                    
                                </tbody>
                            </table>
                               
                                
                            </div> 
                        </div>
                    </fieldset>
                {{-- ProjectInfo --}}
        
              
        
           
        
        
            </div>   
             
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->