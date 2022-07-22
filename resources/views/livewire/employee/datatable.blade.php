<div> 
   <table class="table custom custom dt-responsive nowrap table-striped">
        <thead>
            <tr>
                <th class="text-center">S.No</th>
                <th class="text-center">Employee ID</th>
                <th class="text-left">Name</th>
                <th class="text-left">Email</th>
                <th class="text-left">Phone No​</th>
                <th class="text-center">Share Point</th>
                <th class="text-center">BIM</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody> 
            @foreach ($employee_data as $index => $employee)
                <tr>
                    <td class="text-center">
                        {{ $index + 1}}
                    </td>
                    <td class="text-center"> 
                        <span   class="badge badge-primary-lighten btn  p-2">{{ $employee->employee_id }}</span>
                    </td>
                    <td class="text-left">{{ $employee->first_Name }}</td>
                    <td class="text-left">{{ $employee->email }}</td>
                    <td class="text-left">{{ $employee->number }}</td>
                    <td class="text-center">
                        <div id="tooltip-container2">
                            <span class="{{ $employee->share_access === 1 ? 'text-success' : 'text-danger' }}"> <i class="fa font-22 fa-{{ $employee->share_access === 1 ? 'check' : 'times' }}-circle"></i></span>
                        </div>
                    </td>
                    <td class="text-center">
                        <div id="tooltip-container2">
                            <span class="{{ $employee->bim_access === 1 ? 'text-success' : 'text-danger' }}"> <i class="fa font-22 fa-{{ $employee->share_access === 1 ? 'check' : 'times' }}-circle"></i></span>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm shadow-sm btn-light border" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="dripicons-dots-3 "></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('edit.employee', $employee->id) }}"><i class="fa fa-edit me-1"></i> View / Edit</a>
                            </div>
                        </div>
                    </td>
                </tr> 
            @endforeach 
        </tbody>
    </table>
    {{ $employee_data->links() }}
</div>
