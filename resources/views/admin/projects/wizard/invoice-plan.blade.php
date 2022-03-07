<div class="card m-0">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-6">
                <h3 class="h4">Invoice Milestones</h3>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end">
                <div class="me-2"><strong>Project Budget</strong></div>
                <div><input type="text" class="form-control" placeholder="type here.."></div>
            </div>
        </div>
        <table class="table custom ">
            <thead>
                <tr>
                    <td class="text-center" colspan="2">
                        <input type="date" class="form-control form-control-sm mb-2">
                    </td>
                    <td class="text-center">
                        <input type="text" placeholder="Milestone Name" class="form-control form-control-sm mb-2">
                    </td>
                    <td class="text-center">
                        <input type="text" placeholder="Milestone Amount" class="form-control form-control-sm mb-2">
                    </td>
                    <td class="text-center">
                        <input type="text" placeholder="Milestone %" class="form-control form-control-sm mb-2">
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary mb-2">Create</button>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Milestone</th>
                    <th class="text-center">Milestone Amt</th>
                    <th class="text-center">Milestone %</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($key=0;$key<10;$key++)
                    <tr>
                        <td class="text-center">{{  $key+1 }}</td>
                        <td class="text-center">{{  $key+1 }} / 09 / 2021 </td>
                        <td class="text-center"> Milestone {{  $key+1 }}</td>
                        <td class="text-center">XXYYZZ</td>
                        <td class="text-center">{{  $key+10 }}%</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-danger py-0 px-1"><i class="bi bi-x"></i></button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer text-end">
    <a href="#/project-scheduling" class="btn btn-light float-start">Prev</a>
    <a href="#/to-do-listing" class="btn btn-primary">Next</a>
</div>