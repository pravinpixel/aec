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
                                    @if (count($proposal->child))
                                        <i data-bs-toggle="collapse" href="#togggleTable{{ $index + 1 }}"
                                            aria-expanded="true" aria-controls="togggleTable{{ $index + 1 }}"
                                            class="accordion-button custom-accordion-button collapsed bg-primary text-white toggle-btn m-0"></i>
                                    @endif
                                    <div class="text-center">{{ $index + 1 }}</div>
                                </td>
                                <td style="width: 10% !important" class="text-center">{{ $proposal->title }}</td>
                                <td style="width: 10% !important" class="text-primary text-center">{{ $proposal->version }}</td>
                                <td style="width: 10% !important" class="text-info text-center">{!! proposalStatusBadge($proposal->admin_status) !!}</td>
                                <td style="width: 28% !important" class="text-info text-center">{{ $proposal->comments }}</td>
                                <td style="width: 16% !important"class="text-center">
                                    <small>{{ $proposal->mailed_at ?? 'Not Yet Sent! ' }}</small>
                                </td>
                                <td style="width: 6% !important" class="text-center">
                                    <x-enquiry-proposal-action :proposal="$proposal" />
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
                                                        <td class="text-end" style="width: 6% !important">{{ $index + 1 }}.{{ $versionIndex + 1 }}</td>
                                                        <td style="width: 10% !important" class="text-center">{{ $version->title }}</td>
                                                        <td style="width: 10% !important" class="text-info text-center">
                                                            <b><small>{{ $version->version }}</small></b>
                                                        </td>
                                                        <td style="width: 10% !important" class="text-info text-center">{!! proposalStatusBadge($version->admin_status) !!}</td>
                                                        <td style="width: 28% !important" class="text-info text-center">
                                                            <div class="proposal-comment">
                                                                <div>{{ $version->comments }}</div>
                                                            </div>
                                                        </td>
                                                        <td style="width: 16% !important" class="text-center">
                                                            <small>{{ $version->mailed_at ?? 'Not Yet Sent!' }}</small>
                                                        </td>
                                                        <td style="width: 6% !important" class="text-center">
                                                            <x-enquiry-proposal-action :proposal="$version" />
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