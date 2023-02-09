<div class="modal-content p-0 h-100 w-100">
    <div class="modal-header">
        <h4 class="custom-modal-title" id="myCenterModalLabel"> Variation Versions | {{ $variation->Issues->issue_id }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
    </div>
    <div class="modal-body p-0">
        <div class="tab-content p-2">
            <div class="tab-pane show active" id="properties-b1">
                <div class="card d-block shadow-sm border h-100 m-0">
                    <div class="card-body">
                        <table class="table" id="variation-versions-table">
                            <thead>
                                <tr>
                                    <th scope="col">#Version</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Hours</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-chat-box status="CHAT_BUTTON" :moduleId="Project()->id" moduleName="project" :menuName="str_replace('/', '_', $variation->Issues->issue_id . '/VO/' . $variation->id)" />
    </div>
</div>
