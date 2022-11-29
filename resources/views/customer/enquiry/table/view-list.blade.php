
<table class="table custom table-bordered" id="myTable">
    <thead>
        <tr>
            <th style="width:4%">#</th>
            <th style="width:16%">@lang('customer-enquiry.date')</th>
            <th style="width:30%">@lang('customer-enquiry.file_name')</th>
            <th style="width:12%">@lang('customer-enquiry.file_type')</th> 
            <th style="width:15%">@lang('customer-enquiry.view_status')</th>
            <th >@lang('customer-enquiry.action')</th>
        </tr>
    </thead>
    <tbody class="panel"> 
        <tr ng-repeat="viewList in viewLists">
            <td> @{{ $index + 1}}  @{{ viewList.name }}</td>
                <td >@{{  viewList.pivot.date | date:'dd-MM-yyyy' }}</td>
                <td style="max-width: 200px !important;overflow:hidden">@{{  viewList.pivot.client_file_name }}</td>
                <td class="text-success">@{{  viewList.pivot.file_type }}</td>
            <td><span class="badge btn-sm rounded-pill" ng-class="{'badge-outline-success': viewList.pivot.status == 'Completed', 'badge-outline-info': viewList.pivot.status == 'In progress'}"> @{{  viewList.pivot.status }} </span></td>
            <td class="ext-start"  ng-show="viewList.pivot.file_type != 'link'">
                <a title="Download" download="@{{ viewList.pivot.client_file_name }}" href="{{ asset("public/uploads/") }}/@{{ viewList.pivot.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                <a title="View"  ng-show="fileType.includes(viewList.pivot.file_type)" target="_child" ng-click="getAutodeskView(viewList.pivot.id)"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                <a title="View"  ng-show="!fileType.includes(viewList.pivot.file_type)" href="javascript:void(0)" ng-click="getDocumentView(viewList) "data-url="{{ url('/') }}/get-enquiry-document/@{{ viewList.pivot.id }}"><i class="document-modal fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                <a title="Delete" href="javascript:void(0)" custom-modal="modal" modal-title="Delete" modal-body="Are you sure you want to perform this action" modal-route="{{ route('customers.enquiry-document') }}" modal-enquiry-id="@{{  viewList.pivot.enquiry_id }}"   modal-view-type="@{{  viewList.slug }}"  modal-id="@{{  viewList.pivot.id }}"  modal-method="DELETE">  
                    <i class="feather-trash btn-outline-danger btn btn-sm rounded-pill mr-3"> </i>
                </a> 
            </td> 
            
            <td class="text-start" ng-show="viewList.pivot.file_type == 'link'">
                <a title="View" target="_blank" href="@{{ viewList.pivot.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                <a title="Delete" href="javascript:void(0)" custom-modal="modal" modal-title="Delete" modal-body="Are you sure you want to perform this action" modal-route="{{ route('customers.enquiry-document') }}" modal-enquiry-id="@{{  viewList.pivot.enquiry_id }}"   modal-view-type="@{{  viewList.slug }}"  modal-id="@{{  viewList.pivot.id }}"  modal-method="DELETE" >  
                    <i class="feather-trash btn-outline-danger btn btn-sm rounded-pill mr-3"> </i>
                </a>
            </td> 
        </tr> 
    </tbody>
</table>
@include('customer.enquiry.models.document-modal')