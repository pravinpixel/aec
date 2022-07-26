<div class="border-bottom">
    <div class="row m-0 card-body">
        <div class="col-8 mx-auto d-flex">
            <div class="mb-2 me-3">
                <label for=""><b>Type of Project</b></label>
                <div class="btn-group w-100 border rounded">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="project_type_id" ng-model="project.project_type_id" required>
                        <option value="">@lang('project.select') </option>
                        <option ng-repeat="projectType in projectTypes" value="@{{ projectType.id }}" ng-selected="projectType.id == project.project_type_id">
                            @{{ projectType.project_type_name }}
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <label for=""><b>Select Check List</b></label>
                <div class="btn-group w-100 border rounded">
                    <select ng-model="check_list_type" class="border-0 form-select ">
                        <option value=""> -- select ---</option>
                        <option value="@{{ row.name }}" ng-repeat="row in check_list_master">
                            @{{ row.name }}
                        </option>
                    </select>
                    <button class="btn btn-primary" ng-click="add_new_check_list_item(index)"><i class="mdi mdi-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4 pe-0" ng-show="check_list_items.length != 0">
            <div >
                <fieldset class="accordion-item" ng-repeat="(index,check_list) in check_list_items">
                    <div class="accordion-header py-0 custom m-0 position-relative" id="OpenCloseBoxHeader_@{{ index }}">
                        <div class="accordion-button py-1 collapsed" data-bs-toggle="collapse" data-bs-target="#OpenCloseBoxBody_@{{ index }}" aria-expanded="true" aria-controls="OpenCloseBoxBody_@{{ index }}">
                            <span class="position-relative btn py-0"> <i class="text-danger fa fa-trash btn-sm btn" ng-click="delete_this_check_list_item(index)"></i> <b >@{{ check_list.name }}</b></span> 
                        </div>
                        <div class="icon m-0 position-absolute rounded-pills" style="right: 10px;top:30%; z-index:111 !important">
                            <i data-bs-toggle="collapse" 
                                href="#OpenCloseBoxBody_@{{ index }}" 
                                aria-expanded="false" 
                                aria-controls="OpenCloseBoxBody_@{{ index }}" 
                                class="accordion-button collapsed custom-accordion-button bg-primary text-white toggle-btn ">
                            </i>
                        </div>
                    </div>
                    <div id="OpenCloseBoxBody_@{{ index }}" class="accordion-collapse collapse" aria-labelledby="OpenCloseBoxHeader_@{{ index }}" >
                        <div class="accordion-body p-0">
                            <table class="m-0 table custom">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Deliverable Name</th>
                                        <th class="text-center">Assign To</th>
                                        <th class="text-center">Start Date</th>
                                        <th class="text-center">End Date</th>
                                    </tr>
                                </thead>
                                <tbody class="border" ng-repeat="(index_2 , checkListData) in check_list.data">
                                    <tr ng-show="checkListData.text != 'others'">
                                        <td colspan="6" class="bg-light">
                                            <div class="text-start">
                                                <strong>@{{ checkListData.name }}</strong>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr ng-repeat="(index_3 , taskListData) in checkListData.data">
                                        <td>@{{ index_3 +1 }}</td>
                                        <td>@{{ taskListData.task_list }}</td>
                                        <td>
                                            <select get-to-do-lists ng-model="taskListData.assign_to" class="form-select border-0  form-select-sm">
                                                <option value="">-- Project Manager --</option>
                                                <option ng-repeat="projectManager in projectManagers" value="@{{ projectManager.id }}" ng-selected="projectManager.id == taskListData.assign_to">
                                                    @{{ projectManager.first_Name }}
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="date" get-to-do-lists ng-value="taskListData.start_date | date: 'dd-MM-yyyy'" ng-model="taskListData.start_date" id="" class=" border-0 form-control form-control-sm"></td>
                                        <td><input type="date" get-to-do-lists ng-value="taskListData.end_date | date: 'dd-MM-yyyy'" ng-model="taskListData.end_date" id="" class=" border-0 form-control form-control-sm"></td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </fieldset> 
            </div>
        </div>
    </div> 
</div>


<div class="card-footer text-end">
    <a href="#!/invoice-plan" class="btn btn-light float-start">Prev</a>
    <a ng-click="storeToDoLists()" class="btn btn-primary">Next</a>
