
					   <div class="row">
						   <div class="col-lg-12">
							   <div class="card shadow-sm">
								   <div class="card-header bg-light">
								   <h4 class="header-title text-uppercase mt-2"><strong>Enquiries Summary​</strong></h4>
									   <div >
										   <form class="d-flex p-2 justify-content-between">
											   <div>
												   <small>Date / Month</small>
												   <!-- <input type="date" name="" id="" class="form-control" ng-model=""> -->
                                                   <datepicker date-format="dd-MM-yyyy" id="checkId"
                                                    date-set="enquiry_summary.from_date"
                                                    style="width:75% !important">
                                                    <input type="text" style="border:none !important;padding:6px!important;padding-left:5px!important"
                                                        id="decWid"
                                                        ng-change="checkDate(enquiry_summary.from_date)" class="form-control form-control-sm"
                                                        id="project_date" name="start_date" ng-model="enquiry_summary.from_date"
                                                        autocomplete="off"
                                                        placeholder="DD/MM/YYYY"
                                                    />
                                                </datepicker>
											   </div>
											   <div>
												   <small>Type of Delivery</small>
												   <select name="" id="" class="form-select" ng-model="enquiry_summary.type_of_delivery">
													   <option value="">-- Choose -- </option>
													   @foreach($result['type_of_deliveries'] as $row)
                                                       <option value="{{$row->id}}">{{$row->delivery_type_name}}</option>
                                                       @endforeach
												   </select>
											   </div>
											   <div>
												   <small>Type of Project</small>
												   <select name="" id="" class="form-select" ng-model="enquiry_summary.type_of_project">
													   <option value="">-- Choose -- </option>
													   @foreach($result['type_of_projects'] as $row)
                                                       <option value="{{$row->id}}">{{$row->project_type_name}}</option>
                                                       @endforeach
												   </select>
											   </div>
											   <div>
												   <small>Customer</small>
												   <select name="" id="" class="form-select" ng-model="enquiry_summary.customer">
													   <option value="">-- Choose -- </option>
													   @foreach($result['customers'] as $row)
                                                       <option value="{{$row->id}}">{{$row->full_name}}</option>
                                                       @endforeach
												   </select>
											   </div>
											   <div>
												   <small>Project Name</small>
												   <select name="" id="" class="form-select" ng-model="enquiry_summary.project_name">
													   <option value="">-- Choose -- </option>
													   @foreach($result['projects'] as $row)
                                                       <option value="{{$row->id}}">{{$row->project_name}}</option>
                                                       @endforeach
												   </select>
											   </div>
											   <div>
												   <small>Search by E.No</small>
												   <input type="text" name="" id="" placeholder="Type to Search .." class="form-control" ng-model="enquiry_summary.search_by">
											   </div>
											   <div>
												   <small style="opacity:0">Search</small>
												   <button type="submit" class="btn btn-primary form-control" ng-click="applyFilter()"><i class="fa fa-search"></i></button>
											   </div>
                                               <div>
												   <small style="opacity:0">Reset</small>
												   <button type="reset" class="btn btn-primary form-control" ng-click="resetFilter()"><i class="fa fa-refresh"></i></button>
											   </div>
										   </form> 
									   </div>
								   </div>
								   <div class="card-body ">
									   <table id="dashboard-enquiry-summary" class="table custom dt-responsive nowrap custom table-striped">
										   <thead>
											   <tr>
												   <th>@lang('enquiry.s_no')</th>
												   <th>@lang('enquiry.enquiry_no')</th>
												   <th>@lang('enquiry.contact_person')</th>
                                                   <th>@lang('enquiry.email')</th>
												   <th>@lang('enquiry.enquiry_date')</th>
												   <th>@lang('enquiry.project_name')</th>
												   <th>@lang('enquiry.mobile_no')</th>
												   <th>@lang('global.action')</th>
											   </tr>
										   </thead>
						
									   </table>
								   </div>
							   </div>
						   </div> <!-- end col--> 
					   </div>