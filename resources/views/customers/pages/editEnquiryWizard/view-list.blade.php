
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
            <td><span class="badge badge-outline-success rounded-pill"> @{{  viewList.pivot.status }} </span></td>
            <td>
                <i class="feather-eye btn-success btn mr-3"></i>
                <a href="#" custom-modal="modal" modal-title="Delete" modal-body="Are you sure to perform this action" modal-route="{{ route('customers.enquiry-document') }}" modal-enquiry-id="@{{  viewList.pivot.enquiry_id }}"   modal-view-type="@{{  viewList.slug }}"  modal-id="@{{  viewList.pivot.id }}"  modal-method="DELETE" >  
                    <i class="feather-trash btn-danger btn  mr-3"> </i>
                </a> 

            </td> 
        </tr> 
    </tbody>
</table>
