
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('customer-enquiry.date')</th>
            <th>@lang('customer-enquiry.file_name')</th>
            <th>@lang('customer-enquiry.file_type')</th> 
            <th>@lang('customer-enquiry.status')</th>
            <th>@lang('customer-enquiry.action')</th>
        </tr>
    </thead>
    <tbody class="panel"> 
        <tr ng-repeat="viewList in viewLists">
            <td> @{{ $index + 1}}  @{{ viewList.name }}</td>
                <td>@{{  viewList.pivot.date }}</td>
                <td>@{{  viewList.pivot.client_file_name }}</td>
                <td class="text-success">@{{  viewList.pivot.file_type }}</td>
            <td><span class="badge btn-sm badge-outline-success rounded-pill"> @{{  viewList.pivot.status }} </span></td>
            <td class="text-center"  ng-show="viewList.pivot.file_type != 'link'">
                <a download="{{ asset("public/uploads/") }}/@{{ viewList.pivot.file_name }}" href="{{ asset("public/uploads/") }}/@{{ viewList.pivot.file_name }}"><i class="fa fa-download btn-sm rounded-pill btn btn-outline-primary"></i></a>
                <a  ng-show="viewList.pivot.file_type == 'ifc'" target="_child" href="{{ url('/') }}/viewmodel/@{{ viewList.pivot.id }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                <a  ng-show="viewList.pivot.file_type != 'ifc'" target="_child" href="{{ asset("public/uploads/") }}/@{{ viewList.pivot.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                <a href="" custom-modal="modal" modal-title="Delete" modal-body="Are you sure to perform this action" modal-route="{{ route('customers.enquiry-document') }}" modal-enquiry-id="@{{  viewList.pivot.enquiry_id }}"   modal-view-type="@{{  viewList.slug }}"  modal-id="@{{  viewList.pivot.id }}"  modal-method="DELETE" >  
                    <i class="feather-trash btn-outline-danger btn btn-sm rounded-pill mr-3"> </i>
                </a> 
            </td> 
            
            <td class="text-center"  ng-show="viewList.pivot.file_type == 'link'">
                <a class="" target="_blank" href="@{{ viewList.pivot.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
                <a href="" custom-modal="modal" modal-title="Delete" modal-body="Are you sure to perform this action" modal-route="{{ route('customers.enquiry-document') }}" modal-enquiry-id="@{{  viewList.pivot.enquiry_id }}"   modal-view-type="@{{  viewList.slug }}"  modal-id="@{{  viewList.pivot.id }}"  modal-method="DELETE" >  
                    <i class="feather-trash btn-outline-danger btn btn-sm rounded-pill mr-3"> </i>
                </a> 
            </td> 
        </tr> 
    </tbody>
</table>
