
<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('customer-enquiry.date')</th>
            <th>@lang('customer-enquiry.file_name')</th>
            <th>@lang('customer-enquiry.file_type')</th>
            <th>@lang('customer-enquiry.comments')</th>
            <th>@lang('customer-enquiry.status')</th>
            <th>@lang('customer-enquiry.action')</th>
        </tr>
    </thead>
    <tbody class="panel"> 
        <tr ng-repeat="viewList in viewLists">
            <td> @{{ $index + 1}}  @{{ viewList.name }}</td>
                <td>@{{  viewList.pivot.created_at }}</td>
                <td>@{{  viewList.pivot.client_file_name }}</td>
                <td class="text-success">@{{  viewList.pivot.file_type }}</td>
                <td class="text-info">
                <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                </td>
            <td><span class="badge badge-outline-success rounded-pill"> @{{  viewList.pivot.status }} </span></td>
            <td>
                <i class="feather-eye btn-success btn mr-3"></i>
                <i class="feather-trash btn-danger btn  mr-3"></i>
            </td> 
        </tr> 
    </tbody>
</table>
