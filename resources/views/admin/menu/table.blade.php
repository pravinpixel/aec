<table id="scroll-vertical-datatable" class="table dt-responsive nowrap">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Enquiry No</th>
            <th>Contact Person</th>
            <th>Enquiry Date</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @for ($i = 0; $i < 35;  $i++)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>ENQ0{{ $i+1 }}</td>
                <td>Nishanth_{{ $i+1 }}</td>
                <td>10-12-2022</td>
                <td>abcd@gmail.com</td>
                <td>73328254164</td>
                <td>
                    <div class="dropdown">
                        <button type="button"  class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="dripicons-dots-3 "></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            <a class="dropdown-item" href="#">Send Mail</a>
                        </div>
                    </div>
                </td>
            </tr> 
            
        @endfor
    </tbody>
</table>