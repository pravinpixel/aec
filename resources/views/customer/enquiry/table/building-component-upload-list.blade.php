
<table class="table custom table-bordered" id="myTable">
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('customer-enquiry.date')</th>
            <th>@lang('customer-enquiry.file_name')</th>
            <th>@lang('customer-enquiry.file_type')</th> 
            <th>@lang('customer-enquiry.action')</th>
        </tr>
    </thead>
    <tbody class="panel"> 
        <tr ng-repeat="buildingComponentUpload in buildingComponentUploads">
            <td>@{{ $index + 1}} </td>
            <td>@{{ buildingComponentUpload.created_at }}</td>
            <td>@{{ buildingComponentUpload.file_name }}</td>
            <td>@{{ buildingComponentUpload.file_type }}</td>
            <td class="text-center">
                <a download="{{ asset("public/uploads/") }}/@{{ buildingComponentUpload.file_path }}" href="{{ asset("public/uploads/") }}/@{{ buildingComponentUpload.file_path }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                {{-- <a target="_child" href="{{ asset("public/uploads/") }}/@{{ buildingComponentUpload.file_path }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a> --}}
                <a href="javascript:void(0)" ng-click="getDocumentView(buildingComponentUpload) "data-url="{{ url('/') }}/get-enquiry-document/@{{ buildingComponentUpload.id }}"><i class="document-modal fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                <a href="" custom-modal="modal" modal-title="Delete" modal-body="Are you sure to perform this action" modal-route="{{ route('customers.enquiry-building-component-document') }}" modal-enquiry-id="@{{  buildingComponentUpload.enquiry_id }}"   modal-view-type=false  modal-id="@{{  buildingComponentUpload.id }}"  modal-method="DELETE" >  
                    <i class="feather-trash btn-outline-danger btn btn-sm rounded-pill mr-3"> </i>
                </a> 
            </td> 
        </tr>
    </tbody>
</table>
@include('customer.enquiry.models.document-modal')