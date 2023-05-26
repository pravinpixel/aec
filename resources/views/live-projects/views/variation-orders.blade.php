<div class="p-4">
    @php $variations = getVariationOrderByProjectId(Project()->id) @endphp
    <div class="accordion" id="variationVersionAccordion">
        @if (count($variations) > 0)
            @foreach ($variations as $index => $variation)
                <div class="card mb-0 shadow-0 border rounded-0 border-bottom-0">
                    <div class="card-header shadow-0 px-3 p-2 d-flex align-items-center justify-content-between"
                        id="variationTitle_{{ $index }}">
                        <div class="d-flex align-items-center">
                            <a onclick="showVariationOrder( '{{ $variation->id }}' ,this)"
                                data-table-id="#variation-versions-table_{{ $variation->id }}"
                                class="fa fa-plus-circle fs-4 me-2  {{ $index == 0 ? '' : 'collapsed' }}"
                                data-bs-toggle="collapse" data-bs-target="#versionListView__{{ $index }}"
                                aria-expanded="false" aria-controls="versionListView__{{ $index }}"></a>
                            <a data-table-id="#variation-versions-table_{{ $variation->id }}"
                                class="fa fa-minus-circle fs-4 me-2   {{ $index == 0 ? '' : 'collapsed' }}"
                                data-bs-toggle="collapse" data-bs-target="#versionListView__{{ $index }}"
                                aria-expanded="false" aria-controls="versionListView__{{ $index }}"></a>
                            <h5 class="h5 m-0 text-dark py-1">
                                VAR/{{ date('Y') }}/{{ count($variations) - 1 }} - {{ $variation->issues->title }}
                            </h5>
                        </div>
                        <div>
                            <div class="text-primary fw-bold">Total vesions :
                                {{ count($variation->VariationOrderVersions) }}</div>
                        </div>
                    </div>
                    <div id="versionListView__{{ $index }}"
                        class="card-body collapse  {{ $index == 0 ? 'show' : '' }}"
                        aria-labelledby="variationTitle_{{ $index }}">
                        <div class="accordion-body">
                            <table class="table" id="variation-versions-table_{{ $variation->id }}">
                                <thead>
                                    <tr>
                                        <th width="80px">#Version</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Hours</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody> </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <h4 class="text-center">No variation orders!</h4>
        @endif
    </div>
</div>
@push('live-project-custom-styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css">
@endpush
@push('live-project-custom-scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        FectVariationVersionTable = (id, table_id) => {
            $(`#variation-versions-table_${id}`).DataTable().destroy();
            $(`#variation-versions-table_${id}`).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: `{{ route('live-project.variation-version.ajax') }}/${id}`,
                },
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'version_id',
                        name: 'version'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'hours',
                        name: 'hours'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        }
        @if (count($variations) > 0)
            FectVariationVersionTable({{ $variations[0]->id ?? 0 }}, '#variation-versions-table_{{ $variations[0]->id }}')
        @endif
        showVariationOrder = (id, element) => {
            $(element.getAttribute('data-table-id')).DataTable().destroy();
            startLoader(element)
            axios.get(`{{ route('live-project.show-variation.ajax') }}/${id}`).then((response) => {
                FectVariationVersionTable(id, element.getAttribute('data-table-id'))
                stopLoader(element)
            })
        }
        deleteVariationOrder = (id) => {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No',
                reverseButtons: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`{{ route('live-project.delete-variation.ajax') }}/${id}`).then((response) => {
                        if (response.data.status) {
                            Alert.info('Variation order canceled !')
                            $('#variation-order-table').DataTable().destroy();
                            FatchTable(null)
                        }
                    })
                }
            })
        }
        DuplicateVersion = (id) => {
            axios.get(`{{ route('live-project.duplicate-version.ajax') }}/${id}`).then((response) => {
                console.log(response.data)
            });
        }
        ViewVersion = (id, mode) => {
            axios.get(`{{ route('live-project.view-version.ajax') }}/${id}/${mode}`).then((response) => {
                $('#create-variation-order').modal('show')
                $('#create-variation-order-content').html(response.data.view)
            });
        }
        StoreVersion = (id, mode, element) => {
            event.preventDefault();
            const formData = new FormData(element)
            var version_data = {}
            for (const pair of formData.entries()) {
                version_data = {
                    ...version_data,
                    [pair[0]]: pair[1]
                }
            }
            axios.post(`{{ route('live-project.store-version.ajax') }}/${id}/${mode}`, version_data).then((
                response) => {
                // $('#variation-versions-table').DataTable().destroy();
                FectVariationVersionTable(response.data.variation_id)
                $('#create-variation-order').modal('hide')
                Alert.success(response.data.message)
            });
        }
        DeleteVersion = (id) => {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`{{ route('live-project.delete-version.ajax') }}/${id}`).then((response) => {
                        if (response.data.status) {
                            Alert.success('Successfully Deleted !')
                            // $('#variation-versions-table').DataTable().destroy();
                            FectVariationVersionTable(response.data.variation_id)
                        }
                    })
                }
            })
        }
        SendMailVersion = (id, element) => {
            swalWithBootstrapButtons.fire({
                html: `
                    <img src="{{ asset('public/assets/images/mail-loader.gif') }}" style="height: 100px;object-fit: cover;width:250px"/> 
                    <h3 class="text-primary">Mail Sending Onprocess...</h3>
                    <p>may be it's take some time please wait on the tab.</p>
                `,
                allowOutsideClick: false,
                background: 'rgb(252 254 252)',
                backdrop: `rgb(0 0 0 / 70%)`,
                allowEscapeKey: false,
                showConfirmButton: false
            })
            axios.post(`{{ route('live-project.send-mail-version.ajax') }}/${id}`).then((response) => {
                if (response.data.status) {
                    Swal.close()
                    Swal.fire({
                        text: response.data.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonText: 'Okay !',
                        cancelButtonText: 'No, cancel',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        customClass: {
                            confirmButton: 'btn btn-success rounded-pill',
                        },
                        buttonsStyling: false
                    })
                    // $('#variation-versions-table').DataTable().destroy();
                    FectVariationVersionTable(response.data.variation_id)
                }
            })
        }
    </script>
@endpush
