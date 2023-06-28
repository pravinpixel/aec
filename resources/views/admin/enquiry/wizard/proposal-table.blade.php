<table class="table custom table-bordered">
    <tbody class="panel">
        <tr>
            <td style="padding: 0 !important">
                <table class="table custom table-bordereds m-0">
                    <tr>
                        <th class="text-center" colspan="2" style="width: 6% !important">No</th>
                        <th class="text-center" style="width: 10% !important">File Name</th>
                        <th class="text-center" style="width: 10% !important">Version</th>
                        <th class="text-center" style="width: 10% !important">Status</th>
                        <th class="text-center" style="width: 28% !important">Comments</th>
                        <th class="text-center" style="width: 16% !important">Date & Time</th>
                        <th class="text-center" style="width: 6% !important">Action</th>
                    </tr>
                </table>
            </td>
        </tr>
        @foreach (EnquiryProposals() as $index => $proposal)
            <tr>
                <td style="padding: 0 !important">
                    <table class="table custom table-bordered m-0">
                        <tbody class="panel">
                            <tr>
                                <td colspan="2" style="width: 6% !important" class="text-center">
                                    {{  $proposal->id }}
                                    @if (count($proposal->child))
                                        <i data-bs-toggle="collapse" href="#togggleTable{{ $index + 1 }}"
                                            aria-expanded="true" aria-controls="togggleTable{{ $index + 1 }}"
                                            class="accordion-button custom-accordion-button collapsed bg-primary text-white toggle-btn m-0"></i>
                                    @endif
                                    <div class="text-center">{{ $index + 1 }}</div>
                                </td>
                                <td style="width: 10% !important" class="text-center">
                                    {{ $proposal->title }}
                                </td>
                                <td style="width: 10% !important" class="text-primary text-center">
                                    {{ $proposal->version }}</td>
                                <td style="width: 10% !important" class="text-info text-center">
                                    {{ $proposal->admin_status }}</td>
                                <td style="width: 28% !important" class="text-info text-center">
                                    {{ $proposal->comments }}</td>
                                <td style="width: 16% !important"class="text-center">
                                    <small>{{ $proposal->mailed_at ?? 'Not Yet Sent! ' }}</small>
                                </td>
                                <td style="width: 6% !important" class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn-light border rounded"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <button class="dropdown-item" ng-click="view(data.proposal_id)">View /
                                                Edit</button>
                                            <button class="dropdown-item"
                                                ng-click="download(data.proposal_id)">Download</button>
                                            <div class="dropdown-divider m-0"></div>
                                            <button class="dropdown-item text-danger"
                                                ng-click="delete(data.proposal_id)">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="togggleTable{{ $index + 1 }}" class="collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <td colspan="8" class="hiddenRow" style="padding: 0 !important">
                                    <table class="table custom table-bordered table-hover m-0">
                                        <tbody>
                                            @if (count($proposal->child))
                                                @foreach ($proposal->child as $versionIndex => $version)
                                                    <tr>
                                                        <td class="text-end" style="width: 6% !important">
                                                            {{ $index + 1 }}.
                                                            {{ $versionIndex + 1 }}
                                                        </td>
                                                        <td style="width: 10% !important" class="text-center">
                                                            {{ $version->title }}
                                                        </td>
                                                        <td style="width: 10% !important" class="text-info text-center">
                                                            <b><small>{{ $version->version }}
                                                                </small></b>
                                                        </td>
                                                        <td style="width: 10% !important" class="text-info text-center">
                                                            {{ $version->admin_status }}
                                                        </td>
                                                        <td style="width: 28% !important" class="text-info text-center">
                                                            <div class="proposal-comment">
                                                                <div>{{ $version->comments }} </div>
                                                            </div>
                                                        </td>
                                                        <td style="width: 16% !important" class="text-center">
                                                            <small>{{ $version->mailed_at ?? 'Not Yet Sent! ' }}</small>
                                                        </td>
                                                        <td style="width: 6% !important" class="text-center">
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="toggle-btn btn-light btn-sm p-1 py-0 btn-light btn"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="dripicons-dots-3 "></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <button class="dropdown-item"
                                                                        ng-if="V.status != 'sent' && V.status != 'obsolete'"
                                                                        ng-click="ViewEditProposeVersions(V.proposal_id,V.id)">View
                                                                        / Edit</button>
                                                                    <button class="dropdown-item"
                                                                        ng-if="V.status != 'awaiting'"
                                                                        ng-click="DuplicateProposalVersion(V.id)">Duplicate</button>
                                                                    <button class="dropdown-item"
                                                                        ng-click="DownloadProposalVersion(V.id)">Download</button>
                                                                    <div class="dropdown-divider m-0">
                                                                    </div>
                                                                    <button class="dropdown-item text-danger"
                                                                        ng-click="DeleteProposeVersion(V.proposal_id,V.id)">Delete</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
