
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
                <a target="_child" href="{{ asset("public/uploads/") }}/@{{ viewList.pivot.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
            </td> 
            
            <td class="text-center"  ng-show="viewList.pivot.file_type == 'link'">
                <a class="" target="_blank" href="@{{ viewList.pivot.file_name }}"><i class="fa fa-eye btn-sm rounded-pill btn btn-outline-info"></i></a>
            </td> 
        </tr> 
    </tbody>
</table>
