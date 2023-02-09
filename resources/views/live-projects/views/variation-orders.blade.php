<div>
    <table class="table table-bordred table-sm table-centered border table-hover" id="variation-order-table">
        <thead>
            <tr class="bg-light-2"> 
                <th>#Issue Variation Id</th>
                <th>Title</th>
                <th>Total Versions</th> 
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
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
        FatchTable = (filters) => {
            var table = $('#variation-order-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('live-project.index-issue-variation.ajax', Project()->id) }}",
                    data: {
                        filters: filters,
                    }
                },
                columns: [
                    { data:'issues.issue_id', name:'issues.issue_id'},
                    { data:'issues.title', name:'issues.title'},
                    { data:'total_versions', name:'total_versions'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        }
        FatchTable(null)
        FectVariationVersionTable = (id) => {
            $('#variation-versions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: `{{ route('live-project.variation-version.ajax') }}/${id}`,
                },
                order: [[0, 'desc']],
                columns: [
                    { data:'version', name:'version'},
                    { data:'title', name:'title'},
                    { data:'hours', name:'hours'},
                    { data:'price', name:'price'},
                    { data:'status', name:'status'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        }
        showVariationOrder = (id, element) => {
            startLoader(element)
            axios.get(`{{ route('live-project.show-variation.ajax') }}/${id}`).then((response) => { 
                $('#detail-variation-modal').modal('show')
                $('#detail-variation-modal-content').html(response.data.view)
                FectVariationVersionTable(id)
                stopLoader(element)
            })
        } 
        deleteVariationOrder = (id) => {  
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
                reverseButtons: true,
                allowOutsideClick :false,
                allowEscapeKey:false
            }).then((result) => {
                if (result.isConfirmed) { 
                    axios.delete(`{{ route('live-project.delete-variation.ajax') }}/${id}`).then((response) => {
                        if(response.data.status) {
                            Alert.success('Successfully Deleted !')
                            $('#variation-order-table').DataTable().destroy();
                            FatchTable(null)
                        }
                    }) 
                }
            })
        }
        ViewVersion = (id, mode) => {
            axios.get(`{{ route("live-project.view-version.ajax") }}/${id}/${mode}`).then((response) => {
                $('#detail-variation-modal').modal('hide')
                $('#create-variation-order').modal('show')
                $('#create-variation-order-content').html(response.data.view)
            });
        }
        StoreVersion  = (id, mode, element) => {
            event.preventDefault(); 
            const formData = new FormData(element)
            var version_data = {}
            for (const pair of formData.entries()) {
                version_data = {...version_data,[pair[0]]:pair[1]}
            }
            axios.post(`{{ route("live-project.store-version.ajax") }}/${id}/${mode}`,version_data).then((response) => {
                $('#variation-versions-table').DataTable().destroy();
                FectVariationVersionTable(response.data.variation_id)
                $('#create-variation-order').modal('hide')
                $('#detail-variation-modal').modal('show')
            });
        }
    </script>
@endpush