</div>
<style> 
    .To_Do_List .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style> 
{{-- <fieldset class="accordion-item">
    <div class="accordion-header custom m-0 position-relative" id="mulistory_header">
        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#mulistory" aria-expanded="false" aria-controls="mulistory">
            <span class="position-relative btn py-0">MULTISTOREY FACADE PROJECT </span> 
        </div>
        <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
            <i data-bs-toggle="collapse" 
                href="#mulistory" 
                aria-expanded="true" 
                aria-controls="mulistory" 
                class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                >
            </i>
        </div>
    </div>
    <div id="mulistory" class="accordion-collapse collapse" aria-labelledby="mulistory_header" >
        <div class="accordion-body">  
            <table class="m-0 table custom  ">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">Deliverable Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Assign To</th>
                        <th class="text-center">Date of Delivery</th>
                    </tr>
                </thead>
                <tbody class="border">
                    <tr>
                        <td colspan="5" class="bg-light">
                            <div class="text-start">
                                <strong>1st set of delivery - Approval drawings</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Facade wall Layout</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2D connecting Detail Drawings</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bg-light">
                            <div class="text-start">
                                <strong>2nd set of delivery - Structural Reoport</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Global Structural Reports</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5" class="bg-light">
                            <div class="text-start">
                                <strong>3rd set of delivery - Data for client Review</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Facade wall Framing</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Total Building Material List</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bg-light">
                            <div class="text-start">
                                <strong>4th set of delivery - Data for client Review</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Facade wall Installation drawing</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Transport Packaging drawing</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>CNC DATA</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Facade wall fabrication drawing</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input"></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bg-light">
                            <div class="text-start">
                                <strong>Final Delivery</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Final set of drawing uploaded in BIM 360</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Maintaining BIM dat for every Update</td>
                        <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked></td>
                        <td>
                            <select name="" id="" class="form-select border-0  form-select-sm">
                                <option value="">-- Project Manager --</option>
                                <option value="">User A</option>
                                <option value="">User B</option>
                                <option value="">User C</option>
                            </select>
                        </td>
                        <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                    </tr>
                </tbody>
            </table>
        </div> 
        <div class="accordion-footer p-3 pt-0 text-center">
            <button class="btn btn-primary">Print / Download</button>
        </div>
    </div>
</fieldset>
<fieldset class="accordion-item">
    <div class="accordion-header custom m-0 position-relative" id="strucatural_design_header">
        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#strucatural_design" aria-expanded="false" aria-controls="strucatural_design">
            <span class="position-relative btn py-0">STRUCTURAL DESIGN INSTALLATION DRAWING </span> 
        </div>
        <div class="icon m-0 position-absolute rounded-pills  " style="right: 10px;top:30%; z-index:111 !important">
            <i data-bs-toggle="collapse" 
                href="#strucatural_design" 
                aria-expanded="true" 
                aria-controls="strucatural_design" 
                class="accordion-button custom-accordion-button bg-primary text-white toggle-btn  collapsed "
                >
            </i>
        </div>
    </div>
    <div id="strucatural_design" class="accordion-collapse collapse" aria-labelledby="strucatural_design_header" >
        <div class="accordion-body">  
            <table class="m-0 table custom  ">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">Deliverable Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Assign To</th>
                        <th class="text-center">Date of Delivery</th>
                    </tr>
                </thead>
                <tbody class="border">
                    @for ($i=1;$i<17;$i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                {{$i == 1 ? 'Dead Load Calculation' : ''}}
                                {{$i == 2 ? 'Design of Beam' : ''}}
                                {{$i == 3 ? 'Design of Coloumn' : ''}}
                                {{$i == 4 ? 'share wall Design' : ''}}
                                {{$i == 5 ? 'Design of Anchorage in shear wall' : ''}}
                                {{$i == 6 ? 'Roof Design' : ''}}
                                {{$i == 7 ? 'Design of pullout strength of screw' : ''}}
                                {{$i == 8 ? 'Design ofanchorage Bolt for wall' : ''}}
                                {{$i == 9 ? 'Design of Angle Bar' : ''}}
                                {{$i == 10 ? 'Design of Element' : ''}}
                                {{$i == 11 ? 'Design of Pullout strength of screw for wall' : ''}}
                                {{$i == 12 ? 'Design of Anchorage Bolt' : ''}}
                                {{$i == 13 ? 'Design of Connection Between column and beam' : ''}}
                                {{$i == 14 ? 'Design of Angle Bar for Glulam' : ''}}
                                {{$i == 15 ? 'Design of pullout strength of screw for Glulam' : ''}}
                                {{$i == 16 ? 'Design of column Base Connection' : ''}}
                            </td>
                            <td class="text-center"><input type="checkbox" name="" id="" class="form-check-input" checked></td>
                            <td>
                                <select name="" id="" class="form-select border-0  form-select-sm">
                                    <option value="">-- Project Manager --</option>
                                    <option value="">User A</option>
                                    <option value="">User B</option>
                                    <option value="">User C</option>
                                </select>
                            </td>
                            <td><input type="date" name="" id="" class=" border-0 form-control form-control-sm"></td>
                        </tr> 
                    @endfor
                </tbody>
            </table>
        </div> 
        <div class="accordion-footer p-3 pt-0 text-center">
            <button class="btn btn-primary">Print / Download</button>
        </div>
    </div>
</fieldset>  --}}