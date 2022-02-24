<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{trans('permission.role_permission')}}</h4>
                    </div>
                    {!! Form::open() !!}
                    <div class="card-body">
                    	<input type="hidden" name="role_id" value="{{$lims_role_data->id}}" />
						<div class="table-responsive">
						    <table class="table table-bordered permission-table">
						        <thead>
						        <tr>
						            <th colspan="5" class="text-center">{{$lims_role_data->name}} {{trans(' Permission')}}</th>
						        </tr>
						        <tr>
						            <th rowspan="2" class="text-center">Module Name</th>
						            <th colspan="4" class="text-center">
						            	<div class="checkbox">
						            		<input type="checkbox" id="select_all">
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
								                @if(in_array("enquiry-index", $all_permission))
								                <input type="checkbox" value="1" id="products-index" name="products-index" checked />
								                @else
								                <input type="checkbox" value="1" id="products-index" name="products-index" />
								                @endif
								                <label for="enquiry-index"></label>
							            	</div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("enquiry-add", $all_permission))
								               	<input type="checkbox" value="1" id="enquiry-add" name="enquiry-add" checked>
								                @else
								                <input type="checkbox" value="1" id="enquiry-add" name="enquiry-add">
								                @endif
								                <label for="enquiry-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("enquiry-edit", $all_permission))
								                <input type="checkbox" value="1" id="enquiry-edit" name="enquiry-edit" checked />
								                @else
								                <input type="checkbox" value="1" id="enquiry-edit" name="enquiry-edit" />
								                @endif
								                <label for="enquiry-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("enquiry-delete", $all_permission))
								                <input type="checkbox" value="1" id="enquiry-delete" name="enquiry-delete" checked />
								                @else
								                <input type="checkbox" value="1" id="enquiry-delete" name="enquiry-delete" />
								                @endif
								                <label for="enquiry-delete"></label>
							                </div>
							            </div>
						            </td>
						        </tr>
				        <div class="form-group">
	                        <input type="submit" value="{{trans('permission.submit')}}" class="btn btn-primary">
	                    </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>