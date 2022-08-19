<table class="table custom m-0 custom table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Type</th>
            <th class="text-center">Su Type</th>
            <th class="text-center">Title </th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="row in review['invoice_plan'].invoice_data">
            <td class="text-center"> @{{ $index + 1 }} </td>
            <td class="text-center">@{{ row.invoice_date | date: 'dd-MM-yyyy' }}</td>
            <td class="text-center">@{{ row.amount }}</td>
            <td class="text-center">@{{ row.percentage }}</td>
        </tr> 
        <tr ng-show="review['invoice_plan'].invoice_data.length == 0">
            <td class="text-center" colspan="4"> No data found </td>
        </tr> 
    </tbody>
</table>