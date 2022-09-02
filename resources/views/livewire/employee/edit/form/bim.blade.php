<section>
    <table class="table table-bordered table-centered ">
        <thead>
            <tr>
                <th>Projects</th>
                <th  class="text-center" width="80px">Access Status</th>
                <th>Roles</th>
                <th  class="text-center" width="80px">Project Admin</th>
                <th><i class="font-22 mdi mdi-chart-line-variant"></i></th>
                <th><i class="font-22 mdi mdi-file-image"></i></th>
                <th><i class="font-22 mdi mdi-electron-framework"></i></th>
            </tr>
        </thead>
        <tbody>
           @if(count($projects) < 0)
                @foreach($projects as $i =>  $project)
                    <tr>
                        <td class="table-user d-flex">
                            <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/344/external-building-interface-kiranshastry-solid-kiranshastry.png" alt="table-user" class="me-2 rounded-circle" />
                            <div>
                                {{ $project->project_type_name }} <br>
                                <small class="text-secondary"> {{ $project->project_name  }}</small>
                            </div>
                        </td>
                        <td>
                            <div>
                                <input name="access_status" wire:click="updateAccessStatus({{ $project->id }})" type="checkbox" id="switch30{{ $i +1 }}" {{ $project->access_status == 1 ? 'checked' : '' }} data-switch="{{ $project->access_status == 1 ? 'primary' : 'info' }}" />
                                <label for="switch30{{ $i +1 }}" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                            </div>
                        </td>
                        <td width="300px">
                            <span class="badge badge-primary-lighten">{{ $project->role_name  }}</span>
                        </td>
                        <td>
                            <input name="is_project_admin" wire:change="updateServices('is_project_admin',{{ $project->id }})" type="checkbox"  {{ $project->is_project_admin == 1 ? 'checked' : '' }}  {{ $project->access_status == 0 ? 'disabled' : '' }} />
                        </td>
                        <td>
                            <input name="document_management" wire:change="updateServices('document_management',{{ $project->id }})" type="checkbox"  {{ $project->document_management == 1 ? 'checked' : '' }}  {{ $project->access_status == 0 ? 'disabled' : '' }} />
                        </td>
                        <td>
                            <input name="insight" wire:change="updateServices('insight',{{ $project->id }})" type="checkbox"  {{ $project->insight == 1 ? 'checked' : '' }} {{ $project->access_status == 0 ? 'disabled' : '' }} />
                        </td>
                        <td>
                            <input name="design_collaboration" wire:change="updateServices('design_collaboration',{{ $project->id }})" type="checkbox"  {{ $project->design_collaboration == 1 ? 'checked' : '' }}  {{ $project->access_status == 0 ? 'disabled' : '' }} />
                        </td> 
                    </tr>
                @endforeach
            @else
            @for ($i = 0; $i < 1; $i ++)
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
                        <span class="badge badge-success-lighten">Project Engineer</span>
                    </td>
                    <td class="text-center"> <input class="form-check-input" type="checkbox" {{ rand(1,2) == 1 ? 'checked' : ''}} /></td>
                    <td class="text-center"> <input class="form-check-input" type="checkbox" {{ rand(1,2) == 1 ? 'checked' : ''}} /></td>
                    <td class="text-center"> <input class="form-check-input" type="checkbox" {{ rand(1,2) == 1 ? 'checked' : ''}} /></td>
                    <td class="text-center"> <input class="form-check-input" type="checkbox" {{ rand(1,2) == 1 ? 'checked' : ''}} /></td> 
                </tr>
            @endfor
            @endif
        </tbody>
    </table>
</section>