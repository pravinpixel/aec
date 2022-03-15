    <div class="card-body">   
    <div class="row m-0 justify-content-center align-items-center">
        <div class="col-12 row m-0">
            <div class="col border p-1 px-2 m-1 shadow rounded-pill border-primary">
                <div class="row m-0 align-items-center">
                    <div class="col-md d-flex align-items-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSS3pxBW14LCWAvNVLwZOt8WD6fTVf0q2qi_29x4rX1xqeV-VIZbkVDGndQcK59_VW9tH4&usqp=CAU" width="30px" class="me-3">
                        <b>Share Point</b>
                    </div>
                    <div class="col-4 text-end">
                        <input type="checkbox" id="switch0" data-switch="none"/>
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
                        <input type="checkbox" id="switch1" data-switch="none"/>
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
                        <input type="checkbox" id="switch1" data-switch="none"/>
                        <label for="switch1" class="border" data-on-label="" data-off-label=""></label>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#Sharepoint" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                    <span class="d-none d-md-block">Sharepoint</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#BIM-360" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span class="d-none d-md-block">BIM 360</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#Project-Leader" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                    <span class="d-none d-md-block">24/7 Office</span>
                </a>
            </li>
        </ul>
        <div class="tab-content border border-top-0">
            <div class="tab-pane p-3  show active" id="Sharepoint">
                <a href="" class="btn btn-sm btn-primary mb-2"><i class="fa fa-plus me-1"></i>Add Folder</a>
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <td style="padding: 0 !important">
                                <table  class="table table-bordereds custom m-0">
                                    <tr>
                                        <th colspan="2" style="width: 6% !important" class="text-center">S.No</th>
                                        <th width="70%">Folder Name</th>
                                        <th class="text-center">Action</th>
                                    </tr> 
                                </table>
                            </td>
                        </tr>
                    </thead>
                    <tbody class="panel">  
                        @for ($key=0;$key<3;$key++)
                        <tr>
                            <td style="padding: 0 !important">
                                <table class="table table-bordered m-0 ">
                                    <tbody class="panel"> 
                                        <tr>
                                            <td colspan="2" style="width: 6% !important" class="text-center">
                                                <div class="d-flex text-center" >
                                                    <div class="me-2">
                                                        <i data-bs-toggle="collapse" href="#togggleTable_{{ $key+1 }}" aria-expanded="true" aria-controls="togggleTable_{{ $key+1 }}" class="accordion-button custom-accordion-button collapsed bg-primary text-white toggle-btn m-0"></i>
                                                    </div> 
                                                    <div class="text-center">{{ $key+1 }}</div>
                                                </div>
                                            </td>
                                            <td width="70%">- <i class="mdi mdi-folder-open"></i> Project Management</td>
                                            <td class="text-center">
                                                <a href="" class="link"><i class="fa fa-plus"></i> Add</a>
                                                <a href="" class="link text-danger ms-2"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr> 
                                        <tr  id="togggleTable_{{ $key+1 }}" class="collapse">
                                            <td colspan="4" class="hiddenRow" style="padding: 0 !important">
                                                <table class="table table-bordered m-0 table-hover">
                                                    <tbody> 
                                                        @for ($i=0;$i<3;$i++)
                                                        <tr>
                                                            <td  class="text-end" style="width: 6% !important">
                                                                <div class="text-end">{{ $key+1 }}.{{ $i+1 }}</div>                                                    
                                                            </td>
                                                            <td width="70%" class="text-secondary">-- <i class="mdi mdi-folder"></i> Sub Floder of Parent</td>
                                                            <td class="text-center">
                                                                <a href="" class="link"><i class="fa fa-plus"></i> Add</a>
                                                                <a href="" class="link text-danger ms-2"><i class="fa fa-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endfor 
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </td>
                        </tr>  
                        @endfor 
                    </tbody>
                </table>
            </div>
            <div class="tab-pane p-3" id="BIM-360">
                <div class="row m-0">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <small>* Project Name</small>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="mb-3">
                            <small>* Project Type</small>
                            <select name="" id="" class="form-select form-select-sm">
                                <option value="">  </option>
                                <option value=""> Type A </option>
                                <option value=""> Type B </option>
                                <option value=""> Type C </option>
                            </select>
                        </div>
                        <div class="row mx-0 mb-3">
                            <div class="col-6 px-0 pe-1">
                                <small>* Project Start Date</small>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                            <div class="col-6 px-0 ps-1">
                                <small>* Project End Date</small>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="mb-3">
                            <small>* BIM 360 Language</small>
                            <select name="" id="" class="form-select form-select-sm">
                                <option value="">  </option>
                                <option value=""> English </option>
                                <option value=""> Norwegian </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <small> Project Address</small>
                            <input type="text" class="form-control form-control-sm mb-1" placeholder="Address Line 1">
                            <input type="text" class="form-control form-control-sm mb-1" placeholder="Address Line 2">
                            <div class="d-flex">
                                <input type="text" class="form-control form-control-sm mb-1 me-1" placeholder="City">
                                <input type="text" class="form-control form-control-sm mb-1 ms-1" placeholder="Postal Code">   
                            </div>
                            <select name="" id="" class="form-select form-select-sm mb-1">
                                <option value=""> State/Province </option>
                                <option value=""> Type A </option>
                                <option value=""> Type B </option>
                                <option value=""> Type C </option>
                            </select>
                            <select name="" id="" class="form-select form-select-sm">
                                <option value=""> United States </option>
                                <option value=""> Type A </option>
                                <option value=""> Type B </option>
                                <option value=""> Type C </option>
                            </select>
                        </div>
                        <div >
                            <small> Project Time Zone</small>
                            <select name="" id="" class="form-select form-select-sm">
                                <option value="">  </option>
                                <option value=""> Norway (GMT+1) </option>
                                <option value=""> Washington, DC, USA (GMT-4) </option>
                                <option value=""> India (GMT+5:30) </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-3" id="Project-Leader">
                <div class="col-md-6 mx-auto">
                    <div class="mb-3">
                        <small>Project No</small>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <small>Project Name</small>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="row mx-0 mb-3">
                        <div class="col-6 px-0 pe-1">
                            <small>Project Start Date</small>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                        <div class="col-6 px-0 ps-1">
                            <small>Project End Date</small>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="mb-3">
                        <small>Should the project be linked to a customer ?</small>
                        <select name="" id="" class="form-select form-select-sm">
                            <option value=""> Search For Customer </option>
                            <option value=""> English </option>
                            <option value=""> Norwegian </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-end">
    <a href="#/" class="btn btn-light float-start">Prev</a>
    <a href="#/team-setup" class="btn btn-primary">Next</a>
</div>
 
<link href="{{ asset('public/assets/css/vendor/jstree.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('public/assets/js/vendor/jstree.min.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/demo.jstree.js') }}"></script>
 