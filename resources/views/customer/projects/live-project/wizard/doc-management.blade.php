<div class="p-2"> 
    <div class="row m-0">
        <div class="p-0" style="width: 220px">
            <ul class="nav nav-pills flex-column bg-nav-pills">
                <li class="nav-item">
                    <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        <small>Administration-Document</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                        <small>Business Development</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        <small>Sales-Document</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        <small>Projects-Documents</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        <small>Engineering-Documents</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                        <small>Subsea Projects-Documents</small>
                    </a>
                </li> 
            </ul>
        </div>
        <div class="col">
            <div class="tab-content">
                <div class="tab-pane" id="home1">
                    <div>
                        <label for="files_upload" class="x-y-center bg-light shadow-sm border-primary border rounded p-4 mb-2">
                            <div class="text-center">
                                <input type="file" name="files_upload" id="files_upload" class="mb-2 form-control form-control-sm shadow">
                                <small class="my-2 mb-3">(or)</small>
                                <div class="fw-bold mb-2">Drog & Drop files here</div>
                            </div>
                        </label> 
                        <table class="m-0 table table-bordered table-hover custom shadow">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>File Name</th>
                                    <th>File Type</th>
                                    <th>Last Activity</th>
                                    <th>Date Upload</th>
                                    <th>Date By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=0;$i<4;$i++)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>Sample 00{{ $i+1 }}</td>
                                        <td>.xuz</td>
                                        <td>No Activity</td>
                                        <td>0{{  $i+1  }}-12-2022</td>
                                        <td>Admin</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane show active" id="profile1">
                    <div>
                        <label for="files_upload" class="x-y-center bg-light shadow-sm border-primary border rounded p-4 mb-2">
                            <div class="text-center">
                                <input type="file" name="files_upload" id="files_upload" class="mb-2 form-control form-control-sm shadow">
                                <small class="my-2 mb-3">(or)</small>
                                <div class="fw-bold mb-2">Drog & Drop files here</div>
                            </div>
                        </label> 
                        <table class="m-0 table table-bordered table-hover custom shadow">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>File Name</th>
                                    <th>File Type</th>
                                    <th>Last Activity</th>
                                    <th>Date Upload</th>
                                    <th>Date By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=0;$i<4;$i++)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>Sample 00{{ $i+1 }}</td>
                                        <td>.xuz</td>
                                        <td>No Activity</td>
                                        <td>0{{  $i+1  }}-12-2022</td>
                                        <td>Admin</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="settings1">
                    <div>
                        <label for="files_upload" class="x-y-center bg-light shadow-sm border-primary border rounded p-4 mb-2">
                            <div class="text-center">
                                <input type="file" name="files_upload" id="files_upload" class="mb-2 form-control form-control-sm shadow">
                                <small class="my-2 mb-3">(or)</small>
                                <div class="fw-bold mb-2">Drog & Drop files here</div>
                            </div>
                        </label> 
                        <table class="m-0 table table-bordered table-hover custom shadow">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>File Name</th>
                                    <th>File Type</th>
                                    <th>Last Activity</th>
                                    <th>Date Upload</th>
                                    <th>Date By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=0;$i<4;$i++)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>Sample 00{{ $i+1 }}</td>
                                        <td>.xuz</td>
                                        <td>No Activity</td>
                                        <td>0{{  $i+1  }}-12-2022</td>
                                        <td>Admin</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-8">
        <project-open-comment  data="
        {'modalState':'viewConversations',
        'type': 'document', 
        'header':'document',
        'project_id':4 ,
        send_by: {{ Customer()->id }},
        'from':'Customer'
        }"/> 
    </div>                                
    <div class="col-4">
        <project-comment data="
        {'modalState':'viewConversations',
        'type': 'document', 
        'header':'document',
        'project_id':4 ,
        send_by: {{ Customer()->id }},
        'from':'Customer'
        }"/>
    </div>                                
</div>
<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>
 