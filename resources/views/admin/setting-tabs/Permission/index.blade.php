<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{trans('permission.role_permission')}}</h4>
                    </div>
                    <form id="permissionForm"  name="permissionForm" ng-submit="setPermission({{ $lims_role_data->id }})">
						<div class="card-body">
					
							<div class="table-responsive">
								<table class="table table-bordered permission-table custom">
									<thead>
									<tr>
										<th colspan="5" class="text-center">{{ ucfirst($lims_role_data->name)}} {{ trans(' Permission') }}</th>
									</tr>
									<tr>
										<th rowspan="2" class="text-center">Module Name</th>
										<th colspan="4" class="text-center">
											<div class="checkbox">
												<input  class="form-check-input" type="checkbox" id="select_all">
												<label for="select_all">{{trans('Permissions')}}</label>
											</div>
										</th>
									</tr>
									<tr>
										<th class="text-center">{{trans('permission.view')}}</th>
										<th class="text-center">{{trans('permission.add')}}</th>
										<th class="text-center">{{trans('permission.edit')}}</th>
										<th class="text-center">{{trans('permission.delete')}}</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>{{trans('permission.enquiry')}}</td>
										<td class="text-center">
											<div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_index", $all_permission))
													<input ng-model="permissionForm.enquiry_index" type="checkbox" class="form-check-input" value="1" id="enquiry_index" name="enquiry_index" checked />
													@else
													<input ng-model="permissionForm.enquiry_index" type="checkbox" class="form-check-input" value="1" id="enquiry_index" name="enquiry_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_add", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.enquiry_add" value="1" id="enquiry_add" name="enquiry_add" checked>
													@else
													<input type="checkbox" class="form-check-input"  ng-model="permissionForm.enquiry_add"value="1" id="enquiry_add" name="enquiry_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_edit", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.enquiry_edit" value="1" id="enquiry_edit" name="enquiry_edit" checked />
													@else
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.enquiry_edit" value="1" id="enquiry_edit" name="enquiry_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("enquiry_delete", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.enquiry_delete"value="1" id="enquiry_delete" name="enquiry_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input" ng-model="permissionForm.enquiry_delete" value="1" id="enquiry_delete" name="enquiry_delete" />
													@endif
													<label for="enquiry-delete"></label>
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
													<input ng-model="permissionForm.employee_index" type="checkbox" class="form-check-input" value="1" id="employee_index" name="employee_index" checked />
													@else
													<input ng-model="permissionForm.employee_index" type="checkbox" class="form-check-input" value="1" id="employee_index" name="employee_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("employee_add", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.employee_add" value="1" id="employee_add" name="employee_add" checked>
													@else
													<input type="checkbox" class="form-check-input"  ng-model="permissionForm.employee_add"value="1" id="employee_add" name="employee_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("employee_edit", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.employee_edit" value="1" id="employee_edit" name="employee_edit" checked />
													@else
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.employee_edit" value="1" id="employee_edit" name="employee_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("employee_delete", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.employee_delete"value="1" id="employee_delete" name="employee_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input" ng-model="permissionForm.employee_delete" value="1" id="employee_delete" name="employee_delete" />
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
													<input ng-model="permissionForm.project_index" type="checkbox" class="form-check-input" value="1" id="project_index" name="project_index" checked />
													@else
													<input ng-model="permissionForm.project_index" type="checkbox" class="form-check-input" value="1" id="project_index" name="project_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_add", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.project_add" value="1" id="project_add" name="project_add" checked>
													@else
													<input type="checkbox" class="form-check-input"  ng-model="permissionForm.project_add"value="1" id="project_add" name="project_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_edit", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.project_edit" value="1" id="project_edit" name="project_edit" checked />
													@else
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.project_edit" value="1" id="project_edit" name="project_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("project_delete", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.project_delete"value="1" id="project_delete" name="project_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input" ng-model="permissionForm.project_delete" value="1" id="project_delete" name="enquiry_delete" />
													@endif
													<label for="enquiry-delete"></label>
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
													<input ng-model="permissionForm.task_index" type="checkbox" class="form-check-input" value="1" id="task_index" name="task_index" checked />
													@else
													<input ng-model="permissionForm.task_index" type="checkbox" class="form-check-input" value="1" id="task_index" name="task_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("task_add", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.task_add" value="1" id="task_add" name="task_add" checked>
													@else
													<input type="checkbox" class="form-check-input"  ng-model="permissionForm.task_add"value="1" id="task_add" name="task_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("task_edit", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.task_edit" value="1" id="task_edit" name="task_edit" checked />
													@else
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.task_edit" value="1" id="task_edit" name="task_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("task_delete", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.task_delete"value="1" id="task_delete" name="task_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input" ng-model="permissionForm.task_delete" value="1" id="task_delete" name="task_delete" />
													@endif
													<label for="enquiry-delete"></label>
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
													<input ng-model="permissionForm.contract_index" type="checkbox" class="form-check-input" value="1" id="contract_index" name="contract_index" checked />
													@else
													<input ng-model="permissionForm.contract_index" type="checkbox" class="form-check-input" value="1" id="contract_index" name="contract_index" />
													@endif
													<label for="enquiry-index"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("contract_add", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.contract_add" value="1" id="contract_add" name="contract_add" checked>
													@else
													<input type="checkbox" class="form-check-input"  ng-model="permissionForm.contract_add"value="1" id="contract_add" name="contract_add">
													@endif
													<label for="enquiry-add"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("contract_edit", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.contract_edit" value="1" id="contract_edit" name="contract_edit" checked />
													@else
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.contract_edit" value="1" id="contract_edit" name="contract_edit" />
													@endif
													<label for="enquiry-edit"></label>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
												<div class="checkbox">
													@if(in_array("contract_delete", $all_permission))
													<input type="checkbox" class="form-check-input" ng-model="permissionForm.contract_delete"value="1" id="contract_delete" name="contract_delete" checked />
													@else
													<input type="checkbox"  class="form-check-input" ng-model="permissionForm.contract_delete" value="1" id="contract_delete" name="contract_delete" />
													@endif
													<label for="enquiry-delete"></label>
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