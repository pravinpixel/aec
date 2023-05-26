<div>
    @if ($table_status == 1)
        <div class="card-header sticky-top px-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title h4">PROJECT NAME : <span class="text-primary">{{ $project['project_name'] }}</span></h3>
            <button type="button" class="btn-sm btn btn-light border shadow-sm" data-bs-dismiss="modal"
                aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
    @endif
    <div class="card-body px-3 pt-3">
        @if ($table_status == 1)
            <table class="custom table table-bordered m-0 bg-white border shadow-sm mb-3">
                <tbody>
                    <tr>
                        <th>Project Id</th>
                        <th>Project Name</th>
                        <th>Company Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Site Address</th>
                    </tr>
                    <tr>
                        <td>{{ $project['reference_number'] }}</td>
                        <td>{{ $project['project_name'] }}</td>
                        <td>{{ $project['company_name'] }}</td>
                        <td>{{ $project['mobile_number'] }}</td>
                        <td>{{ $project['email'] }}</td>
                        <td>{{ $project['site_address'] }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
        <x-accordion title="Project Infomation" path="false" open="true"
            argument="{{ getModuleMenuMessagesCount('project', $project['id'], __('app.Project_Information'), 'count') }}">
            <div class="row m-0 ">
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Project ID</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['reference_number'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Project Name</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['project_name'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Telephone</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['mobile_number'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Contact Person</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['contact_person'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Company</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['company_name'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Email</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['email'] }} </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Site Address</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['site_address'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Country</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['country'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Zipcode</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['zipcode'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">City</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['city'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">State</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['state'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">No of Buildings</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['no_of_building'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Type of Project</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['project_type'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Delivery Date</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['delivery_date'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Start Date</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['start_date'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 align-items-center">
                        <div class="col-3  p-0">
                            <label class="col-form-label">Type of Delivery</label>
                        </div>
                        <div class="col pe-0">
                            <div class="form-control form-control-sm  border-0 ">{{ $project['delivery_type'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </x-accordion>
        <x-accordion title="Connect Platform" path="false" open="false" argument='null'>
            {{-- <div class="card-body">
                <div class="row m-0 justify-content-center align-items-center">
                    <div class="col-12 row m-0">
                        <div class="col border p-1 px-2 m-1 shadow rounded-pill border-primary">
                            <div class="row m-0 align-items-center">
                                <div class="col-md d-flex align-items-center">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSS3pxBW14LCWAvNVLwZOt8WD6fTVf0q2qi_29x4rX1xqeV-VIZbkVDGndQcK59_VW9tH4&usqp=CAU" width="30px" class="me-3">
                                    <b>Share Point</b>
                                </div>
                                <div class="col-4 text-end">
                                    <input type="checkbox" id="switch0" disabled data-switch="none"/>
                                    <label for="switch0" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </div>
                        </div> 
                        <div class="col border p-1 px-2 m-1 shadow rounded-pill border-primary">
                            <div class="row m-0 align-items-center">
                                <div class="col-md d-flex align-items-center">
                                    <img src="https://www.autodesk.com/bim-360/app/themes/bim360/assets/img/favicons/favicon.ico" width="30px" class="me-3">
                                    <b>BIM 360</b>
                                </div>
                                <div class="col-4 text-end">
                                    <input type="checkbox" id="switch1" disabled data-switch="none"/>
                                    <label for="switch1" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </div>
                        </div>
                        <div class="col border p-1 px-2 m-1 shadow rounded-pill border-primary">
                            <div class="row m-0 align-items-center">
                                <div class="col-md d-flex align-items-center">
                                    <img src="https://i.ytimg.com/an/zRM0HdaPD4zy71zHDYeB2w/featured_channel.jpg?v=5cad0ca7" width="30px" class="me-3">
                                    <b>24 /7 Office</b>
                                </div>
                                <div class="col-4 text-end">
                                    <input type="checkbox" id="switch2" disabled data-switch="none"/>
                                    <label for="switch2" class="border" data-on-label="" data-off-label=""></label>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>   --}}
            <div class="mb-3 shadow-sm">
                <div class="bg-light py-1 px-2">
                    <b>Share Point Folders</b>
                </div>
                <div class="card-body">
                    @if (count($project['sharepoint']['folders']) > 0)
                        <ul class="list-group py-1 px-2">
                            @foreach ($project['sharepoint']['folders'] as $folder)
                                <li class="list-group-item"><i
                                        class="mdi mdi-folder-open me-1"></i>{{ $folder['name'] }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="mb-3 shadow-sm">
                <div class="bg-light py-1 px-2">
                    <b>BIM 360</b>
                </div>
                <div class="card-body">
                    <div class="col-md-12 col-md-12 px-2 border-bottom">
                        <div class="row m-0 align-items-center shadow">
                            <div class="col-4 p-0">
                                <label class="col-form-label fw-bold">Should the project be linked to a customer ?
                                </label>
                            </div>
                            <div class="col pe-0">
                                <i class="fa fa-check-circle text-primary me-1"></i>
                                {{ $project['linked_to_customer'] == 0 ? 'No' : 'Yes' }}
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 ">
                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label">BIM 360 Language</label>
                                </div>
                                <div class="col pe-0">
                                    <div class="col pe-0">
                                        <select name="language" ng-model="project.language" id="language"
                                            class="form-control form-select-sm  border-0" style="pointer-events:none">
                                            <option value=""> @lang('project.select') </option>
                                            @foreach (config('project.languages') as $key => $value)
                                                <option value="{{ $key }}"> {{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label">Project Time Zone</label>
                                </div>
                                <div class="col pe-0">
                                    <select name="time_zone" ng-model="project.time_zone" id="time_zone"
                                        class="form-control form-select-sm border-0" style="pointer-events:none">
                                        <option value=""> @lang('project.select') </option>
                                        @foreach (config('project.time_zones') as $key => $value)
                                            <option value="{{ $key }}"> {{ $value }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label">Address Line 1</label>
                                </div>
                                <div class="col pe-0">
                                    <div class="form-control form-control-sm  border-0 ">{{ $project['address_one'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label">Address Line 2</label>
                                </div>
                                <div class="col pe-0">
                                    <div class="form-control form-control-sm  border-0 ">{{ $project['address_two'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow-sm">
                <div class="bg-light py-1 px-2">
                    <b>Share Point Folders</b>
                </div>
                <div class="card-body">
                    <div class="row m-0 ">
                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label">Project ID</label>
                                </div>
                                <div class="col pe-0">
                                    <div class="form-control form-control-sm  border-0 ">
                                        {{ $project['reference_number'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label">Project Name</label>
                                </div>
                                <div class="col pe-0">
                                    <div class="form-control form-control-sm  border-0 ">
                                        {{ $project['project_name'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label">Project Start Date</label>
                                </div>
                                <div class="col pe-0">
                                    <div class="form-control form-control-sm  border-0 ">{{ $project['start_date'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row m-0 align-items-center">
                                <div class="col-3  p-0">
                                    <label class="col-form-label"> Project End Date </label>
                                </div>
                                <div class="col pe-0">
                                    <div class="form-control form-control-sm  border-0 ">
                                        {{ $project['delivery_date'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-accordion>
        @if (count($project['team_setup']) > 0)
            <x-accordion title="Team Setup" path="false" open="false" argument='null'>
                <ul>
                    @foreach ($project['team_setup'] as $member)
                        <li>
                            <strong>{{ $member->role->name }}</strong>
                            <div class="row m-0">
                                @if (count($member->team) > 0)
                                    <div class="col-md-4 list-group-item border-0 ">
                                        @foreach ($member->team as $teamer)
                                            <i class="fa fa-check-circle text-primary me-1"></i>
                                            {{ $teamer }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </x-accordion>
        @endif
        @if ($project['invoice_plan']['project_cost'])
            <x-accordion title="Invoice Plan" path="false" open="false" argument='null'>
                <div class="row my-2 mx-3 align-items-center">
                    <div class="col-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-6  p-0">
                                <label class="col-form-label">Project Cost</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0  ng-binding">
                                    {{ $project['invoice_plan']['project_cost'] }}</div>
                            </div>
                        </div>
                        <div class="row m-0 align-items-center">
                            <div class="col-6  p-0">
                                <label class="col-form-label">Project Start Date</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0  ng-binding">
                                    {{ $project['start_date'] }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row m-0 align-items-center">
                            <div class="col-6  p-0">
                                <label class="col-form-label">No.of Invoices</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0">
                                    {{ $project['invoice_plan']['no_of_invoice'] }}</div>
                            </div>
                        </div>
                        <div class="row m-0 align-items-center">
                            <div class="col-6  p-0">
                                <label class="col-form-label">Project End Date</label>
                            </div>
                            <div class="col pe-0">
                                <div class="form-control form-control-sm  border-0  ng-binding">
                                    {{ $project['delivery_date'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table custom m-0 custom table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Invoice Date</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Percentage %</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($project['invoice_plan']['invoice_data'] ?? []) > 0)
                        @if (count($project['invoice_plan']['invoice_data']->invoices))
                        @foreach ($project['invoice_plan']['invoice_data']->invoices as $key => $invoice)
                            <tr>
                                <td class="text-center">{{ $key + 1 }} </td>
                                <td class="text-center">{{ $invoice->invoice_date }}</td>
                                <td class="text-center">{{ $invoice->amount }}</td>
                                <td class="text-center">{{ $invoice->percentage }}</td>
                            </tr>
                        @endforeach
                            
                        @endif
                        @else
                            <tr>
                                <td class="text-center" colspan="4"> No data found </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </x-accordion>
        @endif
        @if ($project['gantt_chart_data'])
            <x-accordion title="To Do List" path="false" open="false" argument='null'>
                <div>
                    @php $to_do_list = json_decode($project['gantt_chart_data']) @endphp
                    @if (count($to_do_list) > 0)
                        @foreach ($to_do_list as $index => $to_do)
                            <div class="custom-accordion card border shadow-sm rounded">
                                <div class="card-header collapsed" id="custom-accordion-head-{{ $index }}"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#custom-accordion-collapse-{{ $index }}">
                                    <div class="card-title">{{ $to_do->name }}</div>
                                    <i class="accordion-icon"></i>
                                </div>
                                <div class="card-body collapse" id="custom-accordion-collapse-{{ $index }}">
                                    <div class="card-content">
                                        <table class="m-0 table custom">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">S.No</th>
                                                    <th class="text-center">Deliverable Name</th>
                                                    <th class="text-center">Assign To</th>
                                                    <th class="text-center">Start Date</th>
                                                    <th class="text-center">End Date</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="text-center"><span
                                                            class="bg-warning fw-bold rounded px-1">{{ $to_do->project_start_date }}</span>
                                                    </td>
                                                    <td class="text-center"><span
                                                            class="bg-warning fw-bold rounded px-1">{{ $to_do->project_end_date }}</span>
                                                    </td>
                                                </tr>
                                            </thead>
                                            @if (count(collect($to_do->data)) > 0)
                                                @foreach (collect($to_do->data) as $index => $list)
                                                    <tbody class="border">
                                                        <tr ng-show="checkListData.text != 'others'" class="bg-light">
                                                            <td colspan="5">
                                                                <div class="text-start">
                                                                    <strong>{{ $list->name }}</strong>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @foreach ($list->data as $index => $item)
                                                            <tr>
                                                                <td class="text-center">{{ $index + 1 }}</td>
                                                                <td>{{ $item->task_list }}</td>
                                                                <td class="text-center text-capitalize">
                                                                    @foreach (getManagers() as $manager)
                                                                        @if ($manager['id'] === $item->assign_to)
                                                                            {{ $manager['display_name'] }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td class="text-center">{{ $item->start_date }}</td>
                                                                <td class="text-center">{{ $item->end_date }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </x-accordion>
        @endif
    </div>
</div>
