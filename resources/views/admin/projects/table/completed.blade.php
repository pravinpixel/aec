
<table class="table custom dt-responsive nowrap  w-100">
    <thead>
        <tr>
            <th class="text-center">@lang('project.s_no')</th> 
            <th class="text-center">@lang('project.project_id')</th> 
            <th class="text-center">@lang('project.project_number')</th> 
            <th class="text-center">@lang('project.contact_person')</th> 
            <th class="text-center">@lang('project.start_date')</th> 
            <th class="text-center">@lang('project.delivery_date')</th>
            <th class="text-center">@lang('project.pipeline')</th>
            <th class="text-center">@lang('project.action')</th>
        </tr>
    </thead>
    <tbody> 
        @for ($i=0; $i < 4; $i++)
            <tr class="ng-scope odd">
                <td>{{ $i+1 }}</td>
                <td class="text-center">
                    <button type="button" class="badge badge-primary-lighten text-primary btn p-2 position-relative border-primary" ng-click="toggle(&quot;edit&quot;,2)">
                        <b>ENQ-PRO00{{ $i+1 }}</b>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                    </button>
                </td>
                <td>New Project Name</td>
                <td>MR. Alex Raj</td>
                <td>18-05-2022</td>
                <td>14-03-2023</td>
                <td class="text-center">
                    <div class="btn-group">
                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Project Initiation"></button> 
                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Technical Estimation"></button> 
                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cost Estiringmation"></button> 
                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Proposal Sharing"></button> 
                        <button class="btn progress-btn active" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Customer Response"></button>
                    </div>
                </td>
                <td class="text-center">
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm border shadow-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" title="View / Edit">View / Edit</a>
                            <a class="dropdown-item" href="#" title="Delete">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endfor 
    </tbody>
</table>
