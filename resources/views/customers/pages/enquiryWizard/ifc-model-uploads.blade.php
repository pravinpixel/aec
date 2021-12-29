<div id="ifcmodelUpload" class="form-horizontal">
    <div class="row mx-0">
        <div class="col-md-3">
            <div class="card rounded ">
                <div class="card-header ">
                    <div class="page-title ">Plan view <sup class="text-danger">*</sup> </div>
                </div>
                <div class="card-body ">
                    <label for="planView" class="upload-files">
                        <input type="file" demo-file-model="planView" class="form-control upload-input" id ="planView"/>
                        <span class="prev-text">click here</span>
                    </label>
                    <div class="text-center"><small class="text-center mx-auto">(or)</small></div>
                    <input type="text" demo-file-model="planView" placeholder="Paste here..."  class="form-control form-control-sm mb-2" id ="planView"/>
                    <button ng-click="uploadFile('Plan view')" class = "w-100 btn btn-primary">Upload File</button>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card rounded ">
                <div class="card-header ">
                    <div class="page-title ">Facade view <sup class="text-danger">*</sup> </div>
                </div>
                <div class="card-body ">
                    <label for="facadeView" class="upload-files">
                        <input type="file" demo-file-model="FacadeView" class="form-control upload-input" id ="facadeView"/>
                        <span class="prev-text">click here</span>
                    </label>
                    <div class="text-center"><small class="text-center mx-auto">(or)</small></div>
                    <input type="text" demo-file-model="FacadeView" placeholder="Paste here..."  class="form-control form-control-sm mb-2" id ="facadeView"/>
                    <button ng-click="uploadFile('Facade view')" class = "w-100 btn btn-primary">Upload File</button>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card rounded ">
                <div class="card-header ">
                    <div class="page-title ">IFC Model <sup class="text-danger">*</sup> </div>
                </div>
                <form class="card-body " name ="uploadformfile"  >
                    <label for="ifcmodelView" class="upload-files">
                        <input type="file" demo-file-model="IFCModelView" class="form-control upload-input" id ="ifcmodelView"/>
                        <span class="prev-text">click here</span>
                    </label> 
                    <div class="text-center"><small class="text-center mx-auto">(or)</small></div>
                    <input type="text" demo-file-model="IFCModelView" placeholder="Paste here..."  class="form-control form-control-sm mb-2" id ="ifcmodelView"/>
                    <button ng-click="uploadFile('IFC model')"  class = "w-100 btn btn-primary">Upload File</button>
                </form>
            </div>
        </div>

        
        <div class="col-md-3">
            <div class="card rounded ">
                <div class="card-header ">
                    <div class="page-title ">Others <sup class="text-danger">*</sup> </div>
                </div>
                <div class="card-body ">
                    <label for="Others" class="upload-files">
                        <input type="file" demo-file-model="Others" class="form-control upload-input" id ="Others"/>
                        <span class="prev-text">click here</span>
                    </label>
                    <div class="text-center"><small class="text-center mx-auto">(or)</small></div>
                    <input type="text" demo-file-model="Others" placeholder="Paste here..."  class="form-control form-control-sm mb-2" id ="Others"/>
                    <button ng-click="uploadFile('Others')" class = "w-100 btn btn-primary">Upload File</button>
                </div>
            </div>
        </div>
      
    </div>
    <div class="container">
        <h3>Plan View </h3>
        
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="panel"> 
              
                <tr ng-repeat=" planview in planViewLists">
                    <td> @{{ $index + 1}} </td>
                      <td>@{{  planview.pivot.created_at }}</td>
                      <td>@{{  planview.pivot.client_file_name }}</td>
                      <td class="text-success">@{{  planview.pivot.file_type }}</td>
                      <td class="text-info">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                      </td>
                    <td><span class="badge badge-outline-success rounded-pill"> @{{  planview.pivot.status }} </span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                    </td> 
                </tr> 
            </tbody>
        </table>
    </div>
    <div class="container">
        <h3>FACADE View </h3>
        
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="panel">
                                                                            
                
                <tr>
                    <td>1</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-info">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                        <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_1" aria-expanded="true" aria-controls="collapsene_1"></i>
                    </td>
                </tr>
                
                <tr id="collapsene_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <td colspan="7" class="hiddenRow">
                        <table class="table table-border">
                                <tbody><tr>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>05-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>04-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                </tr>
                                <tr>
                                    <td>03-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
                                                                            
                
                <tr>
                    <td>2</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-info">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-success-lighten btn p-2">Add new</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                        <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                    </td>
                </tr>
                
                <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <td colspan="7" class="hiddenRow">
                        <table class="table table-border">
                                <tbody><tr>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>05-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>04-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                </tr>
                                <tr>
                                    <td>03-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-success">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                    </td>
                </tr>
                
                                                                   
            </tbody>
        </table>
    </div>
    <div class="container">
        <h3>IFC Model </h3>
        
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="panel">
                                                                            
                
                <tr>
                    <td>1</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-success">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                        <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_1" aria-expanded="true" aria-controls="collapsene_1"></i>
                    </td>
                </tr>
                
                <tr id="collapsene_1" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <td colspan="7" class="hiddenRow">
                        <table class="table table-border">
                                <tbody><tr>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>05-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>04-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                </tr>
                                <tr>
                                    <td>03-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
                                                                            
                
                <tr>
                    <td>2</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-success">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                        <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                    </td>
                </tr>
                
                <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <td colspan="7" class="hiddenRow">
                        <table class="table table-border">
                                <tbody><tr>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>05-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>04-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                </tr>
                                <tr>
                                    <td>03-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
                                                                            
                
                <tr>
                    <td>3</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-success">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                    </td>
                </tr>
                
                 
                                                                        
            </tbody>
        </table>
    </div>
    <div class="container">
        <h3>Others</h3>
        
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Comments</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="panel">
                                                                            
                
                <tr>
                    <td>1</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-success">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-success">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                        <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_2" aria-expanded="true" aria-controls="collapsene_2"></i>
                    </td>
                </tr>
                
                <tr id="collapsene_2" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <td colspan="7" class="hiddenRow">
                        <table class="table table-border">
                                <tbody><tr>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>05-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>04-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                </tr>
                                <tr>
                                    <td>03-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
                                                                            
                
                <tr>
                    <td>3</td>
                    <td>05 May 2013</td>
                    <td>Dummy Name</td>
                    <td class="text-success">XXXX</td>
                    <td class="text-success">
                        <span data-bs-toggle="modal" data-bs-target="#right-modal"  class="badge badge-primary-lighten btn  p-2">View</span>
                    </td>
                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                    <td>
                        <i class="feather-eye btn-success btn mr-3"></i>
                        <i class="feather-trash btn-danger btn  mr-3"></i>
                        <i class="feather-corner-down-left btn btn-info"  data-bs-toggle="collapse" href="#collapsene_3" aria-expanded="true" aria-controls="collapsene_3"></i>
                    </td>
                </tr>
                
                <tr id="collapsene_3" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <td colspan="7" class="hiddenRow">
                        <table class="table table-border">
                                <tbody><tr>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>05-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-success rounded-pill">In Progress</span></td>
                                </tr>
                                <tr>
                                    <td>04-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-info rounded-pill">Reviewing</span></td>
                                </tr>
                                <tr>
                                    <td>03-06-2021</td>
                                    <td>XXXX</td>
                                    <td><span class="badge badge-outline-secondary rounded-pill">Reviewing</span></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
                                                                        
            </tbody>
        </table>
    </div>
</div>