<section>
    <table class="table table-bordered table-centered ">
        <thead>
            <tr>
                <th>Projects</th>
                <th width="80px">Access Status</th>
                <th>Roles</th>
                <th width="80px">Project Admin</th>
                <th><i class="font-22 mdi mdi-chart-line-variant"></i></th>
                <th><i class="font-22 mdi mdi-file-image"></i></th>
                <th><i class="font-22 mdi mdi-electron-framework"></i></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 10; $i ++)
                <tr>
                    <td class="table-user d-flex">
                        <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/344/external-building-interface-kiranshastry-solid-kiranshastry.png" alt="table-user" class="me-2 rounded-circle" />
                        <div>
                            Hospital Construction <br>
                            <small class="text-secondary">AEC Prefab</small>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="checkbox" id="switch30{{ $i +1 }}" {{ rand(1,2) == 1 ? 'checked' : '' }} data-switch="{{ rand(1,2) == 1 ? 'primary' : 'info' }}" />
                            <label for="switch30{{ $i +1 }}" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                        </div>
                    </td>
                    <td width="300px">
                        <span class="badge badge-primary-lighten">Project Engineer</span>
                        <span class="badge badge-info-lighten">Project Leader</span>
                        <span class="badge badge-success-lighten">Cost estimater</span>
                    </td>
                    <td><i class="font-22 {{ rand(1,2) == 1 ? 'text-success mdi mdi-checkbox-marked' : 'text-danger fa fa-times' }} "></i></td>
                    <td><i class="font-22 {{ rand(1,2) == 1 ? 'text-success mdi mdi-checkbox-marked' : 'text-danger fa fa-times' }} "></i></td>
                    <td><i class="font-22 {{ rand(1,2) == 1 ? 'text-success mdi mdi-checkbox-marked' : 'text-danger fa fa-times' }} "></i></td>
                    <td><i class="font-22 {{ rand(1,2) == 1 ? 'text-success mdi mdi-checkbox-marked' : 'text-danger fa fa-times' }}"></i></td> 
                </tr>
            @endfor
        </tbody>
    </table>
</section>