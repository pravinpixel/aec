<ul class="nav nav-tabs nav-justified nav-bordered mb-3">
    <li class="nav-item">
		<a class="nav-link roleTab ng-pristine ng-untouched ng-valid ng-empty" id="v-pills-role-tab" ng-model="btnClass" href="#!/role" role="tab" aria-controls="v-pills-role" aria-selected="true">
			<i class="mdi mdi-home-variant d-md-none d-block"></i>
			<span class="d-none d-md-block" ng-click="roleGetData()">Roles</span>
		</a>
    </li>
    <li class="nav-item" >
        <a href="#permission"  ng-click="rolePermission()"  data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block" >Permissions</span>
        </a>
    </li>
</ul>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
					<form id="permissionForm"  name="permissionForm" ng-submit="setPermission({{ $lims_role_data->id }})">
						<div class="card-body">
				
							<div class="table custom-responsive">
								<table class="table custom table-bordered permission-table custom">
									<thead>
									<tr> 
										<th colspan="5">
											<div class="row m-0 justify-content-between align-items-center"> 
												<div class="col lead fw-bold">
													{{ ucfirst($lims_role_data->name)}} {{ trans(' Permission') }}
												</div>
												<div class="col-4 p-0">
													<select ng-model="check_permission" ng-change="changePermission(check_permission)"  class="form-select" >
														<option value="">-- select --</option>
														<option value="@{{ row.id }}" ng-repeat="row in check_permission_master">@{{ row.name }}</option>
													</select>
												</div>
											</div>
										</th>
									</tr>
									<tr>
										<th rowspan="2" class="text-center">Module Name</th>
										{{-- <th colspan="4" class="text-center">
											<div class="checkbox">
												<input  class="form-check-input" type="checkbox" id="select_all">
												<label for="select_all">{{trans('Permissions')}}</label>
											</div>
										</th> --}}
									</tr>
									<tr>
										{{-- <th class="text-center"><input  class="form-check-input" ng-model="permissionForm.view_checkbox" type="checkbox" id="view_checkbox">{{trans('permission.view')}} </th>
										<th class="text-center"> <input  class="form-check-input" ng-model="permissionForm.add_checkbox" type="checkbox" id="add_checkbox">{{trans('permission.add')}}</th>
										<th class="text-center"><input  class="form-check-input" ng-model="permissionForm.edit_checkbox" type="checkbox" id="edit_checkbox">{{trans('permission.edit')}} </th>
										<th class="text-center"> <input  class="form-check-input" ng-model="permissionForm.delete_checkbox" type="checkbox" id="delete_checkbox">{{trans('permission.delete')}}</th> --}}

										<th class="text-center">{{trans('permission.view')}} </th>
						<th class="text-center">{{trans('permission.add')}}</th>
						<th class="text-center">{{trans('permission.edit')}} </th>
						<th class="text-center">{{trans('permission.delete')}}</th>
					</tr>
					</thead>
					<tbody>
										<tr>
											<td>Sales</td>
											<td class="text-center">
												<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
													<div class="checkbox">
														@if(in_array("sale_index", $all_permission))
														<input ng-model="permissionForm.sale_index"  type="checkbox" class="form-check-input view_checkbox " value="1" id="sale_index" name="sale_index" checked />
														@else
														<input ng-model="permissionForm.sale_index"  type="checkbox" class="form-check-input view_checkbox" value="1" id="sale_index" name="sale_index" />
														@endif
														<label for="sales-index"></label>
													</div>
												</div>
											</td>
											<td class="text-center">
												<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
													<div class="checkbox">
														@if(in_array("sale_add", $all_permission))
														<input type="checkbox" class="form-check-input sale_add" ng-model="permissionForm.sale_add" value="1" id="sale_add" name="sale_add" checked>
														@else
														<input type="checkbox" class="form-check-input sale_add" ng-model="permissionForm.sale_add"value="1" id="sale_add" name="sale_add">
														@endif
														<label for="sales-add"></label>
													</div>
												</div>
											</td>
											<td class="text-center">
												<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
													<div class="checkbox">
														@if(in_array("sale_edit", $all_permission))
														<input type="checkbox" class="form-check-input sale_edit" ng-model="permissionForm.sale_edit" value="1" id="sale_edit" name="sale_edit" checked />
														@else
														<input type="checkbox" class="form-check-input sale_edit" ng-model="permissionForm.sale_edit" value="1" id="sale_edit" name="sale_edit" />
														@endif
														<label for="sales-edit"></label>
													</div>
												</div>
											</td>
											<td class="text-center">
												<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
													<div class="checkbox">
														@if(in_array("sale_delete", $all_permission))
														<input type="checkbox" class="form-check-input sale_delete"  ng-model="permissionForm.sale_delete"value="1" id="sale_delete" name="sale_delete" checked />
														@else
														<input type="checkbox"  class="form-check-input sale_delete" ng-model="permissionForm.sale_delete" value="1" id="sale_delete" name="sale_delete" />
														@endif
														<label for="sales-delete"></label>
													</div>
												</div>
											</td>
										</tr>
									<tr>
										<td>{{trans('permission.enquiry')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_index", $all_permission))
													<input ng-model="permissionForm.enquiry_index" ng-checked="permissionForm.enquiry_index" type="checkbox" class="form-check-input view_checkbox " value="1" id="enquiry_index" name="enquiry_index" checked />
													@else
													<input ng-model="permissionForm.enquiry_index" ng-checked="permissionForm.enquiry_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="enquiry_index" name="enquiry_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox" ng-checked="permissionForm.enquiry_add" ng-model="permissionForm.enquiry_add" value="1" id="enquiry_add" name="enquiry_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox" ng-checked="permissionForm.enquiry_add"  ng-model="permissionForm.enquiry_add"value="1" id="enquiry_add" name="enquiry_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="permissionForm.enquiry_edit" ng-model="permissionForm.enquiry_edit" value="1" id="enquiry_edit" name="enquiry_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="permissionForm.enquiry_edit" ng-model="permissionForm.enquiry_edit" value="1" id="enquiry_edit" name="enquiry_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="permissionForm.enquiry_delete" ng-model="permissionForm.enquiry_delete"value="1" id="enquiry_delete" name="enquiry_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="permissionForm.enquiry_delete" ng-model="permissionForm.enquiry_delete" value="1" id="enquiry_delete" name="enquiry_delete" />
													@endif
													<label for="enquiry-delete"></label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>{{trans('permission.technical_estimate')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("technical_estimate_index", $all_permission))
													<input ng-model="permissionForm.technical_estimate_index" ng-checked="" type="checkbox" class="form-check-input view_checkbox" value="1" id="technical_estimate_index" name="technical_estimate_index" checked />
													@else
													<input ng-model="permissionForm.technical_estimate_index" ng-checked="" type="checkbox" class="form-check-input view_checkbox" value="1" id="technical_estimate_index" name="technical_estimate_index" />
													@endif
													<label for="eproject_summar_index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("technical_estimate_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox" ng-checked="" ng-model="permissionForm.technical_estimate_add" value="1" id="technical_estimate_add" name="technical_estimate_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox" ng-checked=""  ng-model="permissionForm.technical_estimate_add"value="1" id="technical_estimate_add" name="technical_estimate_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("technical_estimate_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="" ng-model="permissionForm.technical_estimate_edit" value="1" id="technical_estimate_edit" name="technical_estimate_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="" ng-model="permissionForm.technical_estimate_edit" value="1" id="technical_estimate_edit" name="technical_estimate_edit" />
													@endif
													<label for="technical_estimate_edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("technical_estimate_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked=""  ng-model="permissionForm.technical_estimate_delete"value="1" id="technical_estimate_delete" name="technical_estimate_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="" ng-model="permissionForm.technical_estimate_delete" value="1" id="technical_estimate_delete" name="technical_estimate_delete" />
													@endif
													<label for="technical_estimate_delete"></label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>{{trans('permission.cost_estimate')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("cost_estimate_index", $all_permission))
													<input ng-model="permissionForm.cost_estimate_index" type="checkbox" ng-checked="" class="form-check-input view_checkbox " value="1" id="cost_estimate_index" name="cost_estimate_index" checked />
													@else
													<input ng-model="permissionForm.cost_estimate_index" type="checkbox" ng-checked="" class="form-check-input view_checkbox" value="1" id="cost_estimate_index" name="cost_estimate_index" />
													@endif
													<label for="eproject_summar_index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("cost_estimate_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.cost_estimate_add" value="1" id="cost_estimate_add" name="cost_estimate_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"   ng-model="permissionForm.cost_estimate_add"value="1" id="cost_estimate_add" name="cost_estimate_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("cost_estimate_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.cost_estimate_edit" value="1" id="cost_estimate_edit" name="cost_estimate_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.cost_estimate_edit" value="1" id="cost_estimate_edit" name="cost_estimate_edit" />
													@endif
													<label for="cost_estimate_edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("cost_estimate_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox"  ng-model="permissionForm.cost_estimate_delete"value="1" id="cost_estimate_delete" name="cost_estimate_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.cost_estimate_delete" value="1" id="cost_estimate_delete" name="cost_estimate_delete" />
													@endif
													<label for="cost_estimate_delete"></label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>{{trans('permission.contract')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("contract_index", $all_permission))
													<input ng-model="permissionForm.contract_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="contract_index" name="contract_index" checked />
													@else
													<input ng-model="permissionForm.contract_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="contract_index" name="contract_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("contract_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.contract_add" value="1" id="contract_add" name="contract_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.contract_add"value="1" id="contract_add" name="contract_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("contract_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.contract_edit" value="1" id="contract_edit" name="contract_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.contract_edit" value="1" id="contract_edit" name="contract_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("contract_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.contract_delete"value="1" id="contract_delete" name="contract_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.contract_delete" value="1" id="contract_delete" name="contract_delete" />
													@endif
													<label for="enquiry-delete"></label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>{{trans('permission.project')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_index", $all_permission))
													<input ng-model="permissionForm.project_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="project_index" name="project_index" checked />
													@else
													<input ng-model="permissionForm.project_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="project_index" name="project_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox" ng-model="permissionForm.project_add" value="1" id="project_add" name="project_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"   ng-model="permissionForm.project_add"value="1" id="project_add" name="project_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.project_edit" value="1" id="project_edit" name="project_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.project_edit" value="1" id="project_edit" name="project_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.project_delete"value="1" id="project_delete" name="project_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.project_delete" value="1" id="project_delete" name="enquiry_delete" />
													@endif
													<label for="enquiry-delete"></label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>{{trans('permission.project_schedule')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_schedule_index", $all_permission))
													<input ng-model="permissionForm.project_schedule_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="project_schedule_index" name="project_schedule_index" checked />
													@else
													<input ng-model="permissionForm.project_schedule_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="project_schedule_index" name="project_schedule_index" />
													@endif
													<label for="project_schedule-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_schedule_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox" ng-model="permissionForm.project_schedule_add" value="1" id="project_schedule_add" name="project_schedule_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.project_schedule_add"value="1" id="project_schedule_add" name="project_schedule_add">
													@endif
													<label for="project_schedule-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_schedule_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.project_schedule_edit" value="1" id="project_schedule_edit" name="project_schedule_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.project_schedule_edit" value="1" id="project_schedule_edit" name="project_schedule_edit" />
													@endif
													<label for="project_schedule-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_schedule_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.project_schedule_delete"value="1" id="project_schedule_delete" name="project_schedule_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.project_schedule_delete" value="1" id="project_schedule_delete" name="project_schedule_delete" />
													@endif
													<label for="project_schedule-delete"></label>
												</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>{{trans('permission.employee')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("employee_index", $all_permission))
													<input ng-model="permissionForm.employee_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="employee_index" name="employee_index" checked />
													@else
													<input ng-model="permissionForm.employee_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="employee_index" name="employee_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("employee_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.employee_add" value="1" id="employee_add" name="employee_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.employee_add"value="1" id="employee_add" name="employee_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("employee_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.employee_edit" value="1" id="employee_edit" name="employee_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.employee_edit" value="1" id="employee_edit" name="employee_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("employee_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.employee_delete"value="1" id="employee_delete" name="employee_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.employee_delete" value="1" id="employee_delete" name="employee_delete" />
													@endif
													<label for="enquiry-delete"></label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>{{trans('permission.project_summary')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_summary_index", $all_permission))
													<input ng-model="permissionForm.project_summary_index" type="checkbox" ng-checked="view_checkbox" class="form-check-input view_checkbox" value="1" id="project_summary_index" name="project_summary_index" checked />
													@else
													<input ng-model="permissionForm.project_summary_index" type="checkbox" ng-checked="view_checkbox" class="form-check-input view_checkbox" value="1" id="project_summary_index" name="project_summary_index" />
													@endif
													<label for="eproject_summar_index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_summary_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox" ng-model="permissionForm.project_summary_add" value="1" id="project_summary_add" name="project_summary_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.project_summary_add"value="1" id="project_summary_add" name="project_summary_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_summary_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox"  ng-model="permissionForm.project_summary_edit" value="1" id="project_summary_edit" name="project_summary_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox"  ng-checked="edit_checkbox" ng-model="permissionForm.project_summary_edit" value="1" id="project_summary_edit" name="project_summary_edit" />
													@endif
													<label for="project_summary_edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_summary_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.project_summary_delete"value="1" id="project_summary_delete" name="project_summary_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.project_summary_delete" value="1" id="project_summary_delete" name="project_summary_delete" />
													@endif
													<label for="project_summary_delete"></label>
												</div>
											</div>
										</td>
									</tr>	

									<tr>
										<td>{{trans('permission.proposal_sharing')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("proposal_sharing_index", $all_permission))
													<input ng-model="permissionForm.proposal_sharing_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="proposal_sharing_index" name="proposal_sharing_index" checked />
													@else
													<input ng-model="permissionForm.proposal_sharing_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="proposal_sharing_index" name="proposal_sharing_index" />
													@endif
													<label for="eproject_summar_index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("proposal_sharing_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.proposal_sharing_add" value="1" id="proposal_sharing_add" name="proposal_sharing_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"   ng-model="permissionForm.proposal_sharing_add"value="1" id="proposal_sharing_add" name="proposal_sharing_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("proposal_sharing_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.proposal_sharing_edit" value="1" id="proposal_sharing_edit" name="proposal_sharing_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.proposal_sharing_edit" value="1" id="proposal_sharing_edit" name="proposal_sharing_edit" />
													@endif
													<label for="proposal_sharing_edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("proposal_sharing_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.proposal_sharing_delete"value="1" id="proposal_sharing_delete" name="proposal_sharing_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.proposal_sharing_delete" value="1" id="proposal_sharing_delete" name="proposal_sharing_delete" />
													@endif
													<label for="proposal_sharing_delete"></label>
												</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>{{trans('permission.customer_response')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_response_index", $all_permission))
													<input ng-model="permissionForm.customer_response_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="customer_response_index" name="customer_response_index" checked />
													@else
													<input ng-model="permissionForm.customer_response_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="customer_response_index" name="customer_response_index" />
													@endif
													<label for="eproject_summar_index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_response_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox" ng-model="permissionForm.customer_response_add" value="1" id="customer_response_add" name="customer_response_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"   ng-model="permissionForm.customer_response_add"value="1" id="customer_response_add" name="customer_response_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_response_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox"  ng-checked="edit_checkbox" ng-model="permissionForm.customer_response_edit" value="1" id="customer_response_edit" name="customer_response_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox"  ng-checked="edit_checkbox" ng-model="permissionForm.customer_response_edit" value="1" id="customer_response_edit" name="customer_response_edit" />
													@endif
													<label for="customer_response_edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_response_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.customer_response_delete"value="1" id="customer_response_delete" name="customer_response_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.customer_response_delete" value="1" id="customer_response_delete" name="customer_response_delete" />
													@endif
													<label for="customer_response_delete"></label>
												</div>
											</div>
										</td>
									</tr>

									

								
									<tr>
										<td>{{trans('permission.task')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("task_index", $all_permission))
													<input ng-model="permissionForm.task_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="task_index" name="task_index" checked />
													@else
													<input ng-model="permissionForm.task_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="task_index" name="task_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("task_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.task_add" value="1" id="task_add" name="task_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.task_add"value="1" id="task_add" name="task_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("task_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox"  ng-checked="edit_checkbox" ng-model="permissionForm.task_edit" value="1" id="task_edit" name="task_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox"  ng-checked="edit_checkbox" ng-model="permissionForm.task_edit" value="1" id="task_edit" name="task_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("task_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.task_delete"value="1" id="task_delete" name="task_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.task_delete" value="1" id="task_delete" name="task_delete" />
													@endif
													<label for="enquiry-delete"></label>
												</div>
											</div>
										</td>
									</tr>

									

									<tr>
										<td>{{trans('permission.supplier_details')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("supplier_detail_index", $all_permission))
													<input ng-model="permissionForm.supplier_detail_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="supplier_detail_index" name="supplier_detail_index" checked />
													@else
													<input ng-model="permissionForm.supplier_detail_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="supplier_detail_index" name="supplier_detail_index" />
													@endif
													<label for="supplier_detail-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("supplier_detail_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.supplier_detail_add" value="1" id="supplier_detail_add" name="supplier_detail_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.supplier_detail_add"value="1" id="supplier_detail_add" name="supplier_detail_add">
													@endif
													<label for="supplier_detail-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("supplier_detail_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.supplier_detail_edit" value="1" id="supplier_detail_edit" name="supplier_detail_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.supplier_detail_edit" value="1" id="supplier_detail_edit" name="supplier_detail_edit" />
													@endif
													<label for="supplier_detail-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("supplier_detail_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.supplier_detail_delete"value="1" id="supplier_detail_delete" name="supplier_detail_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.supplier_detail_delete" value="1" id="supplier_detail_delete" name="supplier_detail_delete" />
													@endif
													<label for="supplier_detail-delete"></label>
												</div>
											</div>
										</td>
									</tr>

									<tr>
										<td>{{trans('permission.customer_details')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_detail_index", $all_permission))
													<input ng-model="permissionForm.customer_detail_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="customer_detail_index" name="customer_detail_index" checked />
													@else
													<input ng-model="permissionForm.customer_detail_index" type="checkbox" class="form-check-input view_checkbox" value="1" id="customer_detail_index" name="customer_detail_index" />
													@endif
													<label for="customer_detail-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_detail_add", $all_permission))
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.customer_detail_add" value="1" id="customer_detail_add" name="customer_detail_add" checked>
													@else
													<input type="checkbox" class="form-check-input add_checkbox"  ng-model="permissionForm.customer_detail_add"value="1" id="customer_detail_add" name="customer_detail_add">
													@endif
													<label for="customer_detail-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_detail_edit", $all_permission))
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.customer_detail_edit" value="1" id="customer_detail_edit" name="customer_detail_edit" checked />
													@else
													<input type="checkbox" class="form-check-input edit_checkbox" ng-checked="edit_checkbox" ng-model="permissionForm.customer_detail_edit" value="1" id="customer_detail_edit" name="customer_detail_edit" />
													@endif
													<label for="customer_detail-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("customer_detail_delete", $all_permission))
													<input type="checkbox" class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.customer_detail_delete"value="1" id="customer_detail_delete" name="customer_detail_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input delete_checkbox" ng-checked="delete_checkbox" ng-model="permissionForm.customer_detail_delete" value="1" id="customer_detail_delete" name="customer_detail_delete" />
													@endif
													<label for="customer_detail-delete"></label>
												</div>
											</div>
										</td>
									</tr>

									

									</tbody>
								</table>
							</div>
							<div class="form-group text-end">
								<input type="submit" value="{{trans('permission.update')}}" class="btn bg-primary-2 btn-sm btn-info">
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</section>
