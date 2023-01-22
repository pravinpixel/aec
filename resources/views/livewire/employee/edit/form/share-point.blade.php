<section>
    <!-- <div class="text-center py-3">
        <div class="btn-group p-2 px-3 col-4  border border-primary rounded-pill border shadow mx-auto align-items-center">
            <span class="me-1">Share Point Access</span>
            <div class="ms-auto">
                <input type="checkbox" id="share_point_status" wire:model="share_point_status" value="1" data-switch="success"/>
                <label for="share_point_status" data-on-label="On"  data-off-label="Off"></label>
            </div>
        </div>
    </div> -->
    <div class="col-lg-8 mx-auto">
        @if (!is_null($sharePointAccess))
            <table  class="custom table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">Folder Name</th>
                        <th class="text-center">Active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sharePointAccess as $file_index => $row)
                        <tr>
                            <td class="text-center">{{ $file_index + 1  }}</td>
                            <td class="text-left">{{ $row->name }}</td>
                            <td class="text-center">
                                <div>
                                    <input type="checkbox" value="{{ $row->id }}" id="switch__{{$file_index}}" {{ in_array($row->id, $activeFolder) ? 'checked' : '' }}  wire:click="updateFolderAccess({{ $row->id }}, {{$row->employeeSharepointMasterFolder}})" data-switch="success"/>
                                    <label for="switch__{{$file_index}}" data-on-label="On"  data-off-label="Off"></label>
                                </div>         
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        @endif 
    </div>
</section>