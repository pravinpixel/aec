<div class="p-2">
   
   <!-- <div class="text-end my-2">
        <button class="btn btn-sm btn-light border me-2">Export</button>
        <button class="btn btn-sm btn-primary">Create Issue</button>
    </div> -->
    <table class="table custom custom table-bordered table-hover m-0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Sub Type</th>
                <th>Title</th>
                <th>Location</th>
                <th>Assign To</th>
                <th>Company</th>
                <th>Due Date</th>
                <th>Task</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=0;$i<10;$i++)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>XXX</td>
                    <td>Sub XXX</td>
                    <td>YXYZ</td>
                    <td>ABCD</td>
                    <td>Mr. Vetri </td>
                    <td>ASW</td>
                    <td>20-05-2022</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm py-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="dripicons-dots-3 "></i>
                            </button>
                            
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">View</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>

<div class="card-footer text-end">
    <a href="#!@{{ PrevRoute }}" ng-show="indexRoute" class="btn btn-light float-start">Prev</a>
    <a href="#!@{{ NextRoute }}" ng-show="HideNextRoute" class="btn btn-primary">Next</a>
    <a href="#" ng-show="SubmitRoute" class="btn btn-primary">Submit & Save</a>
</div>