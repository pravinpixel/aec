<section id="documents-section" class="mb-3">
    <div class="p-3 text-center">
        <h4 class="fw-bold ">Documents Fetching from share point</h4>
        <div class="text-primary">
            <p class="fw-bold ">Please wait a minute ...</p>
            <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
        </div>
    </div>
</section>
<x-chat-box
    status="1"
    :moduleId="Project()->id"
    moduleName="project"
    menuName="{{ strtoupper(request()->route()->menu_type) }}"
/>
@push('live-project-custom-scripts')
    <script>
        const renderHTML = (data) => {
            const documents = data.map(item => (
                `<div class="col-3">
                    <div class="card m-0 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-secondary rounded">
                                            <i class="mdi mdi-folder font-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col ps-0">
                                    <a href="javascript:void(0);" class="text-muted fw-bold">${item.name}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`
            ))
            $('#documents-section').html(
                `<h4 class="fw-bold text-center text-primary mb-2">Documents from Share Point</h4><div class="row g-2">${documents.toString().replaceAll(',','')}</div>`
            )
        }
        const getDocFromSharePoint = () => {
            axios.get("{{ route('sharepoint.listAllFolder', $project->id) }}").then((response) => {
                sessionStorage.setItem('folders',JSON.stringify(response.data))
                renderHTML(response.data)
            }).catch((response) => {
                $('#documents-section').html(
                    `<div class="p-3 text-center">
                        <h4 class="fw-bold ">Something went wrong!</h4>
                        <div class="text-primary">
                            <p class="fw-bold ">Please try again ...</p>
                            <a class="btn btn-sm rounded-pill btn-primary" onclick='location.reload()'>Retry</a>
                        </div>
                    </div>`
                )
            })
        }
        const sharePointsDocuments = sessionStorage.getItem('folders')
        sharePointsDocuments === null ? getDocFromSharePoint() : renderHTML(JSON.parse(sharePointsDocuments))
    </script>
@endpush