<div ng-controller="WizzardCtrl">
    <div class="summary-group pt-3">
        {{-- ProjectInfo --}}
            <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm"> 
                <div class="legend shadow-sm border rounded text-primary">Project Information </div>
                <div class="card-body">  
                    <table class="table m-0 table-hover">
                        <tbody>
                            <tr ng-if="project_info.project_name != null">
                                <td width="30%"><b>Project Name</b></td>
                                <td>:</td>
                                <td>@{{ project_info.project_name }}</td>
                            </tr> 
                            <tr ng-if="project_info.site_address != null">
                                <td><b>Construction Site Address</b></td>
                                <td>:</td>
                                <td>@{{ project_info.site_address }}</td>
                            </tr> 
                            <tr ng-if="project_info.contact_person != null">
                                <td><b>Contact Person name</b></td>
                                <td>:</td>
                                <td>@{{ project_info.contact_person }} </td>
                            </tr> 
                            <tr ng-if="customer_info.email != null">
                                <td><b>Email</b></td>
                                <td>:</td>
                                <td>@{{ customer_info.email }}</td>
                            </tr> 
                            <tr ng-if="customer_info.mobile_no != null">
                                <td><b>Conatct number</b></td>
                                <td>:</td>
                                <td>@{{ customer_info.mobile_no }}</td>
                            </tr> 
                            <tr ng-if="project_info.secondary_mobile_no != null">
                                <td><b>Secondary conatct number</b></td>
                                <td>:</td>
                                <td>@{{ project_info.secondary_mobile_no }}</td>
                            </tr> 
                            <tr ng-if="project_info.zipcode != null">
                                <td><b>Post Code</b></td>
                                <td>:</td>
                                <td>@{{ project_info.zipcode }}</td>
                            </tr> 
                            <tr ng-if="project_info.place != null">
                                <td><b>Place</b></td>
                                <td>:</td>
                                <td>@{{ project_info.place }}</td>
                            </tr> 
                            <tr ng-if="project_info.state != null">
                                <td><b>State</b></td>
                                <td>:</td>
                                <td>@{{ project_info.state }}</td>
                            </tr> 
                            <tr ng-if="project_info.country != null">
                                <td><b>Country</b></td>
                                <td>:</td>
                                <td>@{{ project_info.country }}</td>
                            </tr> 
                            <tr ng-if="project_info.project_typproject_info.project_type_name != null">
                                <td><b>Type of Project</b></td>
                                <td>:</td>
                                <td>@{{ project_info.project_typproject_info.project_type_name }}</td>
                            </tr> 
                            <tr ng-if="project_info.building_typproject_info.building_type_name != null">
                                <td><b>Type of Building</b></td>
                                <td>:</td>
                                <td>@{{ project_info.building_typproject_info.building_type_name }}</td>
                            </tr> 
                            <tr ng-if="project_info.no_of_building != null">
                                <td><b>Number of Buildings</b></td>
                                <td>:</td>
                                <td>@{{ project_info.no_of_building }}</td>
                            </tr> 
                            <tr ng-if="project_info.delivery_typproject_info.delivery_type_name != null">
                                <td><b>Type of Delivery</b></td>
                                <td>:</td>
                                <td>@{{ project_info.delivery_typproject_info.delivery_type_name }}</td>
                            </tr> 
                            <tr ng-if="project_info.project_delivery_date != null">
                                <td><b>Delivered Date</b></td>
                                <td>:</td>
                                <td>@{{ project_info.project_delivery_date }}</td>
                            </tr> 
                            <tr ng-if="project_info.state != null">
                                <td><b>State</b></td>
                                <td>:</td>
                                <td>@{{ project_info.state }}</td>
                            </tr> 
                            <tr ng-if="project_info.customerremarks != null">
                                <td><b>Remarks</b></td>
                                <td>:</td>
                                <td>@{{ project_info.customer.remarks }}</td>
                            </tr> 
                        </tbody>
                    </table>
                    <form name="commentsForm" ng-submit="sendComments('project_infomation','Admin')" class="input-group mt-3">
                        <input type="text" ng-model="comments" name="comments" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                        <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                    </form>   
                    <ul class="list-group">
                        <li class="list-group-item" ng-repeat="cmt in enquiry_comments"><b><sup>@{{ cmt.created_by }}</sup> -</b>@{{ cmt.comments }} </li>
                    </ul>
                    <div class="text-end pt-2">
                        <a href="" class="text-primary pe-2 pt-2" data-bs-toggle="modal" data-bs-target="#" ng-click="toggle(viewConversations)">
                            <i class="fa fa-eye"></i>  Previous chat history
                        </a>
                    </div>
                </div> 
            </fieldset>
        {{-- ProjectInfo --}}

        {{-- Selected Services --}}
            <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                <div class="legend shadow-sm border rounded text-primary">Selected Services</div>
                <div class="card-body">
                    <ul class="row m-0 " >
                        <li ng-repeat="service in services" class="col-md-4 list-group-item border-0"><i class="fa fa-check-circle text-primary me-1"></i> @{{ service.service_name }}</li>
                    </ul> 
                    <form action="{{ route("enquiry.comments") }}" method="POST" class="input-group mt-3"> @csrf
                        <input type="text" name="comments" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                        <input type="hidden" name="enquiry_id" value="@{{ enquiry_id }}">
                        <input type="hidden" name="type" value="selected_service">
                        <input type="hidden" name="created_by" value="Admin">
                        <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-send"></i></button>
                    </form>  
                </div> 
            </fieldset>
        {{-- Selected Services --}}

        {{-- IFC Models & Uploaded Documents --}}
            <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                <div class="legend shadow-sm border rounded text-primary">IFC Models & Uploaded Documents</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><b>S.No</b></th>
                            <th><b>Date</b></th>
                            <th><b>File name</b></th>
                            <th><b>File Type</b></th>
                            <th class="text-center" width="150px"><b>Action</b></th>
                        </tr>
                        <tr ng-repeat="(index,doc) in ifc_model_uploads">
                            <td>@{{ index+1 }}</td>
                            <td>@{{ doc.pivot.date }}</td>
                            <td>@{{ doc.document_type_name }}</td>
                            <td>@{{ doc.pivot.file_type }}</td>
                            <td class="text-center">
                                <a download="{{ asset("public/uploads/") }}/@{{ doc.pivot.file_name }}" href="{{ asset("public/uploads/") }}/@{{ doc.pivot.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                <a target="_child" href="{{ asset("public/uploads/") }}/@{{ doc.pivot.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                            </td>
                        </tr> 
                    </table>
                    <div class="input-group mt-3">
                        <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                        <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                    </div>
                </div> 
            </fieldset>
        {{-- IFC Models & Uploaded Documents --}}

        {{-- Building Components --}} 
            <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                <div class="legend shadow-sm border rounded text-primary">Building Components</div>
                <div class="card-body">
                    <div  style="max-height: 400px; overflow:auto">
                    
                        <table class="table table-bordered" ng-init="total = 0 ">
                            <tbody >
                                <tr class="table-bold text-center">
                                    <th width="150px"></th>
                                    <th style="padding: 0 !important">
                                        <table class="table m-0 ">
                                            <tr>
                                                <th width="50%">
                                                    Wall details
                                                </th>
                                                <th style="padding: 0 !important" width="50%">
                                                    Layer details
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr> 
                                <tr ng-repeat="building_component in building_components" >
                                    <td>@{{ building_component.wall }} @{{ total }}</td>
                                    <td style="padding: 0 !important" >
                                        <table class="table m-0 ">
                                            <tr ng-repeat="detail in building_component.detail"> 
                                                <td width="50%">
                                                    <table class="table m-0 table-bordered">
                                                        <tr>
                                                            <th>Floor</th>
                                                            <th>wall Number</th>
                                                            <th>Delivery type</th>
                                                            <th >Total Area </th>
                                                        </tr> 
                                                        <tr>
                                                            <td>@{{ detail.floor }}</td>
                                                            <td>@{{ detail.exd_wall_number }}</td>
                                                            <td>@{{ detail.delivery_type.delivery_type_name }}</td>
                                                            <td ng-init="$parent.total = $parent.total ++ detail.approx_total_area">@{{ detail.approx_total_area }}</td>
                                                        </tr> 
                                                    </table>
                                                </td>
                                                <td style="padding: 0 !important" width="50%">
                                                    <table class="table m-0 table-bordered">
                                                        <tr class="table-bold">
                                                            <th>Name</th>
                                                            <th>Type</th>
                                                            <th>Thickness</th>
                                                            <th>Breadth</th>
                                                        </tr> 
                                                        <tr ng-repeat="layer in detail.layer">
                                                            <td>@{{ layer.layer.layer_name }}</td>
                                                            <td>@{{ layer.layer_type.layer_type_name }}</td>
                                                            <td>@{{ layer.thickness }}</td>
                                                            <td>@{{ layer.breath }}</td>
                                                        </tr> 
                                                    </table>
                                                </td>
                                            </tr> 
                                        </table> 
                                    </td>
                                </tr>  
                            </tbody>                     
                        </table> 
                    </div> 
                    <div class="input-group mt-3">
                        <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                        <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                    </div>
                </div> 
            </fieldset>
        {{-- Building Components --}}

        {{-- Additional Info --}} 
            <fieldset class="border position-relative rounded my-3 mb-4 shadow-sm">    	
                <div class="legend shadow-sm border rounded text-primary">Additional Info</div>
                <div class="card-body pt-4">
                <table class="table table-bordered">
                        <tr>
                            <th>S.no</th>
                            <th>Date</th>
                            <th>commented person</th>
                            <th>comments</th>
                        </tr>
                        <tr ng-repeat="additional_info in additional_infos">
                            <td> @{{ index + 1  }}</td>
                            <td>@{{ additional_info.created_at }}</td>
                            <td>@{{ additional_info.customer.full_name }}</td>
                            <td>@{{ additional_info.comments }}</td>
                        </tr> 
                    </table>
                    <div class="input-group mt-3">
                        <input type="text" class="form-control rounded-pill me-2" placeholder="Type herproject_info.! your comments">
                        <button class="btn btn-primary rounded-pill" type="button"><i class="fa fa-send"></i></button>
                    </div>
                </div> 
            </fieldset>
        {{-- Additional Info --}}
    </div>
    <div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-right" style="width:100% !important">
            <div class="modal-content p-3 h-100 d-flex justify-content-center align-items-center" >
                <div>
                    <div class="border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {{-- <ul class="conversation-list" data-simplebar="init" style="max-height: 537px"><div class="simplebar-wrapper" style="margin: 0px -15px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 15px;">
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:00</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Hello!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Hi, How are you? What about our next meeting?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N">
                                        <i>10:01</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Yeah everyThickness g is fine
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Wow that's great
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:02</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Let's have it today if you are free
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:03</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                Sure Thickness g! let me know if 2pm works for you
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                Sorry, I have another meeting scheduled at 2pm. Can we have it
                                                at 3pm instead?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded">
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Shreyu N</i>
                                            <p>
                                                We can also discuss about the presentation talk format if you have some extra mins
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix odd">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded">
                                        <i>10:05</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>Dominic</i>
                                            <p>
                                                3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. 
                                                I am attaching the last year format and assets here...
                                            </p>
                                        </div>
                                        <div class="card mt-2 mb-1 shadow-none border text-start">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded">
                                                                .ZIP
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);" class="text-muted fw-bold">Hyper-admin-design.zip</a>
                                                        <p class="mb-0">2.3 MB</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                            <i class="dripicons-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="uil uil-ellipsis-v"></i></button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 479px; height: 924px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 312px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div>
                            </ul> --}} 
                            <div class="row">
                                <div class="col">
                                    <div class="mt-2 bg-light p-3 rounded">
                                        <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                                            <div class="row">
                                                <div class="col mb-2 mb-sm-0">
                                                    <input type="text" class="form-control border-0" placeholder="Enter your text" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter your messsage
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-secondary"><i class="uil uil-paperclip"></i></a>
                                                        <a href="#" class="btn btn-secondary"> <i class="uil uil-smile"></i> </a>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-success chat-send"><i class="uil uil-message"></i></button>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row-->
                                        </form>
                                    </div> 
                                </div> <!-- end col-->
                            </div>
                            <!-- end row -->
                        </div> <!-- end card-body -->
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<style>
    .Project_Info .timeline-step .inner-circle{
        background: var(--primary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 