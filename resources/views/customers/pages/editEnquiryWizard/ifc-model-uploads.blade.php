<div id="ifcmodelUpload" class="form-horizontal">
    <div class="row mx-0">
         
        <div class="col-md-3">
            <div class="card p-4 shadow-lg file-upload-card">
                <h1 >PLAN VIEW</h1>
                <p class="text-disable">Click here to save your file</p>
                <label class="drop-box" for="">
                    <div class="text">
                        <input  type="file" onchange="angular.element(this).scope().fileName(this)" demo-file-model=" " class="file-upload-input" id =" "/>
                        <label for=""><i class="fa fa-folder-plus fa-3x text-primary"></i></label>
                        <small>
                            <filename data ="__file_name"></filename>
                        </small>
                    </div>
                </label>
                {{-- <span ng-show="__error" class="text-center text-danger">The field is required.</span> --}}
                <span class="file-submit-btn" ng-click="uploadFile('')" > <i class="fa fa-upload"></i> </span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4 shadow-lg file-upload-card">
                <h1 >PLAN VIEW</h1>
                <p class="text-disable">Click here to save your file</p>
                <label class="drop-box" for="">
                    <div class="text">
                        <input  type="file" onchange="angular.element(this).scope().fileName(this)" demo-file-model=" " class="file-upload-input" id =" "/>
                        <label for=""><i class="fa fa-folder-plus fa-3x text-primary"></i></label>
                        <small>
                            <filename data ="__file_name"></filename>
                        </small>
                    </div>
                </label>
                {{-- <span ng-show="__error" class="text-center text-danger">The field is required.</span> --}}
                <span class="file-submit-btn" ng-click="uploadFile('')" > <i class="fa fa-upload"></i> </span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4 shadow-lg file-upload-card">
                <h1 >PLAN VIEW</h1>
                <p class="text-disable">Click here to save your file</p>
                <label class="drop-box" for="">
                    <div class="text">
                        <input  type="file" onchange="angular.element(this).scope().fileName(this)" demo-file-model=" " class="file-upload-input" id =" "/>
                        <label for=""><i class="fa fa-folder-plus fa-3x text-primary"></i></label>
                        <small>
                            <filename data ="__file_name"></filename>
                        </small>
                    </div>
                </label>
                {{-- <span ng-show="__error" class="text-center text-danger">The field is required.</span> --}}
                <span class="file-submit-btn" ng-click="uploadFile('')" > <i class="fa fa-upload"></i> </span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4 shadow-lg file-upload-card">
                <h1 >PLAN VIEW</h1>
                <p class="text-disable">Click here to save your file</p>
                <label class="drop-box" for="">
                    <div class="text">
                        <input  type="file" onchange="angular.element(this).scope().fileName(this)" demo-file-model=" " class="file-upload-input" id =" "/>
                        <label for=""><i class="fa fa-folder-plus fa-3x text-primary"></i></label>
                        <small>
                            <filename data ="__file_name"></filename>
                        </small>
                    </div>
                </label>
                {{-- <span ng-show="__error" class="text-center text-danger">The field is required.</span> --}}
                <span class="file-submit-btn" ng-click="uploadFile('')" > <i class="fa fa-upload"></i> </span>
            </div>
        </div>
        
        
    </div>
    
    <div class="table-header">
        <h1>PLAN VIEW</h1>
        <br>
        <viewlist data ="List"></viewlist><br/>
    </div>  `

</div>