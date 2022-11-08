<div> 
    @if ($table_status == 1)
        <div class="card-header sticky-top px-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title h4">PROJECT NAME : <span class="text-primary">{{ $detail_table['project_name'] }}</span></h3>
            <button type="button" class="btn-sm btn btn-light border shadow-sm" onclick="location.reload()" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div> 
    @endif
    <div class="card-body px-3 pt-3">
        
        @if ($table_status == 1)
            <table class="custom table table-bordered m-0 bg-white border shadow-sm mb-3">
                <tbody>
                    <tr>
                        <th>Enquiry Number</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Type of Delivery</th>
                    </tr>
                    <tr>
                        <td>{{ $detail_table['enquiry_number'] }}</td>
                        <td>{{ $detail_table['name'] }}</td>
                        <td>{{ $detail_table['company_name'] }}</td>
                        <td>{{ $detail_table['mobile'] }}</td>
                        <td>{{ $detail_table['email'] }}</td>
                        <td>{{ $detail_table['type_of_delivery'] }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        <x-accordion title="Project Information" path="false" open="true" argument="{{ getModuleMenuMessagesCount('enquiry', $enquiry['project_infos']['enquiry_id'], __('app.Project_Information'), 'count') }}">
            <table class="table custom m-0 table-hover">
                <tbody> 
                    @if ($enquiry['project_infos']['project_name'])
                        <tr>
                            <td width="30%"><b>Project Name</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['project_name'] }}</td>
                        </tr>
                    @endif
                    @if ($enquiry['project_infos']['contact_person'])
                        <tr>
                            <td><b>Contact Person name</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['contact_person'] }}</td>
                        </tr>
                    @endif
                    @if (!is_null($enquiry['additional_infos']))
                        @if ($enquiry['additional_infos']->customer['email'])
                            <tr>
                                <td><b>Email</b></td>
                                <td>:</td>
                                <td>{{ $enquiry['additional_infos']->customer['email'] }}</td>
                            </tr>
                        @endif
                        @if ($enquiry['additional_infos']->customer['mobile_no'])
                            <tr>
                                <td><b>Contact Number</b></td>
                                <td>:</td>
                                <td>{{ $enquiry['additional_infos']->customer['mobile_no'] }}</td>
                            </tr>
                        @endif
                    @endif 
                    @if ($enquiry['project_infos']['site_address'])
                        <tr>
                            <td><b>Construction Site Address</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['site_address'] }}</td>
                        </tr>
                    @endif
                    @if ($enquiry['project_infos']['place'])
                        <tr>
                            <td><b>City</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['place'] }}</td>
                        </tr>
                    @endif
                    @if ($enquiry['project_infos']['state'])
                        <tr>
                            <td><b>State</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['state'] }}</td>
                        </tr>
                    @endif
                    @if ($enquiry['project_infos']['zipcode'])
                        <tr>
                            <td><b>Zip Code</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['zipcode'] }}</td>
                        </tr>
                    @endif
                    @if ($enquiry['project_infos']['secondary_mobile_no'])
                        <tr>
                            <td><b>Secondary Contact Number</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['secondary_mobile_no'] }}</td>
                        </tr>
                    @endif
                    @if ($enquiry['project_infos']['country'])
                        <tr>
                            <td><b>Country</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['country'] }}</td>
                        </tr>
                    @endif
                    @if (!is_null($enquiry['project_infos']['project_type']))
                        @if ($enquiry['project_infos']['project_type']['project_type_name'])
                            <tr>
                                <td><b>Type of Project</b></td>
                                <td>:</td>
                                <td>{{ $enquiry['project_infos']['project_type']['project_type_name'] }}</td>
                            </tr>
                        @endif
                    @endif 
                    @if (!is_null($enquiry['project_infos']['building_type']))
                        @if ($enquiry['project_infos']['building_type']['building_type_name'])
                            <tr>
                                <td><b>Type of Building</b></td>
                                <td>:</td>
                                <td>{{ $enquiry['project_infos']['building_type']['building_type_name'] }}</td>
                            </tr>
                        @endif
                    @endif  
                    @if ($enquiry['project_infos']['no_of_building'])
                        <tr>
                            <td><b>No. of Buildings</b></td>
                            <td>:</td>
                            <td>{{ $enquiry['project_infos']['no_of_building'] }}</td>
                        </tr>
                    @endif
                    @if (!is_null($enquiry['project_infos']['delivery_type']))
                        @if ($enquiry['project_infos']['delivery_type']['delivery_type_name'])
                            <tr>
                                <td><b>Type of Delivery</b></td>
                                <td>:</td>
                                <td>{{ $enquiry['project_infos']['delivery_type']['delivery_type_name'] }}</td>
                            </tr>
                        @endif
                    @endif 
                    @if ($enquiry['project_infos']['project_date'])
                        <tr>
                            <td><b>Start Date</b></td>
                            <td>:</td>
                            <td> 
                                {{ SetDateFormat($enquiry['project_infos']['project_date']) }}
                            </td>
                        </tr>
                    @endif
                    @if ($enquiry['project_infos']['project_delivery_date'])
                        <tr>
                            <td><b>Delivery Date</b></td>
                            <td>:</td>
                            <td>
                                {{ SetDateFormat($enquiry['project_infos']['project_delivery_date']) }}
                            </td>
                        </tr>
                    @endif 
                </tbody>
            </table> 
            <x-chat-box
                :status="$chat_status" 
                :moduleId="$enquiry['project_infos']['enquiry_id']" 
                moduleName="enquiry" 
                menuName="{{ __('app.Project_Information') }}" 
            />
        </x-accordion>
        <x-accordion title="Selected Services" path="false" open="false" argument="{{ getModuleMenuMessagesCount('enquiry', $enquiry['project_infos']['enquiry_id'], __('app.Selected_Services'), 'count') }}"> 
            <ul>
                @foreach ($enquiry['services'] as $service_type => $services)
                    <li> 
                        {{ $service_type }}
                        <ul  class="row m-0 ">
                            @foreach ($services as $service)
                                <li class="col-md-4 list-group-item border-0">
                                    <i class="fa fa-check-circle text-primary me-1"></i> 
                                   {{ $service->service_name }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <x-chat-box 
                :status="$chat_status" 
                :moduleId="$enquiry['project_infos']['enquiry_id']" 
                moduleName="enquiry" 
                menuName="{{ __('app.Selected_Services') }}" 
            />
        </x-accordion>
        <x-accordion title="IFC Models and Uploaded Documents" path="false" open="false" argument="{{ getModuleMenuMessagesCount('enquiry', $enquiry['project_infos']['enquiry_id'], __('app.IFC_Models_and_Uploaded_Documents'), 'count') }}">  
            <table class="table custom custom table-hover">
                <thead>
                    <tr>
                        <th class="text-center"><b>S.No</b></th>
                        <th class="text-center" width="100px"><b>Date</b></th>
                        <th class="text-center" width="150px"><b>File Type</b></th>
                        <th><b>File Name</b></th>
                        <th class="text-end" width="150px"><b>Action</b></th>
                    </tr>
                    <tbody>
                        @if (isset($enquiry['ifc_model_uploads'] ))
                            @foreach ($enquiry['ifc_model_uploads']  as $i =>  $doc)
                                <tr>
                                    <td  class="text-center">{{ $i+1 }}</td>
                                    <td  class="text-center">{{ $doc->created_at }}</td>
                                    <td  class="text-center">
                                        <img src="{{ url("storage/app/ifc-icons")."/".$doc->file_type }}.png" width="20px" class="me-1">
                                        {{ $doc->file_type }}
                                    </td>
                                    <td>{{ $doc->client_file_name }}</td>
                                    <td class="text-end">
                                        @if ($doc->file_type != 'link') 
                                            <div class="btn-group border border-white shadow-sm ">
                                                @if ($doc->file_type == 'pdf' || $doc->file_type == 'jpg' || $doc->file_type == 'png' || $doc->file_type == 'jpeg' || $doc->file_type == 'svg') 
                                                    @if ($doc->file_type == 'pdf')
                                                            <a data-fslightbox="lightbox" href="#viewPdf_{{  $i + 1 }}" class=" btn-sm btn btn-success text-black"  >
                                                                <i class="feather-eye feather" style="pointer-events: none"></i>
                                                            </a>
                                                            <div class="d-none">
                                                                <iframe
                                                                    src="{{ asset("public/uploads/".$doc->file_name) }}"
                                                                    id="viewPdf_{{  $i + 1 }}"
                                                                    width="1920px"
                                                                    height="1080px"
                                                                    frameBorder="0"
                                                                    allowFullScreen>
                                                                </iframe>
                                                            </div>
                                                        @else 
                                                        <a data-fslightbox href="{{ asset("public/uploads/".$doc->file_name) }}" class=" btn-sm btn btn-success text-black">
                                                            <i class="feather-eye feather" style="pointer-events: none"></i>
                                                        </a>
                                                    @endif 
                                                @endif
                                                <a download="{{ $doc->file_name }}" class="btn-sm btn btn-warning" href="{{ asset("public/uploads/".$doc->file_name) }}">
                                                    <i class="feather-arrow-down feather"></i>
                                                </a>
                                            </div>
                                            @else
                                                <a data-fslightbox="lightbox" href="#viewPdf_{{  $i + 1 }}" class=" btn-sm btn btn-success text-black"  >
                                                    <i class="feather-eye feather" style="pointer-events: none"></i>
                                                </a>
                                                <div class="d-none">
                                                    <iframe
                                                        src="{{ $doc->file_name }}"
                                                        id="viewPdf_{{  $i + 1 }}"
                                                        width="1920px"
                                                        height="1080px"
                                                        frameBorder="0"
                                                        allowFullScreen>
                                                    </iframe>
                                                </div>
                                                {{-- <a class=" border-white shadow-sm btn-sm btn btn-success text-black border" target="_blank" href="{{ $doc->file_name }}"><i class="feather-eye feather"></i></a> --}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @else 
                            <tr>
                                <td colspan="5">No data found</td>
                            </tr>
                        @endif  
                        {{-- <td class="text-center" ng-show="ifc_model_upload.file_type != 'link'">
                            <a download="@{{ ifc_model_upload.client_file_name }}" href="{{ asset("public/uploads/") }}/@{{ ifc_model_upload.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                            <a ng-show="!autoDeskFileType.includes(ifc_model_upload.file_type)" ng-click="getDocumentView(ifc_model_upload) "><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                            <a ng-show="autoDeskFileType.includes(ifc_model_upload.file_type)" target="_blank" href="{{ url('/') }}/viewmodel/@{{ ifc_model_upload.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                        </td>
                        <td class="text-center" ng-show="ifc_model_upload.file_type == 'link'">
                            <a class="" target="_blank" href="@{{ ifc_model_upload.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                        </td> --}}
                    </tbody>
                </thead>
            </table>
            <x-chat-box 
                :status="$chat_status"
                :moduleId="$enquiry['project_infos']['enquiry_id']" 
                moduleName="enquiry" 
                menuName="{{ __('app.IFC_Models_and_Uploaded_Documents') }}" 
            />
        </x-accordion> 
        <x-accordion title="Building Components" path="false" open="false" argument="{{ getModuleMenuMessagesCount('enquiry', $enquiry['project_infos']['enquiry_id'], __('app.Building_Components'), 'count') }}">
            @if ($enquiry['project_infos']['building_component_process_type'] == 0)
                <table class="table table-bordered m-0 table-striped">
                    <tbody>
                        @if(isset($enquiry['building_components']))
                            @foreach ($enquiry['building_components'] as $building)
                                @isset($building->detail)
                                    <tr>
                                        <td class="text-center" width="150px">
                                            <b>{{ $building->wall }}</b>
                                        </td>
                                        <td> 
                                            @foreach ($building->detail as $key => $build)
                                                <div class="py-2" >
                                                    <table class="shadow-sm custom border border-dark mb-0 table table-bordred bg-white">
                                                        <thead>
                                                            <tr> 
                                                                <td width="33%" class="bg-primary2"><b>{{ $building->wall =='Roof' ? 'Roof' : 'Floor' }}</b></td>
                                                                <td width="33%" class="bg-primary2"><b>Type of Delivery</b></td>
                                                                <td width="33%" class="bg-primary2"><b>Total Area</b></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: left !important">{{ $build['floor'] }} </td>
                                                                <td>{{ $build['delivery_type']['delivery_type_name'] }}</td>
                                                                <td>{{ $building->totalWallArea }}</td> 
                                                            </tr>
                                                        </tbody> 
                                                    </table>
                                                    <table class="shadow-sm border table-bordered border-dark table m-0 bg-white">
                                                        <thead>
                                                            <tr> 
                                                                <td width="33%"><b>Layer Details</b></td>
                                                                <td width="33%"><b>Thickness (mm)</b></td>
                                                                <td width="33%"><b>Breadth (mm)</b></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @isset($build['layer'])
                                                                @foreach ($build['layer'] as $layer)
                                                                    <tr>
                                                                        <td>{{ $layer['layer_name'] }}</td>
                                                                        <td>{{ $layer['thickness'] }}</td>
                                                                        <td>{{ $layer['breath']}} </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endisset
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>  
                                @endisset
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">No data found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @else
                <table class="table custom custom table-hover">
                    <thead>
                        <tr>
                            <th><b>S.No</b></th>
                            <th><b>Date</b></th>
                            <th><b>File Name</b></th>
                            <th><b>File Type</b></th>
                            <th class="text-center" width="150px"><b>Action</b></th>
                        </tr>
                        <tbody>
                            @foreach ($enquiry['building_components'] as $i => $build)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{  SetDateFormat($build->created_at)  }}</td>
                                    <td>{{ $build->file_name }}</td>
                                    <td>{{ $build->file_type }}</td>
                                    <td class="text-center">
                                        <a download="{{ asset("public/uploads/".$build->file_path) }}" href="{{ asset("public/uploads/".$build->file_path) }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                                        <a data-fslightbox="lightbox"  href="{{ asset("public/uploads/".$build->file_path) }}" ><i class="document-modal fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table> 
            @endif
            <x-chat-box 
                :status="$chat_status"
                :moduleId="$enquiry['project_infos']['enquiry_id']" 
                moduleName="enquiry" 
                menuName="{{ __('app.Building_Components') }}" 
            />
        </x-accordion>
        <x-accordion title="Additional Information" path="false" open="false" argument="{{ getModuleMenuMessagesCount('enquiry', $enquiry['project_infos']['enquiry_id'], __('app.Additional_Information'), 'count') }}">
            @if (!is_null($enquiry['additional_infos']))
                <div>{!! $enquiry['additional_infos']->comments !!}</div>
            @endif
            <x-chat-box 
                :status="$chat_status"
                :moduleId="$enquiry['project_infos']['enquiry_id']" 
                moduleName="enquiry" 
                menuName="{{ __('app.Additional_Information') }}" 
            />
        </x-accordion>
    </div>
</div> 